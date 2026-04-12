<div class="form-group">

    {{ Form::label('customer_id', 'Customer Account') }}

    <select name='customer_id' class="form-control">
        <option value=''>Select Customer Account</option>
        @foreach ($customer_id as $res)
        <option value='{{$res->id}}'

            {{ old('customer_id',@$information->customer_id) == $res->id ? "selected" : "" }}


            > <strong>{{$res->name}} :</strong> {{ $res->email }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
{{-- <div class="form-group">
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
</div> --}}
<div class="form-group">
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone_number[main]', null, ['class' => 'form-control', 'id' => 'phone_number' ]) }}
</div>

<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, ['class' => 'form-control','id' => 'address']) }}
</div>

<div class="form-group">
    {!! Form::number('numberOfAttendants',null,['class'=>'form-control','required','placeholder'=>'Number of
    Attendants','id'=>'numberOfAttendants']) !!}
</div>
<div class="form-group">
    {!!
    Form::select('room_type',['private'=>'private','share'=>'share'],null,['class'=>'form-control','required','placeholder'=>'Select
    Rooms','id'=>'room_type']) !!}
</div>
<div class="form-group">
    <select name='package' id="package-id" class="form-control">
        <option value=''>Select package</option>
        @foreach ($results as $res)
        <option value='{{$res->id}}'

            {{ old('package',@$information->package_id) == $res->id ? "selected" : "" }}

            > Private: {{$res->private_room}} ,Share: {{$res->share_room}},From Date:
            {{$res->from}},To Date: {{$res->to}}</option>
        @endforeach
    </select>
</div>







<div class="form-group">
    {{ Form::label('actual_price', 'Actual Price') }}
    {{ Form::text('actual_price', null, ['class' => 'form-control','id' => 'actual_price']) }}
</div>

<div class="form-group">
    {{ Form::label('amount_to_be_paid', 'Amount To Pay') }}
    {{ Form::text('amount_to_be_paid', null, ['class' => 'form-control','id' => 'amount_to_be_paid']) }}
</div>




<div>
    <input type="hidden" id="set-prices" value="{{url('admin/set-prices')}}">
    {{-- <input type="text" name="actual_price" id="amount-ids"> --}}
</div>



<div class="form-group">
    <input type="submit" value="save" class="btn btn-info">

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>



<script>
    var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
  separateDialCode: true,
  preferredCountries:["in"],
  hiddenInput: "full",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    $("form").submit(function() {
    var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
    $("input[name='phone_number[full]'").val(full_number);
    // alert(full_number)

    });
</script>
