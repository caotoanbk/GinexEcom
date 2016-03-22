@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="panel-body">Thông tin của bạn</h3>
            <div>
                <div class='panel-body'>Bạn có {{ Auth::user()->carrierInfos->count() }} thông tin</div>
                @foreach (Auth::user()->carrierInfos as $carrierInfo)
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4 class="pull-right">{{ number_format($carrierInfo->price) }}VND</h4>
                            <h4><a href="/carriers/{{ $carrierInfo->id }}">{{ $carrierInfo->route }}</a>
                                </h4>
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" id='{{ $carrierInfo->id }}'>Sua</button>
							<a href='#' class='btn btn-danger btn-xs'>Xoa</a>
                        </div>
                        <div class="ratings">
							<div class='pull-right'>{{ $carrierInfo->lxe }}</div>
							 <div>Loai xe:</div> 
							<div class='pull-right'>{{ $carrierInfo->slxe }}</div>
							 <div>So luong xe:</div> 
							<div class='pull-right'>{{ $carrierInfo->htdgoi }}</div>
							 <div>Hinh thuc dong goi:</div> 
							<div class='pull-right'>{{ date_format(date_create($carrierInfo->tgnhang), 'H:i d/m/y') }}</div>
							 <div>Thoi gian nhan hang:</div> 
							<div class='pull-right'>{{ $carrierInfo->description }}</div>
							 <div>Yeu cau khac:</div> 
							
							<div class='pull-right'><span class='badge'>5</badge></span></div>
							<div>So luot yeu cau:</div>

                            @if(!$carrierInfo->valid)
                            <p class='text-danger'><small><i>Thông tin không hợp lệ.</i></small></p>
                            @else @if(!$carrierInfo->checked)
                            <p class='text-warning'><small><i>?? Thông tin chưa được duyệt.</i></small></p>
                            @else
                            <p class='text-success'><small><i>Thông tin của bạn đã được duyệt.</i></small></p>
                            @endif @endif
							<a href='#' class='btn btn-primary btn-sm'>Tim hang</a>
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

<!-- Modal edit -->
@include('partials.modal_carrier',['title' =>'Thay doi thong tin van tai'] )



</div>
@endsection
