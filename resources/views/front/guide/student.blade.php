@extends('theme.master')
@section('title', "Student's Guide")
@section('content')
@include('admin.message')
  <!-- main wrapper -->
  <section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white">Student's Guide</h1>
    </div>
  </section>
  <section id="policy-block" class="privacy-policy-block">
    <div class="container">
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-12">

                <div class="info">{!! $information->student_guide !!}</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection
