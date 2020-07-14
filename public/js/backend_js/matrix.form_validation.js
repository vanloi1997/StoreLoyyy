
$(document).ready(function(){
	
	$('#current_pwd').keyup(function(){
		var current_pwd = $('#current_pwd').val();
		$.ajax({
			type: 'get',
			url: 'check-pwd',
			data: {current_pwd:current_pwd},
			success: function(resp){
				if(resp=="true")
				{
					$('#chkPwd').html("<font color='green'>Mật Khẩu Đúng</font>")
				}else if(resp=="false"){
					$('#chkPwd').html("<font color='red'>Mật Khẩu Không Đúng</font>")
				}
			}, error:function(){
				alert("error");
			}
		});
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	//add catefory Validation
	$("#add-category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	//edit catefory Validation
	$("#edit-category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	//add product Validation
	$("#add-product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true
			},
			product_color:{
				required:true
			},
			price:{
				required:true,
				number:true,
			},
			image:{
				required:true
			}

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	//edit product validation
	$("#edit-product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true
			},
			product_color:{
				required:true
			},
			price:{
				required:true,
				number:true,
			},
			image:{
				required:true
			}

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	// $("#delcate").click(function(){
	// 	if(confirm('Bạn Có Chắc Xóa Danh Mục Này Không?')){
	// 		return true;
	// 	}
	// 	return false;
	// });
	// $("#delproduct").click(function(){
	// 	if(confirm('Bạn Có Chắc Xóa Sản Phẩm Này Không?')){
	// 		return true;
	// 	}
	// 	return false;
	// });
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: "Bạn Có Chắc Chắn Không?",
			text: "Bạn Sẽ Không Thể Phục Hồi Bản Ghi Này!!",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Có, Xóa Nó!",
			cancelButtonText: "Không!",
			cancelButtonClass: "btn btn-success",
			confirmButtonClass: "btn btn-danger",
			closeOnConfirm: false,
			buttonsStyling: false,
			reverseButtons: true
		},
		function(){
			swal({
				title: "Xóa Thành Công!",
				type: "success",
			})
			window.location.href= "/admin/"+deleteFunction+"/"+id;
		});
	});

	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper" style="margin-left: 180px; margin-top: 6px"><input type="text" name="sku[]" id="sku" placeholder="Sku" style="width: 120px; margin-right: 3px"/><input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px ;margin-right: 3px"/><input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px; margin-right: 3px"/><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px; margin-right: 3px"/><a href="javascript:void(0);" class="remove_button"><i class="fa fa-trash-o fa-fw"></i></a></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
});
