          <div class="blog-post">
            <h2 class="blog-post-title">
              <a href="/post/ {{ $post->id}}" target="_blank"> 
                {{ $post->title }}
                </a>
              </h2>
            <p class="blog-post-meta">
            	{{ $post->user->name }} on 
          		{{ $post->created_at->toFormattedDateString() }}
            </p>
            {{ $post->body }}
          </div>