<header>
   <div class="row">
   <div class="col-lg-4 col-12">thinkTANKER</div>
   <div class="col-lg-8 col-12 menusection">
   <ul class="nav float-right" id="menusection">
     <li class="closemenu"><span class="far fa-times-circle"></span></li>
        @foreach($menuitems as $m)
          @if($m->children->count()>0)
             @if(isset($set_active_menu_items))
                @if(in_array($m->id, array_keys($set_active_menu_items)))
                   <li class="nav-item active">
                      @else
                      <li class="nav-item">
                          @endif
                             @else
                       <li class="nav-item">
                         @endif
                      <a class="nav-link nav-link-submenu" href="javascript:;">{{$m->label}}
                      <span class="navbar-nav-arrow"><i class="fas fa-angle-down"></i></span></a>
                         <ul class="nav nav-submenu flex-column">
                            @foreach($m->children as $sub)
                            @if($sub->subchildren->count()>0)
                            @if(isset($set_active_menu_items))
                            @if(in_array($sub->id, array_keys($set_active_menu_items)))
                       <li class="nav-item text-left active">
                            @else
                       <li class="nav-item text-left">
                            @endif
                            @else
                       <li class="nav-item text-left">
                            @endif
                      <a class="nav-link nav-link-subsubmenu" href="javascript:;">{{$sub->label}}</a>
                          <ul class="nav nav-sub-submenu">
                            @foreach($sub->subchildren as $da)
                            @if(isset($set_active_menu_items))
                            @if(in_array($da->id, array_keys($set_active_menu_items)))
                               <li class="nav-item text-left active">
                               @else
                              <li class="nav-item text-left">
                                   @endif
                               @else
                                <li class="nav-item text-left">
                                   @endif
                               <a class="nav-link">{{ $da->label }}</a></li>
                                   @endforeach
                         </ul>
                    </li>
                      @else
                        @if(isset($set_active_menu_items))
                        @if(in_array($sub->id, array_keys($set_active_menu_items)))
                         <li class="nav-item text-left active">
                        @else
                          <li class="nav-item text-left">
                        @endif
                     @else
                          <li class="nav-item text-left">
                           @endif
                         <a class="nav-link" >{{$sub->label}}</a></li>
                    @endif
                    @endforeach
                </ul>
           </li>
                @else
                   @if(isset($set_active_menu_items))
                   @if(in_array($m->id, array_keys($set_active_menu_items)))
                     <li class="nav-item active">
                   @else
                     <li class="nav-item">
                   @endif
                   @else
                     <li class="nav-item">
                         @endif
                    <a class="nav-link" >{{$m->label}}</a></li>
                       @endif
               @endforeach
           </ul>
      </div>
  </div>
</header>