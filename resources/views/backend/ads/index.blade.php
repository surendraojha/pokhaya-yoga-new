<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Landing Outcome</title>
</head>
<body>

    <table class="table table-bordered" >
        <thead >
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Photo</th>

              <th scope="col">Action</th>

            </tr>
        </thead>
         <tbody>

            @foreach ($information as $value)
             <tr>

              <th>{{ $value->title }} </th>
              <td>{!! $value->content !!} </td>
              {{-- {{ dd($value->photo) }} --}}
              <td>
                <img height="35px" width="35px" src="{{ asset('uploads/'.$value->photo) }}" alt="No Photo">
            </td>


              <td><a href="{{route('ad.edit',$value->id)}}"> edit</a>
                {{ Form::open(['route'=>['ad.destroy',$value->id],'method'=>'POST']) }}
                  @method('DELETE')
                  @csrf
                  <button type="submit" onclick="return confirm('Are You Sure?')">Delete</button>
                {{ Form::close() }}


            </tr>

        @endforeach


        <tbody>

        </table>

     {{ Form::open(['route'=>['ad.store'],'method'=>'POST','files'=>true]) }}

     <div class="card">
        <div class="body">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ad Title
                                </span>
                            </div>
                            <input type="text" class="form-control" name="title"
                                value="" placeholder="Ads Title" >
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ad Content
                                </span>
                            </div>
                            <textarea name="content" class="form-control ckeditor" id=""
                            placeholder="Write your Content" cols="30" rows="10"></textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Photo</span>
                            </div>
                            <input type="file" name="photo">
                        </div>
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>





            </div>
        </div>
     </div>
     <button class="btn btn-success" type="submit">Send</button>

     {{ Form::close() }}




</body>
</html>






