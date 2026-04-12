<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>

@if(!@$information)
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
    </div>
@endif

<div class="form-group">
    {{ Form::label('status', 'Status') }}
    {{ Form::select('status',[
        '1'=>'Active',
        '0'=>'Inactive'
        ],null, ['class' => 'form-control','placeholder'=>'Select Status']) }}
</div>


{{-- <div class="form-group">
    {{ Form::label('gender', 'Gender') }}
    {{ Form::text('gender', null, ['class' => 'form-control', 'id' => 'gender']) }}
</div> --}}
{{-- <div class="form-group">
    {{ Form::label('nationality', 'Nationality') }}
    {{ Form::text('nationality', null, ['class' => 'form-control','id' => 'nationality']) }}
</div>
<div class="form-group">
    {{ Form::label('dob', 'DOB') }}
    {{ Form::text('dob', null, ['class' => 'form-control','id' => 'dob']) }}
</div> --}}
{{-- <div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, ['class' => 'form-control','id' => 'address']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('contact', 'Contact') }}
    {{ Form::text('contact', null, ['class' => 'form-control','id' => 'contact']) }}
</div> --}}
{{-- <div class="form-group">
    {{ Form::label('meta_keyword', 'Meta Keyword') }}
    {{ Form::textarea('meta_keyword', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_des', 'Meta Description') }}
    {{ Form::textarea('meta_des', null, ['class' => 'form-control', 'rows' => '3']) }}
</div> --}}


<div class="form-group">
<input type="submit" value="save" class="btn btn-info">

	</div>
