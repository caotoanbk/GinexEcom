
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading panel-primary text-center">Cap nhat thong tin van tai</h3>
                <div class="panel-body">
						{!! Form::model($carrierInfo,array('url' => array('/update-carrier', $carrierInfo->id), 'class' => 'form-horizontal', 'method' => 'post', 'id' => 'carry-form')) !!}
							@include('partials.carrier_form',['submitText' => 'Cap nhat'])
						{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop



@push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src='/js/app/carry_form.js'> </script>
@endpush
