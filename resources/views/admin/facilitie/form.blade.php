



<div class="card-body">
    <div class="row">


    <div class="col-sm-6">


<strong class="text-white">. </strong>

                 <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
   

</div>
             <div class="form-group">
    {{ Form::label('Icon', 'icon') }}
    {{ Form::text('icon', null, ['class' => 'form-control']) }}
    <span class="text-info">Get Icon From <a href="https://fontawesome.com/icons" target="_blank">Here </a> </span>

</div>
   
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    <input type="file" class="form-control" name="image" >
</div>
                  
                  
                </div>


                 <div class="col-sm-5 pl-5">



<strong>Meta: For Google SEO </strong>
                 <div class="form-group">
    {{ Form::label('meta_des', 'Meta Description') }}
    {{ Form::textarea('meta_des', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
             <div class="form-group">
    {{ Form::label('meta_keyword', 'Meta Keyword') }}
    {{ Form::textarea('meta_keyword', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
   <div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control']) }}
</div>

                  
                  
                </div>

            </div>
            {{-- row --}}
            <div class="col-sm-12">
                      <div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

            </div>

        </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>