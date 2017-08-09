<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

	public function getDashboard()
	{

		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('dashboard', ['posts' => $posts]);

	}

	public function postCreatePost(Request $request)
	{
		$this->validate($request, [
			'body' => 'required|max:3000',
		]);

		$post = new Post();
		$post->body = $request->body;
		$message = 'There was an error!';

		if ($request->user()->posts()->save($post)) {
			$message = 'Post successfully created!';
		}

		return redirect()->route('dashboard')->with([
			'message' => $message,
		]);
	}

	public function postEditPost(Request $request)
	{

		$this->validate($request, [
			'body' => 'required',
		]);

		$post = Post::find($request->postId);

		if (Auth::user() != $post->user) {
			return redirect()->back();
		}

		$post->body = $request['body'];
		$post->update();

		return response()->json([
			'message' => 'Post edited!',
			'new_body' => $post->body,
		], 200);

	}

	public function getDeletePost($post_id)
	{
//		$post = Post::find($post_id)->first();
		$post = Post::where('id', $post_id)->first();
		if (Auth::user() != $post->user) {
			return redirect()->back();
		}
		$post->delete();

		return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
	}

	public function postLikePost(Request $request   )
	{

		$postId = $request->postId;
		$isLike = $request->isLike === 'true';
		$update = false;
		$post = Post::find($postId);

		if (!$post) {
			return null;
		}

		$user = Auth::user();
		$like = $user->likes()->where('post_id', $post->id)->first();

		if ($like) {
			$isLiked = $like->like;
			$update = true;

			if ($isLike == $isLiked) {
				$like->delete();
				return null;
			}
		} else {
			$like = new Like();
		}

		$like->like = $isLike;
		$like->user_id = $user->id;
		$like->post_id = $post->id;

		if ($update) {
			$like->update();
		} else {
			$like->save();
		}

		return null;
	}

}