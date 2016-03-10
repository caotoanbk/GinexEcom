@extends('layouts.app')

@section('content')
@if(Auth::user()->type=='carrier')
<div class="container">
    <div class="row">
        <div class="col-md-12">
				<h3 class="panel-body">My items</h3>
                <div>
				<div class='panel-body'>You have {{ Auth::user()->carrierInfos->count() }} items</div>
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
                                <p class="pull-right">12 reviews</p> 
                                <p>{{ date('d-m-Y', strtotime($carrierInfo->date)) }}
                                </p>

								@if(!$carrierInfo->valid)
								<p class='text-danger'><small><i>Thong tin khong hop le</i></small></p>
								@else
									
									@if(!$carrierInfo->checked)
									<p class='text-warning'><small><i>?? Thong tin chua duoc duyet</i></small></p>
									@else
									<p class='text-success'><small><i>Ok! Thong tin da duoc duyet</i></small></p>
									@endif
								@endif
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
                   <a href="/publishCarryInfo" class='btn btn-info'>Post Carrier Info</a> 
                </div>
		</div>
	</div>
</div>
@endif

@if(Auth::user()->type=='goods')


<div class="container">
    <div class="row">
        <div class="col-md-12">
				<h3 class="panel-body">My items</h3>
                <div ><div class='panel-body'>You have {{ Auth::user()->goodsInfos->count() }} items</div>
	@foreach (Auth::user()->goodsInfos as $goodsInfo)
<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4 class="pull-right">{{ $goodsInfo->route }}</h4>
                                <h4><a href="/carriers/{{ $goodsInfo->id }}">{{ $goodsInfo->name }}</a>
                                </h4>
                                <p>{{ $goodsInfo->description }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p> 
                                <p>{{ date('d-m-Y', strtotime($goodsInfo->date)) }}
                                </p>
								<p>{{ date('h:m', strtotime($goodsInfo->time)) }} </p>

								@if(!$goodsInfo->valid)
								<p class='text-danger'><small><i>Thong tin khong hop le</i></small></p>
								@else 
									@if(!$goodsInfo->checked)
									<p class='text-warning'><small><i>?? Thong tin chua duoc duyet</i></small></p>
									@else
									<p class='text-success'><small><i>Ok! Thong tin da duoc duyet</i></small></p>
									@endif
								@endif
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
                   <a href="/publishGoodsInfo" class='btn btn-info'>Post Goods Info</a> 
                </div>
		</div>
	</div>
</div>
@endif

@endsection
