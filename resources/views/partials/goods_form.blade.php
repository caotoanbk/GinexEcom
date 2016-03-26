                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							{!! Form::label('name', 'Ten', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
							{!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
							{!! Form::label('route', 'Tuyen duong', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
							{!! Form::text('route', old('route'), array('class' => 'form-control')) !!}
                                @if ($errors->has('route'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('route') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
							{!! Form::label('htdgoi', 'Hinh thuc dong goi', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
								{!! Form::select('htdgoi', ['hang roi' => 'Hang roi', 'hang cont' => 'Hang cont'], old('htdgoi'), array('class' => 'form-control')) !!}
                                @if ($errors->has('htdgoi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('htdgoi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sluong') ? ' has-error' : '' }}">
							{!! Form::label('sluong', 'So luong', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
							{!! Form::number('sluong', old('sluong'), array('class' => 'form-control')) !!}
                                @if ($errors->has('sluong'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sluong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgghang') ? ' has-error' : '' }}">
							{!! Form::label('tgghang', 'Thoi gian giao hang', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
							{!! Form::text('tgghang',old('tgghang'), array('class' => 'form-control', 'id' => 'time_gh')) !!}
                                @if ($errors->has('tgghang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgghang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
							{!! Form::label('tgnhang', 'Thoi gian nhan hang', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
							{!! Form::text('tgnhang',old('tgnhang'), array('class' => 'form-control', 'id' => 'time_nh')) !!}


                                @if ($errors->has('tgnhang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgnhang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nhhdki') ? ' has-error' : '' }}">
							{!! Form::label('nhhdki', 'Han dang ki', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
							{!! Form::text('nhhdki',old('nhhdki'), array('class' => 'form-control', 'id' => 'time_hdk')) !!}

                                @if ($errors->has('nhhdki'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nhhdki') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							{!! Form::label('description', 'Yeu cau khac', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">

							{!! Form::textarea('description',null, array('class' => 'form-control')) !!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                            </div>
                        </div>
