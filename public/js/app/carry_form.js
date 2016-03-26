$(function(){
    //date time picker
    $('#time_nh').datetimepicker({
        locale: 'vi_VN'    
	});
	
	//format number
	$('#cuoc-phi').autoNumeric('init', {
		aSep:'.',
		aDec: ',',
		aSign: ' VND',
		pSign: 's',
		aPad: false,	
	});
	//jquery validation
	$('#carry-form').validate({
		rules: {
			route: {
				required: true,
			},
			lxe: {
				required: true,
			},
			slxe: {
				required: true,
			},
			price: {
				required: true,
			},
			tgnhang: {
				required: true,
			},
		},
		messages: {
			route: {
				required: '<div class="text-danger"><i>Ban chua nhap tuyen duong</i></div>',
			},
			lxe: {
				required: '<div class="text-danger"><i>Ban chua nhap loai xe</i></div>',
			},
			slxe: {
				required: '<div class="text-danger"><i>Ban chua nhap so luong xe</i></div>',
			},
			tgnhang: {
				required: '<div class="text-danger"><i>Ban chua nhap thoi gian nhan hang</i></div>',
			},
			price: {
				required: '<div class="text-danger"><i>Ban chua nhap muc gia</i></div>',
			}

		}	
	});
});
