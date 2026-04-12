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



     {{ Form::open(['route'=>['outcome.update',$information->id],'method'=>'POST','files'=>true]) }}
     @method('PUT')
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
                                value="{{old('title',$information->title)}}" placeholder="Outcome Title" >
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
                                <span class="input-group-text">Outcome Content
                                </span>
                            </div>
                            <textarea name="content" class="form-control ckeditor" id=""
                            placeholder="Write your Content" cols="30" rows="10">{{old('title',$information->title)}}</textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
     </div>
     <button type="submit">Update</button>

     {{ Form::close() }}




</body>
</html>






