<?php include('form_header.php')?>
<style>
.div_drag {
	position: absolute !important; border: 1px solid #ccc;
}

.btn_add_button {
	background: #27af61 !important; color: white; border: 1px solid #27af61;
}

.btn_remove_button {
	background: red !important; color: white; border: 1px solid red;
}

#idx_form select {
	width: 45px;
}

.dropdown-menu {
	text-align: left !important
}
</style>
<link rel="stylesheet" href="/css/documents/header.css">
<div class="col-lg-12" style="background: #f3f3f3; text-align: center; padding: 0px; bottom:0px; top:46px; position:absolute">
	<form id="form" action="/config/approval_document_header_form/save" method="post">
		<input type="hidden" name="form_header_idx" id="form_header_idx" value="-1">
		<input type="hidden" name="title">
		<nav class="navbar" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#" style="font-size: 15px; font-weight: bold;">새 양식 작성</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="nav-content">
					<ul class="nav navbar-nav">
						<li>
							<a href="javascript:loadNewForm()" title="새 양식" data-placement="bottom">
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
<!--								<?php /*foreach($arr_form_header as $form_header) : */?>
									<li>
									<a href="javascript:loadHeaderForm('<?php /*echo $form_header['form_header_idx']; */?>')">
											<?php /*echo $form_header['title']; */?>
										</a>
								</li>
								<?php /*endforeach;*/?>
								
								<?php /*if(empty($arr_form_header) === TRUE) : */?>
									<li class="disabled">
									<a>저장된 헤더 양식이 없습니다.</a>
								</li>
								--><?php /*endif;*/?>
							</ul>
						</li>
						<li class="c-tooltip" title="텍스트 박스 추가" data-placement="bottom">
							<a href="javascript:addWriteForm()">
								<span class="glyphicon glyphicon-list-alt"></span>
							</a>
						</li>
						<li class="c-tooltip" title="이미지 추가" data-placement="bottom">
							<a href="javascript:addPhoto()">
								<span class="glyphicon glyphicon-picture"></span>
							</a>
						</li>
						<li class="c-tooltip" title="날짜 추가" data-placement="bottom">
							<a href="javascript:addDateForm()">
								<span class="glyphicon glyphicon-calendar"></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="drag_layout" style="width:900px;height:380px;position:absolute;">
			<div id="div_header" class="div_config_document" style="position: relative; padding: 0px; margin-left: 50px; margin-top: 50px;">
				<!-- 문서종류제목 영역 시작-->
				<h1 id="div_title_area" class="text-center div_drag" style="left: 0px; top: 10px" title="문서 제목 영역">
					<input type="hidden" class="drag_option" name="title_position" />
					문서종류제목
				</h1>
				<!-- 문서종류제목 영역 끝 -->
				<!-- 직인 영역 시작-->
				<div id="div_seal_area" class="div_drag" style="left: 570px; top: 100px;">
					<input type="hidden" class="drag_option" name="seal_position" />
					<input type="hidden" name="seal_count" />
					<input type="hidden" name="seal_format" />
					<div id="div_approval_seal" class="c-tooltip" title="결재 직인 영역">
						<div id="div_add_seal" class="div_seal">
							<div class="div_seal_header">
								<select class="seal_format">
<!--									<?php /*foreach($seal_format_list as $key => $seal_val): */?>
										<option value="<?php /*echo $seal_val['format_idx']; */?>" data-sign="<?php /*echo $seal_val['sign']; */?>"><?php /*echo $seal_val['name']; */?></option>
									--><?php /*endforeach;*/?>
								</select>
							</div>
							<div class="div_seal_body text-center" style="padding-top: 7px">
								<button id="btn_seal_add" type="button" class="btn btn_add_button" onclick="sealBox.add(this)">
									<span class="glyphicon glyphicon-plus-sign"></span>
								</button>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
				</div>
				<!-- 직인 영역 끝 -->
				<!-- 정보 영역 시작-->
				<div id="div_info_area" class="div_drag" style="left: 30px; top: 110px" title="헤더 정보 영역">
					<input type="hidden" class="drag_option" name="info_position" />
					<table class="table_info">
						<tbody>
						</tbody>
						<tfoot>
							<tr>
								<td id="td_field_list">
									<select id="select_add_field">
										<option id="" value="none">추가항목선택</option>
<!--										<?php /*foreach($arr_addinal_info as $addinal_info) : */?>
											<option id="<?php /*echo $addinal_info['addinal_info_idx']*/?>" value="<?php /*echo $addinal_info['UI']*/?>">
												<?php /*echo $addinal_info['name']*/?>
											</option>
										--><?php /*endforeach;*/?>
									</select>
								</td>
								<td id="td_value_list"></td>
								<td style="width: auto !important">
									<button type="button" class="btn btn-xs btn_add_button" onclick="infoTable.add();">
										<span class="glyphicon glyphicon-plus-sign"></span>
									</button>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- 정보 영역 끝-->
			</div>
		</div>
		<input id="extra_data" type="hidden" name="extra_data" value="{}" />
	</form>
	<form id="img_form" method="post" action="/config/approval_document_header_form/upload_photo" enctype="multipart/form-data" style="display: none;">
		<input type="hidden" name="header_idx" value="0"/>
	</form>
</div>
<div id="modal" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content"></div>
	</div>
</div>
<script src="/js/config/document_header.js"></script>
<script type="text/javascript" src="/js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.min.js" ></script>
<script>
	function dragStart(event) {
		var target = event.target;
		console.log('1');
		$(target).css("border", "1px dashed red");
	}

	function dragStop(event) {
		var target = event.target;
		console.log('2');
		$(target).css("border", "1px solid #ccc");
		var left = parseInt($(target).css("left"));
		var top = parseInt($(target).css("top"));
		$(target).find(".drag_option").val(left+"-"+top);
	}

	function createDraggable(event) {
		var target = event.target;
		console.log('3');
		var left = parseInt($(target).css("left"));
		var top = parseInt($(target).css("top"));
		$(target).find(".drag_option").val(left+"-"+top);
	}

	$(function(){
		console.log('4');
		$(".div_drag").draggable({
			containment: "#drag_layout",
			grid: [10,10],
			start : dragStart,
			stop : dragStop,
			create : createDraggable
		}).tooltip();

		$('#div_approval_seal').on('change', '.seal_format', function() {
			$node = $(this);
			if($node.find('option:selected').attr('data-sign') == '%ET') {
				$node.hide();
				$node.parent().append($("#random_txt").html());
			}
		});

		$("#img_form").on("change", "input[type='file']", function() {
			previewImg(this);
		} );

		$("#div_header").on("change", ".txt_content", function() {
			changeTxtForm(this);
		});

		$("#div_header").on("change", ".date_content", function() {
			changeDateForm(this);
		});

		$(".c-tooltip").tooltip();
	});

	function onClickUndoSealFormat(node) {
		$header = $(node).parents('.div_seal_header');
		$header.find('.additional').remove();
		$header.find('.seal_format option').prop('selected', false);
		$header.find('.seal_format option:first-child').prop('selected', true);
		$header.find('.seal_format').show();
	}

	var sealBox = {
		add : function(obj){
			$(obj).parent().parent().parent().prepend($("#add_seal_form").html());
		}
	};
	
	infoTable.addTag = function(category,arrKey,arrText,title,categoryIdx){
		var tr = $("<tr/>");
		var td1 = $("<th/>",{text:title});
		var td2 = $("<td/>",{text:this.getSampleDataFormat(arrText, category)});
		var td3 = $("<td/>").append($("<button/>",{class:"btn btn-xs btn_remove_button", onclick:"$(this).parent().parent().remove();", type:"button"}).append($("<span/>",{class:"glyphicon glyphicon-minus-sign"})));
		var categoryValue = $("<input/>",{type:"hidden", name:"category[]", value:categoryIdx});
		var formatVal = "";

		if (categoryIdx == 1) {
			var existId = $.inArray('%ID', arrKey) >= 0;

			if (existId == true) {
				formatVal = arrKey.join("-");
			} else {
				formatVal = arrKey.join("-") + "-%ID";
			}
		} else {
			formatVal = arrKey.join("-");
		}

		var formatValue = $("<input/>",{type:"hidden", name:"data[]", value:formatVal});
		
		td3.append(categoryValue).append(formatValue);
		tr.append(td1).append(td2).append(td3).appendTo(".table_info tbody");
	};

	$("#select_add_field").change(function(){
		$("#td_value_list").html($("#"+$(this).val()+"_form").html());
		$(".select_idx").change(function(){
			if($(this).val() == '%ET') 
				$(this).replaceWith("<input data='' type='text' sign='"+$(this).val()+"' style='width:49px'>");
		});
	});

	function loadNewForm(){
		if(confirm("새롭게 작성합니다.")){
			document.location.reload();
		}
	}

	function saveForm(){
		$(".modal .modal-content").html($("#modal_save_content").html());
		$(".modal .modal-content").find("input[name='title']").val($("#form input[name='title']").val());
		$(".modal").modal().on("hide.bs.modal",function(e){
			$(this).find("input").val("");
		}).on('shown.bs.modal', function (e) {
			$(this).find("input").focus();
		});
	}

	function _saveForm(){
		var title = $(".modal-content input[name='title']").val();
		if(title.length > 25){
			alert('문서 제목 길이가 너무 깁니다.');
			return;
		}

		if(title.length == 0){
			alert('제목을 입력해주세요');
			$(".modal-content input[name='title']").focus();
			return;
		}
		
		$("input[name='seal_count']").val($("#div_seal_area .div_seal").length - 1);
		$("input[name='title']").val(title);

		var ord = 1;
		var sealFormatList = new Array();

		$(".div_seal[id!='div_add_seal'] .seal_format").each(function() {
			var val = $(this).find("option:selected").val();
			var txt = $(this).parent().find('.txt_seal').val();
			sealFormatList.push({
				'format_idx': val,
				'ord': ord++,
				'txt': txt
			});
		});

		$("input[name='seal_format']").val(JSON.stringify(sealFormatList));
		$("#form").ajaxForm(function(result){
			var d = JSON.parse(result);
			var fileLength = $("#img_form input[type='file']").length;
			if(d.result == true && fileLength > 0)  {
				submitImgForm(d.data.headerIdx);
			} else if (d.result == true) {
				alert(d.message);
				document.location.reload();
			} else {
				alert(d.message);
			}
		}).submit();
	}

	function submitImgForm(headerIdx) {
		var imgSeqArray = new Array();
		$("#div_header .img_area").each(function() {
			imgSeqArray.push($(this).attr("data-seq"));
		});

		$("#img_form input[type='file']").each(function() {
			var dataSeq = $(this).attr("data-seq");

			if ($.inArray(dataSeq, imgSeqArray) < 0) {
				$(this).remove();
			}
		});

		$("#img_form input[name='header_idx']").val(headerIdx);
		$("#img_form").ajaxForm(function(result) {
			var d = JSON.parse(result);
			alert(d.message);
			if (d.result == true) {
				document.location.reload();
			}
		}).submit();
		// document.location.reload();
	}

	function deleteForm(){
		if(confirm("이 양식을 삭제합니다")){
			if($("#form_header_idx").val() == -1){
				alert("삭제할 문서를 불러와주세요");
				return;
			};
			
			$.ajax({
				type:'get',
				url:'/config/approval_document_header_form/remove/'+$("#form_header_idx").val(),
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
		reformatSeal(formHeader.seal_info);

		$("#form_header_idx").val(formHeader.form_header_idx);
		$("#form").attr("action","/config/approval_document_header_form/modify");
		$(".navbar-brand").text(formHeader.title+" 수정");
		$("#form input[name='title']").val(formHeader.title);
		$("#li_delete").css("display","block");
	}

	function reformatSeal(sealFormatList) {
		$("#div_header .div_seal_header .additional").remove();
		$("#div_header .div_seal_header .seal_format").show();
		var $sealFormatDomList = $("#div_header .div_seal_header .seal_format");
		for (var i = 0, sealFormat; sealFormat = sealFormatList[i]; i++) {
			var $sealFormatDom = $($sealFormatDomList[sealFormat.seal_ord - 1]);

			$sealFormatDom.val(sealFormat.format_idx);
			$sealFormatDom.trigger("change");

			$sealFormatDom.parents(".div_seal_header").find(".txt_seal").val(sealFormat.format_data);
		}
	}

	function changeTxtForm(textarea) {
		var $this = $(textarea);
		var $parent = $this.parents(".text_area");
		var $option = $parent.find(".drag_option");
		var left = parseInt($parent.css("left"));
		var top = parseInt($parent.css("top"));
		var idx = parseInt($parent.attr("data-idx"));
		var content = $this.val();

		$parent.css("border", "1px solid #ccc");

		var txtWrapper = new TxtWrapper({
			'idx': idx,
			'left': left,
			'top': top,
			'content': content
		});

		$option.val(JSON.stringify(txtWrapper));
	}

	function changeDateForm(datearea) {
		var $this = $(datearea);
		var $parent = $this.parents(".date_area");
		var $option = $parent.find(".drag_option");
		var left = parseInt($parent.css("left"));
		var top = parseInt($parent.css("top"));
		var idx = parseInt($parent.attr("data-idx"));
		var content = $this.val();

		$parent.css("border", "1px solid #ccc");

		var dateWrapper = new DateWrapper({
			'idx': idx,
			'left': left,
			'top': top,
			'content': content
		});

		$option.val(JSON.stringify(dateWrapper));
	}

	function addWriteForm() {
		extraHeaderController.addTxtWrapper(new TxtWrapper());
	}

	function addDateForm() {
		extraHeaderController.addDateWrapper(new DateWrapper());
	}

	function addPhoto() {
		var html = $("#img_form_template").html();
		html = html.replace(/\[imgSequence\]/g, extraHeaderController.imgSequence);

		$("#img_form").append(html);
		$("#img_form input[type='file']:last-child").trigger("click");
	}

	function changeImgForm(e) {
		var $this = $(e.target);
		var $option = $this.find('.drag_option');
		var left = parseInt($this.css('left'));
		var top = parseInt($this.css('top'));
		var width = parseInt($this.css('width'));
		var height = parseInt($this.css('height'));
		var idx = parseInt($this.attr('data-idx'));
		var seq = parseInt($this.attr('data-seq'));

		$this.css("border", "1px solid #ccc");

		var imgWrapper = new ImgWrapper({
			'idx': idx,
			'left': left,
			'top': top,
			'width': width,
			'height': height,
			'seq': seq
		});

		$option.val(JSON.stringify(imgWrapper));
	}

	function completeAddPhoto(e) {
		var imgWrapper = new ImgWrapper({
			'left': 0,
			'top': 50,
			'width': 200,
			'height': 200,
			'seq': extraHeaderController.imgSequence,
			'src': e.target.result
		});

		extraHeaderController.addImgWrapper(imgWrapper);
	}

	function previewImg(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = completeAddPhoto;
			reader.readAsDataURL(input.files[0]);
		}
	}

	function removeTemplate(node) {
		var cfm = confirm("정말 삭제하시겠습니까?");

		if (cfm == true) {
			var $wrapper = $(node).parents(".div_drag");

			var idx = $wrapper.attr("data-idx");

			if (idx > 0) {
				var $extraDataDom = $("#extra_data");
				var extraData = JSON.parse($extraDataDom.val());

				if (typeof extraData.del_list == 'undefined') {
					extraData.del_list = new Array();
				}

				extraData.del_list.push(idx);

				$extraDataDom.val(JSON.stringify(extraData));
			}

			$wrapper.remove();
		}
	}

	extraHeaderController.additionalTxtProcess = function(newWrapper, txtWrapper) {
		var $newWrapper = $(newWrapper);
		$newWrapper.find(".drag_option").val(JSON.stringify(txtWrapper));

		$newWrapper.draggable({
			containment: "parent",
			grid: [10,10],
			start : dragStart,
			stop : function() {
				changeTxtForm($(this).find('.txt_content'))
			}
		}).tooltip();
	}

	extraHeaderController.additionalImgProcess = function(newWrapper, imgWrapper) {
		var $newWrapper = $(newWrapper);

		imgWrapper.src = '';

		$newWrapper.find(".drag_option").val(JSON.stringify(imgWrapper));

		$newWrapper.draggable({
			containment: "parent",
			grid: [10,10],
			start : dragStart,
			stop : changeImgForm
		}).resizable({
			containment: "parent",
			minWidth: 70,
			minHeight: 70,
			stop: changeImgForm
		}).tooltip();
	}

	extraHeaderController.additionalDateProcess = function(newWrapper, dateWrapper) {
		var $newWrapper = $(newWrapper);
		$newWrapper.find(".drag_option").val(JSON.stringify(dateWrapper));

		$newWrapper.draggable({
			containment: "parent",
			grid: [10,10],
			start : dragStart,
			stop : function() {
				changeDateForm($(this).find('.date_content'))
			}
		}).tooltip();
	}

	extraHeaderController.getTxtWrapperTemplate = function() {
		return '<div class="text_area div_drag ui-draggable" data-idx="[idx]" style="left: [left]px; top: [top]px;width: 200px; height: 55px; padding: 15px 15px 8px;">' +
			'<button type="button" class="glyphicon glyphicon-remove-sign" style="color: #e73c50; position: absolute; right: 3px; top: 3px; border: 0px; padding: 0px; background-color: transparent;" onclick="removeTemplate(this);"></button>' +
			'<input type="hidden" class="drag_option" name="txt_option[]" />' +
			'<textarea class="txt_content" style="width: 100%; height: 100%; resize: none;">[content]</textarea>' +
			'</div>';
	}

	extraHeaderController.getDateWrapperTemplate = function() {
		return '<div class="date_area div_drag ui-draggable" data-idx="[idx]" style="left: [left]px; top: [top]px;width: 110px; height: 55px; padding: 15px 15px 8px;">' +
			'<button type="button" class="glyphicon glyphicon-remove-sign" style="color: #e73c50; position: absolute; right: 3px; top: 3px; border: 0px; padding: 0px; background-color: transparent;" onclick="removeTemplate(this);"></button>' +
			'<input type="hidden" class="drag_option" name="date_option[]" />' +
			'<input class="date_content" style="width: 100%; height: 100%; text-align: center;" readonly value="기한날짜"/>' +
			'</div>';
	}

	extraHeaderController.getImgWrapperTemplate = function() {
		return '<div class="img_area div_drag ui-draggable" data-idx="[idx]" data-seq="[imgSequence]" style="left: [left]px; top: [top]px;width: [width]px; height: [height]px; padding: 15px 15px 8px;">' +
			'<button type="button" class="glyphicon glyphicon-remove-sign" style="color: #e73c50; position: absolute; right: 3px; top: 3px; border: 0px; padding: 0px; background-color: transparent;" onclick="removeTemplate(this);"></button>' +
			'<img style="width: 100%; height: 100%; resize: none;" src="[src]" />' +
			'<input type="hidden" class="drag_option" name="img_option[[imgSequence]]" />' +
			'</div>';
	}
</script>
<script id="seal_header_form" type="text/html">
	<select class="seal_format">
<!--		<?php /*foreach($seal_format_list as $key => $seal_val): */?>
			<option value="<?php /*echo $seal_val['format_idx']; */?>" data-sign="<?php /*echo $seal_val['sign']; */?>"><?php /*echo $seal_val['name']; */?></option>
		--><?php /*endforeach;*/?>
	</select>
</script>
<script id="add_seal_form" type="text/html">
	<div class="div_seal">
	<div class="div_seal_header">
		<select class="seal_format">
<!--			<?php /*foreach($seal_format_list as $key => $seal_val): */?>
				<option value="<?php /*echo $seal_val['format_idx']; */?>" data-sign="<?php /*echo $seal_val['sign']; */?>"><?php /*echo $seal_val['name']; */?></option>
			--><?php /*endforeach;*/?>
		</select>
	</div>
		<div class="div_seal_body text-center" style="padding-top: 7px">
			<button class="btn btn_remove_button" ; onclick="$(this).parent().parent().remove();">
				<span class="glyphicon glyphicon-minus-sign"></span>
			</button>
		</div>
	</div>
</script>
<?php /*foreach($arr_UI_info as $key => $arr_info):*/?><!--
<script class="sample_form" id="<?php /*echo $key*/?>_form" type="text/html">
		<?php /*if($arr_info['count'] == 0) :*/?>
			<input disabled="disabled" data="<?php /*echo $arr_info['data'][0]['sample_data']*/?>" sign="<?php /*echo $arr_info['data'][0]['sign']*/?>"/>
		<?php /*endif;*/?>
		<?php /*for($i=0; $i<$arr_info['count']; $i++) : */?>
			<select class="select_idx">
				<?php /*foreach($arr_info['data'] as $idx => $data) :*/?>
					<?php /*if ($data['position'] == $i + 1) : */?>
						<option data="<?php /*echo $data['sample_data']*/?>" <?php /*echo $idx===$i ? 'selected' : '';*/?> value="<?php /*echo $data['sign']*/?>">
							<?php /*echo $data['name']*/?>
						</option>
					<?php /*endif; */?>
				<?php /*endforeach;*/?>
			</select>
			<?php /*if($arr_info['delim_type'] != 'custom' and $i !== $arr_info['count']-1) :*/?>
			-
			<?php /*endif;*/?>
		<?php /*endfor;*/?>
	</script>
--><?php /*endforeach;*/?>
<script id="none_form"></script>
<script id="modal_save_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">저장될 양식의 제목을 입력해주세요</h4>
</div>
<div class="modal-body">
	<input name="title" type="text" class="form-control" maxLength="25">
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button"
		onclick="_saveForm()">저장</button>
</div>
</script>
<script id="random_txt" type="text/html">
	<input type="text" class="txt_seal additional" style="width:49px" />
	<span class="glyphicon glyphicon-remove-sign additional undo" onclick="onClickUndoSealFormat(this);"></span>
</script>
<script id="img_form_template" type="text/html">
	<input type="file" data-seq="[imgSequence]" name="header_img[[imgSequence]]" accept="image/gif,image/jpg,image/png" />
</script>