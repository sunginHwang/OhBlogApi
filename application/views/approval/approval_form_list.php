<link rel="stylesheet" href="/css/jquery.treeview.css">
<link rel="stylesheet" href="/css/documents/content.css">
<link rel="stylesheet" href="/css/documents/header.css">
<link rel="stylesheet" href="/css/approval/bookmark.css">
<link rel="stylesheet" href="/css/ladda-themeless.min.css">
<link rel="stylesheet" href="/css/fontello.css" />
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css" />
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css" />
<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="/css/default.css" />
<style>
.tempClass{
	background-color:#d8efd5 !important;
}
.wrapper {
	padding:10px 0;
}
.wrapper .header{
	height:50px;
	padding-top:10px;
}
.wrapper .header .title{
	
}
.wrapper .header .save_btn{
	
}
.wrapper .header #pagingBar{
	
}
.table_check_group tr
{
	cursor: pointer;
}
.top_right_menu{
	position:absolute;
	right:15px;
	top:-35px;
	width: 90px;
}
.all{
}
.often_use{
	display:none;
}
.nav-tabs>li, .nav-tabs>li.active,.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus
{
	cursor: pointer;
}

.input-group-btn .btn, .form-control, .input-group-addon {padding: 5px 12px; }
.form-control{height: 32px;}

.table{border-bottom: 1px solid #ddd; border-top: 1px solid #27af61;}
.table>thead>tr>th{background-color: #f0f0f0; border-bottom: 1px solid #ccc; padding: 9px 8px;}

.input-group-btn .dropdown-toggle{background-color: #ebebeb;}
.input-group-btn.open .dropdown-toggle.btn-default{background-color: #fff;}
a:hover, a:focus{color: #555;}
.pagination-ex .input-group-addon{border-left: 0px;}
.icon-search{border: 0px;}
</style>
<div class="page_title" style="font-size:16px;margin:15px 0 10px 30px; font-weight: bold; color: #777;">
	<span><?php /*echo $page_title; */?>문서양식목록</span>
</div>
<div class="wrapper">
	<div class="col-lg-10 col-md-12 col-sm-12">
		<div class="col-lg-12">
			<ul class="nav nav-tabs">
				<li id="tab_all" class="tab_menu active" data-name="all">
					<a class="">전체</a>
				</li>
				<li id="tab_often" class="tab_menu active" data-name="often_use">
					<a class="">자주쓰는 양식</a>
				</li>
			</ul>
		</div>
		<div class="all col-lg-12">
			<button id="form_open" type="button" class="btn btn-sm btn-success top_right_menu">열기</button>
			<div class="header">
				<span class="title">자주쓰는양식</span>
				<button id="form_save" type="button" class="btn btn-sm btn-warning" style="border: 0px; height: 30px; font-weight: bold;">저장</button>
				<div id="pagingBar" class="minimal_mode" style="display:inline-block;vertical-align:middle">
					<div class="input-group pagination-ex" style="width:230px;">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default"> <!--onclick="location.href='/approval/main/approval_form_list?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=1'"-->
								<i class="icon-to-start"></i>
							</button>
							<button type="button" class="btn btn-default"> <!--onclick="location.href='/approval/main/approval_form_list?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['prevPage']*/?>'"-->
								<i class="icon-left-dir"></i>
							</button>
						</span>
						<input type="text" class="form-control" id="pageSearch" value="<?/*=$pageData['curPage']*/?>1" onkeydown="javascript: if (event.keyCode == 13) {locationPage('all');}" data-url="#/0/page/" data-per="20">
						<span class="input-group-addon">/<?/*=$pageData['totalPage']*/?>3</span>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default"> <!--onclick="location.href='/approval/main/approval_form_list?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['nextPage']*/?>'"-->
								<i class="icon-right-dir"></i>
							</button>
							<button type="button" class="btn btn-default"><!-- onclick="location.href='/approval/main/approval_form_list?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['totalPage']*/?>'"-->
								<i class="icon-to-end"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="font_obj input-group input-group-sm" style="width:222px;float:right;" id="search_input_group">
					<div class="font_obj input-group-btn">
					    <button type="button" class="btn btn-sm btn-default dropdown-toggle" id="searchBaseAll" data-toggle="dropdown"><?/*if($select_param['searchBase']){echo $select_param['searchBase'];} else { echo "양식제목";}*/?>양식제목</button>
					    <!-- <div class="dropdown-backdrop"></div> -->
					    <ul class="dropdown-menu">
					    	<li><a href="javascript:searchBaseChangeAll('양식분류')">양식분류</a></li>
    				    	<li><a href="javascript:searchBaseChangeAll('양식제목')">양식제목</a></li>
    				    	<li><a href="javascript:searchBaseChangeAll('보존기간')">보존기간</a></li>
    				    </ul>
					</div>
					<input type="text" class="form-control" name="search[name]" id="searchNameAll" value="<?/*=$select_param['searchWord']*/?>" onfocus="this.style.background=&quot;#ffffff&quot;;sheetMode=false;" style="background: rgb(255, 255, 255);">
		            <div class="input-group-btn">
						<button type="button" class="btn btn-warning" tabindex="-1" onclick="searchSubmit('all');"><i class="icon-search" style="font-size:18px;"></i></button>
		            </div>
		        </div>
			</div>
			<table id="document_form_table" class="document_form_table table_check_group table table-hover">
				<colgroup>
					<col width="30px">
					<col width="100px">
					<col width="*">
					<col width="80px">
				</colgroup>
				<thead>
					<tr>
						<th><input class="all_check" type="checkbox"/></th>
						<th class="text-center">양식분류</th>
						<th class="text-center">양식제목</th>
						<th class="text-center">보존기간</th>
					</tr>
				</thead>
				<tbody>
<!--					<?/*
					if(sizeof($result) > 0)
					{
						$cnt=1;
						foreach ($result as $rows){ 
						*/?>
						<tr id="allRow_<?/*=$cnt*/?>">
							<td><input class="one_check" type="checkbox" value="<?/*=$rows['form_idx']*/?>" <?/*=$rows['isRepeat'] ? 'disabled' : '';*/?>/></td>
							<td class="text-center"><?/*=$rows['form_name']*/?></td>
							<td><?/*=$rows['title']*/?></td>
							<td class="text-center">
								<?/* if($rows['is_permanent'] === "Y"){
									echo "영구보존";
								}else{
									echo $rows['preservation_year']."년".$rows['preservation_month']."개월";
								}*/?>
							</td>
						</tr>
						<?/*
						$cnt++;				
						} 
					}else{*/?>
					<td colspan="4" align="center">데이터가 없습니다.</td>
					--><?/*
					}					
					*/?>
					<tr id="allRow_1">
						<td><input class="one_check" type="checkbox" value="34"></td>
						<td class="text-center">증명,확인서</td>
						<td>내부 협조 문서</td>
						<td class="text-center">
							영구보존							</td>
					</tr>
					<tr id="allRow_2">
						<td><input class="one_check" type="checkbox" value="33"></td>
						<td class="text-center">증명,확인서</td>
						<td>결재양식 내부기안</td>
						<td class="text-center">
							영구보존							</td>
					</tr>
					<tr id="allRow_3">
						<td><input class="one_check" type="checkbox" value="29" disabled=""></td>
						<td class="text-center">청원서</td>
						<td>대외공문</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_4">
						<td><input class="one_check" type="checkbox" value="19"></td>
						<td class="text-center">기타</td>
						<td>정기총회 대의원 등록계</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_5">
						<td><input class="one_check" type="checkbox" value="18"></td>
						<td class="text-center">청원서</td>
						<td>총회 가입 청원서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_6">
						<td><input class="one_check" type="checkbox" value="17"></td>
						<td class="text-center">청원서</td>
						<td>목회자 인준 청원서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_7">
						<td><input class="one_check" type="checkbox" value="16"></td>
						<td class="text-center">기타</td>
						<td>103차 교세보고서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_8">
						<td><input class="one_check" type="checkbox" value="15"></td>
						<td class="text-center">증명,확인서</td>
						<td>경력 증명서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_9">
						<td><input class="one_check" type="checkbox" value="14"></td>
						<td class="text-center">증명,확인서</td>
						<td>대표자 확인서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
					<tr id="allRow_10">
						<td><input class="one_check" type="checkbox" value="13"></td>
						<td class="text-center">증명,확인서</td>
						<td>사례비 증명서</td>
						<td class="text-center">
							0년0개월							</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="often_use col-lg-12">
		<div class="header">
				<div id="pagingBar" class="minimal_mode" style="display:inline-block;vertical-align:middle">
					<div class="input-group pagination-ex" style="width:230px;">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" onclick="location.href='/approval/main/approval_form_list_often?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=1'">
								<i class="icon-to-start"></i>
							</button>
							<button type="button" class="btn btn-default" onclick="location.href='/approval/main/approval_form_list_often?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['prevPage']*/?>'">
								<i class="icon-left-dir"></i>
							</button>
						</span>
						<input type="text" class="form-control" id="pageSearch" value="<?/*=$pageData['curPage']*/?>" onkeydown="javascript: if (event.keyCode == 13) {locationPage('often');}" data-url="#/0/page/" data-per="20">
						<span class="input-group-addon">/<?/*=$pageData['totalPage']*/?></span>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" onclick="location.href='/approval/main/approval_form_list_often?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['nextPage']*/?>'">
								<i class="icon-right-dir"></i>
							</button>
							<button type="button" class="btn btn-default" onclick="location.href='/approval/main/approval_form_list_often?searchWord=<?/*=$select_param['searchWord']*/?>&searchBase=<?/*=$select_param['searchBase']*/?>&page=<?/*=$pageData['totalPage']*/?>'">
								<i class="icon-to-end"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="font_obj input-group input-group-sm" style="width:222px;float:right;" id="search_input_group">
					<div class="font_obj input-group-btn">
					    <button type="button" class="btn btn-sm btn-default dropdown-toggle" id="searchBaseOften" data-toggle="dropdown"><?/*if($select_param['searchBase']){echo $select_param['searchBase'];} else { echo "양식제목";}*/?></button>
					    <!-- <div class="dropdown-backdrop"></div> -->
					    <ul class="dropdown-menu">
					    	<li><a href="javascript:searchBaseChangeOften('양식분류')">양식분류</a></li>
    				    	<li><a href="javascript:searchBaseChangeOften('양식제목')">양식제목</a></li>
    				    	<li><a href="javascript:searchBaseChangeOften('보존기간')">보존기간</a></li>
    				    </ul>
					</div>
					<input type="text" class="form-control" name="search[name]" id="searchNameOften" value="<?/*=$select_param['searchWord']*/?>" onfocus="this.style.background=&quot;#ffffff&quot;;sheetMode=false;" style="background: rgb(255, 255, 255);">
		            <div class="input-group-btn">
						<button type="button" class="btn btn-warning" tabindex="-1" onclick="searchSubmit('often');"><i class="icon-search" style="font-size:18px;"></i></button>
		            </div>
		        </div>
			</div>
			<button id="form_delete"  type="button" class="btn btn-sm btn-success top_right_menu">삭제</button>

			<table id="often_document_form_table" class="document_form_table table_check_group table table-hover">
				<colgroup>
					<col width="30px">
					<col width="100px">
					<col width="*">
					<col width="80px">
				</colgroup>
				<thead>
					<tr>
						<th><input class="all_check" type="checkbox"/></th>
						<th class="text-center">양식분류</th>
						<th>양식제목</th>
						<th class="text-center">보존기간</th>
					</tr>
				</thead>
				<tbody>
				<tr id="oftenRow_1">
					<td><input class="one_check" type="checkbox" value="4"></td>
					<td class="text-center">청원서</td>
					<td>테스트 문서 양식</td>
					<td class="text-center">
						0년0개월							</td>
				</tr>
				<tr id="oftenRow_2">
					<td><input class="one_check" type="checkbox" value="3"></td>
					<td class="text-center">청원서</td>
					<td>테스트청원서</td>
					<td class="text-center">
						0년0개월							</td>
				</tr>
				<tr id="oftenRow_3">
					<td><input class="one_check" type="checkbox" value="2"></td>
					<td class="text-center">청원서</td>
					<td>대외공문</td>
					<td class="text-center">
						0년0개월							</td>
				</tr>
				<tr id="oftenRow_4">
					<td><input class="one_check" type="checkbox" value="1"></td>
					<td class="text-center">청원서</td>
					<td>ㅏ니ㅓㅇ미ㅏㄹㄴㅇㄹ</td>
					<td class="text-center">
						0년0개월							</td>
				</tr>
					<?/*
					if(sizeof($result) > 0)
					{
						$cnt=1;
						foreach ($result as $rows){
						*/?>
						<tr id="oftenRow_<?/*=$cnt*/?>">
							<td><input class="one_check" type="checkbox" value="<?/*=$rows['form_repeat_idx']*/?>"/></td>
							<td class="text-center"><?/*=$rows['form_name']*/?></td>
							<td><?/*=$rows['title']*/?></td>
							<td class="text-center">
								<?/* if($rows['is_permanent'] === "Y"){
									echo "영구보존";
								}else{
									echo $rows['preservation_year']."년".$rows['preservation_month']."개월";
								}*/?>
							</td>
						</tr>
						<?/*
						$cnt++;
						}
					}else{*/?>
					<!--<td colspan="4" align="center">데이터가 없습니다.</td>-->
					<?/*
					}
					*/?>
				</tbody>
			</table>
		</div>
	</div>
</div>	


<!-- 팝업창 끝 -->
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/spin.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/ladda.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/se/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.edit.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.async.js"></script>
<script type="text/javascript" src="/js/config/document_header.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>

<script type="text/javascript" src="/js/json.js"></script>

<script type="text/javascript">

$(function(){
	var tab = "<?/*=$tab_menu*/?>.all";
	var idx = "";
	if(tab == '.all')
	{
		$("#tab_often").removeClass("active");
		$(".often_use").hide();
		$(".all").show();
		$("#tab_all").addClass("active");
	}
	else{
		$("#tab_all").removeClass("active");
		$(".all").hide();
		$(".often_use").show();
		$("#tab_often").addClass("active");
	}
	$('.tab_menu').bind("click",function(){
		var tabName = $(this).attr("data-name");
		if(tabName == "all"){
			location.href = "./approval_form_list";
		}
		else if(tabName == "often_use"){
			location.href = "./approval_form_list_often";
		}
	});

	$("table.document_form_table tbody").on("click","tr",function (e){
		$(this).parent().find(".tempClass").removeClass("tempClass");
		$(this).find("td").addClass("tempClass");
		idx = $(this).find("input:checkbox").val();
	}).on("click",".tempClass", function(e){
		e.stopPropagation();
		location.href = '/approval/main/create_approval_document/' + idx;
	});
	$("input[type=checkbox]").on("click",function(e){
		e.stopPropagation();
	});
	$('#form_save').click(function(){
		var repeat_arr = new Array();
		$("#document_form_table tbody tr input:checkbox").each(function(){
			if(this.checked == true)
			{
				repeat_arr.push(this.value);
			}
		});
		if(repeat_arr.length == 0)
		{
			alert("선택된 문서가 없습니다.");
			return false;
		}
		$.ajax({
			url : "./insert_document_repeat",
			type : "POST",
			data : {form_idx : repeat_arr},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	});
	
	$('#form_open').click(function(){
		var numberRegExp = /^[1-9]{1}[0-9]{0,}$/;
		if (numberRegExp.test(idx) === false) {
			alert('문서 양식을 선택해 주세요.');
			return;
		}
		location.href = '/approval/main/create_approval_document/' + idx
	});

	$('#form_delete').click(function(){
		var del_arr = new Array();
		$("#often_document_form_table tbody tr input:checkbox").each(function(){
			if(this.checked == true)
			{
				del_arr.push(this.value);
			}
		});
		if(del_arr.length == 0)
		{
			alert("선택된 문서가 없습니다.");
			return false;
		}
		$.ajax({
			url : "./delete_document_repeat",
			type : "POST",
			data : {form_repeat_idx : del_arr},
			success:function(data){
				alert(data);
				location.reload();
			}
		});
	});

	$(".table_check_group .all_check").click(function(){
		$(this).closest(".table_check_group").find(".one_check").prop("checked",$(this).prop("checked"));
	});
	$(".table_check_group .one_check").click(function(){
		var allCheck = true;
		$(this).closest(".table_check_group").find(".one_check").each(function() {
			if(!$(this).prop("checked")){
				allCheck=false;
			}
		});
		$(this).closest(".table_check_group").find(".all_check").prop("checked",allCheck);
	});
});
	function searchBaseChangeAll(baseTitle)
	{
		$("#searchBaseAll").html(baseTitle);
		$("#searchNameAll").val("");
	}
	function searchBaseChangeOften(baseTitle)
	{
		$("#searchBaseOften").html(baseTitle);
		$("#searchNameOften").val("");
	}
	function searchSubmit(view)
	{
		if(view == "all")
		{
			var searchBase = $("#searchBaseAll").html();
			var searchName = $("#searchNameAll").val();
			if(searchBase == "보존기간")
			{
				searchName = searchName.replace(/\s/g, "");
				
			}
			location.href = "./approval_form_list?searchWord="+searchName+"&searchBase="+searchBase;
		}
		else{
			
			var searchBase = $("#searchBaseOften").html();
			var searchName = $("#searchNameOften").val();
			if(searchBase == "보존기간")
			{
				searchName = searchName.replace(/\s/g, "");
			}
			location.href = "./approval_form_list_often?searchWord="+searchName+"&searchBase="+searchBase;
		}
		
	}
	function locationPage(view)
	{
		var searchBase = $("#searchBase").html();
		var searchName = $("#searchName").val();
		var page = $("#pageSearch").val();
		if(view == "all")
		{
			location.href = "./approval_form_list?searchWord="+searchName+"&searchBase="+searchBase+"&page="+page;
		}
		else
		{
			location.href = "./approval_form_list_often?searchWord="+searchName+"&searchBase="+searchBase+"&page="+page;
		}
		
	}
</script>
