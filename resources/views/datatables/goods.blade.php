@extends('layouts.app')

@section('content')
   <div class='container'>
    <div class='row'>
        @if(!Auth::check())
        <div class="alert alert-warning " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Nếu bạn là nhà vận tải hãy đăng nhập để có thể chào giá.
        </div>
        @endif
        <div class="modal fade bs-example-modal-sm" id='modal_message' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class='text-success text-center'><strong>Chúc mừng!!</strong> bạn đã chào giá thành công.</div>
                </div>
            </div>
        </div>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Thông tin hàng hóa</b>
            </div>
            <div class='panel-body'>
                <table class="table table-striped table-responsive table-hover table-bordered" id="goods-table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Tuyến đường</th>
                            <th>H/t đóng gói</th>
                            <th>Số lượng</th>
                            <th>T/g giao hàng</th>
                            <th>T/g nhận hàng</th>
                            <th>Ngày đăng</th>
                            <th>Y/c khác</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mời bạn chào giá!</h4>
                    </div>
                    <form name='form-chao-gia' id='form-chao-gia'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="muc-gia" class="control-label">Muc gia thap nhat: <em><span id='min-price'></span></em></label>
                                <input type='text'  class='form-control' id='muc-gia' name='price' placeholder='Mức giá bạn đưa ra'>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Huy</button>
                            <button type="submit" id="chao-gia" class="btn btn-primary">Chào giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" /> 
@stop 

@push('scripts')
<script src='/js/autoNumeric-min.js' type="text/javascript"></script>
<script type='text/javascript'>
    $(function () {
		//auto numeric
		$('#muc-gia').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});

					$('#min-price').autoNumeric('init',{ 'aSep': '.', 'aDec': ',', 'aSign': ' VND', 'pSign': 's', 'aPad': false} );

        //datatable
        var tablehh = $('#goods-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('hanghoa.data') !!}',
            "columns": [
                { data: 'name', name: 'name' },
                { data: 'route', name: 'route' },
                { data: 'htdgoi', name: 'htdgoi' },
                { data: 'sluong', name: 'sluong' },
                { data: 'tgghang', name: 'tgghang' },
                { data: 'tgnhang', name: 'tgnhang' },
                { data: 'created_at', name: 'created_at' },
                { data: 'description', name: 'description' },
                { data: 'chao_gia', name: 'chao_gia', searchable: false, orderable: false },
        ]
        });
		

		//modal chao gia 
		$('#myModal').on('show.bs.modal', function(e){
			var $modal=$(this);
			var id = e.relatedTarget.id;
			$.ajax({
				cache: false,
				type: 'get',
				contentType: 'json',
				url: '/min-price/'+id,
				success: function(data)
				{
					console.log('successful');
					console.log(data);
					$modal.find('#min-price').html(data);	
				},
				error: function(data)
				{
					console.log('error');
				}
			});
		});


		//chao gia button click 
		$('#chao-gia').on('click', function(e) {
			e.preventDefault();
			alert('Chao gia button clicked');
		});
        
    });
</script>
@endpush
