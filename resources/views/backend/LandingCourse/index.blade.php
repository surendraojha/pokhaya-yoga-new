{{-- @extends('layouts.main') --}}
{{-- @section('content') --}}

 {{ Form::open(['route'=>['landing-course.update'],'method'=>'POST','files'=>true]) }}
<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Title
                            </span>
                        </div>
                        <input type="text" class="form-control" name="title"
                            value="{{old('title',$information->title)}}" placeholder="Course Title" >


                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Content</span>
                        </div>
                        <textarea name="content" class="form-control ckeditor" id=""
                            placeholder="Write your Content" cols="30" rows="10">{{old('content',$information->content)}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Certification Content</span>
                        </div>
                        <textarea name="certification_content" class="form-control ckeditor" id=""
                            placeholder="Write your Content" cols="30" rows="10">{{old('certification_content',$information->certification_content)}}</textarea>
                    </div>
                </div>
            </div>
        {{-- banner image --}}
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img height="35px" width="35px"
                    src="{{ asset('uploads/'.$information->banner_image) }}" alt="no photo">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Banner Image</span>
                        </div>
                        <input type="file" name="banner_image">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{--course photo-1 --}}

            <div class="col-lg-6 col-md-6 col-sm-12">
                <img height="35px" width="35px"
                    src="{{ asset('uploads/'.$information->photo_1) }}" alt="no photo">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Course Photo_1</span>
                        </div>
                        <input type="file" name="photo_1">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{--course photo-2 --}}

            <div class="col-lg-6 col-md-6 col-sm-12">
                <img height="35px" width="35px"
                    src="{{ asset('uploads/'.$information->photo_2) }}" alt="no photo">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Course Photo_2</span>
                            </div>
                            <input type="file" name="photo_2">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
            </div>

                {{--Highlight Photo --}}

                <div class="col-lg-6 col-md-6 col-sm-12">
                <img height="35px" width="35px"
                    src="{{ asset('uploads/'.$information->highlight_photo) }}" alt="no photo">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Highlight Photo</span>
                            </div>
                            <input type="file" name="highlight_photo">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{--Outcome Photo --}}

                <div class="col-lg-6 col-md-6 col-sm-12">
                <img height="35px" width="35px"
                    src="{{ asset('uploads/'.$information->outcome_photo) }}" alt="no photo">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Otucome Photo</span>
                            </div>
                            <input type="file" name="outcome_photo">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Why Choose us photo --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <img height="35px" width="35px"
                        src="{{ asset('uploads/'.$information->why_choose_us_photo) }}" alt="no photo">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Why_choose_us Photo</span>
                                </div>
                                <input type="file" name="why_choose_us_photo">
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>


    <button type="submit">Update</button>
{{ Form::close() }}

{{--
@php
dd('here')
@endphp --}}
{{-- @endsection --}}



