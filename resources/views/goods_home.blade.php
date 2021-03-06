@extends('layouts.app')

@section('content')
<div class='container'>
<div class='row'>
        <div class="col-md-12">
            <h3 class="panel-body">Thông tin của bạn</h3>
			<div class='tabs'>
				<ul class='nav nav-tabs'>
					<li class='active'><a data-toggle="tab" href="#published-info">Thong tin da dang</a></li>
					<li><a data-toggle='tab' href="#required-info">Thong tin yeu cau</a></li>
				</ul>
				<div class='tab-content'>
						<div class='tab-pane fade in active' id="published-info">
							<div class='panel-body'><em>Bạn có {{ Auth::user()->goodsInfos->count() }} thông tin</em></div>
							@foreach (Auth::user()->goodsInfos as $goodsInfo)
							<div class="col-sm-4 col-lg-4 col-md-4">
								<div class="thumbnail">
									<div class="caption">
										<h4 class="pull-right">{{ $goodsInfo->route }}</h4>
										<h4><a href="/goods/{{ $goodsInfo->id }}">{{ $goodsInfo->name }}</a>
											</h4>
										@if($goodsInfo->valid && $goodsInfo->checked)<a href='/van-tai/{{ $goodsInfo->id }}' class='btn btn-primary btn-xs'>Tim nha van tai</a>@endif
										<a href='/goods/{{ $goodsInfo->id }}' type="button" class="btn btn-primary btn-xs" >Sua</a>
										<a href='/delete-goods/{{ $goodsInfo->id }}' class='btn btn-danger btn-xs' id='xoa'>Xoa</a>
									</div>
									<div class="ratings">

										<div class="pull-right">{{ $goodsInfo->htdgoi }}</div>
										 <div>Hinh thuc dong goi:</div> 

										<div class="pull-right">{{ $goodsInfo->sluong }}</div>
										 <div>So luong:</div> 

										<div class="pull-right">{{ $goodsInfo->tgghang }}</div>
										 <div>Thoi gian giao hang:</div> 
										<div class="pull-right" >{{ $goodsInfo->tgnhang }}</div>
										 <div>Thoi gian nhan hang:</div> 
										<div class="pull-right"> {{ $goodsInfo->nhhdki }}</div>
										 <div>Han dang ki:</div> 
										
										<div class='pull-right'> {{ $goodsInfo->description }}</div>
										<div>Yeu cau khac:</div>
										@if(!$goodsInfo->valid)
										<div>&nbsp;</div>
										<p class='text-danger'><small><i>Thông tin không hợp lệ</i></small></p>
										@else @if(!$goodsInfo->checked)
										<div>&nbsp;</div>
										<p class='text-warning'><small><i>(?? Thông tin chưa được duyệt)</i></small></p>
										@else
										<div class='pull-right'><span class='badge'>{{ $goodsInfo->chaoGia()->count() }}</span>&nbsp;@if($goodsInfo->chaoGia()->count())<a href='#' id='{{ $goodsInfo->id }}' data-target='#modalPrice' data-toggle='modal' class='btn btn-success btn-xs'>>>Chi tiet</a>@endif</div>
										<div>So luot chao gia:</div>
										<p class='text-success'><small><i>(Thông tin của bạn đã được duyệt)</i></small></p>
										@endif
										 @endif
									</div>
								</div>
							</div>
							@endforeach
						</div>	
					<div class='tab-pane fade' id = 'required-info'>


						<div class='panel-body'><em>Bạn có {{ Auth::user()->carrierReq()->count() }} thông tin</em></div>
						@foreach (Auth::user()->carrierReq as $goodsInfo)
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<div class="caption">
									<h4 class="pull-right">{{ $goodsInfo->route }}</h4>
									<h4><a href="/goods/{{ $goodsInfo->id }}">{{ $goodsInfo->name }}</a> </h4>
									<a href='#' class='btn btn-success btn-xs'>Chi tiet</a>
									<a href='/goods/{{ $goodsInfo->id }}'  class="btn btn-primary btn-xs" >Sua</a>
									<a href='/delete-goods/{{ $goodsInfo->id }}' class='btn btn-danger btn-xs' id='xoa'>Xoa</a>
								</div>
								<div class="ratings">

										<div class="pull-right">{{ $goodsInfo->htdgoi }}</div>
										 <div>Hinh thuc dong goi:</div> 

										<div class="pull-right">{{ $goodsInfo->sluong }}</div>
										 <div>So luong:</div> 

										<div class="pull-right">{{ $goodsInfo->tgghang }}</div>
										 <div>Thoi gian giao hang:</div> 
										<div class="pull-right" >{{ $goodsInfo->tgnhang }}</div>
										 <div>Thoi gian nhan hang:</div> 
										<div class="pull-right" ><em>{{ number_format( $goodsInfo->price ) }} <small>VND</small></em></div>
										 <div>Muc gia dua ra:</div> 
										<div class='pull-right'> {{ $goodsInfo->description }}</div>
										<div>Yeu cau khac:</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>	
				</div>

			</div>
        </div>
    </div>








    <div class='row'>
        <div class="col-md-12">
            <div class="panel-body">
                <a href='/publishGoodsInfo' class="btn btn-primary" >Đăng thông tin hàng hóa</a>
            </div>
        </div>
	</div>







	<div class='row'>
<!-- Button trigger modal -->

<!-- Modal chao gia -->
<div class="modal fade" id="modalPrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
				<section class='panel panel-primary'>
					<div class='panel-heading text-center'>
						<b>Cac muc gia dua ra</b>
					</div>
					<div class='panel-body'>
						<div class='container-fluid'>
						<div class='table-responsive pagniation-center'>
						<table id='price-table' class='table table-bordered table-striped table-hover'>
							<thead>
								<tr>
									<th>Ten nguoi dung</th>
									<th>Muc gia</th>
									<th>Ngay chao gia</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
						</table>
					</div>
					</div>
					</div>
				</section>
      </div>
	  <div class='modal-footer'>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
    </div>
  </div>
</div>
	</div>
 </div>

@endsection


@push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type='text/javascript' src='/js/app/goods_home.js'> </script>
@endpush
