@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
<div class="col-md-9 col-md-offset-1">
<select class="form-input">
	<option>Tat ca</option>
	<option>Van tai</option>
	<option>Hang hoa</option>
</select>
<div class="table-responsive">
<table id="example" class="table table-hover table-condensed table-striped"></table>
</div>
    </div>
</div>

</div>
@endsection

@section('customjs')
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "Mo ta" },
            { title: "Thoi gian" },
            { title: "Gia" },
        ]
    } );
} );
</script>
@endsection

