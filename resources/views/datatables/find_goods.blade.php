@extends('layouts.app') 
@section('content')
<div class='container'>
    <div class='row'>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Danh sách hàng hóa</b>
            </div>
            <div class='panel-body'>
                <table id='find-goods-table' class='table table-responsive table-bordered table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Tuyến đường</th>
                            <th>H/t đóng gói</th>
                            <th>Số lượng</th>
                            <th>T/g giao hàng</th>
                            <th>T/g nhận hàng</th>
                            <th>Hạn đăng kí</th>
                            <th>Y/c khác</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </div>
</div>
@stop 
@push('scripts')
<script type='text/javascript'>
$(function () {

		var id= {{ $id }};
		$('#find-goods-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '/tim-kiem-hang-hoa/'+id,
            "columns": [
                { data: 'name', name: 'name' },
                { data: 'route', name: 'route' },
                { data: 'htdgoi', name: 'htdgoi' },
                { data: 'sluong', name: 'sluong' },
                { data: 'tgghang', name: 'tgghang' },
                { data: 'tgnhang', name: 'tgnhang' },
                { data: 'nhhdki', name: 'nhhdki' },
                { data: 'description', name: 'description' },
				{ data: 'cgia', name: 'cgia', orderable: false, searchable: false },
        ]
        });
    });
</script>
@endpush
