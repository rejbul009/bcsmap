<section id="recent-posts" class="recent-posts sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Recent Blog Posts</h2>
        <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
      </div>

      <div class="row gy-4">

        
        @foreach($recentPosts as $post)

        <div class="col-xl-4 col-md-6">
          <article>

            <div class="post-img">
              <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" alt="" class="img-fluid">
            </div>

            <p class="post-category">{{ $post->category->name }}</p>

            <h2 class="title">
              <a href="{{ route('user.post', $post->id) }}">{{ $post->title }}</a>                </h2>


            <div class="d-flex align-items-center">
              <img src="{{ asset("/assets/img/blog/blog-author.jpg") }}" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author-list">{{ $post->user->name }}</p>
                <p class="post-date">
                  <time datetime="{{ $post->created_at->toW3cString() }}">{{ $post->created_at->format('M j, Y') }}</time>
                </p>
              </div>
            </div>

          </article>
        </div>           @endforeach





       <!-- End post list item -->

        <!-- End post list item -->

      </div><!-- End recent posts list -->

    </div>
  </section>