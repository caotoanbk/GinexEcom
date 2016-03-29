	$(function(){
		$('a#xoa').confirm({
			title: 'Xoa',
			content: 'Ban co muon xoa thong tin nay?',
			theme: 'white',
			confirmButton: 'Co',
			confirmButtonClass: 'btn-info',
			cancelButtonClass: 'btn-danger',
			cancelButton: 'Khong',
			backgroundDismiss: true,
		});
		$('div.alert').delay(3000).slideUp(300);
	});
