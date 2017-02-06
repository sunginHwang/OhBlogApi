<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>기독교성결총회</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
	<link rel="stylesheet" href="/css/fontello.css">
	<link rel="stylesheet" href="/css/default.css">
	<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">

</head>
<style>
	.form-control{height: 28px;padding-left: 7px}
	.table-responsive{
		background-color: #f5f5f5;height: 100%;
	}
	.table-responsive > .table {
		text-align: center;border: 1.5px solid;border-color: #DEDEDE;width: 90%; padding-bottom: 15px;
	}
	.table-responsive > .table tr{
		height: 30px; padding: 6px;
	}
	.table-responsive > .table tr:hover{cursor: pointer;}
	.table-responsive > .table th{
	max-width: 250px;text-align: center;border: 1.5px solid;border-color: #DEDEDE;background-color: #EFEFEF;
	min-width: 100px;border-bottom:2px solid; border-bottom-color: #FBA246;
}
.table-responsive > .table td{
	max-width: 250px;text-align: center;background-color: #FFFFFF;
	height: 30px;border: 1.5px solid;border-color: #DEDEDE;
}
	.top-span{
		float: left;font-size: 10px;font-size: 14px; vertical-align:middle;height: 100%;margin-top: 7px;font-weight: 600;
	}
	.top-span-value{
		float: left; color: #FB8501;margin-right: 14px;margin-left: 5px;font-size: 14px;text-align: center;margin-top: 6px;height: 100%;
	}

	.form-control .input-lg select {
		width: 70px; padding: 3px; font-size: 12px; height: 25px; margin-left: 7px; float: left;
	}
	.modal-dialog{
		width: 840px;
		height: 733px;
	}

	.stat-line{
		border:#FAA144 1px dashed; margin-bottom: 10px;
	}

	.attr_name{
		text-align: center;
		background-color: #F3F3F3;
		font-weight: bold;
	}

	.attr_val {
		background-color: #FFFFFF;
	}
	.attr_value{
		text-align: right;
		background-color: #FFFFFF;
	}

	/*모달 헤더 버튼*/
	.btn-default {
		color: #FCA144;
		background-color: #fff;
		border-color: #FCA144;
		width: 73px; height: 23px;padding: 0px;
		font-weight: bold;
	}
	.btn-success{
		background-color: #FCA144;
		border-color: #FCA144;
		color: #FFFFFF;
		width: 50px; height: 23px;padding: 0px;
		margin-right: 10px;
		font-weight: 900;
	}
	.form-control{border-right: none;}
	.stat-textArea{
		line-height: 40px;
	}
	.sub_title{
		font-weight: 700;
	}
	/*서브 텍스트*/
	.stat-sub-value{
		color:#FCA144;
		margin-left: 5px;
		font-weight: bold;
	}
	.stat-yelloLine{
		color: #FCA144;background-color: #FCA144;width: 3px;height: 12px;float: left;margin-right: 5px;display: table-cell;vertical-align: middle;
	}
	.table > .table-bordered{
		border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
	}
	.table-responsive .table .confirm td{background-color: #fff9ec;}
	.well .well-lg > span{margin-bottom: 5px;}
</style>
<body>
<div class="table-responsive stat">
	<div class="row" style="height: 35px; text-align: center;padding-left: 7px;margin: 0px;width: 90%;">
		<select class="form-control input-lg" style="width: 70px; padding: 3px; font-size: 12px; height: 25px; float: left;margin-top: 5px"><option>2016</option><option>2015</option></select>
		<span class="top-span" style="margin-left: 11px">총교회</span><span class="top-span-value" style="color: #0f0f0f">210</span>
		<span class="top-span">승인완료</span><span class="top-span-value">210</span>
		<span class="top-span">승인 미완료</span><span class="top-span-value">210</span>
		<div class="input-group" style="width:145px;height: 25px;float: right;margin-top: 5px ">
			<input type="text" class="form-control" placeholder="교회이름" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2" style="border-left:none;background-color: #ffffff;padding: 0px;">
				<button class="glyphicon glyphicon-search" aria-hidden="true" style="background-color: #ffffff;color: #FCA144;"></button>
			</span>
		</div>
	</div>
	<table class="table">
		<colgroup>
			<col width="90px">
			<col width="65px">
			<col width="75px">
			<col width="70px">
			<col width="70px">
			<col width="70px">
			<col width="80px">
			<col width="85px">
			<col width="70px">
			<col width="70px">
			<col width="70px">
			<col width="110px">
		</colgroup>
		<thead>
		<tr >
			<th>지방</th>
			<th>교회수</th>
			<th>전체교인</th>
			<th>세례교인</th>
			<th>신입교인</th>
			<th>청년회</th>
			<th>세례교인(아동)</th>
			<th>미세례교인(아동)</th>
			<th>교역자수</th>
			<th>목사</th>
			<th>전도사</th>
			<th>전체결산액</th>
		</tr>
		</thead>
		<tbody>
		<tr class="confirm">
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr class="confirm">
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr class="confirm">
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		</tbody>
	</table>
	<table class="table">
		<colgroup>
			<col width="90px">
			<col width="65px">
			<col width="75px">
			<col width="70px">
			<col width="70px">
			<col width="70px">
			<col width="80px">
			<col width="85px">
			<col width="70px">
			<col width="70px">
			<col width="70px">
			<col width="110px">
		</colgroup>
		<thead>
		<tr>
			<th>지방</th>
			<th>교회수</th>
			<th>전체교인</th>
			<th>세례교인</th>
			<th>신입교인</th>
			<th>청년회</th>
			<th>세례교인(아동)</th>
			<th>미세례교인(아동)</th>
			<th>교역자수</th>
			<th>목사</th>
			<th>전도사</th>
			<th>전체결산액</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>			<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>			<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>			<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>			<tr>
			<td>서울중앙</td>
			<td>5,215</td>
			<td>2,215,015</td>
			<td>2,215,152</td>
			<td>2,120,315</td>
			<td>2,417,151</td>
			<td>1,215,156</td>
			<td>2,120,315</td>
			<td>244,171</td>
			<td>1,215</td>
			<td>2,125</td>
			<td>154,151,210,125</td>
		</tr>
		</tbody>
	</table>
</div>
<!--모달창-->
<div id="modal_processing" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="processing_modal_label" aria-hidden="true"  >
	<div class="modal-dialog modal-lg">
		<div id="modal_content_processing" class="modal-content" style="overflow-y: auto; overflow-x: hidden">
			<div class="modal-header" style="height: 45px;margin-top: 13px;margin-left: 10px">
				<div style="float: left;">
					<h4 class="modal-title" style="font-weight: 900;font-size: 17px;float: left;margin-right: 7px">교사통계보고서</h4>
					<span style="width: 75px;height: 25px;background: #f5f5f5;border-radius: 10px;float: left;text-align: center;line-height: 25px;font-weight: bold"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> 승인완료</span>
				</div>
					<div class="print_none" style="float: right">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true" onclick="statConfirmClick();">수정요청</button>
						<button class="btn btn-default btn-sm btn-success" data-toggle="modal" onclick="statConfirmClick();">승인</button>
						<button type="button" class="close" aria-label="Close" style="height: 25px;width: 25px"><span aria-hidden="true">x</span></button>
					</div>
					<div style="clear: both;"></div>
			</div>
			<div class="modal-body" style="max-height: 700px;">
				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left">작성자</div>
						<div style="float: left">
							<span class="stat-sub-value">역촌교회</span>
							<span style="margin-left: 10px">최초입력일</span>
							<span class="stat-sub-value">2015.05.08</span>
						</div>
					</div>

					<table class="table table-bordered"">
						<colgroup>
							<col width="85px">
							<col width="*">
							<col width="85px">
							<col width="*">
							<col width="85px">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<td class="attr_name">교회명</td>
							<td class="attr_val" >역촌교회</td>
							<td class="attr_name">지방회</td>
							<td class="attr_val" >서울서지방</td>
							<td class="attr_name">감찰회</td>
							<td class="attr_val" >서울서지방</td>
						</tr>
						<tr>
							<td class="attr_name">교회번호</td>
							<td class="attr_val">123</td>
							<td class="attr_name">교회주소</td>
							<td class="attr_val" colspan="3">테스트기안일시</td>
						</tr>
						</tbody>
					</table>
				</div>

				<hr class="stat-line">
				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left">교역자</div>
						<div style="float: left;margin-left: 28px">
							<span>합계</span>
							<span class="stat-sub-value">000</span>
							<span>명</span>
						</div>
					</div>
					<br/>
						<table id="table_approval" class="table table-bordered" style="width: 705px;">
						<colgroup>
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
						</colgroup>
						<tbody>
						<tr>
							<td  class="attr_name">목사(남)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">목사(여)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">전도사(남)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">전도사(여)</td>
							<td  class="attr_value">1명</td>
						</tr>
						</tbody>
					</table>
					</div>
				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left">직원</div>
						<div style="float: left;margin-left: 28px">
							<span style="margin-left: 9px">합계</span>
							<span class="stat-sub-value">000</span>
							<span>명</span>
						</div>
					</div>
					<table class="table table-bordered" style="width: 700px; margin-bottom: 3px">
						<colgroup>
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
						</colgroup>
						<tbody>
						<tr>
							<td  class="attr_name">장로(남)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">장로(여)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">권사(남)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">권사(여)</td>
							<td  class="attr_value">1명</td>
						</tr>
						</tbody>
					</table>
					<table class="table table-bordered" style="width: 410px">
						<colgroup>
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
							<col width="85px">
							<col width="90px">
						</colgroup>
						<tbody>
						<tr>
							<td  class="attr_name">안수집사</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">집사(남)</td>
							<td  class="attr_value">1명</td>
							<td  class="attr_name">집사(여)</td>
							<td  class="attr_value">1명</td>
						</tr>
						</tbody>
					</table>
				</div>
				<hr class="stat-line">
				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left;height: 15px">교인</div>
						<div style="float: left;margin-left: 28px;height: 15px">
							<span>전체합계</span>
							<span class="stat-sub-value">000</span>
							<span >명</span>
							<span style="margin-left: 7px">남</span>
							<span class="stat-sub-value">00</span>
							<span>명</span>
							<span style="margin-left: 7px">여</span>
							<span class="stat-sub-value">00</span>
							<span>명</span>
						</div>
					</div><br/>
					<div style="width: 50%;float: left;">
						<br/>
						<div class="stat-textArea">
							<!--<div class="stat-yelloLine" ></div>-->
							<div class="sub_title" style="float: left">세례교인</div>
							<div style="float: left;margin-left: 50px">
								<span>합계</span>
								<span class="stat-sub-value">000</span>
								<span style="margin-right: 10px">명</span>
								<span>*만 15세 이상</span>
							</div>
						</div>
						<table class="table table-bordered" style="width: 350px;margin-bottom: 0px;">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td class="attr_name">집사남</td>
								<td class="attr_val" >1명</td>
								<td class="attr_name">집사(여)</td>
								<td class="attr_val" >1명</td>
							</tr>
							</tbody>
						</table>
						<br/>
						<div class="stat-textArea" >
							<!--<div class="stat-yelloLine" ></div>-->
							<div class="sub_title" style="float: left">유아 및 유소년 세례교인</div>
							<div style="float: left;margin-left: 20px">
								<span>합계</span>
								<span class="stat-sub-value">000</span>
								<span style="margin-right: 10px">명</span>
							</div>
						</div>
						<br/>
						<table class="table table-bordered" style="width: 350px">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td class="attr_name">집사남</td>
								<td class="attr_val" >1명</td>
								<td class="attr_name">집사(여)</td>
								<td class="attr_val" >1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div style="width: 50%;float: right;">
						<div style="float: right">
							<br/>
							<div class="stat-textArea">
							<!--	<div class="stat-yelloLine" ></div>-->
								<div class="sub_title" style="float: left">신입교인</div>
								<div style="float: left;margin-left: 50px">
									<span>합계</span>
									<span class="stat-sub-value">000</span>
									<span>명</span>
								</div>
							</div>
							<br/>
							<table class="table table-bordered" style="width: 350px;float: right;margin-bottom: 0px;">
								<colgroup>
									<col width="85px">
									<col width="90px">
									<col width="85px">
									<col width="90px">
								</colgroup>
								<tbody>
								<tr>
									<td class="attr_name">집사남</td>
									<td class="attr_val" >1명</td>
									<td class="attr_name">집사(여)</td>
									<td class="attr_val" >1명</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div style="float: right">
							<br/>
							<div class="stat-textArea">
								<!--<div class="stat-yelloLine" ></div>-->
								<div class="sub_title" style="float: left">세례받지 않은 학생회, 유초등부</div>
								<div style="float: left;margin-left: 50px">
									<span>합계</span>
									<span class="stat-sub-value">000</span>
									<span style="margin-right: 10px">명</span>
								</div>
							</div>
							<br/>
							<table class="table table-bordered" style="width: 350px;float: right">
								<colgroup>
									<col width="85px">
									<col width="90px">
									<col width="85px">
									<col width="90px">
								</colgroup>
								<tbody>
								<tr>
									<td class="attr_name">집사남</td>
									<td class="attr_val" >1명</td>
									<td class="attr_name">집사(여)</td>
									<td class="attr_val" >1명</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<hr class="stat-line">

				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left">기관</div>
						<div style="float: left;margin-left: 28px">
							<span style="margin-left: 9px">합계</span>
							<span class="stat-sub-value">000</span><span>명</span>
						</div>
					</div>
					<table class="table table-bordered" style="width: 705px">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
								<tr>
									<td  class="attr_name">남전도회</td>
									<td  class="attr_value">1명</td>
									<td  class="attr_name">여전도회</td>
									<td  class="attr_value">1명</td>
									<td  class="attr_name">청년회(남)</td>
									<td  class="attr_value">1명</td>
									<td  class="attr_name">청년회(여)</td>
									<td  class="attr_value">1명</td>
								</tr>
						</table>
				</div>
				<hr class="stat-line">
				<div>
					<div class="stat-textArea">
						<div class="sub_title" style="float: left">부서</div>
						<div style="float: left;margin-left: 28px">
							<span style="margin-left: 9px">합계 / 학생(남) </span>
							<span class="stat-sub-value">00</span><span>명</span>
							<span style="margin-left: 9px">학생(여) </span>
							<span class="stat-sub-value">00</span><span>명</span>
							<span style="margin-left: 9px">교사(남) </span>
							<span class="stat-sub-value">00</span><span>명</span>
							<span style="margin-left: 9px">교사(여) </span>
							<span class="stat-sub-value">00</span><span>명</span>
						</div>
					</div>
						<table class="table table-bordered">
							<colgroup>
								<col width="155px">
								<col width="155px">
								<col width="155px">
								<col width="155px">
								<col width="155px">
							</colgroup>
							<thead>
								<tr>
									<th class="attr_name"></th>
									<th class="attr_name">학생(남)</th>
									<th class="attr_name">학생(여)</th>
									<th class="attr_name">교사(남)</th>
									<th class="attr_name">교사(여)</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td  class="attr_name">유치부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_name">유년부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_name">초등부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_name">중등부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_name">고등부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--결산액-->
				<hr class="stat-line">
				<div class="stat-textArea">
					<div class="sub_title" style="float: left;height: 15px">결산액</div>
					<div style="float: left;margin-left: 28px;height: 15px">
						<span>전체합계</span>
						<span class="stat-sub-value">10,000,000,000</span>
						<span>원</span>
					</div>
				</div>
				<br/>
					<div>

						<div class="stat-textArea" style="margin-top: 5px">
							<!--<div class="stat-yelloLine" ></div>-->
							<div class="sub_title" style="float: left">교회</div>
							<div style="float: left;margin-left: 68px">
								<span>합계</span>
								<span class="stat-sub-value">000</span>
								<span>원</span>
							</div>
						</div>
						<br/>
						<table class="table table-bordered" style="width: 700px; margin-bottom: 3px">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td  class="attr_name">남전도회</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">특별회계</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div>
						<br/>
						<div class="stat-textArea">
							<!--<div class="stat-yelloLine" ></div>-->
							<div class="sub_title" style="float: left">기관</div>
							<div style="float: left;margin-left: 68px">
								<span>합계</span>
								<span class="stat-sub-value">000</span>
								<span>원</span>
							</div>
						</div>
						<br/>
						<table class="table table-bordered" style="width: 700px; margin-bottom: 3px">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td  class="attr_name">남전도회</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">여전도회</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">청년회</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div>
						<br/>
						<div class="stat-textArea">
							<!--<div class="stat-yelloLine" ></div>-->
							<div class="sub_title" style="float: left">교회학교</div>
							<div style="float: left;margin-left: 68px">
								<span>합계</span>
								<span class="stat-sub-value">000</span>
								<span>원</span>
							</div>
						</div>
						<br/>
						<table class="table table-bordered" style="width: 700px; margin-bottom: 3px">
							<colgroup>
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td  class="attr_name">유치부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">유년부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">초등부</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_name">중등부</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
						<table class="table table-bordered" style="width: 175px">
							<colgroup>
								<col width="85px">
								<col width="90px">
							</colgroup>
							<tbody>
							<tr>
								<td  class="attr_name">고등부</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="well well-lg" style="width: 100%; height: 80px;display: table;vertical-align:middle; ">
						<span>- 유치부는 영아부를 포함시키고, 유년부는 1-3학년,초등부는 4-6학년이며, 유.초등부는 유치부까지 포함입니다.</span><br/>
						<span>- 경상비 : 주일헌금, 십일조헌금, 월정헌금, 주정헌금, 구역헌금, 절기헌금, 감사헌금</span><br/>
						<span>- 특별회계 : 선교헌금, 교회건축헌금, 교육관건축헌금, 수양관건축헌금, 교역자주택헌금, 기타 목적성 헌금</span>
					</div>

					<!--명단 및 지원내역-->
					<hr class="stat-line">
					<div>
						<div>
							<div class="sub_title stat-textArea" style="float: left">교역자 명단</div>
							<div id="representative_form"class="sub_title stat-textArea" style="float: right;">
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>선택삭제</span>
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>명단추가</span>
							</div>
						</div>
						<table id="table_representative" class="table table-bordered">
							<colgroup>
								<col width="33">
								<col width="150px">
								<col width="150px">
								<col width="150px">
								<col width="152px">
								<col width="152px">
							</colgroup>
							<thead>
								<tr>
									<th class="attr_name"><input type="checkbox" id="all" name="all" onfocus="this.blur()" style="cursor:pointer;" onclick=""></th>
									<th class="attr_name">직위</th>
									<th class="attr_name">성명</th>
									<th class="attr_name">전입월</th>
									<th class="attr_name">전화</th>
									<th class="attr_name">핸드폰</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<hr class="stat-line">
					<div >
						<div>
							<div class="sub_title stat-textArea" style="float: left">장로 명단</div>
							<div id="elder_form"class="sub_title stat-textArea" style="float: right;">
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>선택삭제</span>
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>명단추가</span>
							</div>
						</div>
						<table id="table_elder" class="table table-bordered">
							<colgroup>
								<col width="33px">
								<col width="90px">
								<col width="100px">
								<col width="100px">
								<col width="100px">
								<col width="100px">
								<col width="*">
							</colgroup>
							<thead>
							<tr>
								<th class="attr_name"><input type="checkbox" id="all" name="all" onfocus="this.blur()" style="cursor:pointer;" onclick=""></th>
								<th class="attr_name">사무구분</th>
								<th class="attr_name">성명</th>
								<th class="attr_name">창립일</th>
								<th class="attr_name">전화</th>
								<th class="attr_name">핸드폰</th>
								<th class="attr_name">주소</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>
					<hr class="stat-line">
					<div>
						<div>
							<div class="sub_title stat-textArea" style="float: left">장로 명단</div>
							<div id="total-support_form"class="sub_title stat-textArea" style="float: right;">
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>선택삭제</span>
								<button class="glyphicon glyphicon-minus-sign" aria-hidden="true"></button><span>명단추가</span>
							</div>
						</div>
						<table id="table_total-support" class="table table-bordered">
							<colgroup>
								<col width="33px">
								<col width="45px">
								<col width="140px">
								<col width="150px">
								<col width="100px">
								<col width="160px">
								<col width="160px">
							</colgroup>
							<thead>
							<tr>
								<th class="attr_name"><input type="checkbox" id="all" name="all" onfocus="this.blur()" style="cursor:pointer;" onclick=""></th>
								<th class="attr_name">연번</th>
								<th class="attr_name">지방회(타교단)</th>
								<th class="attr_name">교회(기관)</th>
								<th class="attr_name">교역자(대표자)</th>
								<th class="attr_name">지원금액</th>
								<th class="attr_name">지원기간</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							<tr>
								<td  class="attr_value"><input type="checkbox" name="chk[]" style="cursor:pointer;" hidefocus="true" chkgroup="only"></td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
								<td  class="attr_value">1명</td>
							</tr>
							</tbody>
						</table>
					</div>

			</div>
		</div>
	</div>
</div>


<div id="modal_sub" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="processing_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width: 430px; height: 260px;">
		<div id="modal_sub_processing" class="modal-content" style="top: 80%;">
			<div class="modal-header" style="height: 30px;background-color:#3695D7; ">
				<div style="float: left; ">
					<h6 class="modal-title" style="color: #ffffff">수정요청 문자발송</h6>
				</div>
			</div>
			<div class="modal-body" style="height: 250px;">
				<div style="width: 90%">
					<span>교회에 수정요청하실 항목을 입력해주세요</span><br/>
					<span>최대 90byte 까지 입력하실 수 있습니다.</span>
					<div class="well well-lg" style="width: 100%; height: 40px;margin-bottom: 10px;margin-top: 10px ">
					</div>
					<span style="float: left;font-weight: bold">수정요청해드립니다.</span>
					<span style="float: right" class="stat-sub-value">14byte가 입력되었습니다.</span>
				</div>
				<br/>
				<div style="text-align: center;margin-top: 30px">
					<button class="btn btn-primary" style="width: 62px;height: 27px;font-size: 12px;text-align: center;padding: 0px" onclick="msgSendClick();">문자전송</button>
					<button class="btn btn-default" style="width: 62px;height: 27px;font-size: 12px;border-color: #E0E0E0;color: #666666">취소</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="modal_sub_success" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="processing_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width: 300px; height: 145px;">
		<div id="modal_sub_processing" class="modal-content" style="top: 100%">
			<div class="modal-body" style="height: 145px;padding-top:45px ">
				<div style="text-align: center">
					<h6 class="modal-title" style="font-weight: bold" >메세지 전송이 완료되었습니다.</h6>
					<br/>
					<button class="btn btn-primary" style="width: 62px;height: 27px;font-size: 12px;text-align: center;padding: 0px">저장</button>
				</div>
			</div>

		</div>
	</div>
</div>



</body>
<script src="/bower_components/underscore/underscore-min.js"></script>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/moment/min/moment-with-locales.min.js?1"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/common.js" ></script>
<script>
	$(".table-responsive .table").on("click","tr",function (e){
		$("#modal_processing").modal();
/*
		$("#modal_sub").modal();
		$("#modal_sub_success").modal();
*/


	})
	function statConfirmClick(){
		$("#modal_sub").modal('show');

	}
	function msgSendClick(){
		$("#modal_sub").modal('hide');
		$("#modal_sub_success").modal();

	}
	moment.locale('ko');
	var cookieOptions = {path:'/',domain:'.qfun.kr',expires:moment().add(1,'days').toDate()};


</script>

</html>