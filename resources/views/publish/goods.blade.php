
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading text-center">Dang thong tin hang hoa</h3>
                <div class="panel-body">

						{!! Form::open(array('url' => '/publishGoodsInfo', 'class' => 'form-horizontal', 'id' => 'goods_form', 'method' => 'post')) !!}
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
<script>
$(function(){


    //date time picker
    $('#time_gh').datetimepicker({
        locale: 'vi_VN'    

	});
    $('#time_nh').datetimepicker({
        locale: 'vi_VN'    

	});
    $('#time_hdk').datetimepicker({
        locale: 'vi_VN'    

	});

	//jquery validation
	$('#goods-form').validate({
		rules: {
			name: {
				required: true,
			},
			route: {
				required: true,
			},
			sluong: {
				required: true,
			},
			tgghang: {
				required: true,
			},
			tgnhang: {
				required: true,
			},
			nhhdki: {
				required: true,
			}
		},
		messages: {
			name: {
				required: 'Ban chua nhap ten hang hoa',
			},
			route: {
				required: 'Ban chua nhap tuyen duong',
			},
			sluong: {
				required: 'Ban chua nhap so luong hang',
			},
			tgghang: {
				required: 'Ban chua nhap thoi gian giao hang',
			},
			tgnhang: {
				required: 'Ban chua nhap thoi gian nhan hang',
			},
			nhhdki: {
				required: 'Ban chua nhap thoi gian het han dang ki',
			}

		}	
	});
});
</script>
@endpush
