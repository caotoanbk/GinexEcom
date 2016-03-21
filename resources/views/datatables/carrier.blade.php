@extends('layouts.app')
 @section('content')
<div class='container'>
    <div class='row'>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Thông tin vận tải</b>
            </div>
            <div class='panel-body'>
                <table id='carriers-table' class='table table-responsive table-bordered table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Tuyến đường</th>
                            <th>Loại xe</th>
                            <th>H/t đóng gói</th>
                            <th>S/l xe</th>
                            <th>Cước phí</th>
                            <th>T/g nhận hàng</th>
                            <th>Y/c khác</th>
							<th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </div>
	@include('partials.modal', ['title' => 'Thong tin hang hoa cua ban', 'submit' => 'Gui yeu cau' ,'action' => 'dfdfd ', 'ycvtai' => true])
</div>
@stop
 @push('scripts')
<script type='text/javascript'>
    $(function () {
        $('#carriers-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('vantai.data') !!}',
            "columns": [
                { data: 'route', name: 'route' },
                { data: 'lxe', name: 'lxe' },
                { data: 'htdgoi', name: 'htdgoi' },
                { data: 'slxe', name: 'slxe' },
                { data: 'price', name: 'price' },
                { data: 'tgnhang', name: 'tgnhang' },
                { data: 'description', name: 'description' },
				{ data: 'ycau', name: 'ycau', searchable: false, orderable:false },
        ]
        });

		$('#myModal').on('show.bs.modal', function(e) {
			var $modal = $(this),
				carrierId = e.relatedTarget.id;
			$.ajax({
				cache: false,
				type: 'get',
				contentType: 'json',
				url: '/ajax-carrier-detail/'+carrierId,
				success: function(data)
				{

					console.log('success');
					console.log(data.htdgoi);
					$modal.find('#route').val(data.route);	
					if(data.htdgoi=='hang roi')
						$modal.find('#htdgoi[value="hang roi"]').attr('checked', true);
					else 
						$modal.find('#htdgoi[value="hang cont"]').attr('checked', true);
					$modal.find('#time_gh').val(data.tgnhang);
					$('#name').focus();
				},
				error: function(data)
				{
					alert('Error');
				}
			});	
		});
    });
</script>
@endpush