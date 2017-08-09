@extends('layouts.master')

@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to sey?</h3>
            </header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" role="5" placeholder="Type your post"></textarea>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                </div>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What other people say...</h3>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p>{{ $post->body }}</p>
                        <div class="info">
                            Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#" class="like">{{ Auth::user()->isPostLiked($post->id) ? 'You like this post' : 'Like' }}</a> |
                            <a href="#" class="like">{{ !Auth::user()->isPostLiked($post->id) ? 'You don\'t like this post' : 'Dislike' }}</a>
                            @if(Auth::user() == $post->user)
                                |
                                <a class="edit" href="javascript:void(0);">Edit</a> |
                                <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </header>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var token = '{{ csrf_token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
    </script>

@endsection
