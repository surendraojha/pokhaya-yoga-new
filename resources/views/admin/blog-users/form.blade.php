<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('position', 'Position') }}
    {{ Form::text('position', null, ['class' => 'form-control', 'id' => 'position']) }}
</div>
<div class="form-group">
    {{ Form::label('social_media_url1', 'Social Media,LinkedIn') }}
    {{ Form::text('social_media_url1', null, ['class' => 'form-control', 'id' => 'social_media_url1']) }}
</div>
<div class="form-group">
    {{ Form::label('social_media_url2', 'Social Media Url2') }}
    {{ Form::text('social_media_url2', null, ['class' => 'form-control', 'id' => 'social_media_url2']) }}
</div>
<div class="form-group">
    {{ Form::label('year_of_experience', 'Year of experience') }}
    {{ Form::text('year_of_experience', null, ['class' => 'form-control', 'id' => 'year_of_experience']) }}
</div>
<div class="form-group">
    {{ Form::label('about', 'About') }}
    {{ Form::textarea('about', null, ['class' => 'form-control summernote', 'id' => 'about']) }}
</div>
<div class="form-group">
    {{ Form::label('education', 'Education') }}
    {{ Form::textarea('education', null, ['class' => 'form-control summernote', 'id' => 'education']) }}
</div>
<div class="form-group">
    {{ Form::label('experience', 'Experience') }}
    {{ Form::textarea('experience', null, ['class' => 'form-control summernote', 'id' => 'experience']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
<input type="submit" value="save" class="btn btn-info">

	</div>
