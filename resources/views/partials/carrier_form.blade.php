                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
							{!! Form::label('route','Tuyến đường',array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::text('route', old('route'), array('class' => 'form-control')) !!}
                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lxe') ? ' has-error' : '' }}">
							{!! Form::label('lxe','Loại xe', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::text('lxe', old('lxe'), array('class' => 'form-control')) !!}
                                @if ($errors->has('lxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slxe') ? ' has-error' : '' }}">
							{!! Form::label('slxe','Số lượng xe', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::text('slxe', old('slxe'), array('class' => 'form-control')) !!}
                                @if ($errors->has('slxe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
							{!! Form::label('htdgoi','Hình thức đóng gói', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::select('htdgoi', ['hang roi' => 'Hang roi', 'hang cont' => 'Hang cont'], old('htdgoi'), array('class' => 'form-control')) !!}
                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							{!! Form::label('price','Cước phí', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::text('price', old('price'), array('class' => 'form-control','id' => 'cuoc-phi')) !!}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
							{!! Form::label('tgnhang','Thời gian nhận hàng', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::text('tgnhang', old('tgnhang'), array('class' => 'form-control', 'id' => 'time_nh')) !!}
                                @if ($errors->has('tgnhang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgnhang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							{!! Form::label('description','Yêu cầu khác', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::textarea('description', old('description'), array('class' => 'form-control')) !!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
                            </div>
                        </div>
                    </form>
