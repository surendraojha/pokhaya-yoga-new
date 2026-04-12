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
              <th scope="col">Action</th>

            </tr>
        </thead>
         <tbody>
            @foreach ($information as $value)
             <tr>
              <th>{{ $value->title }} </th>
              <td>{!! $value->content !!} </td>
              <td><a href="{{route('outcome.edit',$value->id)}}"> edit</a>
                {{ Form::open(['route'=>['outcome.destroy',$value->id],'method'=>'POST']) }}
                  @method('DELETE')
                  @csrf
                  <button type="submit" onclick="return confirm('Are You Sure?')">Delete</button>
                {{ Form::close() }}
            </tr>

        @endforeach
        <tbody>

        </table>


     {{ Form::open(['route'=>['outcome.store'],'method'=>'POST','files'=>true]) }}

     <div class="card">
        <div class="body">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Outcome Title
                                </span>
                            </div>
                            <input type="text" class="form-control" name="title"
                                value="" placeholder="Outcome Title" >
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Outcome Content
                                </span>
                            </div>
                            <textarea name="content" class="form-control ckeditor" id=""
                            placeholder="Write your Content" cols="30" rows="10"></textarea>
                            </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <button type="submit">Send</button>

     {{ Form::close() }}




</body>
</html>






