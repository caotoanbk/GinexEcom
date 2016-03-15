@extends('layouts.app')

@section('content')
<div class='container'>
<div class='row'>
<section class='panel panel-primary'>
<div class='panel-heading'>
<b>Thong tin van tai</b>
</div>
<div class='panel-body'>
	<table id='carriers-table' class='table table-responsive table-bordered table-striped table-hover'>
		<thead>
			<tr>
                <th>Tuyen duong</th>
                <th>Loai xe</th>
                <th>H/t dong goi</th>
                <th>S/luong xe</th>
                <th>Cuoc phi</th>
                <th>T/g nhan hang</th>
                <th>Y/c khac</th>
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
$(function() {
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
        ]
    });
});
</script>
@endpush
