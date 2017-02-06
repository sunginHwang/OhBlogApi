<style>
	.panel {margin:0 !important; border-radius: 0px; max-width: 1000px;}
	.panel table{margin-bottom:0;}
	.panel table tr th{background-color:#f9f9f9}
	.panel .div_image{height:100px;width:100px;border:solid 1px #ccc;}
	.panel .div_image{height:100px;width:100px;border:solid 1px #ccc;}
	.panel img{height:100%;width:100%;}
	.panel-heading {border-bottom: 0px; border-radius: 0px;}
	
	.file_box .real_file{display:none;}
	.btn-group>.btn, .btn-group-vertical>.btn.file_button{float:right;}
	input[type="text"] {border: 1px solid #ccc; height: 22px;}
</style>
<div class="panel-heading">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title pull-left"></h3>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-primary save_approval_config"><span class="icon-floppy"></span> 저장</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="panel-body">
	<div class="panel panel-default" style="border: 0px;">
		<div id="approval_config_tables">
			<form id="approval_config_form" name="approval_config_form" action="./insertApprovalConfigForm" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action_mode" value="">
				<table class="table table-bordered">
					<colgroup>
						<col width="20%">
						<col width="80%">
					</colgroup>
					<tbody>
						<tr>
							<th class="rowspan text-center">
								문서번호 채번 시점
							</th>
							<td class="rowspan text-left">
								<label><input name="document_sequence_time" type="radio" value="BT0801" <?/*=$checked['seq_create_time']['BT0801']*/?>/>기안시점에 채번</label>
								<label><input name="document_sequence_time" type="radio" value="BT0802" <?/*=$checked['seq_create_time']['BT0802']*/?>/>완결시점에 채번</label>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								문서번호 채번 방식
							</th>
							<td class="rowspan text-left">
								<label><input name="document_sequence_method" type="radio" value="BT0803" <?/*=$checked['seq_create_method']['BT0803']*/?>/>양식별 일련번호 채번</label>
								<label><input name="document_sequence_method" type="radio" value="BT0804" <?/*=$checked['seq_create_method']['BT0804']*/?>/>전체 공통으로 일련번호 채번</label>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								인장 이미지
							</th>
							<td class="rowspan text-left">
								<div>
									<div class="file_box btn-group">
										<input id="seal_image" name="seal_image" class="real_file" type="file"/>
										<input id="stamp_path" class="file_path" type="text" readonly/>
										<button type="button" class="file_button btn btn-xs">찾아보기</button>
									</div>
									<label><input name="seal_image_delete_status" type="checkbox" value="Y"/>삭제</label>
								</div>
								<p>*이미지 크기 150mm x 150mm. 형식 gif, jpg, png</p>
								<div class="div_image" style="<?php /*echo $result['stamp_img'] == '' ? 'display:none':'';*/?>none">
									<img id="img_seal" class="preview" src="/<?/*echo $result['stamp_img'];*/?>" onerror="onErrorLoadingImg(this);">
								</div>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								로고 이미지
							</th>
							<td class="rowspan text-left">
								<div>
									<div class="file_box btn-group">
										<input id="logo_image" name="logo_image" class="real_file" type="file"/>
										<input id="logo_path" class="file_path" type="text" readonly/>
										<button type="button" class="file_button btn btn-xs">찾아보기</button>
									</div>
									<label><input name="logo_image_delete_status" type="checkbox" value="Y"/>삭제</label>
								</div>
								<p>*이미지 크기 150mm x 150mm. 형식 gif, jpg, png</p>
								<div class="div_image" style="<?php /*echo $result['logo_img'] == '' ? 'display:none':'';*/?>none">
									<img id="img_logo" class="preview" src="/<?/*echo $result['logo_img'];*/?>" onerror="onErrorLoadingImg(this);">
								</div>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								서명이미지 사용여부
							</th>
							<td class="rowspan text-left">
								<label><input name="signature_image_status" type="radio" value="Y" <?/*=$checked['sign_img_yn']['Y']*/?>/>사용함</label>
								<label><input name="signature_image_status" type="radio" value="N" <?/*=$checked['sign_img_yn']['N']*/?>true />사용안함</label>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								결재선 중복사용자 지정
							</th>
							<td class="rowspan text-left">
								<label><input name="approval_duplication_status" type="radio" value="Y" <?/*=$checked['dupl_apply_yn']['Y']*/?>/>지정가능</label>
								<label><input name="approval_duplication_status" type="radio" value="N" <?/*=$checked['dupl_apply_yn']['N']*/?>/>지정불가</label>
							</td>
						</tr>
					<!-- 	<tr> 기능명세서에 명시되지 않아 주석처리함
							<th class="rowspan text-center">
								문서함
							</th>
							<td class="rowspan text-left">
								<span>최상위 폴더</span>
	
								<div class="font_obj btn-group">
								    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
								      	전자결재 완료함<span class="caret"></span>
								    </button><div class="dropdown-backdrop"></div>
								    <ul class="dropdown-menu">
			    				    	<li><a href="javascript:alert('a')">a</a></li>
			    				    	<li><a href="javascript:alert('b')">b</a></li>
			    				    </ul>
								</div>
								<label>
									<input name="default_document_status" type="checkbox">
									양식별 기본 문서함 지정
								</label>
							</td>
						</tr> -->
						<tr>
							<th class="rowspan text-center">
								결재선 문서공개
							</th>
							<td class="rowspan text-left">
								<label><input name="approval_document_access_status" type="checkbox" value="Y" <?/*=$checked['apply_line_open_yn']['Y']*/?>/>양식 기안시점에 모든 결재선상의 사용자에게 결재문서 보여줌</label>
							</td>
						</tr>
						<tr>
							<th class="rowspan text-center">
								결재 알림
							</th>
							<td class="rowspan text-left">
								<label><input name="approval_notice_status" type="radio" value="N" <?/*=$checked['apply_push_yn']['N']*/?>/>사용안함</label>
								<label><input name="approval_notice_status" type="radio" value="Y" <?/*=$checked['apply_push_yn']['Y']*/?>/>결재완료 혹은 변려시 기 결재자에게 모두 알림</label>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<script>
$(function(){
	var insert_sucess = "<?/*=$msg*/?>";
	if(insert_sucess)
	{
		alert(insert_sucess);
		approval_config_form.action_mode.value = "";
	}
	$('.file_box .file_button').click(function(){
		$(this).closest(".file_box").find(".real_file").trigger("click");
	});
	$('.file_box .real_file').change(function(){
		$(this).closest(".file_box").find(".file_path").val($(this).val());
		$(this).closest("td").find("div.div_image").show();
	});

	$('.save_approval_config').click(function(){
		var form = document.getElementById("approval_config_form");
		var stampImg = $("#stamp_path").val(); //파일을 추가한 input 박스의 값
		var logoImg = $("#logo_path").val(); //파일을 추가한 input 박스의 값
		form.enctype = 'multipart/form-data';

		var data = new FormData(form);
		if(stampImg != '')  {
			img_file_check(stampImg);
		}

		if (logoImg != '') {
			img_file_check(logoImg);
		}

		approval_config_form.action_mode.value = "insert";
		$.ajax({
			url : "./insertApprovalConfigForm",
			type : "POST",
			cache : false,
			data : data,
			contentType:false,
	        processData:false,
			success:function(data){
				alert(data);
				location.reload();
			}
		});
		
	});

	$(".file_box input[type='file'].real_file").on("change", function() {
		previewImg(this);
	});
});
function img_file_check(filename)
{
	filename = filename.slice(filename.indexOf(".") + 1).toLowerCase(); //파일 확장자를 잘라내고, 비교를 위해 소문자로 만듭니다.
	if(filename != "gif" && filename != "jpg" && filename != "jpeg" && filename != "png")
	{
	 	alert('이미지 파일은 (jpg, png, gif)만 등록 가능합니다.');
	 	return false;
	}	
}

function onErrorLoadingImg(node) {
	//$(node).attr('src', '#');
}

function previewImg(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$(input).closest("td").find("img.preview").attr("src", e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
</script>