$(function(){
	$(function(){
		$('.close').click(function(){
			$(this).parent().css('display','none');
		});
	});
});

$(function() {
  var operator_edit_btn=$(".operator.edit.staff"); 
    
 	operator_edit_btn.bind("click",function(){
  	var td = $(this).parent().parent().children("td");
		var id= td.get(0).innerHTML;
		var name=td.get(1).innerHTML;  
		var salary=td.get(2).innerHTML;
		var position=td.get(3).innerHTML;

		$('.sid-value').text("");
		$('#sid').val(id);
		$('#name').val(name);
		$('#salary').val(salary);
		$('#position').val(position);

		var edit_link=$("#edit-link-staff");
		edit_link.attr("href","./staff.php?action=edit&id="+id);
		edit_link.css('display','inline');
		$("#insert-link-staff").css('display','none');
	});

 	var reset_btn=$(".reset-btn-staff");
 	reset_btn.bind("click",function(){
 		$('.sid-value').text("");
 		$('#sid').val("");
		$('#name').val("");
		$('#salary').val("");
		$('#position').val("");

		$("#edit-link-staff").css('display','none');
		$("#insert-link-staff").css('display','inline');
 	});
});

$(function(){
	// 编辑
	$("#edit-link-staff").click(function(){
		var id = $("#sid").val();
		var name = $("#name").val();
		var salary = $("#salary").val();
		var position = $("#position").val();
		// 数据合法性检验
		if(name==="" || salary==="" || position===""){
			$('tips-text').text('输入不能为空');
			return;
		}
		if(isNaN(salary)){
			$('tips-text').text('salary 请输入数值');
			return;
		}
		var url = "./staff.php?action=edit&id="+id;
		$.ajax({
			type:"POST",
			url:url,
			data:{
				id: id,
				name: name,
				salary: salary,
				position: position
			},
			success:function(result){
				//对返回数据进行处理
				//var dataInfo = JSON.parse(data);
				window.location.href="./staff.php";
			},
			error:function(){
				//错误提示
				alert('服务器错误，请稍后再试！');
			}
		});
	});

	// 插入
	$("#insert-link-staff").click(function(){
		var name = $("#name").val();
		var salary = $("#salary").val();
		var position = $("#position").val();

		if(name==="" || salary==="" || position===""){
			$('.tips-text').text('输入不能为空');
			$('.alert-div').css('display','block');
			return;
		}
		if(isNaN(salary)){
			$('.tips-text').text('salary 请输入数值');
			$('.alert-div').css('display','block');
			return;
		}

		var url = "./staff.php?action=add";
		$.ajax({
			type:"POST",
			url:url,
			data:{
				name: name,
				salary: salary,
				position: position
			},
			success:function(result){
				//对返回数据进行处理
				//var dataInfo = JSON.parse(data);
				window.location.href="./staff.php";
			},
			error:function(){
				//错误提示
				alert('服务器错误，请稍后再试！');
			}
		});
	});
});

// 菜品页
$(function() {
	// 编辑按钮
  var operator_edit_btn=$(".operator.edit.dishes"); 
    
 	operator_edit_btn.bind("click",function(){
  	var td = $(this).parent().parent().children("td");
		var id= td.get(0).innerHTML;
		var name=td.get(1).innerHTML;  
		var price=td.get(2).innerHTML;
		$('.did-value').text(id);
		$('#did').val(id);
		$('#name').val(name);
		$('#price').val(price);

		var edit_link=$("#edit-link-dishes");
		edit_link.attr("href","./dishes.php?action=edit&id="+id);
		edit_link.css('display','inline');
		$("#insert-link-dishes").css('display','none');
	});

 	var reset_btn=$(".reset-btn-dishes");
 	reset_btn.bind("click",function(){
 		$('.did-value').text("");
 		$('#did').val("");
		$('#name').val("");
		$('#price').val("");

		$("#edit-link-dishes").css('display','none');
		$("#insert-link-dishes").css('display','inline');
 	});
});

$(function(){
	// 编辑
	$("#edit-link-dishes").click(function(){
		var id = $("#did").val();
		var name = $("#name").val();
		var price = $("#price").val();
		// 数据合法性检验
		if(name==="" || price===""){
			$('tips-text').text('输入不能为空');
			return;
		}
		if(isNaN(salary)){
			$('tips-text').text('salary 请输入数值');
			return;
		}
		var url = "./dishes.php?action=edit&id="+id;
		$.ajax({
			type:"POST",
			url:url,
			data:{
				id: id,
				name: name,
				price: price
			},
			success:function(result){
				//对返回数据进行处理
				//var dataInfo = JSON.parse(data);
				window.location.href="./dishes.php";
			},
			error:function(){
				//错误提示
				alert('服务器错误，请稍后再试！');
			}
		});
	});

	// 插入
	$("#insert-link-dishes").click(function(){
		var name = $("#name").val();
		var price = $("#price").val();

		if(name==="" || price===""){
			$('.tips-text').text('输入不能为空');
			$('.alert-div').css('display','block');
			return;
		}
		if(isNaN(price)){
			$('.tips-text').text('salary 请输入数值');
			$('.alert-div').css('display','block');
			return;
		}

		var url = "./dishes.php?action=add";
		$.ajax({
			type:"POST",
			url:url,
			data:{
				name: name,
				price: price
			},
			success:function(result){
				//对返回数据进行处理
				//var dataInfo = JSON.parse(data);
				window.location.href="./dishes.php";
			},
			error:function(){
				//错误提示
				alert('服务器错误，请稍后再试！');
			}
		});
	});
});

// kmp
$(function(){
	$(".kmp_btn").click(function(){
		var string_up = $("#string-up").val();
		var string_down = $("#string-down").val();

		$.ajax({
			type:"post",
			url:"./LCS.php",
			data:{
				string_up:string_up,
				string_down:string_down
			},
			success:function(result){
				var res = JSON.stringify(result);
				// json -> object
				var dataObj = eval("("+res+")");

				$("#string-result").val(dataObj.lcs);

				if($("#string-up").val() === "" && $("#string-down").val() === ""){
					$("#string-up").val(dataObj.x);
					$("#string-down").val(dataObj.y);
				}
			},
			error:function(){

			}
		});
	});

	$(".kmp_random").click(function(){

		$.ajax({
			type:"post",
			url:"./LCS.php",
			data:{
				string_up:"",
				string_down:""
			},
			success:function(result){
				var res = JSON.stringify(result);
				// json -> object
				var dataObj = eval("("+res+")");
				
				$("#string-up").val(dataObj.x);
				$("#string-down").val(dataObj.y);
				$("#string-result").val(dataObj.lcs);
			},
			error:function(){

			}
		});
	});

});

$(function(){
    function maxLimit(){
        var num=$(this).val().substr(0,500);
    };
    $(".string-input").keyup(maxLimit);
});