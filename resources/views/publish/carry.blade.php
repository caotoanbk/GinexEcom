@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Carry Infomation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/publishCarryInfo') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tuyen duong</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="route">

                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lxe') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Loai xe</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lxe">

                                @if ($errors->has('lxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slxe') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">So luong xe</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="slxe">

                                @if ($errors->has('slxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hinh thuc dong goi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="htdgoi">

                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cuoc phi</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian nhan hang</label>

                            <div class="col-md-6">
                                <input id='time_nh' type="text" class="form-control" name="tgnhang" value="{{ old('tgnhang') }}">

                                @if ($errors->has('tgnhang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgnhang') }}</strong>
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
                                <button type="submit" class="btn btn-primary">Publish</button>
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
    $('#time_nh').datetimepicker({
        locale: 'vi_VN'    

});
});
</script>
@endpush
