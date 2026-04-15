<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'required']) }}
    <small class="help-block">Unique URL identifier</small>
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

<div class="form-group">
    {{ Form::label('price', 'Price') }}
    <div class="input-group">
        <span class="input-group-addon">NPR</span>
        {{ Form::number('price', null, ['class' => 'form-control', 'required', 'step' => '0.01', 'placeholder' => '0.00']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('discount', 'Discount (%)') }}
    {{ Form::number('discount', 0, ['class' => 'form-control', 'min' => '0', 'max' => '100']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', ['class' => 'form-control']) }}
    <small class="help-block">Upload offer image (jpg, png, jpeg, gif)</small>
</div>

<div class="form-group">
    {{ Form::label('end_date', 'End Date') }}
    {{ Form::date('end_date', null, ['class' => 'form-control']) }}
    <small class="help-block">Offer expiry date (optional)</small>
</div>

<div class="form-group">
    <label>
        {{ Form::checkbox('is_active', 1, true) }} Active
    </label>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('offer.index') }}" class="btn btn-default">Cancel</a>
</div>