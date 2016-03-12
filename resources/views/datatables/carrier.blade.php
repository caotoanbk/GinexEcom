@extends('layouts.app')

@section('content')
<div class='container-fluid'>
<div class='row'>
<div class='page-header'><h2>Thong tin van tai</h2></div>
    <table class="table table-striped dataTable table-responsive table-hover table-condensed" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
</div>
</div>
@stop
@push('scripts')
<script type='text/javascript'>
$(function() {
    $('#users-table').DataTable({
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
