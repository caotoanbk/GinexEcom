@extends('layouts.app') 
@section('content')
<div class='container'>
    <div class='row'>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Thông tin vận tải</b>
            </div>
            <div class='panel-body'>
                <table id='find-carriers-table' class='table table-responsive table-bordered table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Tuyến đường</th>
                            <th>Loại xe</th>
                            <th>H/t đóng gói</th>
                            <th>S/l xe</th>
                            <th>Cước phí</th>
                            <th>T/g nhận hàng</th>
                            <th>Y/c khác</th>
                            <th>Gui yeu cau</th>
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
		$('#find-carriers-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '/tim-kiem-van-tai/'+id,
            "columns": [
                { data: 'route', name: 'route' },
                { data: 'lxe', name: 'lxe' },
                { data: 'htdgoi', name: 'htdgoi' },
                { data: 'slxe', name: 'slxe' },
                { data: 'price', name: 'price' },
                { data: 'tgnhang', name: 'tgnhang' },
                { data: 'description', name: 'description' },
				{ data: 'ycau', name: 'ycau', orderable: false, searchable: false },
        ]
        });
    });
</script>
@endpush
