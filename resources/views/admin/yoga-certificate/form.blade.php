<div class="form-group">
    {{ Form::label('yoga_class_id', 'Yoga Class') }}
    {{ Form::select('yoga_class_id', $yogaClasses->pluck('title', 'id')->prepend('— Select Yoga Class —', ''), @$information->yoga_class_id, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>
<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>



<!--<input type="submit" value="save" class="btn btn-info">-->
