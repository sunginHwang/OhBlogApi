<?php include('config_header.php')?>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">

<style>
.table_config th {
	text-align: center
}
</style>
<div class="col-xs-12 col-md-8">
	<div class="panel panel-default" style="margin-top: 30px">
		<div class="panel-body">
			<form action="/approval/config/modify" method="post"
				onSubmit="return _confirm()">
				<table class="table table-bordered">
					<tr>
						<td class="col-xs-2">알림설정</td>
						<td><div class="radio">
								<label> <input type="radio" name="is_notification"
									id="is_notification1" value="Y"
									<?php /*echo $arr_config['is_notification'] === 'Y' ? 'checked' : ''*/?>>
									사용함
								</label>
							</div>
							<div class="radio">
								<label> <input type="radio" name="is_notification"
									id="is_notification2" value="N"
									<?php /*echo $arr_config['is_notification'] === 'N' ? 'checked' : ''*/?>>
									사용 안함
								</label>
							</div></td>
					</tr>
					<tr>
						<td>수신 번호</td>
						<td>
						
					<!--	--><?php /*if($cellphone_number === NULL OR $cellphone_number === ''):*/?>
							<div style="padding: 10px">현재 사용중인 휴대폰 번호가 없습니다.</div>
							<div class="form-inline" class="div_cellphone">
								<div class="form-group">
									<select class="form-control input-sm" name="cellphone_number1">
										<option>010</option>
										<option>011</option>
										<option>016</option>
										<option>017</option>
										<option>019</option>
									</select>
								</div>
								<div class="form-group">
									<input class="form-control input-sm" name="cellphone_number2" type="text" maxlength="4"
										style="width: 50px">
								</div>
								<div class="form-group">
									<input class="form-control input-sm" name="cellphone_number3" type="text" maxlength="4"
										style="width: 50px">
								</div>
								<div class="form-group">
									<input type="button" class="btn btn-sm default_button"
										value="전화번호 등록" onclick="addCellphoneNumber()">
								</div>
							</div>
<!--							<?php /*else :*/?>
								<?php /*echo $cellphone_number;*/?>
							--><?php /*endif;*/?>
						</td>
					</tr>
					<tr>
						<td>수신 이메일</td>
						<td>
						
<!--						--><?php /*if($email === NULL OR $email === ''):*/?>
							<div style="padding: 10px">현재 사용중인 이메일 없습니다.</div>
							<div class="form-inline" class="div_cellphone">

								<div class="form-group">
									<input class="form-control input-sm" type="text" name="email_id" maxlength="25">
								</div>
								<div class="form-group">
									<small>@</small>
								</div>
								<div class="form-group">
									<input class="form-control input-sm" type="text" name="email_domain" maxlength="25">
								</div>
								<div class="form-group">
									<select class="form-control input-sm" id="select_domain">
										<option value="-1">==선택==</option>
										<option value="naver.com">naver.com</option>
										<option value="gmail.com">gmail.com</option>
										<option value="nate.com">nate.com</option>
										<option value="hanmail.net">hanmail.net</option>
										<option value="hotmail.com">hotmail.com</option>
										<option value="paran.com">paran.com</option>
										<option value="0">직접입력</option>
									</select>
								</div>
								<div class="form-group">
									<input type="button" class="btn btn-sm default_button" onclick="addEmail()"
										value="이메일 등록">
								</div>
							</div>
<!--							<?php /*else :*/?>
								<?php /*echo $email;*/?>
							--><?php /*endif;*/?>
						</td>
					</tr>
				</table>

				<!-- <div style="display: none" id="div_config_detail">
					<table class="table table-bordered table_config">
						<thead>
							<tr>
								<th class="col-xs-2">구분</th>
								<th colspan="2">내용</th>
								<th class="col-xs-4">알림설정</th>
							</tr>
						</thead>
						<tr>
							<td>내가 받은 문서 안내</td>
							<td style="width: 100px">결재 요청</td>
							<td>결재할 문서가 도착시 안내</td>
							<td style="text-align: center"><label class="checkbox-inline"> <input
									type="checkbox" class="require_email" name="is_req_notification_mail" <?php echo $arr_config['is_req_notification_mail'] === 'Y' ? 'checked' : ''?>>
									메일 알림
							</label> <label class="checkbox-inline"> <input type="checkbox" class="require_cell"
									name="is_req_notification_sms" <?php echo $arr_config['is_req_notification_sms'] === 'Y' ? 'checked' : ''?>> 문자 알림
							</label></td>
						</tr>
						<tr>
							<td>내가 올린 문서 안내</td>
							<td>결재 완료 알림</td>
							<td>결재 문서 등록 후 모든 결재가 완료 되었을 경우 안내</td>
							<td style="text-align: center"><label class="checkbox-inline"> <input
									type="checkbox" class="require_email" name="is_cmp_notification_mail" <?php echo $arr_config['is_cmp_notification_mail'] === 'Y' ? 'checked' : ''?>>
									메일 알림
							</label> <label class="checkbox-inline"> <input type="checkbox" class="require_cell"
									name="is_cmp_notification_sms" <?php echo $arr_config['is_cmp_notification_sms'] === 'Y' ? 'checked' : ''?>> 문자 알림
							</label></td>
						</tr>
					</table>
				</div>  -->
				<div class="pull-right">
					<button type="submit" class="btn default_button">저장</button>
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

/*	var email = "<?php echo $email;?>";
	var cellphoneNumber = "<?php echo $cellphone_number;?>";
			*/
	$(function(){

		// 2016-01-05 고객 요청에 의한 주석 사용안함
		/* if($("input[name='is_notification']:checked").val() == 'Y'){
			$("#div_config_detail").slideDown();
		} */

		//알림설정 라디오 버튼 이벤트
		/* $("input[name='is_notification']").change(function(){
			if($(this).val() == 'Y'){
				$("#div_config_detail").slideDown();
			}else{
				$("#div_config_detail").slideUp();
			}
		});
		//알림설정 체크박스 이벤트
		$("input[type='checkbox']").click(function(){
			if($(this).hasClass('require_email') == true){
				if(email == '' || email == null){
					alert('이메일을 먼저 설정해주세요');
					$(this).prop('checked','');
					$("input[name='email_id']").select();
					return;
				}
			}

			if($(this).hasClass('require_cell') == true){
				if(cellphoneNumber == '' || cellphoneNumber == null){
					alert('핸드폰 번호를 먼저 설정해주세요');
					$(this).prop('checked','');
					$("input[name='cellphone_number2']").select();
					return;
				}
			}	
		});

		 */

		//이메일 도메인 셀렉트박스 이벤트
		$("#select_domain").change(function(){
			if($(this).val() == '-1'){
				return;
			}else if($(this).val() == '0'){
				$("input[name='email_domain']").val('').focus();
			}else{
				$("input[name='email_domain']").val($(this).val());
			}
		});

		
	});

	function _confirm()
	{
		if($("input[name='is_notification']:checked").val() == 'Y')
		{
			if((email == '' || email == null) &&(cellphoneNumber == '' || cellphoneNumber == null)){
				alert('수신번호 혹은 수신 이메일을 설정해주세요.');
				$("input[name='cellphone_number2']").select();
				return false;
			}
		}
		if(confirm("설정을 저장합니다")){
			return true;
		}else{
			return false;
		}
	}
	
	function addCellphoneNumber(){
		var param =  {cellphone_number1 : $("select[name='cellphone_number1']").val(), cellphone_number2 : $("input[name='cellphone_number2']").val(), cellphone_number3 : $("input[name='cellphone_number3']").val()}

		$.post("/approval/config/modify_cellphone_number",param,function(data){
			var d = JSON.parse(data);
			alert(d.message);
			if(d.result == 100){
				document.location.reload();
			}else{
				$("select[name='cellphone_number1']").focus();
			}
		});
	}

	function addEmail(){
		var param = {email_id : $("input[name='email_id']").val(), email_domain : $("input[name='email_domain']").val()};

		$.post("/approval/config/modify_email",param,function(data){
			var d = JSON.parse(data);
			alert(d.message);
			if(d.result == 100){
				document.location.reload();
			}else{
				$("input[name='email_id']").focus();
			}
		});
	}
</script>