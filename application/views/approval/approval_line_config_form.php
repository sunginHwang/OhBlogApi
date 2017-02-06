<link rel="stylesheet" href="/css/jquery.treeview.css">
<link rel="stylesheet" href="/css/approval/bookmark.css">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">
<?php include('config_header.php')?>
<div style="clear: both; position: absolute; width: 100%; top: 84px; bottom: 0;">
	<form id="form" action="/approval/approval_bookmark/save" method="post">
		<input type="hidden" name="bookmark_idx" id="bookmark_idx" value="-1"> 
		<div class="panel panel-default" style="position: absolute; width: 240px; top: 0; bottom: 0; left: 3px;">
			<div class="panel-heading" id="tree_header">
				<h5>조직도</h5>
			</div>
			<div class="panel-body" id="org_ajax_tree" style="position: absolute; left: 0; right: 0; top: 51px; bottom: 0; overflow: auto;"></div>
		</div>
		<div class="panel panel-default" style="position: absolute; width: 300px; top: 0; bottom: 0; left: 246px;">
			<div class="panel-heading">
				<div class="input-group">
					<div class="input-group-btn">
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
							<span id="position_name">전체 직책</span>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" id="position_code_list" style="max-height: 300px; overflow: auto;">
						</ul>
					</div>
					<input type="text" class="form-control input-sm" id="minister_name" placeholder="이름">
				</div>
			</div>
			<div class="panel-body" style="position: absolute; left: 0; right: 0; top: 52px; bottom: 0; padding: 0; overflow: auto;">
				<table class="table table-bordered" style="background-color: #eee;">
					<colgroup>
						<col width="120">
						<col width="90">
						<col width="*">
					</colgroup>
					<tr>
						<th>소속 조직</th>
						<th>이름</th>
						<th>직책</th>
					</tr>
				</table>
				<div style="overflow-y: scroll; position: absolute; top: 35px; bottom: 0px;">
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
		<div class="panel panel-default" style="position: absolute; left: 549px; top: 0; bottom: 0; right: 3px;">
			<div class="panel-heading" style="min-width: 200px;">
				<div class="input-group" style="float: left; width: 50%">
					<div class="input-group-btn">
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
							선택
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
<!--							<?php /*foreach($arr_approval_bookmark as $bookmark) : */?>
								<li>
									<a href="javascript:bookmark.load('<?php /*echo $bookmark['bookmark_idx'];*/?>')">
										<?php /*echo $bookmark['name'];*/?>
									</a>
								</li>
							--><?php /*endforeach;*/?>
							<li>
								<a>자주가는 결제선</a>
							</li>
						
							<li class="divider"></li>
							<li>
								<a href="javascript:bookmark.add()">새 항목 추가</a>
							</li>
						</ul>
					</div>
					<!-- /btn-group -->
					<input type="text" class="form-control input-sm" name="approval_bookmark_name" placeholder="저장할 결재선의 이름을 입력해주세요">
				</div>
				<!-- /input-group -->
				<button type="button" class="btn btn-sm btn-default default_button" style="float: right; margin-right: 10px;" onclick="bookmark.save()">저장</button>
				<button type="button" class="btn btn-sm btn-default default_button" style="float: right; margin-right: 10px;" onclick="bookmark.remove()">삭제</button>
				<div style="clear: both;"></div>
			</div>
			<div class="panel-body" style="position: absolute; left: 0; right: 0; top: 52px; bottom: 0; overflow: auto;">
				<div class="panel-body" style="padding: 15px 0;">
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

					<table class="table_approval_line" style="width:100%;margin-top:10px;">
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
					<table class="table_approval_line" style="width:100%;margin-top:10px;">
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
	</form>
</div>
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/json.js"></script>
<script src="/js/jquery.form.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.treeview.js"></script>
<script src="/js/jquery.treeview.edit.js"></script>
<script src="/js/jquery.treeview.async.js"></script>
<script src="/js/approval/bookmark.js?123"></script>
<script>
	/*var now_period_idx = <?php echo $period_idx; ?>;*/
	var now_category_idx = 2;

	var selected_node = null;
	var selected_position = null;
	var start_minister = 0;
/*
	var duplicatedMinister = "<?php echo $duplicated_minister; ?>";*/

	$(function() {
		lineProcess.duplicatedMinister = duplicatedMinister == "Y";
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
