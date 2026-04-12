<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(@Auth::User()->user_img != null || @Auth::User()->user_img !='')
          <img src="{{ asset('images/user_img/'.@Auth::User()->user_img)}}" class="img-circle" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="User Image">

          @endif
        </div>
        <div class="pull-left info">
          <p>{{ @Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Online') }}</a>
        </div>
      </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.Navigation') }}</li>

          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('student.dashboard')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>



          <li class="{{ Nav::isResource('coupon') }}">
            <a href="{{url('coupon')}}">
                <i class="flaticon-coupon" aria-hidden="true"></i>
                <span>{{ __('Question/ Answer') }}</span>
            </a>
        </li>


        </ul>


    </section>
    <!-- /.sidebar -->
</aside>
