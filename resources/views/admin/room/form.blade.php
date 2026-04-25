<div class="form-group">
    {{ Form::label('title', 'Room Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Short Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control summernote', 'id' => 'summernote', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('detailed_description', 'Detailed Description') }}
    {{ Form::textarea('detailed_description', null, ['class' => 'form-control summernote', 'id' => 'summernote2']) }}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('price', 'Price per Night ($)') }}
            {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'required']) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('size', 'Room Size (e.g., 650 sqft)') }}
            {{ Form::text('size', null, ['class' => 'form-control']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('room_size', 'Room Type') }}
            {{ Form::select(
                'room_size',
                [
                    'single' => 'Single Room',
                    'double' => 'Double Room',
                ],
                null,
                ['class' => 'form-control', 'placeholder' => 'Select Room Type'],
            ) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('bed_type', 'Bed Type') }}
            {{ Form::text('bed_type', null, ['class' => 'form-control', 'placeholder' => 'e.g., 1 King Bed, 2 Queen Beds', 'required']) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('guests', 'Number of Guests') }}
            {{ Form::number('guests', null, ['class' => 'form-control', 'min' => '1', 'required']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('badge', 'Badge (Optional)') }}
            {{ Form::select('badge', ['Popular' => 'Popular', 'New' => 'New', 'Best Value' => 'Best Value', null => 'None'], null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('is_active', 'Status') }}
            {{ Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<!-- Room Images Section -->
<div class="form-group">
    <h4>Room Images</h4>
    <p class="text-muted">Upload at least one image for the room. First image will be featured.</p>
    {{ Form::file('images[]', ['class' => 'form-control', 'multiple' => true, isset($room) ? '' : 'required']) }}

    @if (isset($room) && $room->images->isNotEmpty())
        <div class="mt-3">
            <h5>Current Images:</h5>
            <div class="row">
                @foreach ($room->images as $image)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('uploads/' . $image->image) }}" class="card-img-top"
                                alt="{{ $room->title }}" height="150">
                            <div class="card-body p-2">
                                @if ($image->is_featured)
                                    <span class="badge badge-primary">Featured</span>
                                @endif
                                <a href="{{ route('room.delete-image', $image->id) }}"
                                    class="btn btn-sm btn-danger mt-2"
                                    onclick="return confirm('Delete this image?');">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Amenities Section -->
<div class="form-group">
    <h4>Room Amenities</h4>
    <p class="text-muted">Add amenities with custom icons and titles.</p>

    <div id="amenities-container">

        @if (isset($room) && $room->amenities->isNotEmpty())
            @foreach ($room->amenities as $amenity)
                <div class="amenity-row row mb-2">
                    <div class="col-md-4">
                        <input type="text" name="amenity_icon[]" class="form-control" value="{{ $amenity->icon }}"
                            placeholder='e.g., &lt;i class="fas fa-tv"&gt;&lt;/i&gt;'>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="amenity_title[]" class="form-control" value="{{ $amenity->title }}"
                            placeholder="e.g., 55&quot; Smart TV">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-amenity">Remove</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="amenity-row row mb-2">
                <div class="col-md-4">
                    <input type="text" name="amenity_icon[]" class="form-control"
                        placeholder='e.g., &lt;i class="fas fa-tv"&gt;&lt;/i&gt;'>
                </div>
                <div class="col-md-6">
                    <input type="text" name="amenity_title[]" class="form-control"
                        placeholder="e.g., 55&quot; Smart TV">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-amenity">Remove</button>
                </div>
            </div>
        @endif

    </div>

    <button type="button" id="add-amenity" class="btn btn-info btn-sm mt-2">+ Add Amenity</button>
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save Room</button>
    <a href="{{ route('room.index') }}" class="btn btn-secondary">Cancel</a>
</div>

<div>
    <h4>Default Amenities</h4>
    <ul>
        <li>&lt;i class="fas fa-wifi"&gt;&lt;/i&gt; High-Speed Wi-Fi</li>
        <li>&lt;i class="fas fa-tv"&gt;&lt;/i&gt; 55" Smart TV</li>
        <li>&lt;i class="fas fa-coffee"&gt;&lt;/i&gt; Nespresso Coffee Machine</li>
        <li>&lt;i class="fas fa-snowflake"&gt;&lt;/i&gt; Air Conditioning</li>
        <li>&lt;i class="fas fa-glass-martini-alt"&gt;&lt;/i&gt; Mini Bar</li>
        <li>&lt;i class="fas fa-hot-tub"&gt;&lt;/i&gt; Soaking Tub</li>
        <li>&lt;i class="fas fa-umbrella-beach"&gt;&lt;/i&gt; Private Balcony</li>
        <li>&lt;i class="fas fa-spa"&gt;&lt;/i&gt; Premium Toiletries</li>
    </ul>
</div>

<script>
    document.getElementById('add-amenity').addEventListener('click', function() {
        const container = document.getElementById('amenities-container');

        const row = document.createElement('div');
        row.className = 'amenity-row row mb-2';

        row.innerHTML = `
        <div class="col-md-4">
            <input type="text" name="amenity_icon[]" class="form-control"
                placeholder='e.g., &lt;i class="fas fa-tv"&gt;&lt;/i&gt;'>
        </div>
        <div class="col-md-6">
            <input type="text" name="amenity_title[]" class="form-control"
                placeholder="e.g., 55&quot; Smart TV">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-sm remove-amenity">Remove</button>
        </div>
    `;

        container.appendChild(row);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-amenity')) {
            e.target.closest('.amenity-row').remove();
        }
    });
</script>
