@extends('layouts.app')

@section('content')
<div class='container'>
<div class='row'>
<section class='panel panel-primary'>
<div class='panel-heading'>
<b>Thong tin van tai</b>
</div>
<div class='panel-body'>
	<table id='carriers-table' class='table table-striped table-hover'>
		<thead>
			<tr>
                <th>Tuyen duong</th>
                <th>Mo ta</th>
                <th>Gia</th>
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
            { data: 'description', name: 'description' },
            { data: 'price', name: 'price' },
        ]
    });
});
</script>
@endpush
