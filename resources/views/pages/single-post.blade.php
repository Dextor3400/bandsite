<x-user-master>
    @section('title', 'Post')
    @section('content')
        <h4 class="border-top border-bottom border-light h4 py-3 text-center text-md-left">{{ $post->title }}</h4>
            <section class="col-12 my-5">
                <article class="row my-4 pb-4 text-center text-lg-left border-bottom border-light">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <img class="img-fluid" src="/images/post-image.jpg" alt="post-image">
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7">
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                        <p>{!! $post->body !!}</p>
                    </div>
                </article>
            </section>
            <section class="col-12 col-lg-8 col-xl-6">
    @if(Auth::check())
    <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{ route('admin.comments.store') }}" method="POST">
                @csrf
                @method('post')
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
              <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
          </div>
        </div>
    @endif


        @if (Session::has('reply_message'))
            <div class="alert alert-success">{{ Session::get('reply_message') }}</div>
        @elseif(Session::has('comment_message'))
            <div class="alert alert-success">{{ Session::get('comment_message') }}</div>
        @endif

        <div>
        @foreach ($comments as $comment)
        @if($comment->is_active == 1)
        @if (count($comment->replies)<=0)

        <!-- Single Comment -->
        <div class="media mb-4">
          <img width="50px" class="d-flex mr-3 rounded-circle" src="{{ $comment->user->avatar }}" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->user->name }}</h5>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            <p>{{ $comment->body }}</p>
            <div class="comment-reply-container">
                <a class="reply-toggler row" type="button" data-toggle="collapse" data-target="#reply{{ $comment->id }}">Reply</a>
            <div class="collapse toggle-reply" id="reply{{ $comment->id }}">
            <form action="{{ route('admin.replies.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <label for="body"></label>
                    <textarea class="form-control" name="body" id="" cols="30" rows="1"></textarea>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
            </div>
            </div>
          </div>
        </div>


        @else

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img width="50px" class="d-flex mr-3 rounded-circle" src="{{ $comment->user->avatar }}" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->user->name }}</h5>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            <p>{{ $comment->body }}</p>
            <div class="comment-reply-container">
                <a class="reply-toggler row" type="button" data-toggle="collapse" data-target="#reply{{ $comment->id }}">Reply</a>
                <div class="collapse toggle-reply" id="reply{{ $comment->id }}">
                <form action="{{ route('admin.replies.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <label for="body"></label>
                        <textarea class="form-control" name="body" id="" cols="30" rows="1"></textarea>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        @foreach ($comment->replies as $reply)
        @if ($reply->is_active == 1)
            <div class="media mt-4">
              <img width="50px" class="d-flex mr-3 rounded-circle" src="{{ $reply->user->avatar }}" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{ $reply->user->name }}</h5>
                <small>{{ $reply->body }}</small>
              </div>
            </div>
        @endif
        @endforeach
          </div>
        </div>
        @endif
        @endif
        @endforeach

        <!-- Comment with nested comments -->




</section>
    @endsection
</x-user-master>
