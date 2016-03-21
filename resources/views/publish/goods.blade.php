
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading text-center">Goods Infomation</h3>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="{{ url('/publishGoodsInfo') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ten</label>

                            <div class="col-md-6">
                                <input type='text' class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tuyen duong</label>

                            <div class="col-md-6">
                                <input type='text' class="form-control" name="route" value="{{ old('route') }}">

                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hinh thuc dong goi</label>

                            <div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" name="htdgoi" value='hang roi'>Hang roi
								</label>
								<label class="radio-inline">
								  <input type="radio" name="htdgoi" value='hang cont'>Hang cont
								</label>
                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sluong') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">So luong</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="sluong" value="{{ old('sluong') }}">

                                @if ($errors->has('sluong'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sluong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgghang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian giao hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_gh' class="form-control" name="tgghang" value="{{ old('tgghang') }}">

                                @if ($errors->has('tgghang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgghang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian nhan hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_nh' class="form-control" name="tgnhang" value="{{ old('tgnhang') }}">

                                @if ($errors->has('tgnhang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgnhang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nhhdki') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Han dang ky</label>

                            <div class="col-md-6">
                                <input type="text" id='time_hdk' class="form-control" name="nhhdki" value="{{ old('nhhdki') }}">

                                @if ($errors->has('nhhdki'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nhhdki') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Yeu cau khac</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Dang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



@push('scripts')
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script>
$(function(){

    //date time picker
    $('#time_gh').datetimepicker({
        locale: 'vi_VN'    

	});
    $('#time_nh').datetimepicker({
        locale: 'vi_VN'    

	});
    $('#time_hdk').datetimepicker({
        locale: 'vi_VN'    

	});
});
</script>
@endpush
