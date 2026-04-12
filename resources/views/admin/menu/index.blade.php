@extends('layouts.admin')

@section('content')
<section class="content-header">
      <div class="container-fluid">
    {!! Menu::render() !!}
</div>
</section>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush

