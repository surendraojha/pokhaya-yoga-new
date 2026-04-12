@auth
<div class="modal fade" id="myModalCourse" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">{{ __('frontstaticword.Report') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="box box-primary">
                <div class="panel panel-sum">
                    <div class="modal-body">

                        <form id="demo-form2" method="post"
                            action="{{ route('course.report', $course->id) }}"
                            data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            for="title">{{ __('frontstaticword.Title') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title"
                                            id="title" placeholder="Please Enter Title"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            for="email">{{ __('frontstaticword.Email') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="email" class="form-control"
                                            name="email" id="title"
                                            placeholder="Please Enter Email"
                                            value="{{ Auth::user()->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label
                                            for="detail">{{ __('frontstaticword.Detail') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea name="detail" rows="4"
                                            class="form-control" placeholder="Enter Detail"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="box-footer">
                                <button type="submit"
                                    class="btn btn-lg col-md-3 btn-primary">{{ __('frontstaticword.Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
