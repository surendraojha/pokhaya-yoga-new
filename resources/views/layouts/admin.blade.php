<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/wheelcolorpicker.css') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @stack('page-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lite-youtube-embed/0.3.3/lite-yt-embed.css"
        integrity="sha512-utq8YFW0J2abvPCECXM0zfICnIVpbEpW4lI5gl01cdJu+Ct3W6GQMszVITXMtBLJunnaTp6bbzk5pheKX2XuXQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

    <style>
        .dataTables_filter {
            width: 50%;
            float: right;
            text-align: right;
        }
    </style>
    <!-- End DataTables -->
</head>

<body class="hold-transition sidebar-mini layout-fixed" id="body">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav> --}}
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #0b263de8">
            <!-- Brand Logo -->
            <a href="{{ url('/home') }}" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashbord</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item active">
                            <a href="#" class="nav-link active"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/about-us' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/slider' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/welcome' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/offer' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/quote' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/community_support' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/question' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/testimonial' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/why-choose-us' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/why-come-to-pokhara' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/feature' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/facilitie' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Home Page
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('aboutus.index') }}"
                                        class="nav-link {{ 'admin/about-us' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Us</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('slider.index') }}"
                                        class="nav-link {{ 'admin/slider' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sliders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('welcome.index') }}" class="nav-link {{ 'admin/welcome' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Welcome</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="{{ route('offer.index') }}"
                                        class="nav-link {{ 'admin/offer' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Offer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('why-choose-us.index') }}"
                                        class="nav-link {{ 'admin/why-choose-us' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Why Choose Us</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('quote.index') }}"
                                        class="nav-link {{ 'quote/offer' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quote</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('community_support.index') }}"
                                        class="nav-link {{ 'admin/community_support' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Community Support</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('question.index') }}"
                                        class="nav-link {{ 'admin/question' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Questions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('testimonial.index') }}"
                                        class="nav-link {{ 'admin/testimonial' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Testimonial</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('why-come-to-pokhara.index') }}"
                                        class="nav-link {{ 'admin/why-come-to-pokhara' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Why Come to Pokhara</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('course.index') }}"
                                        class="nav-link {{ 'admin/course' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Yoga Training In Nepal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('accommodation-and-foods.index') }}" class="nav-link {{ 'admin/accommodation-and-foods' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Accommodation and Food</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('announcements.index') }}"
                                class="nav-link {{ 'admin/announcements' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Announcements</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('all-page.index') }}"
                                class="nav-link {{ 'admin/all-page' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Pages</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('retreat-page.index') }}"
                                class="nav-link {{ 'admin/retreat-page' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Retreat Page Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}"
                                class="nav-link {{ 'admin/blog' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blogs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blog-users.index') }}"
                                class="nav-link {{ 'admin/blog-users' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Users</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('faq.index') }}"
                                class="nav-link {{ 'admin/faq' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faqs</p>
                            </a>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/team-category' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/our-team' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Our Teachers
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('team-category.index') }}"
                                        class="nav-link {{ 'admin/team-category' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('our-team.index') }}"
                                        class="nav-link {{ 'admin/our-team' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teachers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/gallery' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/photo-list' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gallery.index') }}"
                                        class="nav-link {{ 'admin/gallery' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('photo-list.index') }}"
                                        class="nav-link {{ 'admin/photo-list' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Photo List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/curriculam' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/curriculam-category' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/curriculam-list' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Curriculam
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('curriculam.index') }}"
                                        class="nav-link {{ 'admin/curriculam' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Curriculam</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('curriculam-category.index') }}"
                                        class="nav-link {{ 'admin/curriculam-category' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('curriculam-list.index') }}"
                                        class="nav-link {{ 'admin/curriculam-list' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/fee-category' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/fee-list' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Fee & Schedule
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fee-category.index') }}"
                                        class="nav-link {{ 'admin/fee-category' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fee-list.index') }}"
                                        class="nav-link {{ 'admin/fee-list' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fee List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('yoga-class.index') }}"
                                class="nav-link {{ 'admin/yoga-class' == request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yoga Classes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('video-testimonial.index') }}"
                                class="nav-link {{ 'admin/video-testimonial' == request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video Testimonial</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('qr.index') }}"
                                class="nav-link {{ 'admin/qr' == request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>QR Code</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('seo-meta.index') }}"
                                class="nav-link {{ 'admin/seo-meta' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seo Meta</p>
                            </a>
                        </li>

                        <li
                            class="nav-item has-treeview
            {{ 'admin/setting' == request()->path() ? 'menu-open' : '' }}
            {{ 'admin/banner' == request()->path() ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Setting
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('setting.index') }}"
                                        class="nav-link {{ 'admin/setting' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setting</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('banner.index') }}"
                                        class="nav-link {{ 'admin/banner' == request()->path() ? 'bg-white' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}"
                                class="nav-link {{ 'admin/customers' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}"
                                class="nav-link {{ 'admin/bookings' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bookings</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('referral.setting') }}"
                                class="nav-link {{ 'admin/referral-setting' == request()->path() ? 'bg-white' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Referrals Settings</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <!-- this is error -->

        <!-- yield -->
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-5">

                </div>
            </div>
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Power By <a href="http://rsoftnepal.com" target="_blank">webbanknepal </a> </strong>

            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/adminfunctions.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/jquery.wheelcolorpicker.js') }}"></script>
    <script src="{{ asset('admin/riwash.js') }}"></script>

    <!-- DataTables -->

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#blogTableData').DataTable();

        });
    </script>
    <!-- End DataTables -->

    @stack('scripts')
    <script type="text/javascript">
        @if (\Session::has('msg'))

            toastr.success("{{ \Session::get('msg') }}");
        @endif
        @if ($errors->any())

            @foreach ($errors->all() as $e)
                toastr.error("{{ $e }}");
            @endforeach
        @endif
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.add', function() {
                var html = '';
                html += '<tr class="width-fix">';
                html +=
                    '<td> {{ Form::textarea('day[]', null, ['class' => 'form-control', 'rows' => '5', 'onkeyup' => 'setId(event)']) }} </td>';
                html +=
                    '<td>{{ Form::textarea('title[]', null, [
    'class' => 'form-control rate',
    'rows' => '5',
    'onkeyup' => 'getTotal(event)',
]) }}</td>';
                html +=
                    '<td> {{ Form::textarea('content[]', null, [
    'class' => 'form-control qty',
    'id' => 'summernote',
    'onkeyup' => 'getTotal(event)',
]) }} </td>';
                html +=
                    '<td> <button type ="button" name="button" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"> </span> x  </button> </td> </tr>';
                $('#item_table').append(html);

            });
            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();

            });



        });
    </script>

    {{-- <script type="text/javascript">
  $(document).ready(function(){
    $('#saveBtn').on('click', function(){

    });
  })
</script> --}}


    <script>
        $(document).on('click', '#dltBtn', function() {
            var user_id = $(this).data('task');
            $.get("{{ url('admin/out-team/delete') }}/" + user_id, function(data, status) {

                $('#body').html(data);
            });
        });
    </script>

    <script type="text/javascript">
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp, '-');
            $("#slug").val(Text);
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lite-youtube-embed/0.3.3/lite-yt-embed.js"
        integrity="sha512-WKiiKu2dHNBXgIad9LDYeXL80USp6v+PmhRT5Y5lIcWonM2Avbn0jiWuXuh7mL2d5RsU3ZmIxg5MiWMEMykghA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('layouts.summernote-script')
</body>

</html>
