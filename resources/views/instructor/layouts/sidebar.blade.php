<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
          <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle" alt="User Image">
        @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="User Image">
        @endif
      </div>
      <div class="pull-left info">
        <p>{{ Auth::User()->fname }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Instructor') }}</a>
      </div>
    </div>


    @if(Auth::User()->role == "instructor")
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">{{ __('adminstaticword.Navigation') }} </li>

      <li class="{{ Nav::isRoute('instructor.index') }}"><a href="{{route('instructor.index')}}"><i
            class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a>
      </li>

      <li
        class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
        <a href="#">
          <i class="flaticon-browser-1"></i>{{ __('adminstaticword.Course') }}
          <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
          <li
            class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">

            @if($gsetting->cat_enable == 1)
            <a href="#"><i class="flaticon-interface" aria-hidden="true"></i>{{ __('adminstaticword.Category') }}<i
                class="fa fa-angle-left pull-right"></i></a>

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('category') }}"><a href="{{url('category')}}"><i
                    class="flaticon-rec"></i>{{ __('adminstaticword.Category') }}</a></li>
              <li class="{{ Nav::isResource('subcategory') }}"><a href="{{url('subcategory')}}"><i
                    class="flaticon-rec"></i>{{ __('adminstaticword.SubCategory') }}</a></li>
              <li class="{{ Nav::isResource('childcategory') }}"><a href="{{url('childcategory')}}"><i
                    class="flaticon-rec"></i>{{ __('adminstaticword.ChildCategory') }}</a></li>
            </ul>
            @endif


          <li class="{{ Nav::isResource('course') }}"><a href="{{url('course')}}"><i class="flaticon-document"
                aria-hidden="true"></i><span>{{ __('adminstaticword.Course') }}</span></a></li>

          <li class="{{ Nav::isResource('courselang') }}"><a href="{{url('courselang')}}"> <i
                class="flaticon-translation" aria-hidden="true"></i></i><span> {{ __('adminstaticword.Course') }}
                {{ __('adminstaticword.Language') }}</span></a></li>

          @if($gsetting->assignment_enable == 1)
          <li class="{{ Nav::isRoute('assignment.view') }}"><a href="{{route('assignment.view')}}"><i
                class="flaticon-computer" aria-hidden="true"></i><span>{{ __('adminstaticword.Assignment') }}</span></a>
          </li>
          @endif
      </li>
    </ul>
    </li>


    {{-- User enrolled --}}
    <li class="{{ Nav::isResource('userenroll') }}">
      <a href="{{url('userenroll')}}"><i class="flaticon-user" aria-hidden="true"></i><span>
          {{ __('adminstaticword.User') }} {{ __('adminstaticword.Enrolled') }}</span></a></li>


    {{-- instructor answer --}}
    <li class="{{ Nav::isResource('instructorquestion') }} {{ Nav::isResource('instructoranswer') }} treeview">
      <a href="#">
        <i class="flaticon-faq"></i> {{ __('Topic Discussion') }}
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">
        <li class="{{ Nav::isResource('instructorquestion') }}">
          <a href="{{url('instructorquestion')}}"><i class="flaticon-help" aria-hidden="true"></i>
            <span>{{ __('Discussion Topic') }}</span></a></li>

        <li class="{{ Nav::isResource('instructoranswer') }}">
          <a href="{{url('instructoranswer')}}"><i class="flaticon-test" aria-hidden="true">
            </i><span>{{ __('Comments/Opinions') }}</span></a></li>
      </ul>
    </li>

    {{-- Announcement --}}

    <li class="{{ Nav::isResource('instructor/announcement') }}"><a href="{{url('instructor/announcement')}}"><i
          class="flaticon-mobile-marketing"
          aria-hidden="true"></i><span>{{ __('adminstaticword.Announcement') }}</span></a></li>

    {{-- Blog --}}

    <li class="{{ Nav::isResource('blog') }}"><a href="{{url('blog')}}"><i
          class="flaticon-personal-information"></i>{{ __('Discussion Forum') }}</a></li>


    {{-- public blogs --}}

    <li
      class="{{ Nav::isRoute('publicblog.index') }} {{ Nav::isRoute('publicblog.create') }} {{ Nav::isRoute('publicblog.edit') }}">
      <a href="{{route('publicblog.index')}}"><i class="flaticon-user"
          aria-hidden="true"></i><span>{{ __('Public Blogs') }}</span></a></li>

    @if(isset($gsetting->feature_amount))
    <li class="{{ Nav::isResource('featurecourse') }}"><a href="{{url('featurecourse')}}"><i class="flaticon-smartphone"
          aria-hidden="true"></i><span> {{ __('adminstaticword.Feature') }}
          {{ __('adminstaticword.Course') }}</span></a></li>
    @endif



    @if(isset($zoom_enable) && $zoom_enable == 1)
    <li
      class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }}  treeview">
      <a href="#">
        <i class="flaticon-live" aria-hidden="true"></i> <span>{{ __('Zoom Live Meetings') }}</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('zoom.setting') }}"><a href="{{route('zoom.setting')}}"><i
              class="flaticon-optimization"></i>{{ __('Zoom Settings') }}</a></li>
        <li
          class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}">
          <a href="{{route('zoom.index')}}"><i class="flaticon-layout"></i>{{ __('Zoom Dashboard') }}</a></li>
      </ul>
    </li>
    @endif
    {{--
       @if(isset($gsetting) && $gsetting->bbl_enable == 1)
          <li class="{{ Nav::isRoute('bbl.all.meeting') }} treeview">
    <a href="#">
      <i class="flaticon-live-1" aria-hidden="true"></i> <span>{{ __('Big Blue Meetings') }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

      <li class="{{ Nav::isRoute('bbl.all.meeting') }}"><a href="{{ route('bbl.all.meeting') }}"><i
            class="flaticon-document-2"></i>{{ __('List Meetings') }}</a></li>
    </ul>
    </li>
    @endif

    --}}


    @if(session('role_permissions')==null)
    @php
    \Session::put('role_permissions',[]);
    @endphp

    @endif

    @if( in_array('all.payout', session('role_permissions'))
    ||
    in_array('pending.payout', session('role_permissions'))
    )




    <li class="{{ Nav::isResource('pending.payout') }} {{ Nav::isRoute('admin.completed') }} treeview">
      <a href="#">
        <i class="flaticon-money-1"></i> {{ __('adminstaticword.MyRevenue') }}
        <i class="fa fa-angle-left pull-right"></i>
      </a>




      <ul class="treeview-menu">
        @if( in_array('pending.payout', session('role_permissions')))
        <li class="{{ Nav::isResource('pending.payout') }}"><a href="{{route('pending.payout')}}"><i
              class="flaticon-pending" aria-hidden="true"></i><span>{{ __('adminstaticword.PendingPayout') }}</span></a>
        </li>
        @endif

        @if( in_array('all.payout', session('role_permissions')))
        <li class="{{ Nav::isRoute('all.payout') }}"><a href="{{route('admin.completed')}}"><i
              class="flaticon-file"></i>{{ __('adminstaticword.CompletedPayout') }}</a></li>
        @endif
      </ul>
    </li>

    @endif

    @if(isset($isetting))

    <li class="{{ Nav::isResource('instructor.pay') }}">
      <a href="{{route('instructor.pay')}}"><i class="flaticon-settings-3"
          aria-hidden="true"></i><span>{{ __('adminstaticword.PayoutSettings') }}</span></a>
    </li>
    @endif
    <ul>
      @endif


  </section>
  <!-- /.sidebar -->
</aside>
