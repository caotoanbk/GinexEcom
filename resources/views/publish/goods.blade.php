
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading text-center">Dang thong tin hang hoa</h3>
                <div class="panel-body">

						{!! Form::open(array('url' => '/publishGoodsInfo', 'class' => 'form-horizontal', 'id' => 'goods-form', 'method' => 'post')) !!}
							@include('partials.goods_form', ['submit' => 'Dang'])
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
