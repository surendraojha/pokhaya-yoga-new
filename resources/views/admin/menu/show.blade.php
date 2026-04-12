@extends('layouts.admin')
@section('content')

     <div class="content">
                        
        
<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li> Menu</li>
        </ul>
       
        <ul class="breadcrumb-elements">
            <a href="{{ action('Admin\MenuController@createMenu',$information->id) }} " class="btn btn-success">Create </a>
        </ul>
        
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>
<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                    	<h3>Main Menu</h3>
                       
                        <table class="table table-striped">
                     @foreach($information->pageMenu as $page)

                              <tr>
            
               <td class="">
                <span class="handle ui-sortable-handle" style="padding-right: 20px;">
                  <i class="fa fa-bars pr-5"></i>
                </span> 

                @foreach($page->pageInfo as $info)
               <span class="pl-5"> {{ $info->title }}</span>

                @endforeach
                
              
              </td> 
              <td> {{-- {{ $page->order }} --}}</td>


                                                            <td>
                                            {{ Form::open(['method' => 'POST', 'action' => ['Admin\MenuController@destroyMenu', $page->id]]) }}
                                   <a href="{{ action('Admin\MenuController@editMenu', $page->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      
                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fa fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
              </tr>

@foreach($page->pageInfo as $info)
                  @foreach($info->subMenu as $subPage)
                 <tr>
                
               <td class=" pl-5"> <span class="handle ui-sortable-handle" style="padding-left: 50px;"><i class="fa fa-bars pr-2"></i></span> {{ $subPage->pageInfo->title }}

                
             
                                   
              


                 </td>
                 

                 <td class=" pl-5"> 
                   {{ Form::open(['method' => 'delete', 'action' => ['Admin\MenuController@subMenuRemove', $subPage->id]]) }}
                              
                                   <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fas fa-trash-alt"></i></button>
                                 
                                   {{ Form::close() }}
                 </td>



                 

               </tr>
               @endforeach
               @endforeach
















              @endforeach
      
                </table>
                
            </div>
                </div>
       
      
</div>  
        </div>

<div class="col-sm-1">

</div>
        {{-- this is for sub menu --}}
        <div class="col-sm-4 pl-5">
        	
        	<table class="table table-striped">
        		<tr>
        		<h3>Sub Menu</h3>
        		<form action="{{ action('Admin\MenuController@subMenuAdd') }}" method="POST">
  <strong>Select Sub Pages </strong>
  <div class="from-group">
    <label for="">For Main Pages </label>
   <select name="parent_id" class="form-control">
    @foreach($information->pageMenu as $page)
    @foreach($page->pageInfo as $mainPage)
    <option value="{{ $mainPage->id }}"> {{ $mainPage->title }}</option>
     

@endforeach
@endforeach
   </select>

  </div>
  <div class="form-group">
    <label for="">All Pages </label>
 
    <select name="child_id" class="form-control">
    	@foreach($allPages as $allPage)
    	<option value="{{ $allPage->id }}">{{ $allPage->title }}</option>
    	@endforeach
    	
    </select>

    
    

  </div>
  @csrf
  <div class="form-group">
    <input type="submit" value="Save" class="btn btn-info">
  </div>


</form>
</tr>

        	</table>


        </div>









    </div>
    </div>  

        
                    </div>



            

        
    

@endsection