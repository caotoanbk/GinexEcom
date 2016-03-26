@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
		<div class='col-md-12'>
			@if(Session::has('flash_message'))
				
<div class="alert alert-success"><button type='button' class='close' data-dismiss='alert' aria-hidden=true>&times;</button>{{ session('flash_message') }}</div>
			@endif
		</div>
        <div class="col-md-12">
            @if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif<h3 class="panel-body">Thông tin của bạn</h3>
            <div>
                <div class='panel-body'>Bạn có {{ Auth::user()->carrierInfos->count() }} thông tin</div>
                @foreach (Auth::user()->carrierInfos as $carrierInfo)
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4 class="pull-right">{{ number_format($carrierInfo->price) }}VND</h4>
                            <h4><a href="/carriers/{{ $carrierInfo->id }}">{{ $carrierInfo->route }}</a>
                                </h4>
							<a href='/carriers/{{ $carrierInfo->id }}' class="btn btn-primary btn-xs">Sửa</a>
							<a href='/delete-carrier/{{ $carrierInfo->id }}' id='xoa' class='btn btn-danger btn-xs'>Xóa</a>
                        </div>
                        <div class="ratings">
							<div class='pull-right'>{{ $carrierInfo->lxe }}</div>
							 <div>Loại xe:</div> 
							<div class='pull-right'>{{ $carrierInfo->slxe }}</div>
							 <div>Số lượng xe:</div> 
							<div class='pull-right'>{{ $carrierInfo->htdgoi }}</div>
							 <div>Hình thức đóng gói:</div> 
							<div class='pull-right'>{{ date_format(date_create($carrierInfo->tgnhang), 'H:i d/m/y') }}</div>
							 <div>Thời gian nhận hàng:</div> 
							<div class='pull-right'>{{ $carrierInfo->description }}</div>
							 <div>Yêu cầu khác:</div> 
							
							<div class='pull-right'><span class='badge'>{{ $carrierInfo->carrierReq()->count() }}</badge></span></div>
							<div>Số lượt yêu cầu:</div>

                            @if(!$carrierInfo->valid)
                            <p class='text-danger'><small><i>Thông tin không hợp lệ.</i></small></p>
                            @else @if(!$carrierInfo->checked)
                            <p class='text-warning'><small><i>?? Thông tin chưa được duyệt.</i></small></p>
                            @else
                            <p class='text-success'><small><i>Thông tin của bạn đã được duyệt.</i></small></p>
                            @endif @endif
							<a href='/hang-hoa/{{ $carrierInfo->id }}' class='btn btn-primary btn-sm'>Tìm hàng</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class='row'>
        <div class="col-md-12">
            <div class="panel-body">
                <a href="/publishCarryInfo" class='btn btn-primary'>Đăng thông tin vận tải</a>
            </div>
        </div>
	</div>




</div>
@endsection

@push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type='text/javascript' src='/js/app/carrier_home.js'></script>
@endpush
