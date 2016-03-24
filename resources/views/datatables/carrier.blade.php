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
	@include('partials.modal', ['name' => 'form-ycau', 'title' => 'Thông tin hàng hóa của bạn', 'submit' => 'Gửi yêu cầu' , 'ycvtai' => true])
</div>
@stop
 @push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type='text/javascript'>
    $(function () {
		
		//datetime picker 
		$('#time_gh').datetimepicker({
			locale: 'vi_VN',
		});		
		$('#time_nh').datetimepicker({
			locale: 'vi_VN',
		});		

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
			$('#myModal').on('hidden.bs.modal', function () {
				$(this).removeData('bs.modal');
			});
		$('#myModal').on('show.bs.modal', function(e) {
			var $modal = $(this),
				carrierId = e.relatedTarget.id;
			alert(carrierId);

			$.ajax({
				cache: false,
				type: 'get',
				contentType: 'json',
				url: '/ajax-carrier-detail/'+carrierId,
				success: function(data)
				{
					$modal.find('#name').val('');
					$modal.find('#route').val(data.route);	
					if(data.htdgoi=='hang roi')
						$modal.find('#htdgoi[value="hang roi"]').attr('checked', true);
					else 
						$modal.find('#htdgoi[value="hang cont"]').attr('checked', true);
					$modal.find('#time_gh').val(data.tgnhang);
				},
				error: function(data)
				{
					alert('Error');
				}
			});	
			//jquery validation
			var validator = $('#content').validate({
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
					mgdra: {
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
					mgdra: {
						required: 'Ban chua chon muc gia ',
					}

				},
				submitHandler: function(form) {
					console.log(carrierId);
				}	
			});
			validator.resetForm();
		});


    });
</script>
@endpush
