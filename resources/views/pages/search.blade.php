@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

<h3 class="panel-body">Carrier Items</h3>
	@foreach ($carriersInfo as $carrierInfo)
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
                            </div>
                        </div>
                    </div>
	@endforeach
    </div>

    <div class="row">
<h3 class="panel-body">Goods Items</h3>
	@foreach ($goodsInfo as $cargoInfo)
<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4 class="pull-right">{{ $cargoInfo->route }}</h4>
                                <h4><a href="/goods/{{ $cargoInfo->id }}">{{ $cargoInfo->name }}</a>
                                </h4>
                                <p>{{ $cargoInfo->description }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p> 
                                <p>{{ date('m-d-Y', strtotime($cargoInfo->date)) }}
                                </p>
                                <p>{{ date('h:m', strtotime($cargoInfo->time)) }}
                                </p>
                            </div>
                        </div>
                    </div>
	@endforeach
    </div>
</div>
@endsection
