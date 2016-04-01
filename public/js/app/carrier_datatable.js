    $(function () {
		//datetime picker 
		$('#time_gh').datetimepicker({
			locale: 'vi_VN',
		});		
		$('#time_nh').datetimepicker({
			locale: 'vi_VN',
		});		
        $('#carriers-table').DataTable({
            "processing": true,
			"responsive": true,
            "serverSide": true,
            "ajax": '/van-tai/data',
			"dom": 'Bfrtip',
			"buttons": [
				{
					extend: 'excel',
					title: 'title',
					className: 'btn btn-default btn-sm',
					text: 'Save as excel'
				},
				{
					text: 'Reload',
					className: 'btn btn-default btn-sm',
					action: function ( e, dt, node, config ) {
						dt.ajax.reload();
					}
				}
			],
            "columns": [
                { data: 'route', name: 'route' },
                { data: 'lxe', name: 'lxe' },
                { data: 'htdgoi', name: 'htdgoi' },
                { data: 'slxe', name: 'slxe' },
                { data: 'price', name: 'price', render: $.fn.dataTable.render.number('.',',',0,'') },
                { data: 'tgnhang', name: 'tgnhang' },
                { data: 'description', name: 'description' },
				{ data: 'ycau', name: 'ycau', searchable: false, orderable:false },
        ]
        });
		$('#myModal').on('show.bs.modal', function(e) {
			//format number
			$('#mucgia').autoNumeric('init', { aSep:'.', aDec: ',', aSign: ' VND', pSign: 's', aPad: false});
			var $modal = $(this), carrierId = e.relatedTarget.id;
			//attach carrierId to form
			if($('#carrier_id').length){
					$('#carrier_id').val(carrierId);
			}else{
				$('#content').prepend('<input type="hidden" id="carrier_id" value='+carrierId+' name="carrier_id">');
			}
			$.ajax({
				cache: false,
				type: 'get',
				contentType: 'json',
				url: '/ajax-carrier-detail/'+carrierId,
				success: function(data)
				{
					$modal.find('#name').val('');
					$modal.find('#sluong').val('');
					$modal.find('#mucgia').val('');
					$modal.find('#time_nh').val('');
					$modal.find('#yckhac').val('');
					$modal.find('#route').val(data.route);	
					$modal.find('#htdgoi').val(data.htdgoi);	
					$modal.find('#htdgoi').attr('readonly', true);	
					$modal.find('#time_gh').val(data.tgnhang);
					$modal.find('#time_gh').attr('readonly', true);
				},
				error: function(data)
				{
					alert('Error');
				}
			});	
			//jquery validation
			var validator = $('#content').validate({
				rules: {
					name: {
						required: true,
					},
					route: {
						required: true,
					},
					sluong: {
						required: true,
					},
					tgghang: {
						required: true,
					},
					tgnhang: {
						required: true,
					},
					price: {
						required: true,
					}
				},
				messages: {
					name: {
						required: '<div class="text-danger"><i>Ban chua nhap ten hang hoa</i></div>',
					},
					route: {
						required: '<div class="text-danger">Ban chua nhap tuyen duong</div>',
					},
					sluong: {
						required: '<div class="text-danger"><i>Ban chua nhap so luong hang</i></div>',
					},
					tgghang: {
						required: '<div class="text-danger"><i>Ban chua nhap thoi gian giao hang</i></div>',
					},
					tgnhang: {
						required: '<div class="text-danger"><i>Ban chua nhap thoi gian nhan hang</i></div>',
					},
					price: {
						required: '<div class="text-danger"><i>Ban chua chon muc gia</i></div> ',
					}

				},
			});

			validator.resetForm();
		});


    });
