@if (!$blogs->isEmpty())
<div class="container" id="blog-section">

            <div class="row">
                <div class="col-12 col-sm-12">
                    <h3 style="color:#ffffff;">Blog</h3>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        @if (!$blog->image == '')
                            <img class="lazy" height="250px" width="300px"
                                data-src="{{ asset('uploads/blogs/thumbnails/' . $blog->image) }}"
                                alt="Yoga school in nepal">
                        @endif

                        <div class="teach-box">
                            <h4>{{ $blog->title }}</h4>
                            <ul>
                                <li><i class="fa fa-user"></i> by <a href="#">Admin</a></li>
                                <li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('j M, Y') }}</li>
                            </ul>
                            <p>{!! str_limit($blog->content, 200) !!}</p>
                            <a href="{{ action('Front\FrontController@singleBlog', $blog->slug) }}"
                                class="btn btn-read">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </div>
@endif