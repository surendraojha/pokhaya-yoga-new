@extends('layouts.admin')
@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title pr-5 btn bg-secondary">Referral Setting</h2>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                {{ Form::model($information, ['method' => 'post', 'route' => ['referral.setting']]) }}
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('comission_type', 'Commussion Type') }}


                                {{ Form::select('comission_type',
                                [
                                    'percentage'=>'percentage',
                                    'amount'=>'amount'
                                ]
                                ,null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('comission_amount', 'Commission') }}
                                {{ Form::text('comission_amount', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        {{-- discount --}}

                        <div class="col-sm-6">

                            <div class="form-group">
                                {{ Form::label('discount_type', 'Discount Type') }}
                                {{ Form::select('discount_type',
                                [
                                    'percentage'=>'percentage',
                                    'amount'=>'amount'
                                ]
                                ,null, ['class' => 'form-control']) }}
                            </div>


                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('discount_amount', 'Discount') }}
                                {{ Form::text('discount_amount', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                    </div>
                    {{-- row --}}


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="saveBtn">Save</button>
                </div>
                {{ Form::close() }}

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</section>

@endsection
