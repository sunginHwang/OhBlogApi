
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>기독교성결총회</title>
	<link rel="stylesheet" href="/css/fontello.css" />
	<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css" />
	<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css" />
	<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="/css/default.css" />
</head>
<style>
.table_approval_list td {
	vertical-align: middle !important; height: 40px;
}

.table_approval_list thead th {
	text-align: center
}

.table_approval_list tbody td {
	cursor: pointer
}

#approval_present_condition table tr th{
	background-color:#f9f9f9;
}
#approval_present_condition .memo_action{
	color:#2a6496;
	text-decoration:underline;
}
#approval_present_condition .memo_data{
	display:none;
}
#approval_present_condition .memo_data.active{

	display:table-row;
}
#approval_present_condition .memo_data td{
	background-color:#f1f1f1;
}
#approval_present_condition .title{
	font-weight:bold;
	font-size:12px;
	margin-bottom:3px;
}

.table_approval_list .label {
	width: 54px;
	display: inline-block;
	padding: .4em .6em .3em;
}
.table{border-bottom: 1px solid #ddd; border-top: 1px solid #27af61;}
.table>thead>tr>th{background-color: #f0f0f0; border-bottom: 1px solid #ccc; padding: 9px 8px;}
</style>
<div class="page_title" style="font-size: 16px; margin: 15px 0 20px 30px; font-weight: bold; color: #666;">
	<span>내가받은결제</span>
</div>
<div class="col-lg-10 col-md-12 col-sm-12">
	<div class="col-lg-10 col-sm-12">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<form id="form_search" method="get" action="/approval/search/">
					<input type="hidden" name="state" value="">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1,#bs-example-navbar-collapse-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="navbar-form navbar-left" role="search">
							<li class="form-group">
								<select class="form-control input-sm" name="search_condition_range">
									<option value="regi_date" >기안일</option>
									<option value="last_approval_date" <?php /*echo (isset($arr_search['start_date']) OR isset($arr_search['end_date'])) ? ( (isset($arr_search['start_date']) && $arr_search['start_date']['key'] === 'last_approval_date') ? ('selected') : ( (isset($arr_search['end_date']) && $arr_search['end_date']['key'] === 'last_approval_date') ? ('selected') : ('') ) ) : ('')*/?>>결재일</option>
								</select>
							</li>
							<li class="form-group">
								<input class="form-control input-sm datepicker" name="start_date" id="start_date" type="text" value="<?php /*echo isset($arr_search['start_date']) ? $arr_search['start_date']['value'] : ''*/?>">
							</li>
							<li class="form-group">
								<p class="navbar-text">부터</p>
							</li>
							<li class="form-group">
								<input class="form-control input-sm datepicker" name="end_date" id="end_date" type="text" value="<?php /*echo isset($arr_search['end_date']) ? $arr_search['end_date']['value'] : ''*/?>">
							</li>
							<li class="form-group">
								<p class="navbar-text">까지</p>
							</li>
							<li class="form-group dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									기타
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:setDateSearchCondition()">오늘</a>
									</li>
									<li>
										<a href="javascript:setDateSearchCondition('7D')">7일</a>
									</li>
									<li>
										<a href="javascript:setDateSearchCondition('1M')">1개월</a>
									</li>
									<li>
										<a href="javascript:setDateSearchCondition('3M')">3개월</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<hr style="margin: 0px">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<ul class="navbar-form navbar-left" role="search">
							<li class="form-group">
								<select class="form-control input-sm" name="document_category">
									<option value="" <?php /*echo isset($arr_search['document_category']) === FALSE OR $arr_search['document_category']['value'] === '' ? 'selected' : ''*/?>>문서 전체</option>
<!--									<?php /*foreach($arr_document_category as $document_category) : */?>
										<option value="<?php /*echo $document_category['document_category'];*/?>" <?php /*echo isset($arr_search['document_category']) === TRUE && $arr_search['document_category']['value'] === $document_category['document_category'] ? 'selected' : ''*/?>>
											<?php /*echo $document_category['document_category'];*/?>
										</option>
									--><?php /*endforeach;*/?>
										<option value="기타"></option>
										<option value="신청서"></option>
										<option value="증명,확인서"></option>
										<option value="청원서"></option>
								</select>
							</li>
							<li class="form-group">
								<select name="search_condition" class="form-control input-sm">
									<option value="title" <?php /*echo (isset($arr_search['search_value']) === TRUE && $arr_search['search_value']['key'] === 'title') ? 'selected' : ''*/?>>제목</option>
									<option value="sender_name" <?php /*echo (isset($arr_search['search_value']) === TRUE && $arr_search['search_value']['key'] === 'sender_name') ? 'selected' : ''*/?>>기안자</option>
								</select>
							</li>
							<li class="form-group">
								<input name="search_value" type="text" class="form-control input-sm" style="width: 280px" value="<?php /*echo (isset($arr_search['search_value'])) ? $arr_search['search_value']['value'] : ''*/?>">
							</li>
							<li class="form-group">
								<button type="button" class="btn default_button navbar-btn input-sm" onclick="searchApproval()">검색</button>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</nav>
	</div>
	<div class="col-lg-10 col-sm-12">
		<ul class="nav nav-tabs">
			<!--<li class="<?php /*echo (isset($arr_search['state']) === TRUE && $arr_search['state']['value'] === APP) ? 'active' : ''*/?>">-->
			<li class="active">
				<a class="" href="javascript:searchApprovalByState()">전체</a>
			</li>
			<li class="">
				<a class="N" href="javascript:searchApprovalByState('N')">미결재</a>
			</li>
			<li class="">
				<a class="P" href="javascript:searchApprovalByState('P')">진행중</a>
			</li>
			<!--<li class="<?php /*echo (isset($arr_search['state']) === TRUE && $arr_search['state']['value'] === APP) ? 'active' : ''*/?>">-->
			<li>
				<a class="A" href="javascript:searchApprovalByState('A')">결재완료</a>
			</li>
			<!-- <li>
				<a href="javascript:arr_searchApprovalByState('')">수신확인</a>
			</li> -->
			<li class="">
				<a class="R<?php /*echo RET;*/?>" href="javascript:searchApprovalByState('R')">반려</a>
			</li>
		</ul>
	</div>
	<div class="col-lg-10 col-sm-12">
		<table class="table table-striped table-hover table_approval_list">
			<colgroup>
				<col width="90px">
				<col width="*">
				<col width="80px">
				<col width="70px">
				<col width="90px">
				<col width="90px">
				<col width="90px">
				<col width="70px">
			</colgroup>
			<thead>
				<tr>
					<th>문서종류</th>
					<th>제목</th>
					<th>소속</th>
					<th>기안자</th>
					<th>다음결재</th>
					<th>기안일</th>
					<th>시행일</th>
					<th>상태</th>
				</tr>
			</thead>
			<tbody>
<!--				<?php /*if(sizeof($arr_approval_list) === 0) : */?>
					<tr>
					<td colspan="8" style="text-align: center">결재 문서가 없습니다</td>
				</tr>
				<?php /*else : */?><tr>
					<?php /*foreach($arr_approval_list as $my_approval) : */?>
						
				
				
				<tr onclick="loadDocument('<?php /*echo $my_approval['document_idx'];*/?>','<?php /*echo isset($send_category) ? $send_category : '';*/?>')">
					<td style="text-align: center"><?php /*echo $my_approval['document_category'];*/?></td>
					<td><?php /*echo $my_approval['title'];*/?></td>
					<td style="text-align: center"><?php /*echo $my_approval['sender_org_name'];*/?></td>
					<td style="text-align: center"><?php /*echo $my_approval['sender_name'];*/?></td>
					<td style="text-align: center"><?php /*echo $my_approval['current_approval_name'];*/?></td>
					<td style="text-align: center"><?php /*echo $my_approval['regi_date'];*/?></td>
					<td style="text-align: center"><?php /*echo $my_approval[APPROVAL_OPERATION_DATE];*/?></td>
					<td style="text-align: center">
						<h5>
							<?php /*if($my_approval['state'] === APP) : */?>
								<span class="label label-success">결재완료</span>
							<?php /*elseif($my_approval['state'] === RET) : */?>
								<span class="label label-danger">반려</span>
							<?php /*elseif($my_approval['state'] === PRC) : */?>
								<span class="label label-primary">진행중</span>
							<?php /*elseif($my_approval['state'] === NON) : */?>
								<span class="label label-default">미결재</span>
							<?php /*endif;*/?>
						</h5>
					</td>
				</tr>
					<?php /*endforeach;*/?>
					
					<?php /*for($i=0; $i< (APPROVAL_LIMIT-sizeof($arr_approval_list)); $i++) : */?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php /*endfor;*/?>
				--><?php /*endif;*/?>
				<tr onclick="loadDocument('489','')">
					<td style="text-align: center">증명,확인서</td>
					<td></td>
					<td style="text-align: center">총회</td>
					<td style="text-align: center">이범진</td>
					<td style="text-align: center"></td>
					<td style="text-align: center">2016-03-04</td>
					<td style="text-align: center"></td>
					<td style="text-align: center">
						<h5>
							<span class="label label-success">결재완료</span>
						</h5>
					</td>
				</tr>
				<tr onclick="loadDocument('455','')">
					<td style="text-align: center">청원서</td>
					<td>문서의 제목</td>
					<td style="text-align: center">총회</td>
					<td style="text-align: center">천수향</td>
					<td style="text-align: center"></td>
					<td style="text-align: center">2016-01-28</td>
					<td style="text-align: center"></td>
					<td style="text-align: center">
						<h5>
							<span class="label label-success">결재완료</span>
						</h5>
					</td>
				</tr>
				<tr onclick="loadDocument('449','')">
					<td style="text-align: center">신청서</td>
					<td>ㅁㄴㅇㄻㄴㅇㄹ</td>
					<td style="text-align: center"></td>
					<td style="text-align: center"></td>
					<td style="text-align: center"></td>
					<td style="text-align: center">2015-12-16</td>
					<td style="text-align: center"></td>
					<td style="text-align: center">
						<h5>
							<span class="label label-success">결재완료</span>
						</h5>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script>
	function setDateSearchCondition(range){
		var today = new Date();
		var d = new Date();
		
		if(range == null){
		}
		else if(range.indexOf('D') != -1){
			var value = range.substr(0,range.indexOf('D'));
			d.setDate(d.getDate()-value);
		}
		else if(range.indexOf('M') != -1){
			var value = range.substr(0,range.indexOf('M'));
			d.setMonth(d.getMonth()-value);
		}

		var sm = d.getMonth() + 1 < 10 ? ("0" + (d.getMonth() + 1)) : (d.getMonth() + 1);
		var sd = d.getDate() < 10 ? ("0" + d.getDate()) : d.getDate();
		var em = today.getMonth() + 1 < 10 ? ("0" + (today.getMonth() + 1)) : (today.getMonth() + 1);
		var ed = today.getDate() < 10 ? ("0" + today.getDate()) : today.getDate();

		$("#start_date").val(d.getFullYear()+"-"+sm+"-"+sd);
		$("#end_date").val(today.getFullYear()+"-"+em+"-"+ed);
	}

	function loadDocument(documentIdx,sendCategory){
		var url = "/approval/approval/view/"+documentIdx;
		if(sendCategory != ''){
			url+="/view/"+sendCategory;
		}
		document.location.href=url;
	}

	function searchApprovalByState(state){	
		var url = $(".nav-cog").find(".active a").attr("href").split("/")[3];
		$("input[name='state']").val(state);
		$("#form_search").attr("action","/approval/search/"+url).submit();
	}

	function searchApproval(){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		if(start_date && !start_date.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/))
		{
			alert('날짜 형식이 올바르지 않습니다.');
			$('#start_date').focus();
			return false;
		}
		if(end_date && !end_date.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/))
		{
			alert('날짜 형식이 올바르지 않습니다.');
			$('#end_date').focus();
			return false;
		}
		if(start_date && end_date && start_date > end_date){
			alert('검색 시작일이 종료일 보다 늦습니다.');
			$('#end_date').focus();
			return false;
		}
		var url = $(".nav-cog").find(".active a").attr("href").split("/")[3];
		var state = $(".nav-tabs").find(".active a").attr("class");
		$("input[name='state']").val(state);
		$("#form_search").attr("action","/approval/search/"+url).submit();
	}

	$(function(){
		$("input[name='search_value']").on("keydown",function(e){
			if(e.keyCode == 13)
				searchApproval();
		});

		$("#start_date").val($("#start_date").attr("value"));
		$("#end_date").val($("#end_date").attr("value"));

		$(".memo_action").click(function(){
			var memoData = $(this).closest("table").find(".memo_data[data-index="+$(this).attr("data-index")+"]");
			if(memoData.hasClass("active")){
				memoData.removeClass("active");
			}
			else{
				memoData.addClass("active");
			}
		});
		
	});
		

	
</script>