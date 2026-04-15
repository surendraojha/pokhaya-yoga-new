{{-- Title --}}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

{{-- Subtitle --}}
<div class="form-group">
    {{ Form::label('subtitle', 'Subtitle') }}
    {{ Form::text('subtitle', null, ['class' => 'form-control']) }}
</div>

{{-- Left List (repeater) --}}
<div class="form-group">
    <label>Left List Items</label>
    <div id="left-list-container">
        @if(isset($information) && is_array($information->left_list))
            @foreach($information->left_list as $item)
                <div class="input-group mb-2">
                    <input type="text" name="left_list[]" class="form-control" value="{{ $item }}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-item">×</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="input-group mb-2">
                <input type="text" name="left_list[]" class="form-control" placeholder="Enter item">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-item">×</button>
                </div>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-sm btn-secondary" id="add-left-item">+ Add Item</button>
</div>

{{-- Right List (repeater) --}}
<div class="form-group">
    <label>Right List Items</label>
    <div id="right-list-container">
        @if(isset($information) && is_array($information->right_list))
            @foreach($information->right_list as $item)
                <div class="input-group mb-2">
                    <input type="text" name="right_list[]" class="form-control" value="{{ $item }}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-item">×</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="input-group mb-2">
                <input type="text" name="right_list[]" class="form-control" placeholder="Enter item">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-item">×</button>
                </div>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-sm btn-secondary" id="add-right-item">+ Add Item</button>
</div>

{{-- Images (multiple upload with preview) --}}
<div class="form-group">
    <label>Images</label>
    <input type="file" name="images[]" multiple class="form-control-file" accept="image/*">
    @if(isset($information) && is_array($information->images))
        <div class="mt-2">
            <strong>Current Images:</strong>
            <div class="row">
                @foreach($information->images as $image)
                    <div class="col-3 mb-2">
                        <img src="{{ asset($image) }}" class="img-thumbnail" style="max-height:100px">
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <small class="form-text text-muted">You can select multiple images. New uploads will replace existing ones.</small>
</div>

{{-- Submit --}}
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>

@push('scripts')
<script>
    // Repeater logic for left and right lists
    function setupRepeater(containerId, addButtonId) {
        const container = document.getElementById(containerId);
        document.getElementById(addButtonId).addEventListener('click', function() {
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="${containerId === 'left-list-container' ? 'left_list[]' : 'right_list[]'}" class="form-control" placeholder="Enter item">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-item">×</button>
                </div>
            `;
            container.appendChild(div);
        });

        // Remove item
        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('.input-group').remove();
            }
        });
    }

    setupRepeater('left-list-container', 'add-left-item');
    setupRepeater('right-list-container', 'add-right-item');
</script>
@endpush