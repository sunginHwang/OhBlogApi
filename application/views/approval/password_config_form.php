<?php include('config_header.php')?>

<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">

<style>
.success_border {
	border: 1px solid #468847
}

.fail_border {
	border: 1px solid #b94a48
}

.success_color {
	color: #468847
}

.fail_color {
	color: #b94a48
}
</style>

<div class="col-md-8 col-xs-12">
	<div class="panel panel-default" style="margin-top: 30px">
		<div class="panel-body">
			<form class="form-horizontal" role="form">
				
<!--				<?php /*if($is_config_exist === TRUE) : */?>
				<div class="form-group">
					<label class="col-xs-3 control-label">이전 비밀번호</label>
					<div class="col-xs-9">
						<input name="ex_password" type="password" class="form-control"
							placeholder="이전 비밀번호">

						<div id="alert_ex_password" class="alert alert-danger"
							style="margin: 5px; display: none">
							<strong>경고</strong> 이전 비밀번호가 일치하지 않습니다.
						</div>
					</div>
				</div>
				--><?php /*endif;*/?>
				<div class="form-group">
					<label class="col-xs-3 control-label">새 비밀번호</label>
					<div class="col-xs-9">
						<input name="new_password" type="password" class="form-control"
							placeholder="비밀번호">

						<div id="alert_new_password" class="alert alert-danger"
							style="margin: 5px; display: none">
							<strong>경고</strong> 영문+숫자 형식 10자리 이상 30자리 미만의 비밀번호를 입력해주세요.
						</div>
					</div>

				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-xs-3 control-label">비밀번호 확인</label>
					<div class="col-xs-9">
						<input name="new_password_confirm" type="password"
							class="form-control" placeholder="비밀번호 확인">

						<div id="alert_new_password_confirm" class="alert alert-danger"
							style="margin: 5px; display: none">
							<strong>경고</strong> 비밀번호와 비밀번호 확인이 다릅니다.
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-3 col-xs-9">
						<div class="checkbox col-xs-10">
							<label> <input type="checkbox"
								name="is_request_password"
								<?php /*echo $is_request_password=='Y' ? 'checked' : ''*/?>>
								결재시 비밀번호를 묻습니다
							</label>
						</div>
						<div class="col-xs-2 pull-right">
							<input type="button" class="btn default_button" id="btn_submit"
								value="저장">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/json.js"></script>
<script src="/js/jquery.form.js"></script>

<script>
$("input[name='new_password']").focusout(function(){
	var result = validatePassword($(this).val());
	if(result == false){
		$("#alert_new_password").slideDown();
		$(this).parent().removeClass("has-success").addClass("has-error");
	}
	else{
		$("#alert_new_password").slideUp();
		$(this).parent().removeClass("has-error").addClass("has-success");
	}
});

$("input[name='new_password_confirm']").focusout(function(){
	var result = validatePasswordConfirm($("input[name='new_password']").val(),$(this).val());
	if(result == false){
		$("#alert_new_password_confirm").slideDown();
		$(this).parent().removeClass("has-success").addClass("has-error");
	}
	else{
		$("#alert_new_password_confirm").slideUp();
		$(this).parent().removeClass("has-error").addClass("has-success");
	}
});

$("#btn_submit").click(function(){
	var exPassword = $("input[name='ex_password']").val();
	var newPassword = $("input[name='new_password']").val();
	var passwordConfirm = $("input[name='new_password_confirm']").val();
	var isRequestApprovalPassword = $("input[name='is_request_password']").prop('checked');

	var passwordValidateResult = validatePassword(newPassword);
	var passwordConfirmValidateResult = validatePasswordConfirm(newPassword,passwordConfirm);

	if(passwordValidateResult == true && passwordConfirmValidateResult == true){
		var params = {'ex_password':exPassword,'new_password':newPassword,'new_password_confirm':passwordConfirm,'is_request_password':isRequestApprovalPassword}
		$.post('/approval/password/modify',params,function(data){
			var d = JSON.parse(data);
			alert(d.message);
			if(d.result == 100){
				document.location.reload();
			}else if(d.result === 102){
				$("input[name='ex_password']").select();
			}else{
				$("input[name='new_password']").select();
			}
			
		});
	}
});

function validatePassword(password){
	if(password == ''){
		return true
	}
	
	var alphaArray = password.match(/[a-zA-Z]/);
	var numberArray = password.match(/[0-9]/);

	if(alphaArray == null || numberArray == null){
		return false;
	}else if(password.length < 10 || password.length > 30){
		return false;
	}else{
		return true;
	}
}

function validatePasswordConfirm(password,passwordConfirm){
	if(password == passwordConfirm){
		return true;
	}else{
		return false;
	}
}


</script>

