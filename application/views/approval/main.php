<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>기독교성결총회</title>
<!--	<link rel="stylesheet" href="/css/fontello.css" />
	<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css" />
	<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css" />
	<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="/css/default.css" />-->
</head>
<body>
<style>
	.div_wrapper {
		padding: 20px 20px 0px 20px
	}

	th,td {
		text-align: center
	}

	td {
		cursor: pointer
	}

	#table_summary tbody th {
		background: #eee;
	}
</style>
<div style="width: 870px; height: 1000px">
	<div class="div_wrapper">
		<div class="panel panel-default">
			<table id="table_summary" class="table table-bordered">
				<thead>
				<tr>
					<th colspan="2">내가 받은 결재</th>
					<th colspan="4">내가 올린 결재</th>
					<th colspan="2">공람함</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<th>미결재</th>
					<td onclick="javascript:document.location.href='/approval/search/list_my_receive_approval?state=1';">
						<span class="label label-default">1건</span>
					</td>
					<th>상신문서</th>
					<td onclick="javascript:document.location.href='/approval/search/list_my_send_approval';">
						<span class="label label-primary">1건</span>
					</td>
					<th>결재완료</th>
					<td onclick="javascript:document.location.href='/approval/search/list_my_send_approval?state=1';">
						<span class="label label-success">1건</span>
					</td>
					<th>미결재</th>
					<td onclick="javascript:document.location.href='/approval/search/list_reference_display_approval?state=1';">
						<span class="label label-default">1건</span>
					</td>
				</tr>
				<tr>
					<th>결재완료</th>
					<td onclick="javascript:document.location.href='/approval/search/list_my_receive_approval?state=1';">
						<span class="label label-success">1건</span>
					</td>
					<th>반려문서</th>
					<td onclick="javascript:document.location.href='/approval/search/list_my_send_approval?state=1';">
						<span class="label label-danger">3건</span>
					</td>
					<th>수신부서함</th>
					<td onclick="javascript:document.location.href='/approval/search/list_organization_receive_approval'">
						<span class="label label-primary">4건</span>
					</td>
					<th>결재완료</th>
					<td onclick="javascript:document.location.href='/approval/search/list_reference_display_approval?state=1';">
						<span class="label label-success">5건</span>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="div_wrapper">
		<div class="panel panel-default">
			<div class="panel-heading">
				내가받은결재
				<button class="btn btn-default btn-xs pull-right" onclick="document.location.href='/approval/main/list_my_receive_approval';">
					<span class="glyphicon glyphicon-plus"></span>
					<span>더보기</span>
				</button>
			</div>
			<table class="table table-hover">
				<thead>
				<tr>
					<th>문서종류</th>
					<th>제목</th>
					<th>소속</th>
					<th>기안자</th>
					<th>다음결재자</th>
					<th>기안일</th>
					<th>시행일</th>
				</tr>
				</thead>
				<tbody>
					<tr onclick="loadDocument('1')" class="success">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>
					<tr onclick="loadDocument('1')" class="success">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>					<tr onclick="loadDocument('1')">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>					<tr onclick="loadDocument('1')">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>					<tr onclick="loadDocument('1')">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>					<tr onclick="loadDocument('1')" class="success">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>					<tr onclick="loadDocument('1')">
						<td>뷰테스트</td>
						<td>테스트</td>
						<td>황성인1</td>
						<td>황성인2</td>
						<td>황성인3</td>
						<td>2016-03-01</td>
						<td>2016-03-03</td>
					</tr>






<!--				<?php /*foreach($arr_mine['arr_my_approval'] as $my_approval) : */?>
					<tr class="<?php /*echo $my_approval['class'];*/?>" onclick="loadDocument('<?php /*echo $my_approval['document_idx'];*/?>')">
						<td><?php /*echo $my_approval['document_category'];*/?></td>
						<td><?php /*echo $my_approval['title'];*/?></td>
						<td><?php /*echo $my_approval['sender_name'];*/?></td>
						<td><?php /*echo $my_approval['sender_org_name'];*/?></td>
						<td><?php /*echo $my_approval['current_approval_name'];*/?></td>
						<td><?php /*echo $my_approval['regi_date'];*/?></td>
						<td><?php /*echo $my_approval[APPROVAL_OPERATION_DATE];*/?></td>
					</tr>
				--><?php /*endforeach;*/?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="div_wrapper">
		<div class="panel panel-default">
			<div class="panel-heading">
				내가올린결재
				<button class="btn btn-default btn-xs pull-right" onclick="document.location.href='/approval/main/list_my_send_approval';">
					<span class="glyphicon glyphicon-plus"></span>
					<span>더보기</span>
				</button>
			</div>
			<table class="table table-hover">
				<thead>
				<tr>
					<th>문서종류</th>
					<th>제목</th>
					<th>소속</th>
					<th>기안자</th>
					<th>다음결재자</th>
					<th>기안일</th>
					<th>시행일</th>
				</tr>
				</thead>
				<tbody>
				<tr onclick="loadDocument('1')" class="success">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
				<tr onclick="loadDocument('1')">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
				<tr onclick="loadDocument('1')">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
				<tr onclick="loadDocument('1')">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
				<tr onclick="loadDocument('1')">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
				<tr onclick="loadDocument('1')">
					<td>뷰테스트</td>
					<td>테스트</td>
					<td>황성인1</td>
					<td>황성인2</td>
					<td>황성인3</td>
					<td>2016-03-01</td>
					<td>2016-03-03</td>
				</tr>
<!--				<?php /*foreach($arr_mine['arr_my_document'] as $my_approval) : */?>
					<tr class="<?php /*echo $my_approval['class'];*/?>" onclick="loadDocument('<?php /*echo $my_approval['document_idx'];*/?>')">
						<td><?php /*echo $my_approval['document_category'];*/?></td>
						<td><?php /*echo $my_approval['title'];*/?></td>
						<td><?php /*echo $my_approval['sender_name'];*/?></td>
						<td><?php /*echo $my_approval['sender_org_name'];*/?></td>
						<td><?php /*echo $my_approval['current_approval_name'];*/?></td>
						<td><?php /*echo $my_approval['regi_date'];*/?></td>
						<td><?php /*echo $my_approval[APPROVAL_OPERATION_DATE];*/?></td>
					</tr>
				--><?php /*endforeach;*/?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/bower_components/underscore/underscore-min.js"></script>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/moment/min/moment-with-locales.min.js?1"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/common.js?20160119" ></script>
<script>
	$(function(){
		$("#table_summary td").mouseover(function(){
			$(this).css("background","#eee");
		}).mouseleave(function(){
			$(this).css("background","#fff");
		});
	});

	function loadDocument(documentIdx){
		document.location.href="/approval/approval/view/"+documentIdx;
	}

	moment.locale('ko');
	var cookieOptions = {path:'/',domain:'.qfun.kr',expires:moment().add(1,'days').toDate()};
</script>

</html>