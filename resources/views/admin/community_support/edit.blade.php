@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Edit Community Support</li>
            </ul>

            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="panel-title"></div>

                        {{ Form::model($information, [
                            'method' => 'patch',
                            'route' => ['community_support.update', $information->id],
                            'files' => true
                        ]) }}

                        @include('admin.community_support.form')

                        {{ Form::close() }}

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('click', function(e) {

        // Add stat
        if (e.target.id === 'add-stat') {
            let wrapper = document.getElementById('stats-wrapper');

            let div = document.createElement('div');
            div.classList.add('form-group', 'stat-item');

            div.innerHTML = `
            <div style="display:flex; gap:10px;">
                <input type="text" name="stats[]" class="form-control" placeholder="Enter stat">
                <button type="button" class="btn btn-danger remove-stat">X</button>
            </div>
        `;

            wrapper.appendChild(div);
        }

        // Remove stat
        if (e.target.classList.contains('remove-stat')) {
            e.target.closest('.stat-item').remove();
        }

    });
</script>
@endsection