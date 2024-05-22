<!DOCTYPE html>
<html lang="en">

@include('user.inc.head')

<body>

  @include('user.inc.topbar')
  @include('user.inc.nav')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Blog</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="{{ url('index.html') }}">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 posts-list">

          @foreach($posts as $post)
            <div class="col-xl-4 col-md-6">
              <article>

                <div class="post-img">
                  @if ($post->image)
                  <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" width="720" height="400" 
              @endif
{{ $post->title }} class="img-fluid">
                </div>

                <p class="post-category">{{ $post->category->name }}</p>

                <h2 class="title">
                  <a href="{{ route('user.post', $post->id) }}">{{ $post->title }}</a>                </h2>

                <div class="d-flex align-items-center">
                  <img src="{{ asset('assets/img/authors/' . $post->author_image) }}" alt="{{ $post->author }}" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author-list">{{ $post->author }}</p>
                    <p class="post-date">
                      <time datetime="{{ $post->created_at->toW3cString() }}">{{ $post->created_at->format('M j, Y') }}</time>
                    </p>
                  </div>
                </div>

              </article>
            </div>
          @endforeach

        </div>

        <div class="blog-pagination">
          {{ $posts->links() }} <!-- Laravel pagination links -->
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('user.inc.footer')
  <!-- End Footer -->

  @include('user.inc.script')
</body>

</html>
