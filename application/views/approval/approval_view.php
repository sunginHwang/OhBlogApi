<link rel="stylesheet" href="/css/documents/content.css">
<link rel="stylesheet" href="/css/documents/header.css">
<link rel="stylesheet" href="/css/jcarousel/jcarousel.connected-carousels.css">
<link rel="stylesheet" href="/css/jquery.treeview.css">
<link rel="stylesheet" href="/css/ladda-themeless.min.css">
<style>
.c-tooltip,.c-tooltip span {
	z-index: 999
}

#div_title_area {
	z-index: -1
}

#div_comment {
	margin: auto; width: 800px;
}

#div_footer {
	margin: 10px auto 0px; width: 800px;;
}

.div_wrapper {
	margin-left: 30px !important;
}

#table_comment th {
	width: 150px; text-align: center; vertical-align: middle !important
}

#table_comment td {
	word-break: break-all
}

.official_document_header {
	text-align: center; width: 800px; border: 1px solid #ccc; border-bottom: 0px !important; font-family:바탕; padding-top:10px
}
.official_document_header div{
	padding:10px
}

.official_document_footer{
	text-align: center; width: 800px; border: 1px solid #ccc; border-top: 0px !important; font-family:바탕; padding-top:20px; font-size:18pt; padding-bottom:40px
}

.official_document_footer div{
	letter-spacing:10px
}

.table_footer {
	width: 100%
}

.table_footer td:first-child {
	background: #eee; text-align: center;
}

.table_footer td {
	padding: 10px; border: 1px solid #ccc; text-align:left;
}

.attr_name {
	background-color: #f3f3f3;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	font-weight: bold;
}

.sub_title {
	font-weight: bold;
}

.table-bordered>thead>tr>th {
	text-align: center;
	background-color: #f3f3f3;
	font-weight: bold;
}

.table-bordered>tbody>tr {
	border-bottom: 1px solid #ddd;
}

.approval_reason {
	display: none;
}

.text-center {
	text-align: center;
}

td a {
	color: #428bca;
}

.modal-title {
	font-weight: bold;
	color: #555;
}

.modal-header {
	border-bottom: 0px;
}

.modal-footer {
	border-top: 0px;;
}

#modal .modal-header {
	padding: 25px 30px 15px;
}

#modal .modal-footer {
	padding: 15px 30px 25px;
	margin-top: 0px;
}

#modal .modal-footer .btn {
	width: 70px;
}

#modal .modal-footer .btn+.btn {
	margin-left: 0px;
}

#modal .btn {
	height: 32px;
}

#modal .btn-default {
	border: 0px;
	background-color: #e0e0e0;
}

#modal .btn-primary {
	background-color: #3276b1;
}

#modal .btn-success {
	background-color: #47a447;
}

#modal .proc_type .btn-danger {
	background-color: #f86a53;
	bo
}

#modal .modal-body {
	padding: 5px 15px 0px;
}

#modal .modal-footer .btn:hover {
	opacity: .7;
}
#modal .modal-footer .default_button:hover {
	color: #fff;
}
</style>
<div class="page_title" style="font-size: 16px; margin: 15px 0 20px 30px; font-weight: bold; color: #666;">
	<span><?php /*echo $page_title; */?></span>
</div>

<!-- 증명서 발급 위한 증명서 확인 및 수정 페이지 버튼 -->
<div style="position: relative; margin-bottom: 15px; background-color: #f3f3f3; width: 800px; text-align: right; padding: 15px;" class="div_wrapper">
<!--	<?php /*if ($has_master_authority === TRUE && in_array($arr_document['state'], array('N', 'P')) === TRUE): */?>
		<a class="btn btn-default btn-success btn-sm" href="/approval/main/modify_approval_document/<?php /*echo $document_idx; */?>">문서 수정</a>
	--><?php /*endif; */?>
	<?php /*if ($approval_info['approval_turn'] === TRUE) : */?>
		<button class="btn btn-default btn-success btn-sm" onclick="approvalDocument.openReasonModal()">결재</button>
<!--	--><?php /*endif;*/?>
	<button class="btn btn-default btn-success btn-sm" onclick="approvalDocument.openProcessingModal()">결재 현황</button>
	<button class="btn btn-default btn-success btn-sm" onclick="approvalDocument.print('<?php /*echo $document_idx; */?>1','<?php /*echo $send_category; */?>1')">
		<span class="glyphicon glyphicon-print"></span>
		결재 문서 인쇄
	</button>
<!--	<?php /*if($application && $application['has_document'] == 'Y' && $application['korean_qty'] > 0):*/?>
		<button class="btn btn-default btn-primary btn-sm" onclick="approvalDocument.openCertificate(<?php /*echo $application['application_idx']*/?>,'kor')">
		<span class="glyphicon glyphicon-file"></span>
		증명서 확인·수정(국문)
	</button>
	<?php /*endif;*/?>
	<?php /*if($application && $application['has_document'] == 'Y' && $application['english_qty'] > 0):*/?>
		<button class="btn btn-default btn-primary btn-sm" onclick="approvalDocument.openCertificate(<?php /*echo $application['application_idx']*/?>,'eng')">
		<span class="glyphicon glyphicon-file"></span>
		증명서 확인·수정(영문)
	</button>-->
		<button class="btn btn-default btn-primary btn-sm" onclick="approvalDocument.openCertificate(<?php /*echo $application['application_idx']*/?>'temp','kor')">
			<span class="glyphicon glyphicon-file"></span>
			증명서 확인·수정(국문)
		</button>

	<?php /*endif;*/?>
<!--	<?php /*if($arr_document['state'] === APP) : */?>
		<button class="btn btn-warning btn-sm" onclick="approvalDocument.openDocumentCategoryModal()">
		<span class="glyphicon glyphicon-folder-open"></span>
		문서함으로 이관
	</button>
	--><?php /*endif;*/?>
<!--	--><?php /*if(sizeof($arr_file) > 0) :*/?>
		<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			첨부파일
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
<!--				<?php /*foreach($arr_file as $file):*/?>
					<li>
				<a href="/approval/approval/attach_download/<?php /*echo $file['file_idx']*/?>"><?php /*echo $file['description']=='' ? $file['origin_file_name'] : $file['description']*/?></a>
			</li>
				--><?php /*endforeach;*/?>
			</ul>
	</div>
<!--	--><?php /*endif;*/?>
</div>
<div style="padding-bottom: 300px">
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
		<div id="div_seal_area" class="header_element_area" style="top:<?php /*echo $arr_document['seal_position_y'];*/?>10px; left:<?php /*echo $arr_document['seal_position_x'];*/?>10px">
			<div id="div_approval_seal">
<!--				<?php /*foreach($arr_approval as $approval) :*/?>
					<div class="div_seal">
					<div class="div_seal_header c-tooltip" style="text-align: center; padding-top: 3px" title="<?php /*echo $approval['name'];*/?>">
							<?php /*echo $approval['view_name'];//$approval['org_name'].' '.$approval['position']*/?>
					</div>
					<div class="div_seal_body text-center" style="padding: 3px">
						<?php /*if($approval['action'] === 'A' && $approval['seal'] !== NULL) : */?>
							<?php /*if(($approval['approval_auth'] === APP_AUTH_PROXY OR $approval['approval_auth'] === APP_AUTH_MINE) && $approval['next_action'] === 'N') : */?>
								<img src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$approval['seal'];*/?>" style="height: 54px; width: 54px; cursor: pointer" onclick="approvalDocument.cancel('<?php /*echo $approval['approval_idx'];*/?>');" />
							<?php /*else : */?>
								<img src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$approval['seal'];*/?>" style="height: 54px; width: 54px" />
							<?php /*endif;*/?>
						<?php /*elseif($approval['action'] === 'A' && $approval['seal'] === NULL) : */?>
							<div style="margin-top: 16px">
								<?php /*if(($approval['approval_auth'] === APP_AUTH_PROXY OR $approval['approval_auth'] === APP_AUTH_MINE) && $approval['next_action'] === 'N') : */?>
									<span style="border: 2px solid red; padding: 3px; color: red; font-weight: bold; cursor: pointer" onclick="approvalDocument.cancel('<?php /*echo $approval['approval_idx'];*/?>');">
										<?php /*echo $approval['real_approval'];*/?>
									</span>
								<?php /*else : */?>
									<span style="border: 2px solid red; padding: 3px; color: red; font-weight: bold;">
										<?php /*echo $approval['real_approval'];*/?>
									</span>
								<?php /*endif;*/?>
							</div>
						<?php /*elseif($approval['action'] === 'D'  && $approval['seal'] !== NULL) : */?>
							<img src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$approval['seal'];*/?>" style="height: 54px; width: 54px" />
						<?php /*elseif($approval['action'] === 'D'  && $approval['seal'] === NULL) : */?>
							<div style="margin-top: 16px">
								<span style="border: 2px solid red; padding: 3px; color: red; font-weight: bold;">
									<?php /*echo $approval['real_approval']; */?>
								</span>
							</div>
						<?php /*elseif($approval['action'] === 'R') : */?>
							<div style="margin-top: 16px">
								<?php /*if($approval['approval_auth'] === APP_AUTH_PROXY OR ($approval['approval_auth'] === APP_AUTH_MINE && $approval['next_action'] !== NULL)) : */?>
								<span class="c-tooltip" style="cursor: pointer; border: 2px solid red; padding: 3px; color: white; font-weight: bold; background: red;" data-toggle="tooltip" data-placement="bottom" title="<?php /*echo $approval['reason']*/?>" onclick="approvalDocument.cancel('<?php /*echo $approval['approval_idx'];*/?>');">
									<?php /*echo '반려';*/?>
								</span>
								<?php /*else : */?>
								<span class="c-tooltip" style="border: 2px solid red; padding: 3px; color: white; font-weight: bold; background: red;" data-toggle="tooltip" data-placement="bottom" title="<?php /*echo $approval['reason']*/?>">
									<?php /*echo '반려';*/?>
								</span>
								<?php /*endif;*/?>
							</div>
						<?php /*endif;*/?>
					</div>
				</div>
				--><?php /*endforeach;*/?>
				<div style="clear: both"></div>
			</div>
		</div>
		<h1 id="div_title_area" class="header_element_area text-center" style="top:<?php /*echo $arr_document['title_position_y'];*/?>10px; left:<?php /*echo $arr_document['title_position_x'];*/?>30px">
			<span id="span_title" style="cursor: pointer"><?php /*echo $arr_document['title'];*/?>테스트결제문서제목</span>
		</h1>
		<div id="div_info_area" class="header_element_area" style="top:<?php /*echo $arr_document['info_position_y'];*/?>10px; left:<?php /*echo $arr_document['info_position_x'];*/?>10px">
			<table class="table_info" style="position: relative;">
				<tbody>
<!--					<?php /*foreach($arr_document_info as $document_info) :*/?>
					<tr>
						<th><?php /*echo $document_info['title']*/?></th>
						<td data-placement="left" title="<?php /*echo $document_info['html_title']*/?>" class="c-tooltip">
							<?php /*echo $document_info['value']*/?>
						</td>
					</tr>
					--><?php /*endforeach;*/?>
				</tbody>
			</table>
		</div>

<!--		<?php /*foreach($arr_extra_data AS $extra_data): */?>
			<?php /*if($extra_data['type'] == 'txt'):*/?>
				<div class="header_element_area document_extra" style="<?php /*echo 'top:' . $extra_data['pos_y'] . 'px; left:' . $extra_data['pos_x'] . 'px'; */?>">
					<span><?php /*echo $extra_data['content']; */?></span>
				</div>
			<?php /*elseif($extra_data['type'] == 'date'):*/?>
				<div class="header_element_area document_extra" style="<?php /*echo 'top:' . $extra_data['pos_y'] . 'px; left:' . $extra_data['pos_x'] . 'px'; */?>">
					<span><?php /*echo date("Y").'-'.date("m").'-'.date("d");*/?></span>
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
	<div id="div_content" class="div_wrapper"<!-- style="text-align: center; border-top: 0px !important; --><?php /*echo isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC ? 'border-bottom: 0px !important' : ''*/?>">
		<div style="display: inline-block;">
			<?php /*echo $arr_document['content'];*/?>
			<div style="clear: both;"></div>
		</div>
	</div>
	<!-- 문서내용 -->
	<?php /*if(isset($send_category) === TRUE && $send_category === CODE_RECEIVE_REC) : */?>
		<!-- 공문 푸터 -->
		<div class="div_wrapper official_document_footer">
			<div>기독교한국침례회총회</div>
			<div>총회장 목사 김대현</div>
		</div>
		<!-- 공문 푸터 -->
	<?php /*endif;*/?>
	
	<!-- 뭐냐 뭐시기 거시기 저시기 수신, 공람 테미블 -->
	<div id="div_footer" class="div_wrapper">
		<table class="table_footer">
			<colgroup>
				<col width="20%">
				<col width="*"
			</colgroup>
			<tbody>
			<tr>
				<td>수신 기관</td>
				<td>
					<div id="div_reception">
<!--						<?php /*if(empty($arr_receiver['BT0401']['name']) === FALSE) : */?>
							<span class="c-tooltip" data-placement="right" title="<?php /*echo implode(', ', $arr_receiver['BT0401']['name']);*/?>">
								<?php /*echo $arr_receiver['BT0401']['text'];*/?>
							</span>
						--><?php /*endif;*/?>
					</div>
				</td>
			</tr>
			<tr>
				<td>완료 후 공람</td>
				<td>
					<div id="div_completion">
<!--						<?php /*if(empty($arr_receiver['BT0403']['name']) === FALSE) : */?>
							<span class="c-tooltip" data-placement="right" title="<?php /*echo implode(', ', $arr_receiver['BT0403']['name']);*/?>">
								<?php /*echo $arr_receiver['BT0403']['text'];*/?>
							</span>
						--><?php /*endif;*/?>
					</div>
				</td>
			</tr>
			</tbody>
		</table>
	</div>

	<!-- 증명서 발급 위한 증명서 확인 및 수정 페이지 버튼 -->
	<!-- 댓글 -->
	<div id="div_comment" class="div_wrapper" style="padding-top: 30px">
		<table class="table table-striped" id="table_comment">
			<colgroup>
				<col width="130px">
				<col width="*">
				<col width="80px">
			</colgroup>
			<thead>
				<tr>
					<th style="border: 0px"><?php /*echo $writer_name;*/?>홍길동</th>
					<td>
						<form id="form_comment" method="post" action="/approval/comment/write" onsubmit="return false">
							<input type="text" name="content" class="form-control input-sm" />
							<input type="hidden" name="document_idx" value="<?php /*echo $document_idx;*/?>1" />
						</form>
					</td>
					<td style="padding: 8px 0px;">
						<button class="btn btn-sm btn-primary" style="width: 100%;" onclick="comment.write()">등록</button>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php /*if(sizeof($arr_comment) === 0) : */?>
					<tr id="tr_empty">
					<td colspan="3" style="text-align: center">댓글을 입력해주세요</td>
				</tr>
<!--				<?php /*else :*/?>
					<tr id="tr_empty" style="display: none">
					<td colspan="3" style="text-align: center">댓글을 입력해주세요</td>
				</tr>
					<?php /*foreach($arr_comment as $comment) : */?>
						<tr id="tr_comment_<?php /*echo $comment['comment_idx']*/?>">
					<th><?php /*echo $comment['writer_name']*/?></th>
					<td><?php /*echo $comment['content']*/?></td>
					<td style="text-align: right;">
								<?php /*if($comment['minister_idx'] == $minister_idx) :*/?>
									<div class="glyphicon glyphicon-remove-sign" style="font-size: 20px; color: #ccc; cursor: pointer;" onclick="comment.remove('<?php /*echo $comment['comment_idx']*/?>')" ></div>
								<?php /*endif;*/?>
							</td>
				</tr>
					<?php /*endforeach;*/?>
				--><?php /*endif;*/?>
			</tbody>
		</table>
	</div>
	<!-- 댓글 -->
</div>
<form id="approval_form">
	<input type="hidden" id="frm_approval_idx" name="approval_idx" value="<?php /*echo $approval_info['approval_idx']; */?>1" />
	<input type="hidden" id="frm_seal" name="seal" value="" />
	<input type="hidden" id="frm_password" name="password" value="" />
	<input type="hidden" id="frm_real_approval_type" name="real_approval_type" value="<?php /*echo $approval_info['real_approval_type'];*/?>1" />
	<input type="hidden" id="frm_reason" name="reason" value="" />

</form>
<div id="modal" class="modal fade bs-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content"></div>
	</div>
</div>
<div id="modal_processing" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="processing_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div id="modal_content_processing" class="modal-content">
			<div class="modal-header">
				<div style="float: left;">
					<h4 class="modal-title">결재 현황</h4>
				</div>
				<div class="print_none" style="float: right">
					<label style="cursor: pointer; padding: 0px 10px;"><input id="print_reason" type="checkbox" style="cursor: pointer;">결재의견 인쇄</label>
					<button type="button" class="btn btn-default btn-sm btn-success" onclick="approvalDocument.printProcessingDetail();">인쇄</button>
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">닫기</button>
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="modal-body" style="max-height: 600px;">
				<div>
					<table class="table table-bordered">
						<colgroup>
							<col width="100px">
							<col width="*">
							<col width="100px">
							<col width="*">
						</colgroup>
						<tbody>
							<tr>
								<td class="attr_name">제목</td>
								<td class="attr_val" colspan="3"><?php /*echo $arr_document['title'];*/?>테스트제목</td>
							</tr>
							<tr>
								<td class="attr_name">기안자</td>
								<td class="attr_val"><?php /*echo $arr_document['drafter']; */?>테스트기안자</td>
								<td class="attr_name">기안일시</td>
								<td class="attr_val"><?php /*echo $arr_document['draft_datetime'];*/?>테스트기안일시</td>
							</tr>
							<tr>
								<td class="attr_name">상신의견</td>
								<td class="attr_val" colspan="3"><?php /*echo $arr_document['private_opinion']; */?>테스트상신의견</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div>
					<div class="sub_title"># 기안 기관</div>
					<table id="table_approval" class="table table-bordered">
						<colgroup>
							<col width="80px">
							<col width="*">
							<col width="80px">
							<col width="160px">
							<col width="80px">
						</colgroup>
						<thead>
							<tr>
								<th>구분</th>
								<th>결재자</th>
								<th>상태</th>
								<th>결재일시</th>
								<th>의견</th>
							</tr>
						</thead>
						<tbody>
	<!--						<?php /*foreach($arr_approval_detail AS $approval_detail): */?>
								<tr class="approval" data-app-idx="<?php /*echo $approval_detail['approval_idx']; */?>">
									<td class="text-center"><?php /*echo $approval_detail['section']; */?></td>
									<td><?php /*echo $approval_detail['approval']; */?></td>
									<td class="text-center"><?php /*echo $approval_detail['state']; */?></td>
									<td class="text-center"><?php /*echo $approval_detail['approval_datetime']; */?></td>
									<td class="text-center">
										<?php /*if (count($approval_detail['arr_reason']) > 0): */?>
											<a href="#" onclick="approvalDocument.toggleReason(this);">있음</a>
										<?php /*else: */?>
											<span>없음</span>
										<?php /*endif; */?>
									</td>
								</tr>
								<?php /*foreach($approval_detail['arr_reason'] AS $reason): */?>
									<tr class="approval_reason" data-app-idx="<?php /*echo $approval_detail['approval_idx']; */?>">
										<td colspan="5">- <?php /*echo $reason['reason']; */?></td>
									</tr>
								<?php /*endforeach; */?>
							--><?php /*endforeach; */?>
						</tbody>
					</table>
				</div>
				<div>
					<div class="sub_title"># 수신 기관</div>
					<table class="table table-bordered">
						<colgroup>
							<col width="80px">
							<col width="*">
							<col width="80px">
							<col width="240px">
						</colgroup>
						<thead>
							<tr>
								<th>구분</th>
								<th>수신자</th>
								<th>상태</th>
								<th>조회일시</th>
							</tr>
						</thead>
						<tbody>
	<!--						<?php /*foreach($arr_receiver_detail AS $receiver_detail): */?>
								<tr>
									<td class="text-center">접수</td>
									<td><?php /*echo $receiver_detail['receiver_name']; */?></td>
									<td class="text-center"><?php /*echo $receiver_detail['state']; */?></td>
									<td class="text-center"><?php /*echo $receiver_detail['read_datetime']; */?></td>
								</tr>
							--><?php /*endforeach; */?>
								<tr>
									<td class="text-center">접수</td>
									<td>수신네스트이름</td>
									<td class="text-center">읽기</td>
									<td class="text-center">2016-06-06</td>
								</tr>
						</tbody>
					</table>
				</div>
				<div>
					<div class="sub_title"># 공람 현황</div>
					<table class="table table-bordered">
						<colgroup>
							<col width="80px">
							<col width="*">
							<col width="240px">
						</colgroup>
						<thead>
							<tr>
								<th>구분</th>
								<th>열람자</th>
								<th>조회일시</th>
							</tr>
						</thead>
						<tbody>
<!--							<?php /*foreach($arr_displays_detail AS $displays_detail): */?>
								<tr>
									<td class="text-center">공람</td>
									<td><?php /*echo $displays_detail['receiver_name']; */?></td>
									<td class="text-center"><?php /*echo $displays_detail['read_datetime']; */?></td>
								</tr>
							--><?php /*endforeach; */?>
								<tr>
									<td class="text-center">공람</td>
									<td>공람자이름</td>
									<td class="text-center">2016-06-06</td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/js/spin.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/ladda.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/jcarousel/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="/js/jquery.treeview.js"></script>
<script src="/js/jquery.treeview.edit.js"></script>
<script src="/js/jquery.treeview.async.js"></script>
<script src="/js/ohjic/print_popup.js"></script>
<script>
$(function(){
	$(".c-tooltip").tooltip();
	$("#form_comment input[name='content']").on("keydown",function(e){
		if(e.keyCode == 13){
			comment.write();
		}
	});
	
});
var approvalDocument = {
	transfer : function(){
		var id = selected_document_category;
		$.ajax({
			type:'post',
			url:'/approval/approval/transfer',
			dataType:'json',
			data: { document_category_idx : selected_document_category, document_idx : $("input[name='document_idx']").val() }
		}).done(function(d){
			if(d.result == true){
				alert(d.message);
				$("#modal").modal('hide');
			}
		});
	},
	print : function(documentIdx, sendCategory){
		window.open("/approval/approval/view/"+documentIdx+"/print/"+sendCategory,"certificate","width=900,height=800,resizable=yes,scrollbars=yes");
	},
	openCertificate : function(application_idx, lang){
		window.open("/approval/approval/certificate/edit/","certificate","width=800,height=850,resizable=yes,scrollbars=yes");
		/*window.open("/approval/approval/certificate/edit/"+application_idx+"/"+lang,"certificate","width=800,height=850,resizable=yes,scrollbars=yes");*/
	},
	openDocumentCategoryModal : function(){
		$("#modal .modal-content").html($("#document_category_content").html());
		$("#modal").modal().off("shown.bs.modal").on("shown.bs.modal", function(e){
			$("#modal .modal-content #tree_panel").empty().treeview({
				url : '/documents/document/get_document_category_list',
				collapsed : false,
				count : true,
				toggle : select_node,
				icon : "icon-folder",
				loadAll : true
			});
		});
	},
	openReasonModal : function(approvalIdx){
		$("#modal .modal-content").html($("#modal_save_content").html());
		$("#modal").modal().on("hide.bs.modal",function(e){
			$(this).find("input").val("");
		}).on('shown.bs.modal', function (e) {
			$(this).find("input[name='reason']").focus();
		});
	},
	returnDocument : function(){
		var cfm = confirm('반려합니다');
		if(cfm == true) {
			var reason = $("#frm_reason").val();
			var approvalIdx = $("#frm_approval_idx").val();
			var password = $("#frm_password").val();
			
			$.ajax({
				type:'post',
				url:'/approval/approval/return_document',
				dataType:'json',
				data: { reason: reason, approval_idx: approvalIdx, password : password }
			}).done(function(d){
				alert(d.message);
				if(d.result == true){
					document.location.reload();
				}
			});
		}
	},
	cancel : function(approvalIdx)
	{
		if(confirm('취소합니다')){
			$.ajax({
				type:'post',
				url:'/approval/approval/cancel',
				dataType:'json',
				data: { approval_idx: approvalIdx }
			}).done(function(d){
				alert(d.message);
				if(d.result == true){
					document.location.reload();
				}
			});
		}
	},
	openSealModal : function(){
		$(".modal .modal-content").html($("#modal_seal_content").html());

		setTimeout(function() {
			(function($) {
				var connector = function(itemNavigation, carouselStage) {
					return carouselStage.jcarousel('items').eq(itemNavigation.index());
				};

				$(function() {
					var carouselStage      = $('.carousel-stage').jcarousel();
					var carouselNavigation = $('.carousel-navigation').jcarousel();

					carouselNavigation.jcarousel('items').each(function() {
						var item = $(this);

						var target = connector(item, carouselStage);

						item
							.on('jcarouselcontrol:active', function() {
								carouselNavigation.jcarousel('scrollIntoView', this);
								item.addClass('active');
							})
							.on('jcarouselcontrol:inactive', function() {
								item.removeClass('active');
							})
							.jcarouselControl({
								target: target,
								carousel: carouselStage
							});
					});

					$('.prev-stage')
						.on('jcarouselcontrol:inactive', function() {
							$(this).addClass('inactive');
						})
						.on('jcarouselcontrol:active', function() {
							$(this).removeClass('inactive');
						})
						.jcarouselControl({
							target: '-=1'
						});

					$('.next-stage')
						.on('jcarouselcontrol:inactive', function() {
							$(this).addClass('inactive');
						})
						.on('jcarouselcontrol:active', function() {
							$(this).removeClass('inactive');
						})
						.jcarouselControl({
							target: '+=1'
						});

					$('.prev-navigation')
						.on('jcarouselcontrol:inactive', function() {
							$(this).addClass('inactive');
						})
						.on('jcarouselcontrol:active', function() {
							$(this).removeClass('inactive');
						})
						.jcarouselControl({
							target: '-=1'
						});

					$('.next-navigation')
						.on('jcarouselcontrol:inactive', function() {
							$(this).addClass('inactive');
						})
						.on('jcarouselcontrol:active', function() {
							$(this).removeClass('inactive');
						})
						.jcarouselControl({
							target: '+=1'
						});
				});
			})(jQuery);
		}, 500)

	},
	approval : function(){
		var l = Ladda.create(document.querySelector(".ladda-button"));
		if(confirm("증명서 발급의 경우 누락된 정보 및 직인이 있는지 확인하십시오. 결재가 종료된 문서는 취소할 수 없습니다. 결재 하시겠습니까?")){
			var password = $("#frm_password").val();
			var seal = $("#div_seal_list li[class='active'] img").attr("data");
			var approvalIdx = $("#frm_approval_idx").val();
			var realApprovalType = $("#frm_real_approval_type").val();
			var reason = $("#frm_reason").val();

			if(typeof(seal) == "undefined"){
				seal = '';
			}
			
			l.start();
			$.ajax({
				type:'post',
				url:'/approval/approval/approval_document',
				dataType:'json',
				data: { approval_idx: approvalIdx, seal:seal, password:password, real_approval_type:realApprovalType, reason:reason}
			}).done(function(d){
				alert(d.message);
				l.stop();
				if(d.result == true){
					document.location.reload();
				}
			}).fail(function(){
				l.stop();
			});
		}
	},
	changeApprovalState: function(node, cls) {
		var $node = $(node);
		var $btn = $node.parent().find("button");
		$btn.removeClass("btn-success btn-danger btn-primary");
		$btn.attr("data-check", "false");

		$node.addClass(cls);
		$node.attr("data-check", "true");
	},
	process: function() {
		var reason = $("#modal textarea[name='reason']").val();
		var password = $("#input_password").val();

		if ($("#input_password").length > 0 && password == "") {
			alert("결재 비밀번호를 입력해주세요");
			return;
		}

		$("#frm_reason").val(reason);
		$("#frm_password").val(password);

		var proc = $("#modal .proc_type button[data-check='true']").attr('data-proc');
		if (proc == "approval") {
			approvalDocument.openSealModal();
		} else if (proc == "return") {
			approvalDocument.returnDocument();
		} else if (proc == "arbitrary") {
			approvalDocument.arbitraryDecision();
		}
	},
	arbitraryDecision: function() {
		var cfm = confirm('전결합니다');
		if(cfm == true) {
			var reason = $("#frm_reason").val();
			var approvalIdx = $("#frm_approval_idx").val();
			var password = $("#frm_password").val();

			$.ajax({
				type:'post',
				url:'/approval/approval/arbitrary_decision',
				dataType:'json',
				data: { reason: reason, approval_idx: approvalIdx, password : password }
			}).done(function(d){
				alert(d.message);
				if(d.result == true){
					document.location.reload();
				}
			});
		}
	},
	openProcessingModal: function() {

		$("#modal_processing .approval_reason").hide();
		$("#modal_processing").modal();
	},
	toggleReason: function(node) {
		var $tr = $(node).parents('tr.approval');
		var approvalIdx = $tr.attr('data-app-idx');

		var $approvalReason = $('#table_approval tr.approval_reason[data-app-idx="' + approvalIdx + '"]');
		$approvalReason.toggle();
	},
	printProcessingDetail: function() {
		var printReason = $('#print_reason').prop('checked');
		var cssList = new Array();
		var cssLink = new Array();

		cssList.push('.attr_name {background-color: #f3f3f3;font-weight: bold;border-left: 1px solid #ddd;border-right: 1px solid #ddd;}');
		cssList.push('.sub_title {font-size: 12px; font-weight: bold;}');
		cssList.push('.table-bordered>thead>tr>th {text-align: center;background-color: #f3f3f3;font-weight: bold;}');
		cssList.push('.table-bordered>tbody>tr>td {border: 1px solid #ddd !important;}');
		cssList.push('.table-bordered>tbody>tr {border-bottom: 1px solid #ddd;}');
		cssList.push('.text-center {text-align: center;}');
		cssList.push('.print_none {display: none;}');
		cssList.push('.modal-body {max-height: none !important;}');
		cssList.push('tr>td, tr>th {font-size: 12px;}');
		cssList.push('#modal_content_processing {border: 0px;}');
		cssList.push('@media print {' +
			'td.attr_name {background-color: #f3f3f3 !important; font-weight: bold;} ' +
			'.table-bordered>thead>tr>th {text-align: center;background-color: #f3f3f3 !important;font-weight: bold;}' +
			'.table-bordered>tbody>tr>td {padding: 5px !important;border: 1px solid #ddd !important;}' +
			'.table-bordered>tbody>tr {border-bottom: 1px solid #ddd !important;}' +
			'}');
		if (printReason === true) {
			cssList.push('.approval_reason {display: table-row !important;}');
		} else {
			cssList.push('.approval_reason {display: none !important;}');
		}
		cssLink.push('/css/default.css');
		cssLink.push('/css/bootstrap.min.css');

		printPopup('#modal_content_processing', cssList, cssLink, 800, 800);
	}
};

var comment = {
	write : function(){
		if($("#form_comment input[name='content']").val() == ""){
			alert("댓글을 입력해주세요");
			return;
		}
		$("#form_comment").ajaxForm(function(result){
			var d = JSON.parse(result);
			if(d.result == true){
				var content = d.data.content;
				var commentIdx = d.data.comment_idx;
				var writerName = d.data.writer_name;
				var html = $($("#commet_content").html());

				html.find(".th_writer_name").text(writerName);
				html.find(".td_content").text(content);
				html.find(".td_button button").attr("onclick","comment.remove('"+commentIdx+"')");
				html.attr("id","tr_comment_"+commentIdx);
				
				html.appendTo($("#table_comment tbody")).show();
				$("#form_comment input[name='content']").val('');
				$("#tr_empty").hide();
			}else{
				alert(d.message);
			}
		}).submit();
	},
	remove : function(commentIdx){
		$.ajax({
			url:'/approval/comment/remove/'+commentIdx,
			dataType:'json'
		}).done(function(d){
			if(d.result == true){
				$("#tr_comment_"+commentIdx).remove();
				console.log($("#table_comment tbody tr").length);
				if($("#table_comment tbody tr").length == 1){
					$("#tr_empty").show();
				}
			}else{
				alert(d.message);
			}
		});
	}
};

var selected_document_category = null;
function select_node(){
	selected_document_category = this.id;
}
</script>
<!-- 반려 버튼을 눌렀을 때 모달 박스 내용 -->
<script id="modal_save_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">결재</h4>
</div>
<div class="modal-body">
	<input name="process_type" type="hidden"/>
	<div class="proc_type" style="height: 34px;">
		<div class="col-sm-3" style="font-weight:bold; font-size: 13px; padding-top: 10px;">결재 처리</div>
		<div class="col-sm-9">
			<button class="btn btn-default btn-primary" data-proc="approval" data-check="true" type="button" onclick="approvalDocument.changeApprovalState(this, 'btn-primary')">결재</button>
			<?php /*if ($arbitrary_decision_permission === TRUE): */?>
				<button class="btn btn-default" data-proc="arbitrary" data-check="false" type="button" onclick="approvalDocument.changeApprovalState(this, 'btn-success')">전결</button>
<!--			--><?php /*endif; */?>
			<button class="btn btn-default" data-proc="return" data-check="false" type="button" onclick="approvalDocument.changeApprovalState(this, 'btn-danger')">반려</button>
		</div>
	</div>
	<div style="height: 74px; margin-top: 15px;">
		<div class="col-sm-3" style="font-weight:bold; font-size: 13px; padding-top: 10px;">결재 의견</div>
		<div class="col-sm-9">
			<textarea name="reason" rows="3" class="form-control" maxLength="25" style="resize: none;"></textarea>
		</div>
	</div>
	<?php /*if($arr_config['is_request_password'] === 'Y') : */?>
		<div style="height: 44px; margin-top: 15px;">
			<div class="col-sm-3" style="font-weight:bold; font-size: 13px; padding-top: 10px;">결재 비밀번호</div>
			<div class="col-sm-9">
				<input type="password" id="input_password" class="form-control">
			</div>
		</div>
	<?php /*endif;*/?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button btn-sm" onclick="approvalDocument.process()">확인</button>
</div>
</script>
<!-- 반려 버튼을 눌렀을 때 모달 박스 내용 -->
<!-- 직인선택 버튼을 눌렀을 때 모달 박스 내용 -->
<script id="modal_seal_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">삽입할 직인(로고)를 선택해주세요</h4>
</div>
<div class="modal-body">
	<input name="real_approval_type" type="hidden">
	<input name="approval_idx" type="hidden">
	<div class="wrapper">
		<div class="connected-carousels">
			<div class="stage" style="align:center">
<!--				<?php /*if($using_global_sign === TRUE && sizeof($arr_seal) > 0) :*/?>
				<div class="carousel carousel-stage" style="width:220px; margin:auto">
					<ul>
						<?php /*foreach($arr_seal as $seal) :*/?>
							<li>
								<div><img src="/uploads/seal/<?php /*echo $seal['file_name']*/?>" width="200px" height="200px" alt=""></div>
								<div style="padding-top:10px; text-align:center; width:200px; word-break:break-all"><?php /*echo $seal['description']*/?></div>
							</li>
						<?php /*endforeach; */?>
						<li>
							<div><div style="width:200px; height:200px; border:5px solid red; font-size:65pt; color:red; padding-top:20px">기본</div></div>
							<div style="padding-top:10px; text-align:center; width:200px; word-break:break-all">시스템 기본 직인</div>
						</li>
					</ul>
				</div>
				<a href="#" class="prev prev-stage" style="height:100% !important"><span>&lsaquo;</span></a> 
				<a href="#" class="next next-stage" style="height:100% !important"><span>&rsaquo;</span></a>
				<?php /*elseif($using_global_sign === TRUE && sizeof($arr_seal) === 0) :*/?>
					<p>사용할 수 있는 직인이 없습니다.</p>
					<p><a style="font-weight:bold;text-decoration:underline" href="/approval/main/modify_seal_form">전자결재>전자결재 설정>직인(서명)</a> 에서 직인을 설정 할 수 있습니다.</p>
					<p>또는 기본으로 제공되는 <a style="font-weight:bold;text-decoration:underline" href="javascript:approvalDocument.approval()">기본 직인(서명) 을 사용하여 결재</a> 할수 있습니다.</p>
				<?php /*elseif($using_global_sign !== TRUE): */?>
					<p>서명 이미지를 사용할 수 없습니다.</p>
					<p>기본으로 제공되는 <a style="font-weight:bold;text-decoration:underline" href="javascript:approvalDocument.approval()">기본 직인(서명) 을 사용하여 결재</a> 할수 있습니다.</p>
				--><?php /*endif;*/?>
			</div>

<!--			<?php /*if($using_global_sign === TRUE && sizeof($arr_seal) > 0) :*/?>
			<div class="navigation">
				<a href="#" class="prev prev-navigation">&lsaquo;</a> <a href="#"
					class="next next-navigation">&rsaquo;</a>
				<div class="carousel carousel-navigation" id="div_seal_list">
					<ul>
						<?php /*foreach($arr_seal as $seal) :*/?>
							<li><img data="<?php /*echo $seal['seal_idx']*/?>" src="/uploads/seal/<?php /*echo $seal['file_name']*/?>" width="50px" height="50px" alt=""></li>
						<?php /*endforeach; */?>
						<li><div style="width:50px; height:50px; border:3px solid red; color:red; font-size:14pt; padding-left: 4px; padding-top:7px">기본</div></li>
					</ul>
				</div>
			</div>
			--><?php /*endif;*/?>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default input-sm" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button input-sm ladda-button" onclick="approvalDocument.approval();" data-style="zoom-in"><span class="ladda-label">결재</span></button>
</div>
</script>
<!-- 직인선택 버튼을 눌렀을 때 모달 박스 내용 -->
<script id="commet_content" type="text/html">
<tr style="display:none">
	<th class="th_writer_name"></th>
	<td class="td_content" ></td>
	<td class="td_button" style="width: 50px">
		<button class="btn btn-xs btn-danger">
			<span class="glyphicon glyphicon-remove"></span>
		</button>
	</td>
</tr>
</script>
<!-- 문서함으로 이관 버튼을 눌렀을 때 모달 박스 내용 -->
<script id="document_category_content" type="text/html">
<div id="div_document_tree" class="panel-body col-sm-offset-3 col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading" id="tree_header">
			<h5>문서를 이관한 문서함을 선택하세요</h5>
		</div>
		<div class="panel-body" id="tree_panel" style="height: 300px; padding-top: 0px; top: 51px; bottom: 15px; left: 15px; right: 15px; overflow: scroll"></div>
		 <div class="panel-footer" style="text-align:right">
		 	<button class="btn btn-primary btn-sm" onclick="approvalDocument.transfer()">이관</button>
		 	<button class="btn btn-danger btn-sm" onclick="$('.modal').modal('hide'); selected_document_category=null">닫기</button>
		 </div>
	</div>
</div>
</script>