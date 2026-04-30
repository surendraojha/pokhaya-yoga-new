<div class="form-group">
    {{ Form::label('category', 'Team Category') }}
    {{ Form::select('team_category_id', $categories, null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', null, ['class' => 'form-control']) }}
</div>

{{-- Add this block to resources/views/admin/our-team/form.blade.php --}}

<hr>
<h5>Social Media</h5>

<div class="form-group">
    {{ Form::label('instagram', 'Instagram URL') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="icon-instagram"></i></span>
        {{ Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'https://instagram.com/username']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('facebook', 'Facebook URL') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="icon-facebook"></i></span>
        {{ Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'https://facebook.com/username']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('youtube', 'YouTube URL') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="icon-youtube"></i></span>
        {{ Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'https://youtube.com/@channel']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('whatsapp', 'WhatsApp Number') }}
    <div class="input-group">
        <span class="input-group-addon"><i class="icon-whatsapp"></i></span>
        {{ Form::text('whatsapp', null, ['class' => 'form-control', 'placeholder' => '+977XXXXXXXXXX']) }}
    </div>
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

<div class="form-group">
    {{ Form::label('order', 'Order') }}
    {{ Form::text('order', null, ['class' => 'form-control', 'required']) }}
</div>




<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>
