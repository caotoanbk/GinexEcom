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

                    <form class="form-horizontal"  id='form_content' role="form" method="post" action="{{ $action }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ten</label>

                            <div class="col-md-6">
                                <input type='text'  id = 'name' class="form-control" name="name" >

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tuyen duong</label>

                            <div class="col-md-6">
                                <input type='text' id = 'route' class="form-control" name="route" value="{{ old('route') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('htdgoi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hinh thuc dong goi</label>

                            <div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang roi'>Hang roi
								</label>
								<label class="radio-inline">
								  <input type="radio" id='htdgoi' name="htdgoi" value='hang cont'>Hang cont
								</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sluong') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">So luong</label>

                            <div class="col-md-6">
                                <input type="number" id ='sluong' class="form-control" name="sluong" value="{{ old('sluong') }}">

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgghang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian giao hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_gh' class="form-control" name="tgghang" value="{{ old('tgghang') }}">

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('tgnhang') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Thoi gian nhan hang</label>

                            <div class="col-md-6">
                                <input type="text" id='time_nh' class="form-control" name="tgnhang" value="{{ old('tgnhang') }}">

                            </div>
                        </div>
						@if($ycvtai)
							
                        <div class="form-group{{ $errors->has('mgdra') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Muc gia dua ra</label>

                            <div class="col-md-6">
                                <input type="number" id='mucgia' class="form-control" name="mgdra" value="{{ old('mgdra') }}">

                            </div>
                        </div>
						@else

                        <div class="form-group{{ $errors->has('nhhdki') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Han dang ky</label>

                            <div class="col-md-6">
                                <input type="text" id='time_hdk' class="form-control" name="nhhdki" value="{{ old('nhhdki') }}">

                            </div>
                        </div>
						@endif

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Yeu cau khac</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id='yckhac' name="description" value="{{ old('description') }}"></textarea>

                            </div>
                        </div>

					 <div class='modal-footer'>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id ='thank' data-target='#myModal' data-toggle='modal' href='#form_content' type="submit" class="btn btn-primary">{{ $submit }}</button>
                            </div>
                        </div>
					</div>
                    </form>
      </div>
    </div>
  </div>
</div>
</div>
