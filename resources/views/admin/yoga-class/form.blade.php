<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>
<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ Form::label('trainer', 'Trainer') }}
    {{ Form::text('trainer', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('level', 'Level') }}
    {{ Form::text('level', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('members', 'Members') }}
    {{ Form::text('members', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('accomodation_text', 'Accomodation Text') }}
    {{ Form::textarea('accomodation_text', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>

<div class="form-group">
    {{ Form::label('meta_keyword', 'Meta Keyword') }}
    {{ Form::textarea('meta_keyword', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_des', 'Meta Description') }}
    {{ Form::textarea('meta_des', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_title', 'Meta Title') }}
    {{ Form::textarea('meta_title', null, ['class' => 'form-control', 'rows' => '3']) }}
</div>



<!--<input type="submit" value="save" class="btn btn-info">-->
