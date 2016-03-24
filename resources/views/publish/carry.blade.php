@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Carry Infomation</div>
                <div class="panel-body">
				{!! Form::open(array('url' => '/publishCarryInfo', 'class' => 'form-horizontal', 'id' => 'carry-form', 'method' => 'post')) !!}
					@include('partials.carrier_form', ['submitText' => 'Dang thong tin hang hoa'])
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
