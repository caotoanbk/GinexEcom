@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading panel-primary text-center">Cap nhat thong tin hang hoa</h3>
                <div class="panel-body">
						{!! Form::model($goodsInfo, array('url' => array('/update-goods/', $goodsInfo->id), 'class' => 'form-horizontal', 'method' => 'post', 'id' => 'goods-form')) !!}
							@include('partials.goods_form',['submit' => 'Cap nhat'])
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
<script src='/js/app/goods_form.js'></script>
@endpush
