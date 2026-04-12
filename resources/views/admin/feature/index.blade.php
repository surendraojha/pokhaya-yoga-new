@extends('layouts.admin')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
       
<div class="card">
            <div class="card-header">
                
                    
              <h2 class="card-title pr-5 btn bg-secondary">Features</h2>
         
                   

              <a href="{{ action('Admin\FeatureController@create') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add New</a>
             
         
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                @if($informations->isNotEmpty())
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn:</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Icon</th>
                  <th>Order</th>
                  <th>Image </th>
                  <th>Created_at</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
               
            @php $sn =1 @endphp
              @foreach($informations as $k => $information)
              <tr>
                  <td>{{ $sn++ }}</td>
                  <td>{{ $information->title }}</td>
                  <td>{{ $information->slug }}</td>
                  <td class="text-info">{!! $information->icon !!}</td>
                  <td>{{ $information->order }}</td>
                  <td><img src="{{ asset('uploads/'.$information->image) }}" class="img-fluid" style="height:100px"></td>
                 
                
                
                  <td>{{ $information->created_at->format('j M, Y h:i A') }}</td>
                  
                  
                                                            <td>
                                            {{ Form::open(['method' => 'delete', 'action' => ['Admin\FeatureController@destroy', $information->id]]) }}
                                            <a href="{{ action('Admin\FeatureController@edit', $information->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                    <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm('You Want to Delete?');"><i class="fas fa-trash-alt"></i></button>
                                            {{ Form::close() }}
                                                    

                                        </td>
                </tr>
                @endforeach
                {{ $informations->links() }}
                </tbody>
               
              </table>
              @else 
              <h5>No Information Added</h5>
              @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

</div>
</section>

@endsection