<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=10.0, minimum-scale=0.25, user-scalable=yes">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>기독교 한국 침례회 :: 전자결재 :: 결재 문서</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<!--[if lte IE 7]><link rel="stylesheet" href="/css/flat/fontello-ie7.css"><![endif]-->
<link rel="stylesheet" href="/css/fontello-ie7.css">
<link rel="stylesheet" href="/css/default.css" />
<link href="/css/flick/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/documents/content.css">
<link rel="stylesheet" href="/css/documents/header.css">
<script src='/js/jquery-1.10.2.min.js'></script>
<style>
.official_document_header {
	text-align: center; width: 800px; font-family:바탕; padding-top:10px; margin:auto
}
.official_document_header div{
	padding:10px
}

.official_document_footer{
	text-align: center; width: 800px; font-family:바탕; padding-top:20px; font-size:18pt; padding-bottom:40px;margin:auto
}

.official_document_footer div{
	letter-spacing:10px
}

@media print {
	.div_seal_body>div>span{
		color: #ff0000 !important;
	}
}
</style>
</head>
<body style="">
	<div style="text-align:center">
		<?php /*if(isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC) : */?>
			<!-- 공문 헤더 -->
			<div style="" class="div_wrapper official_document_header">
				<div style="font-size:20pt; padding-bottom:0px">기독교한국침례회총회</div>
				<div style="font-size:15pt; font-weight:bold; padding-top:0px">The Korean Baptist Convention</div>
				<div style="border:1px solid #333; width:90%; margin:auto; font-family:굴림; font-size:10pt">우150-870 서울시 영등포구 국회대로 76길 10 / 전화 02-2683-6693 / 전송 02-3666-7007 / kbc6693@naver.com</div>
				<div style="width:90%; height:2px; background:black; padding:0px; margin:auto; margin-top:30px"></div>
			</div>
			<!-- 공문 헤더 -->
		<?php /*endif;*/?>
		<!-- 문서헤더 -->
		<div id="div_header" style="position: relative; border-bottom: 0px !important; <?php echo isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC ? 'border-top: 0px !important' : ''?>" class="div_wrapper">
			<input type="hidden" name="form_header_idx">
			<div id="div_seal_area" class="header_element_area" style="top:<?php /*echo $arr_document['seal_position_y'];*/?>30px; left:<?php /*echo $arr_document['seal_position_x'];*/?>20px">
				<div id="div_approval_seal">
<!--				<?php /*foreach($arr_approval as $approval) :*/?>
					<div class="div_seal">
						<div class="div_seal_header" style="text-align: center; padding-top: 3px">
						<?php /*echo $approval['view_name']*/?>
					</div>
						<div class="div_seal_body text-center" style="padding: 3px">
						<?php /*if($approval['action'] === 'A' && $approval['seal'] !== NULL) : */?>
							<img src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$approval['seal'];*/?>" style="height: 54px; width: 54px" />
						<?php /*elseif($approval['action'] === 'A' && $approval['seal'] === NULL) : */?>
							<div style="margin-top: 16px">
								<span style="border: 2px solid red; padding: 3px; color: red; font-weight: bold;">
									<?php /*echo $approval['real_approval'];*/?>
								</span>
							</div>
						<?php /*elseif($approval['action'] === 'D'  && $approval['seal'] !== NULL) : */?>
							<img src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$approval['seal']; */?>" style="height: 54px; width: 54px" />
						<?php /*elseif($approval['action'] === 'D'  && $approval['seal'] === NULL) : */?>
							<div style="margin-top: 16px">
								<span style="border: 2px solid red; padding: 3px; color: red; font-weight: bold;">
									<?php /*echo $approval['real_approval']; */?>
								</span>
							</div>
						<?php /*elseif($approval['action'] === 'R') : */?>
							<div style="margin-top: 16px">
								<span class="c-tooltip" style="border: 2px solid red; padding: 3px; color: white; font-weight: bold; background: red;" data-toggle="tooltip" data-placement="bottom" title="<?php /*echo $approval['reason']*/?>">
									<?php /*echo '반려';*/?>
								</span>
							</div>
						<?php /*endif;*/?>
					</div>
					</div>
				--><?php /*endforeach;*/?>
				<div style="clear: both"></div>
			</div>
		</div>
			<h1 id="div_title_area" class="header_element_area text-center" style="top:<?php /*echo $arr_document['title_position_y'];*/?>25px; left:<?php /*echo $arr_document['title_position_x'];*/?>40px">
				<span id="span_title" style="cursor: pointer"><?php /*echo $arr_document['title'];*/?>테스트프린트제목</span>
			</h1>
			<div id="div_info_area" class="header_element_area" style="text-align: left; top:<?php /*echo $arr_document['info_position_y'];*/?>25px; left:<?php /*echo $arr_document['info_position_x'];*/?>40px">
				<table class="table_info" style="position: relative;">
					<tbody>
					<tr>
						<th>테스트 문서 제목</th>
						<td>테스트 문서 내용들</td>
					</tr>
<!--					<?php /*foreach($arr_document_info as $document_info) :*/?>
					<tr>
							<th><?php /*echo $document_info['title']*/?></th>
							<td>
							<?php /*if($document_info['addinal_info_idx'] !== APPROVAL_RECEIVER && $document_info['html_title'] != '') : */?>
								<?php /*echo $document_info['html_title']*/?></td>
							<?php /*else : */?>
								<?php /*echo $document_info['value']*/?></td>
							<?php /*endif;*/?>
					</tr>
					--><?php /*endforeach;*/?>
				</tbody>
				</table>
			</div>
<!--			<?php /*foreach($arr_extra_data AS $extra_data): */?>
				<?php /*if($extra_data['type'] == 'txt'): */?>
					<div class="header_element_area document_extra" style="<?php /*echo 'top:' . $extra_data['pos_y'] . 'px; left:' . $extra_data['pos_x'] . 'px'; */?>">
						<span><?php /*echo $extra_data['content']; */?></span>
					</div>
				<?php /*elseif($extra_data['type'] == 'img'): */?>
					<div class="header_element_area document_extra" style="<?php /*echo 'top:' . $extra_data['pos_y'] . 'px; left:' . $extra_data['pos_x'] . 'px;'; */?>">
						<img src="<?php /*echo $extra_data['content']*/?>" style="<?php /*echo 'width:' . $extra_data['width'] . 'px; height:' . $extra_data . 'px;'; */?>" />
					</div>
				<?php /*endif; */?>
			--><?php /*endforeach; */?>
		</div>
		<!-- 문서헤더 -->
		<!-- 문서내용 -->
		<div id="div_content" class="div_wrapper" style="text-align: left; border-top: 0px !important;<!-- --><?php /*echo isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC*/true ? 'border-bottom: 0px !important' : ''?>">
			<?php /*echo $arr_document['content'];*/?>문서내용들
			<div style="clear: both;"></div>
		</div>
		<!-- 문서내용 -->
		<?php /*if(isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC) : */?>
			<!-- 공문 푸터 -->
			<div class="div_wrapper official_document_footer">
				<div>기독교한국침례회총회</div>
				<div>총회장 목사 김대현인간</div>
			</div>
			<!-- 공문 푸터 -->
	<!--	--><?php /*endif;*/?>
	</div>
</body>
<script>
function checkBrowser(){
	var agt = navigator.userAgent.toLowerCase();
	if (agt.indexOf("chrome") != -1) return 'Chrome'; 
	if (agt.indexOf("opera") != -1) return 'Opera'; 
	if (agt.indexOf("staroffice") != -1) return 'Star Office'; 
	if (agt.indexOf("webtv") != -1) return 'WebTV'; 
	if (agt.indexOf("beonex") != -1) return 'Beonex'; 
	if (agt.indexOf("chimera") != -1) return 'Chimera'; 
	if (agt.indexOf("netpositive") != -1) return 'NetPositive'; 
	if (agt.indexOf("phoenix") != -1) return 'Phoenix'; 
	if (agt.indexOf("firefox") != -1) return 'Firefox'; 
	if (agt.indexOf("safari") != -1) return 'Safari'; 
	if (agt.indexOf("skipstone") != -1) return 'SkipStone'; 
	if (agt.indexOf("msie") != -1) return 'Internet Explorer'; 
	if (agt.indexOf("netscape") != -1) return 'Netscape';
	if (agt.indexOf("trident") != -1) return 'Internet Explorer';
	if (agt.indexOf("mozilla/5.0") != -1) return 'Mozilla'; 
}

if(checkBrowser() == 'Internet Explorer')
	$("#div_header, #div_content, .official_document_header, .official_document_footer").css("zoom","80%");
else
	$("#div_header, #div_content, .official_document_header, .official_document_footer").css("zoom","100%");

window.print();


</script>