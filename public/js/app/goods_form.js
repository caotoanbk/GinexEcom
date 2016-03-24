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
	//jquery validation
	$('#goods-form').validate({
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
			nhhdki: {
				required: true,
			}
		},
		messages: {
			name: {
				required: '<div class="text-danger"><i>Ban chua nhap ten hang hoa</i></div>',
			},
			route: {
				required: '<div class="text-danger"><i>Ban chua nhap tuyen duong</i></div>',
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
			nhhdki: {
				required: '<div class="text-danger"><i>Ban chua nhap thoi gian het han dang ki</i></div>',
			}

		}	
	});
});
