<?php include('form_header.php')?>
<link rel="stylesheet" href="/css/documents/header.css">
<link rel="stylesheet" href="/css/documents/content.css">
<style>
	#div_content, #div_header {
		border: 0px;
		width: auto;
	}
	#div_empty_header, #div_header {
		border-bottom: 1px solid #ccc;
	}
</style>
<div class="col-lg-12" style="background: #f3f3f3; padding: 0px; bottom:0px; top:46px; position:absolute">
	<form id="form" action="/config/approval_document_content_form/save" method="post">
		<input type="hidden" name="title">
		<input type="hidden" id="form_header_idx" name="form_header_idx" value="-1">
		<input type="hidden" id="form_idx" name="form_idx" value="-1">
		<input type="hidden" id="form_category" name="form_category" value="-1">
		<input type="hidden" name="preservation_year" value="0" />
		<input type="hidden" name="preservation_month" value="0" />
		<input type="hidden" name="is_permanent" value="N" />

		<div class="col-lg-12" style="background: #f3f3f3; padding: 0px;">
			<nav class="navbar" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand format_title" href="#" style="font-size: 15px; font-weight: bold;">새 양식 작성</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="nav-content">
						<ul class="nav navbar-nav">
							<li class="c-tooltip" title="새 양식" data-placement="bottom">
								<a href="javascript:loadNewForm()" >
									<span class="glyphicon glyphicon-file"></span>
								</a>
							</li>
							<li class="c-tooltip" title="저장" data-placement="bottom">
								<a href="javascript:saveForm()">
									<span class="glyphicon glyphicon-floppy-disk"></span>
								</a>
							</li>
							<li id="li_delete" class="c-tooltip" title="삭제" style="display: none" data-placement="bottom">
								<a href="javascript:deleteForm()">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</li>
							<li class="dropdown c-tooltip" title="로드" data-placement="top">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<span class="glyphicon glyphicon-folder-open"></span>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu" style="max-height: 500px; overflow: auto">
<!--								<?php /*foreach($arr_document_form as $document_form) : */?>
									<li>
										<a href="javascript:loadForm('<?php /*echo $document_form['form_idx']; */?>')">
											<?php /*echo $document_form['title']*/?>
										</a>
									</li>
								<?php /*endforeach;*/?>
								
								<?php /*if(empty($arr_document_form) === TRUE) : */?>
									<li class="disabled">
										<a>저장된 양식이 없습니다.</a>
									</li>
								--><?php /*endif;*/?>
							</ul>
							</li>
							<li class="dropdown c-tooltip" title="헤더" data-placement="top">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<span class="glyphicon glyphicon-th-list"></span>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu" style="max-height: 500px; overflow: auto">
<!--								<?php /*foreach($arr_form_header as $form_header) : */?>
									<li>
										<a href="javascript:loadHeaderForm('<?php /*echo $form_header['form_header_idx']; */?>')">
											<?php /*echo $form_header['title']; */?>
										</a>
									</li>
								--><?php /*endforeach;*/?>
								
<!--								<?php /*if(empty($arr_form_header) === TRUE) : */?>
									<li>
										<a href="/config/document_form/approval_document_header_config_form">헤더 양식을 먼저 설정해주세요</a>
									</li>
								--><?php /*endif;*/?>
							</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div style="border: 1px solid #ccc; width: 800px; margin-left: 15px;">
				<div id="div_empty_header" style="height: 100px; background-color: #fff;">
					<h3 style="padding: 35px; text-align: center;">
						<span class="glyphicon glyphicon-th-list" style="font-size: 21px; color: #777;"></span>
						아이콘 클릭해서 헤더 불러오기
					</h3>
				</div>
				<div id="div_header" style="position: relative; display: none; background-color: #fff;">
					<!-- 문서종류제목 영역 시작-->
					<h1 id="div_title_area" class="text-center div_drag" style="left: 0px; top: 120px" title="문서 제목 영역">문서종류제목</h1>
					<!-- 문서종류제목 영역 끝 -->
					<!-- 직인 영역 시작-->
					<div id="div_seal_area" class="div_drag" style="left: 390px; top: 10px;">
						<div id="div_approval_seal" class="c-tooltip" title="결재 직인 영역">

						</div>
					</div>
					<!-- 직인 영역 끝 -->
					<!-- 정보 영역 시작-->
					<div id="div_info_area" class="div_drag" style="left: 40px; top: 240px" title="헤더 정보 영역">
						<table class="table_info">
							<tbody>
							</tbody>
						</table>
					</div>
					<!-- 정보 영역 끝-->
				</div>
				<ul id="ul_macro" style="text-align: center;">
					<li class="li_mac li_mac_txt">매크로</li>
<!--					<?php /*foreach($macro_list AS $key => $macro): */?>
						<li class="li_mac" ><button type="button" class="btn btn-xs btn_mac" onclick="onClickMacro('<?php /*echo $macro['macro_txt']; */?>');"><?php /*echo $macro['name']; */?></button> </li>
					--><?php /*endforeach; */?>
				</ul>
				<div id="div_content" style="background-color: #fff;">
					<textarea name="content" id="ir1" rows="10" cols="100" style="width: 100%; height: 500px; display: none;"></textarea>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="modal" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content"></div>
	</div>
</div>
<script src="/js/config/document_header.js"></script>
<script type="text/javascript" src="/js/se/js/HuskyEZCreator.js" charset="utf-8"></script>
<script>
$(function(){
	$(".c-tooltip").tooltip();

	$('.modal .modal-content').on("change", "input[name='is_permanent']", function() {
		var checked = $(this).prop('checked');
		$(".modal .modal-content input[name='preservation_year']").prop('readonly', checked);
		$(".modal .modal-content input[name='preservation_month']").prop('readonly', checked);
	})
});

function saveForm(){
	var isPermanent = $("#form input[name='is_permanent']").val() == "Y";
	$(".modal .modal-content").html($("#modal_save_content").html());
	$(".modal .modal-content input[name='title']").val($("#form input[name='title']").val());
	$(".modal .modal-content input[name='preservation_year']").val(isPermanent == true ? 0 : $("#form input[name='preservation_year']").val());
	$(".modal .modal-content input[name='preservation_month']").val(isPermanent == true ? 0 : $("#form input[name='preservation_month']").val());
	$(".modal .modal-content input[name='is_permanent']").prop("checked", isPermanent);
	$(".modal .modal-content select[name='form_category'] option[value='"+$("#form input[name='form_category']").val()+"']").attr("selected","selected");

	$(".modal .modal-content input[name='preservation_year']").prop('readonly', isPermanent);
	$(".modal .modal-content input[name='preservation_month']").prop('readonly', isPermanent);

	$(".modal").modal().on("hide.bs.modal",function(e){
		$(this).find("input").val("");
	}).on('shown.bs.modal', function (e) {
		$(this).find("input").focus();
	});
}

function _saveForm(){
	var title = $(".modal-content input[name='title']").val();
	var preservationYear = $(".modal-content input[name='preservation_year']").val();
	var preservationMonth = $(".modal-content input[name='preservation_month']").val();
	var isPermanent = $(".modal-content input[name='is_permanent']").prop("checked") == true ? "Y" : "N";
	var formCategory = $(".modal-content select[name='form_category']").val();
    var formHeaderIdx = $("#form_header_idx").val();
	
	if(title.length > 25){
		alert('문서 제목 길이가 너무 깁니다.');
		return;
	}

	if(title.length == 0){
		alert('제목을 입력해주세요');
		$(".modal-content input[name='title']").focus();
		return;
	}

	if(formHeaderIdx == -1){
		alert("헤더를 선택해주세요");
		return;
	}

	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	$("input[name='title']").val(title);
	$("input[name='preservation_year']").val(isPermanent == "Y" ? 0 : preservationYear);
	$("input[name='preservation_month']").val(isPermanent == "Y" ? 0 : preservationMonth);
	$("input[name='is_permanent']").val(isPermanent);
	$("input[name='form_category']").val(formCategory);
	$("#form").ajaxForm(function(result){
		var d = JSON.parse(result);
		alert(d.message);
		if(d.result == true){
			document.location.reload();
		}
	}).submit();
}

infoTable.addTag = function(category,arrKey,arrText,title, categoryIdx){
	var tr = $("<tr/>");
	var td1 = $("<th/>",{text:title});
	var td2 = $("<td/>",{text:this.getSampleDataFormat(arrText, category)});
	var td3 = $("<td/>");

	tr.append(td1).append(td2).append(td3).appendTo(".table_info tbody");
};

function deleteForm(){
	if(confirm("이 양식을 삭제합니다")){
		if($("#form_idx").val() == -1){
			alert("삭제할 문서를 불러와주세요");
			return;
		};
		
		$.ajax({
			type:'get',
			url:'/config/approval_document_content_form/remove/'+$("#form_idx").val(),
			dataType:'json'
		}).done(function(data){
			if(data.result == true){
				document.location.reload();
			}else{
				alert(data.message);
			}
		});
	}
}
	
function loadFormInfo(formHeader){
	$("#div_header").show();
	$("#div_empty_header").hide();
	$("#form_header_idx").val(formHeader.form_header_idx);
}

function loadForm(formIdx){
	$.ajax({
		type:'get',
		url:'/config/approval_document_content_form/load/'+formIdx,
		dataType:'json'
	}).done(function(d){
		if(d.result == true){
			loadHeaderForm(d.data.form_header_idx);
			oEditors.getById["ir1"].setIR("");
			oEditors.getById["ir1"].exec("PASTE_HTML", [d.data.content]);
			$("#li_delete").css("display","block");
			$(".navbar-brand").text(d.data.title + " 수정");
			$("#form_idx").val(d.data.form_idx);
			$("#form input[name='form_category']").val(d.data.form_category);
			$("#form input[name='title']").val(d.data.title);
			$("#form input[name='preservation_year']").val(d.data.preservation_year);
			$("#form input[name='preservation_month']").val(d.data.preservation_month);
			$("#form input[name='is_permanent']").val(d.data.is_permanent);
			$("#form").attr("action","/config/approval_document_content_form/modify");
		}else{
			alert(d.message);
		}
	});
}

function loadNewForm(){
	if(confirm("새 양식을 작성합니다")){
		document.location.reload();
	}
}

var oEditors = [];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/js/se/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				
		bUseVerticalResizer : true,		
		bUseModeChanger : true,		
		fOnBeforeUnload : function(){}
	},
	fOnAppLoad : function(){
	},
	fCreator: "createSEditor2"
});

function onClickMacro(txt) {
	var html = "<span class='macro_wrapper'>" + txt + "</span>";
	oEditors.getById["ir1"].exec("PASTE_HTML", [html]);
}

</script>
<script id="add_seal_form" type="text/html">
	<div class="div_seal">
	<div class="div_seal_header" style="padding-top: 5px;">[txt_data]</div>
		<div class="div_seal_body text-center" style="padding-top: 7px">
			
		</div>
	</div>
</script>
<script id="modal_save_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">저장될 양식의 제목을 입력해주세요</h4>
</div>
<div class="modal-body">
	<div style="height:20px">
		<div class="col-sm-3">
			<select class="form-control" name="form_category">
<!--				<?php /*foreach($arr_form_category as $code => $form_category) : */?>
					<option value="<?php /*echo $code*/?>">
						<?php /*echo $form_category;*/?>
					</option>
				--><?php /*endforeach;*/?>
			</select>
		</div>
		<div class="col-sm-9">
			<input name="title" type="text" class="form-control" maxLength="25">
		</div>
	</div>
	<div style="height:20px; margin-top: 25px;">
		<div class="col-sm-3" style="padding-top: 10px;">보존기간</div>
		<div class="col-sm-9">
			<div class="col-sm-3" style="padding-left: 0px;">
				<div class="input-group">
					<input name="preservation_year" type="text" class="form-control col-sm-3" maxLength="2" />
					<div class="input-group-addon">년</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<input name="preservation_month" type="text" class="form-control col-sm-3" maxlength="2" />
					<div class="input-group-addon">개월</div>
				</div>
			</div>
			<div class="col-sm-3 checkbox"><label><input type="checkbox" name="is_permanent" /> 영구보존</label></div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button" onclick="_saveForm()">저장</button>
</div>
</script>