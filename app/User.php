<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model implements Authenticatable
{

	use \Illuminate\Auth\Authenticatable;
//	protected $table = 'users';

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function likes()
	{
		return $this->hasMany('App\Like');
	}

	public function isPostLiked($postId)
	{
		$like = Auth::user()->likes()->where('post_id', $postId)->first();

		if ($like && $like->like) {
			return true;
		}

		return false;
	}

}
