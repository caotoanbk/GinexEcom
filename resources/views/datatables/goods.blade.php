
@extends('layouts.app')

@section('content')
<div class='container-fluid'>
<div class='row'>
    <table class="table table-striped table-responsive table-hover table-condensed" id="goods-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Route</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
    </table>
</div>
</div>
@stop
@push('scripts')
<script type='text/javascript'>
$(function() {
    $('#goods-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": '{!! route('hanghoa.data') !!}',
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'route', name: 'route' },
            { data: 'description', name: 'description' },
            { data: 'date', name: 'date' },
        ]
    });
});
</script>
@endpush
