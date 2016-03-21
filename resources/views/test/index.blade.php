@extends('layouts.app')


@section('content')
<div class='container'>
<div class='row'>
<form method='post' action='/test'>
 {!! csrf_field() !!}
<div class='col-md-5'>
<input type='text' class='form-control' name='test' id='test' />
<div class='col-md-5'>
<input type='submit' value='submit' />
    </div>
    </div>
</form>
    </div>
</div>
@endsection


@push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script>
$(function(){

    //date time picker
    $('#test').datetimepicker({
        locale: 'vi_VN'    

});
});
</script>
@endpush