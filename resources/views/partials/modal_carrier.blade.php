
<div class='row'>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center" id="myModalLabel">{{ $title }}</h3>
      </div>
      <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/publishCarryInfo') }}" id='form-carrier'>
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tuyến đường</label>

                            <div class="col-md-6">
                                <input type="text" id='route' class="form-control" name="route">

                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lxe') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Loại xe</label>

                            <div class="col-md-6">
                                <input type="text" id='lxe' class="form-control" name="lxe">

                                @if ($errors->has('lxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slxe') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Số lượng xe</label>

                            <div class="col-md-6">
                                <input type="number" id='slxe' class="form-control" name="slxe">

                                @if ($errors->has('slxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hình thức đóng gói</label>

                            <div class="col-md-6">

								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang roi'>Hàng rời
								</label>
								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang cont'>Hàng cont
								</label>
                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cước phí</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" id='price' name="price">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thời gian nhận hàng</label>

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
                            <label class="col-md-4 control-label">Yêu cầu khác</label>

                            <div class="col-md-6">
                                <textarea id='description' class="form-control" name="description" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
                            </div>
                        </div>
                    </form>
      </div>
    </div>
  </div>
</div>
</div>
