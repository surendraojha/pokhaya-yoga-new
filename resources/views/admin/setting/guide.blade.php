<form enctype="multipart/form-data" method="POST" action="{{ route('update.guide') }}">
	@csrf



    <div class="row">





        {{-- instructor guide --}}


    	<div class="col-md-6">
	    	<label for="">{{ __('Instructor Guide') }}: </label>
			<li class="tg-list-item">

                <textarea name="instructor_guide" class="form-control" id="" cols="30" rows="10">{{ $gsetting->instructor_guide }}</textarea>

	        </li>
	        <div>
			</div>
        </div>


        {{-- student guide --}}



    	<div class="col-md-6">
	    	<label for="">{{ __('Student Guide') }}: </label>
			<li class="tg-list-item">

                <textarea name="student_guide" class="form-control" id="" cols="30" rows="10">{{ $gsetting->student_guide }}</textarea>

	        </li>
	        <div>
			</div>
        </div>
    </div>


	<br>
	<br>

	<div class="box-footer">
		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}</button>
	</div>

</form>
