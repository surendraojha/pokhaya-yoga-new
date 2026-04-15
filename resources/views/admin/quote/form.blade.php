<div class="form-group">
    <label>Quote Message</label>
    <textarea name="message"
        class="form-control"
        rows="4"
        placeholder="Enter quote here...">{{ old('message', $quote->message ?? '') }}</textarea>

    @if($errors->has('message'))
    <span class="text-danger">{{ $errors->first('message') }}</span>
    @endif
</div>
