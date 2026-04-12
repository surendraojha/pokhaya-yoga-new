



<div class="card-body">

    <div class="row">


    <div class="col-sm-6">


    <div class="form-group">
    {{ Form::label('logo', 'Logo') }}
    {{ Form::file('logo', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('title', 'title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

            <div class="form-group">
    {{ Form::label('desc', 'Sort Description') }}
    {{ Form::textarea('desc', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

<div class="form-group">
    {{ Form::label('number', 'Number') }}
    {{ Form::text('number', null, ['class' => 'form-control']) }}
</div>


             <div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, ['class' => 'form-control']) }}
</div>







                </div>


                 <div class="col-sm-5 pl-5">

                 	<div class="form-group">
    {{ Form::label('visit_us', 'Visit Us') }}
    {{ Form::text('visit_us', null, ['class' => 'form-control']) }}
</div>


                 	     <div class="form-group">
    {{ Form::label('contact_info', 'Contact Info') }}
    {{ Form::textarea('contact_info', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

                 	         <div class="form-group">
    {{ Form::label('facebook', 'Facebook Link') }}
    {{ Form::text('facebook', null, ['class' => 'form-control']) }}
</div>
 <div class="form-group">
    {{ Form::label('instragram', 'Instragram Link') }}
    {{ Form::text('instragram', null, ['class' => 'form-control']) }}
</div>


         <div class="form-group">
    {{ Form::label('twitter', 'Twitter Link') }}
    {{ Form::text('twitter', null, ['class' => 'form-control']) }}
</div>


         <div class="form-group">
    {{ Form::label('youtube', 'Youtube Link') }}
    {{ Form::text('youtube', null, ['class' => 'form-control']) }}
</div>












                </div>

            </div>
            {{-- row --}}


        </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right" id="saveBtn">Save</button>
                </div>
