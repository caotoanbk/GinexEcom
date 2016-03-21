@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if(Auth::user()->type=='carrier')
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
                            <p>{{ $carrierInfo->description }}</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right"> {{ date_format(date_create($carrierInfo->tgnhang), 'H:i d/m/y') }} </p>
							 <div>Thoi gian nhan hang</div> 

                            @if(!$carrierInfo->valid)
                            <p class='text-danger'><small><i>Thông tin không hợp lệ.</i></small></p>
                            @else @if(!$carrierInfo->checked)
                            <p class='text-warning'><small><i>?? Thông tin chưa được duyệt.</i></small></p>
                            @else
                            <p class='text-success'><small><i>Thông tin của bạn đã được duyệt.</i></small></p>
                            @endif @endif
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
        @endif 
</div>
</div>
@endsection
