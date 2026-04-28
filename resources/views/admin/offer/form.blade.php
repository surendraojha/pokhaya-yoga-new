<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('hero_title', 'Hero Section Title') }}
    {{ Form::text('hero_title', null, ['class' => 'form-control', 'placeholder' => 'Optional title shown only in hero section']) }}
    <small class="help-block">If empty, regular title will be used in hero section.</small>
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
    {{ Form::label('hero_description', 'Hero Description') }}
    {{ Form::textarea('hero_description', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Short description for hero section']) }}
    <small class="help-block">This appears in the hero section of the offer detail page (different from main content)</small>
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
    {{ Form::number('discount', null, ['class' => 'form-control', 'min' => '0', 'max' => '100']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    @if($information->image && file_exists(public_path('uploads/offers/' . $information->image)))
        <div style="margin-bottom: 10px;">
            <img src="{{ asset('uploads/offers/' . $information->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px; border-radius: 4px;">
            <p style="margin-top: 5px; font-size: 12px; color: #666;">Current Image</p>
        </div>
    @endif
    {{ Form::file('image', ['class' => 'form-control']) }}
    <small class="help-block">Upload offer image (jpg, png, jpeg, webp)</small>
</div>

<div class="form-group">
    {{ Form::label('end_date', 'End Date') }}
    {{ Form::date('end_date', $information->end_date?->format('Y-m-d'), ['class' => 'form-control']) }}
    <small class="help-block">Offer expiry date (optional)</small>
</div>

{{-- Hero Stats Section --}}
<div class="form-group">
    <label><strong>Hero Stats</strong></label>
    <small class="help-block">Add hero stat cards using big text and small label text</small>
    <div id="hero-stats-container">
        @php $heroStats = old('hero_stats', is_string($information->hero_stats ?? null) ? json_decode($information->hero_stats, true) : ($information->hero_stats ?? [])) @endphp
        @if(is_array($heroStats) && count($heroStats) > 0)
            @foreach($heroStats as $index => $stat)
                <div class="hero-stat-row" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" name="hero_stats[{{ $index }}][big_text]" class="form-control" placeholder="Big text (e.g. 25% or NPR 5,000)" value="{{ $stat['big_text'] ?? '' }}">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="hero_stats[{{ $index }}][small_text]" class="form-control" placeholder="Small text (e.g. Discount)" value="{{ $stat['small_text'] ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-hero-stat">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" class="btn btn-primary btn-sm" id="add-hero-stat" style="margin-top: 10px;">+ Add Hero Stat</button>
</div>

{{-- Features List Section --}}
<div class="form-group">
    <label><strong>Features List</strong></label>
    <small class="help-block">Add features/benefits (shown with checkmarks)</small>
    <div id="features-container">
        @php $features = old('features_list', is_string($information->features_list ?? null) ? json_decode($information->features_list, true) : ($information->features_list ?? [])) @endphp
        @if(is_array($features) && count($features) > 0)
            @foreach($features as $index => $feature)
                <div class="feature-row" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 4px; display: flex; gap: 10px; align-items: flex-start;">
                    <input type="text" name="features_list[{{ $index }}][text]" class="form-control" placeholder="Feature description" value="{{ $feature['text'] ?? '' }}" style="flex: 1;">
                    <button type="button" class="btn btn-danger btn-sm remove-feature" style="white-space: nowrap;">Remove</button>
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" class="btn btn-primary btn-sm" id="add-feature" style="margin-top: 10px;">+ Add Feature</button>
</div>

{{-- Learn Items Section --}}
<div class="form-group">
    <label><strong>Learn Items / What's Included</strong></label>
    <small class="help-block">Add learning objectives (displayed as cards)</small>
    <div id="learn-items-container">
        @php $learnItems = old('learn_items', is_string($information->learn_items ?? null) ? json_decode($information->learn_items, true) : ($information->learn_items ?? [])) @endphp
        @if(is_array($learnItems) && count($learnItems) > 0)
            @foreach($learnItems as $index => $item)
                <div class="learn-item-row" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="learn_items[{{ $index }}][icon]" class="form-control" placeholder="Icon class (fas fa-...)" value="{{ $item['icon'] ?? 'fas fa-star' }}">
                            <small>Font Awesome class</small>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="learn_items[{{ $index }}][title]" class="form-control" placeholder="Item title" value="{{ $item['title'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <textarea name="learn_items[{{ $index }}][description]" class="form-control" rows="2" placeholder="Item description">{{ $item['description'] ?? '' }}</textarea>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-sm remove-learn-item" style="height: 34px; margin-left: 5px;">Remove</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" class="btn btn-primary btn-sm" id="add-learn-item" style="margin-top: 10px;">+ Add Learn Item</button>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let featureCount = document.querySelectorAll('.feature-row').length;
    let learnCount = document.querySelectorAll('.learn-item-row').length;
    let heroStatCount = document.querySelectorAll('.hero-stat-row').length;
    const featuresContainer = document.getElementById('features-container');
    const learnItemsContainer = document.getElementById('learn-items-container');
    const heroStatsContainer = document.getElementById('hero-stats-container');

    // Add Feature
    document.getElementById('add-feature')?.addEventListener('click', function() {
        const html = `
            <div class="feature-row" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 4px; display: flex; gap: 10px; align-items: flex-start;">
                <input type="text" name="features_list[${featureCount}][text]" class="form-control" placeholder="Feature description" style="flex: 1;">
                <button type="button" class="btn btn-danger btn-sm remove-feature" style="white-space: nowrap;">Remove</button>
            </div>
        `;
        featuresContainer?.insertAdjacentHTML('beforeend', html);
        featureCount++;
    });

    // Add Learn Item
    document.getElementById('add-learn-item')?.addEventListener('click', function() {
        const html = `
            <div class="learn-item-row" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" name="learn_items[${learnCount}][icon]" class="form-control" placeholder="Icon class (fas fa-...)" value="fas fa-star">
                        <small>Font Awesome class</small>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="learn_items[${learnCount}][title]" class="form-control" placeholder="Item title">
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <textarea name="learn_items[${learnCount}][description]" class="form-control" rows="2" placeholder="Item description"></textarea>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-sm remove-learn-item" style="height: 34px; margin-left: 5px;">Remove</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        `;
        learnItemsContainer?.insertAdjacentHTML('beforeend', html);
        learnCount++;
    });

    document.getElementById('add-hero-stat')?.addEventListener('click', function() {
        const html = `
            <div class="hero-stat-row" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="hero_stats[${heroStatCount}][big_text]" class="form-control" placeholder="Big text (e.g. 25% or NPR 5,000)">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="hero_stats[${heroStatCount}][small_text]" class="form-control" placeholder="Small text (e.g. Discount)">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-hero-stat">Remove</button>
                    </div>
                </div>
            </div>
        `;
        heroStatsContainer?.insertAdjacentHTML('beforeend', html);
        heroStatCount++;
    });

    featuresContainer?.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-feature')) {
            event.target.closest('.feature-row')?.remove();
        }
    });

    learnItemsContainer?.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-learn-item')) {
            event.target.closest('.learn-item-row')?.remove();
        }
    });

    heroStatsContainer?.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-hero-stat')) {
            event.target.closest('.hero-stat-row')?.remove();
        }
    });
});
</script>
