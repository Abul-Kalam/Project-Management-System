<div class="row">
    <div class="col-md-8">
      <h2 class="page-header">Comments</h2>
        <section class="comment-list">
          <!-- First Comment -->
          @foreach($comments as $comment)
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center">{{ $comment->user->name }}</figcaption>
              </figure>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-email"><a href="user/{{$comment->user->id}}">{{ $comment->user->email }}</a></div>
                    <small>{{ $comment->created_at }}</small>
                  </header>
                  <br>
                  <div class="comment-post">
                    <p>
                      {{ $comment->body }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </article>
           @endforeach
       
        </section>
    </div>