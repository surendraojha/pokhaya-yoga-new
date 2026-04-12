 <!-- sidebar-1 -->
                    <div class="col-sm-4">

                        
                        <!-- news-wrapper -->
                        <div class="news-wrapper">

                            <div class="news-title"><h2><span class="fa fa-list-alt"></span> Upcomming Events</h2> <a class="pull-right" href="{{action('Front\FrontController@event')}}">View all Events <span class="fa fa-angle-double-right"></span> </a></div>

                            @foreach($events as $notice)
                        
                        <!-- single news wrapper -->
                        <!-- news package -->
                        <div class="news-package">
                            <a href="{{action('Front\FrontController@singleEvent',$notice->id)}}" class="pb-2news-titles ">{{$notice->title}} </a>
                        
                        


                        <!-- col-for image and content -->
                        <div class="row py-2">
                            <div class="col-sm-4">
                            <img src="{{asset('uploads/'.$notice->image)}}" class="img-fluid news-image"> 
                            </div>
                            <div class="col-sm-8 ">
                                <ul class="list-inline news-list-content">
                                    <li><p class="news-date"><i class="fa fa-calendar"></i> 

{{$notice->created_at->format('j M, Y h:i A')}}</p> </li>
                                    <li><p class="text-justify">{!! str_limit($notice->content, 120) !!}</p> </li>
                                </ul>
                            </div>

                        </div>
                        <!-- /col-for image and content -->

                        </div>
                        <!-- /news package -->
                        <!-- /single news wrapper -->
                        




                        @endforeach



                    </div>
                    <!-- /news-wrapper -->





















                    <!-- /sidebar-1 -->
                    </div>
                        