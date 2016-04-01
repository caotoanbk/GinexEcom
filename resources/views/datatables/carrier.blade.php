@extends('layouts.app')
 @section('content')
<div class='container'>
    <div class='row'>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Thông tin vận tải</b>
            </div>
            <div class='panel-body'>
                <table id='carriers-table' class='table dt-responsive table-bordered table-striped table-hover nowrap' cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tuyến đường</th>
                            <th>Loại xe</th>
                            <th>H/t đóng gói</th>
                            <th>S/l xe</th>
                            <th>Cước phí(VND)</th>
                            <th>T/g nhận hàng</th>
                            <th>Y/c khác</th>
							<th>&nbsp;</th>
                        </tr>
                    </thead>
					<tbody>
					</tbody>
                </table>
            </div>
        </section>
    </div>
	@include('partials.modal_goods_require', ['name' => 'form-ycau', 'title' => 'Thông tin hàng hóa của bạn', 'submit' => 'Gửi yêu cầu' ])
</div>
@stop
 @push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src='/js/autoNumeric-min.js' type="text/javascript"></script>
<script src='/js/dataTables.responsive.min.js' type="text/javascript"></script>
<script src='/js/responsive.bootstrap.min.js' type="text/javascript"></script>
<script type="text/javascript" src='/js/app/carrier_datatable.js'></script>
@endpush
