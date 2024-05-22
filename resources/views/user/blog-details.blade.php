
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
              <h2>Blog Details</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="{{ url("index.html") }}">Home</a></li>
            <li>Blog Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog" style="font-family: 'Noto Serif Bengali', sans-serif;">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                @if ($post->image)
                <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" width="720" height="400" 
            @endif class="img-fluid post-author-img flex-shrink-0">
               
              </div>

              <h2 class="title">{{ $post->title }}</h2>

              <div class="meta-top">
                <ul>
                    <p class="card-text">
                      <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}
                      &nbsp;&nbsp;&nbsp; 
                      <i class="fas fa-user-shield"></i> {{ $post->user->name }}
                  </p>
                </ul>
              </div><!-- End meta top -->

              <div class="content ">
                <?php echo "<p class='card-text'>" . $post->content . "</p>"; ?>

              </div><!-- End post content -->

              <td><a href="{{ route('category.posts', $post->category->id) }}">{{ $post->category->name }}</a></td>

            </article>

            

            
          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="{{ route('userposts.search') }}" method="GET" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  @foreach ($categories as $category)
                  <li>
                      <a href="{{ route('category.posts', $category->id) }}">
                          {{ $category->name }}
                      </a>
                  </li>
              @endforeach
                </ul>
            </div>
            <!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="mt-3">
                  @foreach ($recentPosts as $post)
                      <div class="post-item mt-3">
                        <img src="{{ asset('upload/admin_postimage/' . $post->image) }}">
                          <div>
                              <h4><a href="{{ route('user.post', $post->id) }}">{{ $post->title }}</a></h4>
                              <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('M d, Y') }}</time>
                          </div>
                      </div><!-- End recent post item-->
                  @endforeach
              </div>
          </div>


            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 @include('user.inc.footer')

  @include('user.inc.script')

</body>

</html>