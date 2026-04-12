
<div class="form-group">
    {{ Form::label('name_of_company', 'Name Of Company') }}
    {{ Form::text('name_of_company', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('M_d', 'Managing Director') }}
    {{ Form::text('M_d', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('website', 'WebSite') }}
    {{ Form::text('website', null, ['class' => 'form-control', 'required']) }}
</div>





<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
