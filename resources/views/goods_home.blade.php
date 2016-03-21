@extends('layouts.app')

@section('content')
<div class='container'>
<div class='row'>
        <div class="col-md-12">
            <h3 class="panel-body">Thông tin của bạn</h3>
            <div>
                <div class='panel-body'>Bạn có {{ Auth::user()->goodsInfos->count() }} thông tin</div>
                @foreach (Auth::user()->goodsInfos as $goodsInfo)
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4 class="pull-right">{{ $goodsInfo->route }}</h4>
                            <h4><a href="/goods/{{ $goodsInfo->id }}">{{ $goodsInfo->name }}</a>
                                </h4>
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" id='{{ $goodsInfo->id }}'>Sua</button>
							<a href='#' class='btn btn-danger btn-xs'>Xoa</a>
                        </div>
                        <div class="ratings">

                            <div class="pull-right">{{ $goodsInfo->htdgoi }}</div>
							 <div>Hinh thuc dong goi:</div> 

                            <div class="pull-right">{{ $goodsInfo->sluong }}</div>
							 <div>So luong:</div> 

                            <div class="pull-right"> {{ date_format(date_create($goodsInfo->tgghang), 'H:i d/m/y') }} </div>
							 <div>Thoi gian giao hang:</div> 
                            <div class="pull-right" style="{margin:0px}"> {{ date_format(date_create($goodsInfo->tgnhang), 'H:i d/m/y') }} </div>
							 <div>Thoi gian nhan hang:</div> 
                            <div class="pull-right"> {{ date_format(date_create($goodsInfo->nhhdki), 'H:i d/m/y') }} </div>
							
							 <div>Han dang ki:</div> 
							
							<div class='pull-right'> {{ $goodsInfo->description }}</div>
							<div>Yeu cau khac:</div>
                            @if(!$goodsInfo->valid)
                            <p class='text-danger'><small><i>Thông tin không hợp lệ</i></small></p>
                            @else @if(!$goodsInfo->checked)
                            <p class='text-warning'><small><i>(?? Thông tin chưa được duyệt)</i></small></p>
                            @else
							<div class='pull-right'><span class='badge'>{{ $goodsInfo->chaoGia()->count() }}</span>&nbsp;@if($goodsInfo->chaoGia()->count())<a href='#' id='{{ $goodsInfo->id }}' data-target='#modalPrice' data-toggle='modal' class='btn btn-success btn-xs'>>>Chi tiet</a>@endif</div>
							<div>So luot chao gia:</div>
                            <p class='text-success'><small><i>(Thông tin của bạn đã được duyệt)</i></small></p>					<a href='/van-tai/{{ $goodsInfo->id }}' class='btn btn-primary btn-sm'>Tim nha van tai</a>
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
                <a href='/publishGoodsInfo' class="btn btn-primary" >Đăng thông tin hàng hóa</a>
            </div>
        </div>
	</div>




	<div class='row'>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

                    <form class="form-horizontal"  id='form_content' role="form" method="post" action="{{ url('/publishGoodsInfo') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ten</label>

                            <div class="col-md-6">
                                <input type='text'  id = 'name' class="form-control" name="name" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tuyen duong</label>

                            <div class="col-md-6">
                                <input type='text' id = 'route' class="form-control" name="route" value="{{ old('route') }}">

                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hinh thuc dong goi</label>

                            <div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang roi'>Hang roi
								</label>
								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang cont'>Hang cont
								</label>
                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sluong') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">So luong</label>

                            <div class="col-md-6">
                                <input type="number" id ='sluong' class="form-control" name="sluong" value="{{ old('sluong') }}">

                                @if ($errors->has('sluong'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sluong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgghang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian giao hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_gh' class="form-control" name="tgghang" value="{{ old('tgghang') }}">

                                @if ($errors->has('tgghang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgghang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian nhan hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_nh' class="form-control" name="tgnhang" value="{{ old('tgnhang') }}">

                                @if ($errors->has('tgnhang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgnhang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nhhdki') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Han dang ky</label>

                            <div class="col-md-6">
                                <input type="text" id='time_hdk' class="form-control" name="nhhdki" value="{{ old('nhhdki') }}">

                                @if ($errors->has('nhhdki'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nhhdki') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Yeu cau khac</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id='yckhac' name="description" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					 <div class='modal-footer'>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id ='thank' data-target='#myModal' data-toggle='modal' href='#form_content' type="submit" class="btn btn-primary">Dang</button>
                            </div>
                        </div>
					</div>
                    </form>
      </div>
    </div>
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
<script type='text/javascript'>
$(document).ready(function () {
	//modal edit
	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this),
			goodsId = e.relatedTarget.id;
		$.ajax({
			cache: false,
			type: 'get',
			contentType: 'json',
			url: '/goods-edit/'+goodsId,
			success:function(data)
			{
				console.log('success');
				console.log(data);
				$modal.find('#name').val(data.name);
				$modal.find('#route').val(data.route);
				$modal.find('#sluong').val(data.sluong);
				$modal.find('#time_gh').val(data.tgghang);
				$modal.find('#time_nh').val(data.tgnhang);
				if(data.htdgoi=='hang roi')
					$modal.find('#htdgoi[value="hang roi"]').attr('checked', true);
				else if(data.htdgoi=='hang cont')
					$modal.find('#htdgoi[value="hang cont"]').attr('checked', true);
				$modal.find('#time_hdk').val(data.nhhdki);
				$modal.find('#yckhac').val(data.description);
			},
			error: function(data)
			{

				alert('Error when edit this item');
			}
		});
	});


	//modal chao gia
	
	$('#modalPrice').on('show.bs.modal', function(e) {
		
		var id=e.relatedTarget.id;
         var dataTable = $('#price-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '/chao-gia-hh/'+id,
			"aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
			"iDisplayLength": 3,
			"bDestroy": true,
			"bAutoWidth": true,
			"columns": [
				{
					data: 'name',
					name: 'users.name',
				},
				{
					data: 'price',
					name: 'chaogia.price',
				},
				{
					data: 'created_at',
					name: 'chaogia.created_at',
				},
				{
					data: 'accept',
					name: 'accept',
					orderable: false,
					searchable: false,
				},
			]
        });
	});



	//datetimepicker
	$('#time_gh').datetimepicker({
		locale: 'vi_VN'
	});

	$('#time_nh').datetimepicker({
		locale: 'vi_VN'
	});

	$('#time_hdk').datetimepicker({
		locale: 'vi_VN'
	});
});
</script>

@endpush
