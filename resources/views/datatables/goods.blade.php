@extends('layouts.app')

@section('content')
   <div class='container'>
    <div class='row'>
        @if(!Auth::check())
        <div class="alert alert-warning " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Nếu bạn là nhà vận tải hãy đăng nhập để có thể chào giá.
        </div>
        @endif
        <div class="modal fade bs-example-modal-sm" id='modal_message' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class='text-success text-center'><strong>Chúc mừng!!</strong> bạn đã chào giá thành công.</div>
                </div>
            </div>
        </div>
        <section class='panel panel-primary'>
            <div class='panel-heading'>
                <b>Thông tin hàng hóa</b>
            </div>
            <div class='panel-body'>
                <table class="table table-striped table-responsive table-hover table-bordered" id="goods-table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Tuyến đường</th>
                            <th>H/t đóng gói</th>
                            <th>Số lượng</th>
                            <th>T/g giao hàng</th>
                            <th>T/g nhận hàng</th>
                            <th>Ngày đăng</th>
                            <th>Y/c khác</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mời bạn chào giá!</h4>
                    </div>
                    <form name='form-chao-gia' id='form-chao-gia'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="muc-gia" class="control-label">Gía:</label>
                                <input type='number' value=0 class='form-control' id='muc-gia' name='price' placeholder='Mức giá bạn đưa ra'>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Huy</button>
                            <button type="submit" id="chao-gia" class="btn btn-primary">Chào giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" /> 
@stop 

@push('scripts')
<script type='text/javascript'>
    $(function () {

        //datatable
        var tablehh = $('#goods-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('hanghoa.data') !!}',
            "columns": [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'route',
                    name: 'route'
                },
                {
                    data: 'htdgoi',
                    name: 'htdgoi'
                },
                {
                    data: 'sluong',
                    name: 'sluong'
                },
                {
                    data: 'tgghang',
                    name: 'tgghang'
                },
                {
                    data: 'tgnhang',
                    name: 'tgnhang'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'chao_gia',
                    name: 'chao_gia',
                    searchable: false,
                    orderable: false
                },
        ]
        });

            //button chao gia
            $('#goods-table tbody').on('click', 'button', function () {
                var data = tablehh.row($(this).parents('tr')).data();
                $('#myModal').modal('show');
                $('#chao-gia').off('click');
                //submit form chao gia
                $('#chao-gia').on('click', function (e) {

                    var url = "/ajax/chaogia";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    e.preventDefault();
                    //Validate form
                    var form_data = {
                        goods_id: data['id'],
                        price: parseInt($('#muc-gia').val()),
                    };
                    $.ajax({
                        cache: false,
                        url: url,
                        data: form_data,
                        dataType: 'json',
                        type: 'get',
                        success: function (data) {
                            $('#myModal').modal('hide');
                            tablehh.ajax.reload(function () {
                                //show message 

                                $("#modal_message").modal('show');
                                $("#modal_message").on('show.bs.modal', function () {
                                    var myModal = $(this);
                                    if (typeof (myModal.data('hideInterval')) !== 'undefined') {
                                        clearTimeout(myModal.data('hideInterval'));
                                    }
                                    var timeout_msg = myModal.data('hideInterval', setTimeout(function () {
                                        myModal.modal('hide');
                                    }, 2000));
                                });
                            }, true);
                        },
                        error: function (data) {
                            //console.log('error');
                            //console.log('Error:', data);
                        },
                    });
                    //close submit form chao gia
                });
            });
        
    });
</script>
@endpush
