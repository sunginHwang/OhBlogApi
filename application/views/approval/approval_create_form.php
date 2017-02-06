<link rel="stylesheet" href="/css/jquery.treeview.css">
<link rel="stylesheet" href="/css/documents/content.css">
<link rel="stylesheet" href="/css/documents/header.css">
<link rel="stylesheet" href="/css/approval/bookmark.css">
<link rel="stylesheet" href="/css/ladda-themeless.min.css">
<style>
.table_file_list {
	width: 100%
}

.table_file_list td:first-child {
	padding: 10px; background: #eee; border: 1px solid #ddd; text-align: center;
}

.table_file_list td {
	padding: 10px; border: 1px solid #ddd; text-align:left;
}

#modal_preview .modal-content{
	padding:20px 0px;
}
#modal_preview #div_header,#modal_preview #div_content{
	border:0px; position:relative;
}

.div_wrapper {
	margin-left: 30px;
	padding: 0px;
}

#div_button .btn-default {
	font-size: 12px;
	font-weight: bold;
	height: 34px;
	background-color: #ebebeb;
}

#div_button .btn-default:hover {
	background-color: #fff;
}

.modal-header {
	padding: 15px 20px;
	border-bottom: 0px;
}

.modal-title .ic_title {
	color: #888;
	font-size: 13px;
}

#div_approval_draft .modal-body {
	padding: 0px 20px;
}

.modal-title {
	font-size: 14px;
	font-weight: bold;
}

#private_table tr>th,
#private_table tr>td {
	border: 1px solid #ccc;
}

#div_approval_line .modal-header {
	border-bottom: 0px;
}

#div_approval_line .modal-body {
	padding: 10px 20px 20px;
}

</style>
<div class="page_title" style="font-size: 16px; margin: 15px 0 20px 30px; font-weight: bold; color: #666; float: left;">
	<span><?php /*echo $page_title; */?>결제 문서 만들기</span>
</div>
<div id="div_button" style="margin: 8px 0px 10px 0px; width: 698px; float: left;">
	<div class="btn-group pull-right">
		<button type="button" class="btn btn-default" onclick="show_approval_line_window();">결재선 설정</button>
		<!-- <button type="button" class="btn btn-default" onclick="$('#div_approval_draft').modal('show');">페이지9</button> -->
		<button type="button" class="btn btn-default" onclick="approval.preview()">미리보기</button>
		<!-- <button type="button" class="btn btn-default">임시저장함</button>
		<button type="button" class="btn btn-default">임시저장</button> -->
		<button type="button" class="btn btn-default default_button" id="button_draft" data-style="zoom-in">상신하기</button>
	</div>
</div>
<div style="clear: both;"></div>
<div class="col-sm-9 col-lg-10 div_wrapper">
	<form id="form1" name="form1" action="/approval/approval/draft" class="form-inline" role="form" enctype="multipart/form-data" method="post" onsubmit="return false;">
		<input type="hidden" name="form_idx" id="form_idx" value="0">
		<input type="hidden" name="document_category" id="document_category">
		<input type="hidden" name="org_name" id="org_name" value="<?php /*echo $org_info['org_name']; */?>테스트 결제이름"/>
		<input type="hidden" name="duty" id="duty" value="<?php /*echo $org_info['duty']; */?>테스트 의무"/>
		<input type="hidden" name="minister_name" id="hidden_minister_name" value="<?php /*echo $minister_name; */?>테스트 기안자"/>
		<input type="hidden" name="private_yn" value=""/>
		<input type="hidden" name="private_opinion" value=""/>
		<div id="div_header" style="position: relative; margin:0px">
			<input type="hidden" name="form_header_idx">
			<div id="div_seal_area" class="header_element_area" style="display: none">
				<div id="div_approval_seal"></div>
			</div>
			<h1 id="div_title_area" class="header_element_area text-center" style="display: none">
				<span id="span_title" style="cursor: pointer">문서 제목을 입력하세요</span>
				<input id="input_title" name="title" type="text" class="form-control" style="width: 70%; display: none; text-align: center; margin: auto;" placeholder="문서 제목을 입력하세요" />
			</h1>
			<div id="div_info_area" class="header_element_area" style="display: none">
				<table class="table_info" style="position: relative;">
					<tbody></tbody>
				</table>
			</div>
		</div>
		<div id="div_content" style="margin:10px 0px 0px; border: 0px; padding: 0px;">
			<textarea name="content" id="ir1" rows="10" cols="100" style="width: 100%; height: 565px; display: none;"></textarea>
		</div>
		<div id="div_files" style="padding-top: 20px; width: 800px; margin-bottom: 50px;">
			<table class="table_file_list">
				<colgroup>
					<col width="20%">
					<col width="*"
				</colgroup>
				<tbody>
					<tr>
						<td>수신 기관</td>
						<td>
							<div id="div_reception">
								<span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>완료 후 공람</td>
						<td>
							<div id="div_completion">
								<span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>첨부 파일<br><button id="add_file">파일첨부</button></td>
						<td>
							<div id="file_area" style="overflow-y: auto;height:60px;">
							</div>
							<!-- <input type="file" name="attach_file"> -->
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
</div>
<!-- 팝업창 시작 -->
<div id="div_approval_line" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<button type="button" class="btn btn-sm" style="float:right; width: 70px;" data-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-success btn-sm" style="width:70px; float:right;margin-right:5px;" onclick="registApprovalInfo();" >확인</button>
    		<div class="font_obj btn-group" style="float:right;margin-right:5px;">
				<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" style="width: 100px;">
					개인결재선<span class="caret"></span>
				</button>
				<div class="dropdown-backdrop"></div>
					<ul class="dropdown-menu">
<!--						<?php /*foreach($arr_approval_bookmark as $bookmark) : */?>
							<li>
								<a href="javascript:bookmark.load('<?php /*echo $bookmark['bookmark_idx'];*/?>')">
									<?php /*echo $bookmark['name'];*/?>
								</a>
							</li>
						<?php /*endforeach;*/?>
						<?php /*if (count($arr_approval_bookmark) == 0): */?>
							<li>
								<a href="#">
									개인결재선이 없습니다.
								</a>
							</li>
						--><?php /*endif; */?>
						<li>
							<a href="#">
								개인결재선이 없습니다.
							</a>
						</li>
					</ul>
				</div>
			<h4 class="modal-title">
				<span class="glyphicon glyphicon-user ic_title"></span>
				결재선 지정
			</h4>
		</div>
    	<div style="height:568px" class="modal-body">
			<div class="panel panel-default col-md-3" style="padding:0px; position:relative; height:100%;">
				<div class="panel-heading" id="tree_header">
					<h5>조직도</h5>
				</div>
				<div class="panel-body" id="org_ajax_tree" style="position:absolute; top:50px; left:0px; right:0px; bottom:0px; overflow-y:scroll"></div>
			</div>
			<div class="col-md-4" style="padding:0px 0px 0px 10px; position:relative; height:100%">
				<div class="panel panel-default ">
					<div class="panel-heading" style="border-bottom: 0px;">
						<div class="input-group">
							<div class="input-group-btn">
								<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" style="border-right: 0px;">
									<span id="position_name">전체 직책</span>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" id="position_code_list" style="max-height: 300px; overflow: auto;">
								</ul>
							</div>
							<input type="text" class="form-control input-sm" id="minister_name" name="minister_name" placeholder="이름">
						</div>
					</div>
					<div class="panel-body" style="position: absolute; left: 10px; right: -1px; top: 50px; bottom: 0; padding: 0; overflow: auto;">
						<table class="table table-bordered" style="border-left: 0px; border-right: 0px;">
							<colgroup>
								<col width="120">
								<col width="90">
								<col width="*">
							</colgroup>
							<tr>
								<th style="border-left: 0px;">소속 조직</th>
								<th>이름</th>
								<th style="border-right: 0px;">직책</th>
							</tr>
						</table>
						<div style="overflow-y: scroll; position: absolute; top: 34px; bottom: 0px; left: 0px; right: 1px; border: 1px solid #ddd;">
							<table class="table table-bordered minister_list">
								<colgroup>
									<col width="120">
									<col width="90">
									<col width="*">
								</colgroup>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default col-md-5" style="border: 0px; box-shadow: none; padding-right: 0px;">
				<div class="panel-body" style="padding: 22px 0 15px;">
					<table class="table_approval_line" style="width:100%">
						<col style="width: 80px;">
						<col>
						<col style="width: 30px;">
						<tr>
							<th></th>
							<th class="line_title"><span style="font-size:14px;">#결재선</span> (결재선순서↓)</th>
							<th></th>
						</tr>
						<tr id="line-approval" data-line="approval">
							<td class="td_item_add_remove" style="vertical-align:top !important;">
								<div style="height:30px;line-height:30px;">
									<label>
										<input id="arbitrary_decision_permission" type="checkbox"/>
										전결권한
									</label>
								</div>
								<button type="button" class="btn btn-default btn-warning btn-sm btn-block btn-select item-approval" data-proc="approval" data-checked="true">
									결재
								</button>
								<button id="btn_reference" type="button" class="btn btn-default btn-sm btn-block btn-select item-reference" data-proc="reference" data-checked="false">
									참조
								</button>
							</td>
							<td class="td_line_list">
								<ul class="list-group" id="ul_approval">

								</ul>
							</td>
							<td class="td_item_up_down">
								<div>
									<button type="button" class="btn btn-default btn-sm btn-block item-up" style="margin: 2px 0 0 2px !important">
										<span class="icon-up-dir"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm btn-block item-down">
										<span class="icon-down-dir"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm btn-block item-cancel" style="width: 25px; margin: 0 0 0 2px !important;">
										<span class="icon-cancel"></span>
									</button>
								</div>
							</td>
						</tr>
					</table>
					
					<table class="table_approval_line" style="width:100%;">
						<col style="width: 80px;">
						<col>
						<col style="width: 30px;">
						<tr>
							<th></th>
							<th class="line_title"><span style="font-size:14px;">#수신기관</span></th>
							<th></th>
						</tr>
						<tr id="line-approval" data-line="reception">
							<td class="td_item_add_remove" style="vertical-align:top !important;">
								<button id="btn_receive_org" type="button" class="btn btn-default btn-sm btn-block btn-select item-reception" data-proc="reception" data-checked="false">
									수신기관
								</button>
								<button id="btn_complete_display_org" type="button" class="btn btn-default btn-sm btn-block btn-select item-completion" data-proc="completion" data-checked="false" style="margin-top: 5px;">
									완료후공람
								</button>
								<button id="btn_add" type="button" class="btn btn-default btn-success btn-sm btn-block item-addition" onclick="lineProcess.add()">
									추가
								</button>
							</td>
							<td class="td_line_list">
								<ul class="list-group" id="ul_reception">

								</ul>
							</td>
							<td class="td_item_up_down">
								<div>
									<button type="button" class="btn btn-default btn-sm btn-block item-cancel" style="width: 25px; margin: 0 0 0 2px !important;">
										<span class="icon-cancel"></span>
									</button>
								</div>
							</td>
						</tr>
					</table>
					
					<table class="table_approval_line" style="width:100%;">
						<col style="width: 80px;">
						<col>
						<col style="width: 30px;">
						<tr>
							<th></th>
							<th class="line_title"><span style="font-size:14px;">#완료후 공람</span></th>
							<th></th>
						</tr>
						<tr id="line-approval" data-line="completion">
							<td class="td_item_add_remove" style="vertical-align:top !important;">
							</td>
							<td class="td_line_list">
								<ul class="list-group" id="ul_completion">

								</ul>
							</td>
							<td class="td_item_up_down">
								<div>
									<button type="button" class="btn btn-default btn-sm btn-block item-cancel" style="width: 25px; margin: 0 0 0 2px !important;">
										<span class="icon-cancel"></span>
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>

<div id="div_approval_draft" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">
				결재선 기안
			</h4>
		</div>
    	<div class="modal-body">
    		<table id="private_table" class="table table-bordered" style="margin-bottom:0;">
    			<colgroup>
					<col width="30%">
					<col width="70%">
				</colgroup>
    			<tr>
    				<th class="rowspan text-center" style="background-color:#f0f0f0;vertical-align:middle;">보안등급</th>
    				<td class="rowspan text-left">
    					<label>
    						<input id="public" name="public" type="checkbox" value="N"/>
    						공개
    					</label>
    					<label>
    						<input id="private" name="private" type="checkbox" value="Y" checked/>
    						비공개
    					</label>
    				</td>
    			</tr>
    			<tr>
    				<th class="rowspan text-center" style="background-color:#f0f0f0;vertical-align:middle;height:100px;">기안자<br/>의견</th>
    				<td class="rowspan text-left" style="position:relative;height:100px;">
    					<textarea id="opnion" style="resize: none; position:absolute;top:0px;bottom:0px;right:0px;left:0px; width: 100%; padding: 10px; border: 0px;"></textarea>
    				</td>
    			</tr>
    		</table>
		</div>
		<div class="modal-footer" style="margin-top:0;text-align:center; border-top: 0px;">
    		<div>
    			<button id="draft" type="button" class="btn btn-warning btn-sm" style="border: 0px;"><span class="ladda-label">결재기안</span></button>
    			<button type="button" class="btn btn-sm" style="width: 70px; margin-left: 0px; border: 0px;">삭제</button>
    		</div>
		</div>
    </div>
  </div>
</div>
<!-- 팝업창 시작 -->

<div id="modal_preview" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content"></div>
	</div>
</div>

<!-- 팝업창 끝 -->
<script type="text/javascript" src="/js/spin.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/ladda.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/se/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.edit.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.async.js"></script>
<script type="text/javascript" src="/js/config/document_header.js"></script>
<script type="text/javascript" src="/js/approval/bookmark.js"></script>
<script type="text/javascript">
var now_period_idx = 1;
var now_category_idx = 2;
var selected_node = null;
var selected_position = null;
var start_minister = 0;
var oEditors = [];

var preservationMonth = 0;
var preservationYear = 0;
var isPermanent = false;

var duplicatedMinister = "<?php /*echo $duplicated_minister; */?>1";
var documentFormIdx = <?php /*echo $document_form_idx; */?>1;

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
		loadForm(documentFormIdx);
	},
	fCreator: "createSEditor2"
});

$(function(){
	// $("#div_seal_area").click(show_approval_line_window);

	$("#span_title").on("click",function(){
		$(this).hide();
		$("#input_title").show().select();
	});
	
	$("#input_title").keydown(function(event){
		if(event.keyCode == 13){
			$("#span_title").text($(this).hide().val()).show();
		}
	}).focusout(function(){
		var title = $(this).val();
		if(title == ''){
			$("#span_title").text($(this).hide().attr("placeholder")).show();
		}else{
			$("#span_title").text($(this).hide().val()).show();
		}
	});

	$("#draft").on("click",function(){
		var ck_flag=0;
		var private_yn = "";
		$("#private_table tr td input:checkbox").each(function(){
			if(this.checked == true)
			{
				ck_flag++;
				private_yn = this.value; 
			}
		});
		if(ck_flag < 1)
		{
			alert("보안등급을 선택해주세요");
			return false;
		}
		else
		{
			document.form1.private_yn.value = private_yn;
		}
		document.form1.private_opinion.value = $("#opnion").val();
		$('#div_approval_draft').modal('hide');
		approval.draft(); 
	});

	$('#div_approval_draft').on('shown.bs.modal', function (e) {
		e.preventDefault();
		$("#opnion").trigger("focus");
	})
	$("#button_draft").on("click",function(){
		if(confirm("결재문서를 상신하시곘습니까?")) {
			$('#div_approval_draft').modal('show');
		}
	});

	$("#public").click(function(){
		if(this.checked == true)
		{
			$("#private").prop("checked", false);
		}
	});
	$("#private").click(function(){
		if(this.checked == true)
		{
			$("#public").prop("checked", false);
		}
	});
	var idx = $("#file_area div:last-child").data("idx");
	$("#add_file").click(function()
	{
		var file_idx = 1;
		
		$("#file_area input:file").each(function(){
			file_idx++;						
		});
		if(!idx)
		{
			idx = 1;
		}

		if(file_idx <= 5) {
			$("#file_area").append("<div id='file_idx" + idx + "' data-idx='" + idx + "'></div>");
			$("#file_idx" + idx).append("<input id='file" + idx + "' type='file' style='display:none;float:left;width:200px;' onchange='file_change(this)' name='file[]'></input>");
			$("#file_idx" + idx + " input:file").trigger("click");
			idx++;
		} else{
			alert("파일은 최대 5개까지만 업로드 가능합니다.");
		}
	});
	$(document).on("click","#file_del",function(){
		$(this).parent().remove();
	});
});
function file_change(obj ,id)
{
	var filePath = $(obj).val();
	if(filePath == ''){
		alert('파일을 등록하세요.');
		return;
	}
	var size = obj.files[0].size/1024;
	var name = obj.files[0].name;
	
	$("#file_area").find("#"+obj.id).parent().append("<div style='float:left;width:350px;'><span class='glyphicon glyphicon-floppy-disk' style='float:left;'></span><span style='width:338px;float:left;white-space: nowrap;overflow:hidden;padding-left:10px;text-overflow:ellipsis;'>"+name+"<span></div>");
	$("#file_area").find("#"+obj.id).parent().append("<div style='float:left; width:150px;'>"+Math.round(size)+"KB</div><div id='file_del' style='float:right;'><span class='glyphicon glyphicon-remove'></span></div>"); 
}
function loadFormList(formCategory)
{
	$.ajax({
		type:'get',
		url:'/approval/approval/load_form_list/'+formCategory,
		dataType:'json'
	}).done(function(d){
		$("#div_form").empty();
		if(d.data.length > 0){
			for(var i=0; i<d.data.length; i++){
				$("<li/>",{class:"list-group-item", text:d.data[i].title, onclick:"loadForm('"+d.data[i].form_idx+"')"}).appendTo("#div_form");
			}
		}else{
			$("<li/>",{class:"list-group-item", text:'문서가 존재하지 않습니다.'}).appendTo("#div_form");
		}
	});
}

infoTable.addTag = function(category,arrKey,arrText,title,categoryIdx){
	var tr = $("<tr/>");
	var td1 = $("<th/>",{text:title});
	var td2;
	var td3 = $("<td/>");

	//문서번호
	if(categoryIdx == "1"){
		var sample = "";
		var date = new Date();
		for(var i=0; i<arrKey.length; i++){
			var key = arrKey[i];
			if (key == "%DL") {
				sample += ' ';
			} else if (key == "%HY") {
				sample += '-';
			} else if (key == "%CL") {
				sample += ':';
			} else if (key == "%ZE") {
				sample += '제';
			} else if (key == "%YE") {
				sample += date.getFullYear();
			} else if (key == "%MO") {
				sample += ("0" + (date.getMonth()+1)).slice(-2);
			} else if (key == "%OR") {
				sample += $("#org_name").val();
			} else if (key == "%CA") {
				var year = date.getFullYear();
				var month = date.getMonth() + 1;
				var cha = year - 1910;

				if (month < 10) {
					cha = cha - 1;
				}
				sample += cha + "차";
			} else if (key == "%KI") {
				sample += '기안';
			} else if (key == "%SI") {
				sample += '신청';
			} else if (key == "%ID") {
				sample += '';
			} else {
				sample += key;
			}
		}

		td2 = $("<td/>",{text:sample});
		td2.append($("<input/>",{type:"hidden", name:"addinal_"+categoryIdx + "[]", value:arrKey.join("-")}));

	//시행일자
	}else if(categoryIdx == "2"){
		
		td2 = $("<td/>",{style:"cursor:pointer"});
		td2.append($("<input/>",{name:"addinal_"+categoryIdx + "[]", class:"datepicker"}).attr("data",arrKey.join("-")));

	//등록일자
	}else if(categoryIdx == "3"){
		
		var date = new Date();
		var arrData = new Array();
		for(var i=0; i<arrKey.length; i++){
			if(arrKey[i] == "%YE"){
				arrData.push(date.getFullYear());
			}else if(arrKey[i] === "%MO"){
				arrData.push(("0" + (date.getMonth()+1)).slice(-2));
			}else if(arrKey[i] === "%DA"){
				arrData.push(date.getDate());
			}
		}
		td2 = $("<td/>",{text:infoTable.getSampleDataFormat(arrData, category)});
		td2.append($("<input/>",{type:"hidden", name:"addinal_"+categoryIdx + "[]", value:arrKey.join("-")}));

	//작성자
	}else if(categoryIdx == "4"){
		var arrData = new Array();

		var date = new Date();
		for(var i=0; i<arrKey.length; i++){
			var key = arrKey[i];
			if (key == "%NA") {
				arrData.push($("#hidden_minister_name").val());
			} else if (key == "%PO") {
				arrData.push($("#duty").val());
			}
		}

		td2 = $("<td/>",{text:arrData.join(" ")});
		td2.append($("<input/>",{type:"hidden", name:"addinal_"+categoryIdx + "[]", value:arrKey.join("-")}));
		
	}else if(categoryIdx == "5"){
		td2 = $("<td/>");
		td2.append($("<input/>",{name:"addinal_"+categoryIdx + "[]", 'class': 'custom_content', 'style':'width:250px'}));
	}else if(categoryIdx == "6"){
		var attr = "";
		var inputType = "hidden";
		var key = arrKey[0];

		if (key == "%OR") {
			attr = $("<span>", {
				'text': "수신자를 선택해주세요",
				'class': "span_receive_empty",
				'data-type': "org"
			}).on("click", show_approval_line_window);
			// attr = $("<span>",{text:"수신자를 선택해주세요",class:"span_receive_empty",data-type:"org"}).on("click",show_approval_line_window);
		} else if (key == "%NA") {
			attr = $("<span>", {
				'text':"수신자를 선택해주세요",
				'class':"span_receive_empty",
				'data-type':"minister"
			}).on("click",show_approval_line_window);
		} else if (key == "%IN") {
			attr = $("<span>", {
				'text':"",
				'class':"span_receive_empty"
			});
			inputType = "text";
		}

		td2 = $("<td/>",{value:category, class:"td_receive", id:"div_reception"}).attr("data", arrKey.join("-")).append(attr);
		td2.append($("<input/>",{type:inputType, class:"custom_content", name:"addinal_"+categoryIdx + "[]"}));
	}else if(categoryIdx == "7"){
		var text = '';
		if (isPermanent === true) {
			text = '영구보존';
		} else {
			text = preservationYear + "년 " + preservationMonth + "개월";
		}
		td2 = $("<td/>",{value:category}).append($("<span/>",{'text': text}));
		td2.append($("<input/>",{type:'hidden', name:"addinal_"+categoryIdx + "[]", value: text}));
	} else if (categoryIdx == "8") {
		var $customInputTitle = $("<input>", {'name': 'custom_title', 'class': 'custom_title', 'width': 70, 'placeholder': '제목'}).on('change', onChangeCustomForm);
		var $customInputContent = $("<input>", {'name': 'custom_content', 'class': 'custom_content', 'placeholder': '내용'}).on('change',onChangeCustomForm);

		td1 = $("<th />").append($customInputTitle)
		td2 = $("<td/>",{value:category});

		td2.append($customInputContent);

		td2.append($("<input>", {'name': 'addinal_' + categoryIdx + '[]', 'class':'addinal_info', type: 'hidden'}));
	}

	tr.append(td1).append(td2).append(td3).appendTo(".table_info tbody");
	$(tr).find(".datepicker").each(function(){

		var arrKey = $(this).attr("data").split("-");
		var arrData = new Array();
		for(var i=0; i<arrKey.length; i++){
			if(arrKey[i] == "%YE"){
				arrData.push("yy");
			}else if(arrKey[i] === "%MO"){
				arrData.push("mm");
			}else if(arrKey[i] === "%DA"){
				arrData.push("dd");
			}
		}
		
		$(this).datepicker().datepicker("option","dateFormat",arrData.join("-"));
	});
	$(tr).find(".spinner").spinner({
		spin: function( event, ui ) {
			if(ui.value >= 10){
				$( this ).spinner( "value", 10 );
				 return false;
			}else if(ui.value <=0){
				$( this ).spinner( "value", 0 );
				 return false;
			}
    }}).spinner("value",5).css("width","20px");
};

function onChangeCustomForm(e) {
	var $tr = $(e.target).closest('tr');
	var title = $tr.find('input.custom_title').val();
	var content = $tr.find('input.custom_content').val();
	var obj = {
		'title': title,
		'content': content
	}

	$tr.find('input.custom_title').val(title);

	$tr.find('input.addinal_info').val(JSON.stringify(obj));
}

function loadForm(formIdx){
	$.ajax({
		type:'get',
		url:'/config/approval_document_content_form/load/'+formIdx+'?convert_macro=true',
		dataType:'json'
	}).done(function(d){
		if(d.result == true){
			var data = d.data;
			$("#document_category").val(data.form_category);
			$("#form_idx").val(data.form_idx);
			isPermanent = data.is_permanent == "Y";
			preservationMonth = data.preservation_month;
			preservationYear = data.preservation_year;
			loadHeaderForm(data.form_header_idx);
			oEditors.getById["ir1"].setIR("");
			oEditors.getById["ir1"].exec("PASTE_HTML", [data.content]);
		} else {
			alert(d.message);
		}
	});
}

function loadFormInfo(formHeader){
	$("input[name='form_header_idx']").val(formHeader.form_header_idx);
	$(".header_element_area").show();
}

function show_approval_line_window(){console.log('1');
/*	if ($("#form_idx").val() <= 0) {
		alert("문서 양식을 불러와 주시기 바랍니다.");
		return;
	}*/

	$("#div_approval_line").modal('show');
}

function registApprovalInfo()
{
	if ($("#form_idx").val() <= 0) {
		alert("문서 양식을 불러와 주시기 바랍니다.");
		return;
	}

	var sealList = $("#form1 #div_approval_seal .div_seal");
	var approvalList = $("#ul_approval li");
	
	if(sealList.length != approvalList.length){
		alert("이 문서에는 결재자가 "+sealList.length +"명 필요합니다");
		return;
	}

	for(var i=1,len=approvalList.length; i<=len; i++){
		var approval = approvalList[i - 1];
		var jsonApprovalMember = $(approval).find("input.list_val").val();
		var approvalMember = new ApprovalMember(JSON.parse(jsonApprovalMember));
		var name = approvalMember.ministerName;
		var duty = approvalMember.duty;

		var $sealHeader = $("#form1 #div_approval_seal .div_seal:nth-child("+i+") .div_seal_header");
		var type = $sealHeader.attr("data-type");
		var text = "";

		if (type == "%PO") {
			text = duty;
		} else if (type == "%NA") {
			text = name;
		} else if (type == "%ET") {
			text = $.trim($sealHeader.find("span").text());
		}

		approvalMember.viewName = text;

		$sealHeader.empty().append($("<span/>",{"text":text}))
			.append($("<input/>",{"type":"hidden", "name":"approval[]", "value":JSON.stringify(approvalMember)}));
	}

	$(".table_approval_line ul[id!='ul_approval']").each(function(){
		
		var targetId = $(this).attr("id").replace("ul_","div_");
		var targetProc = $(this).attr("id").replace("ul_","");
		$("#"+targetId+" input").not("input[name^='addinal_']").remove();

		if($(this).find("li").length == 0){
			$("#"+targetId+" span").empty();
		} else {
			var $receive = $(this).find("li");
			var receiveMinisterList = new Array();
			var receiveOrgList = new Array();
			var orgNameList = new Array();

			$receive.each(function() {
				var jsonReceiveMember = $(this).find("input.list_val").val();
				var receiveMember = new ApprovalMember(JSON.parse(jsonReceiveMember));

				if (receiveMember.orgMinisterIdx > 0) {
					receiveMinisterList.push(receiveMember);

					$("#div_files #" + targetId).append($("<input/>",{"type":"hidden", "name":"receive_minister[]", "value":jsonReceiveMember}))
				} else {
					receiveOrgList.push(receiveMember);

					var orgName = receiveMember.orgName;
					orgName = "[" + orgName + "]";
					orgNameList.push(orgName);

					$("#div_files #" + targetId).append($("<input/>",{"type":"hidden", "name":"receive_org[]", "value":jsonReceiveMember}))
				}
			});

			var orgNames = orgNameList.join(", ");
			var orgVal = "";
			var ministerNames = "";

			if (receiveMinisterList.length == 1) {
				ministerNames = receiveMinisterList[0].ministerName;
			} else if (receiveMinisterList.length > 1) {
				ministerNames = receiveMinisterList[0].ministerName + " 외 " + (receiveMinisterList.length - 1) + "명";
			}

			if (receiveOrgList.length == 1) {
				orgVal = receiveOrgList[0].orgName;
			} else if (receiveOrgList.length > 1) {
				orgVal = receiveOrgList[0].orgName + " 외 " + (receiveOrgList.length - 1) + "기관";
			}

			var text = "";

			if (orgNameList.length == 0) {
				text = ministerNames
			} else {
				text = orgNames + ", " + ministerNames;
			}

			$("#div_files #" + targetId + " span").text(text);
			$("#" + targetId + "[data='%NA'] span").text(ministerNames);
			$("#" + targetId + "[data='%NA'] input").val(ministerNames);
			$("#" + targetId + "[data='%OR'] span").text(orgVal);
			$("#" + targetId + "[data='%OR'] input").val(orgVal);
			$("#div_files #" + targetId).append($("<input/>", {'type':"hidden", 'name':targetProc + "_text", 'value': text}));
		}
	});

	$(".div_wrapper #div_approval_seal>.div_seal").each(function( index, value ){
		var jsonReceiveMember = $("#ul_approval li:eq("+index+") input.list_val").val();
		var receiveMember = new ApprovalMember(JSON.parse(jsonReceiveMember));
		$(this).find(".div_seal_body").text(receiveMember.ministerName)
	});

	$("#div_approval_line").modal('hide');
}

var approval = {
	preview : function(){
		var headerHtml = "<div id='div_header'>"+$("#div_header").html()+"</div>";
		var contentHtml = "<div id='div_content'>"+oEditors.getById["ir1"].getIR()+"</div>";
		var $customTitles = $("#div_header .custom_title");
		var $customContents = $("#div_header .custom_content");

		$("#modal_preview .modal-content").html(headerHtml+contentHtml);
		$("#modal_preview").find('.custom_title').each(function(index) {
			$(this).replaceWith("<span>" + $($customTitles[index]).val() + "</span>");
		});
		$("#modal_preview").find('.custom_content').each(function(index) {
			$(this).replaceWith("<span>" + $($customContents[index]).val() + "</span>");
		});

		$("#modal_preview").modal("show");

	},
	draft : function(){
		var l = Ladda.create(document.querySelector("#draft"));
		
		if($("input[name='form_header_idx']").val() == ''){
			alert("결재 문서를 선택해주세요");
			return;
		}
		
		/*if($("input[name='title']").val() == ''){
			alert("문서 제목을 입력하세요");
			return;
		}*/

		var approval_validation = true;
		$(".div_seal_header").each(function(){
			if($(this).text() == '')
				approval_validation = false;
		});
		if(approval_validation == false){
			alert("결재자를 등록해주세요");
			return;
		}

		
		var approval_text_validation = true;
		$(".div_wrapper  #div_approval_seal .div_seal_body").each(function(){
			if($.trim($(this).text()) == '')
				approval_text_validation = false;
		});
		if(approval_text_validation == false){
			alert("결재선을 지정해주세요1");
			return;
		}

		l.start();
		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
		$("#form1").ajaxForm(function(result){
			var d = JSON.parse(result);
			alert(d.message);
			
			if(d.result == true)
			{
				document.location.href = "/approval/search/list_my_send_approval";
			}
			l.stop();
		}).submit();
	}
}
$(function(){
	lineProcess.duplicatedMinister = duplicatedMinister == "Y";

	$("ul.list-group li.list-group-item").click(function(){
		$(this).closest("ul.list-group").find("li.list-group-item").removeClass("active");
		$(this).addClass("active");
	});

	// 전결 권한 체크박스
	$("#arbitrary_decision_permission").on("change", function() {
		var checked = $(this).prop("checked");

		$("#btn_reference").prop("disabled", checked)
		$("#btn_receive_org").prop("disabled", checked);
		$("#btn_complete_display_org").prop("disabled", checked);

		if (checked === true) {
			$("button.btn-select[data-proc='approval']").trigger("click");
		}
	});

	// 결재, 참조, 수신기관, 완료 후 공람 버튼 클릭 시
	$("button.btn-select").on("click", function() {
		var $selBtn = $("button.btn-select");
		$selBtn.removeClass("btn-warning");
		$selBtn.attr("data-checked", false);

		$(this).addClass("btn-warning");
		$(this).attr("data-checked", true);
	});
});
	
</script>
<script id="add_seal_form" type="text/html">
<div class="div_seal">
<div class="div_seal_header" data-type="[data_type]"><span>[txt_data]</span></div>
	<div class="div_seal_body text-center" style="padding-top: 7px">
	</div>
</div>
</script>