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

                    <form class="form-horizontal"  name ="{{ $name }}" id="content" role="form" action="/require-carrier" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên</label>

                            <div class="col-md-6">
                                <input type='text'  id = 'name' class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tuyến đường</label>
                            <div class="col-md-6">
                                <input type='text' id = 'route' class="form-control" name="route" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Hình thức đóng gói</label>

                            <div class="col-md-6">
								<select id='htdgoi' class='form-control' name='htdgoi'>
									<option value='hang roi'>Hang roi</option>	
									<option value='hang cont'>Hang cont</option>	
								</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Số lượng</label>

                            <div class="col-md-6">
                                <input type="number" id ='sluong' class="form-control" name="sluong" value="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Thời gian giao hàng</label>

                            <div class="col-md-6">
                                <input type="text" id='time_gh' class="form-control" name="tgghang" value="">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Thời gian nhận hàng</label>

                            <div class="col-md-6">
                                <input type="text" id='time_nh' class="form-control" name="tgnhang" value="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mức giá đưa ra</label>

                            <div class="col-md-6">
                                <input type="text" id='mucgia' class="form-control" name="mgdra" value="">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Yêu cầu khác</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id='yckhac' name="description" value=""></textarea>

                            </div>
                        </div>

					 <div class='modal-footer'>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button id='gycau' type="submit" class="btn btn-primary">{{ $submit }}</button>
                            </div>
                        </div>
					</div>
                    </form>
      </div>
    </div>
  </div>
</div>
</div>
