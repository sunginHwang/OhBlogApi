var loadHeaderForm = function(formIdx)
{
	$.ajax({
		type:'get',
		url:'/config/approval_document_header_form/load/'+formIdx,
		dataType:'json'
	}).done(function(result){
		var formHeader = result.data.form_header;
		var formAddinalInfo = result.data.form_addinal_info;
		var sealFormatList = formHeader.seal_info;
		var sealSize = formHeader.seal_count;

		$(".div_seal[id!='div_add_seal']").remove();
		for(var i=0; i<sealSize; i++){
			var sealForm = $("#add_seal_form").html();
			var sealFormat = sealFormatList[sealSize - 1 - i];
			var txtData = '';
			var dataType = '';

			if (sealFormat.sign == '%ET') {
				txtData = sealFormat.format_data;
			} else {
				txtData = sealFormat.name;
			}

			sealForm = sealForm.replace("[txt_data]", txtData);
			sealForm = sealForm.replace("[data_type]", sealFormat.sign);
			$("#div_approval_seal").prepend(sealForm);
		}

		$(".table_info tbody").empty();
		for(var i=0 in formAddinalInfo){
			var format = formAddinalInfo[i].format.split("-");
			var formatSampleDatat = formAddinalInfo[i].format_sample_data.split("-");
			infoTable.addTag(formAddinalInfo[i].UI, format, formatSampleDatat, formAddinalInfo[i].name, formAddinalInfo[i].addinal_info_idx);
		}

		$("#div_seal_area").css("left",parseInt(formHeader.seal_position_x));
		$("#div_seal_area").css("top",parseInt(formHeader.seal_position_y));
		$("#div_title_area").css("left",parseInt(formHeader.title_position_x));
		$("#div_title_area").css("top",parseInt(formHeader.title_position_y));
		$("#div_info_area").css("left",parseInt(formHeader.info_position_x));
		$("#div_info_area").css("top",parseInt(formHeader.info_position_y));

		$("#div_seal_area .drag_option").val(formHeader.seal_position_x+"-"+formHeader.seal_position_y);
		$("#div_title_area .drag_option").val(formHeader.title_position_x+"-"+formHeader.title_position_y);
		$("#div_info_area .drag_option").val(formHeader.info_position_x+"-"+formHeader.info_position_y);

		extraHeaderController.reloadTxtForm(formHeader.extra_txt);
		extraHeaderController.reloadImgForm(formHeader.extra_img);
		extraHeaderController.reloadDateForm(formHeader.extra_date);
		loadFormInfo(formHeader);
	});
}

var extraHeaderController = {
	imgSequence: 0,
	reloadTxtForm: function(txtDataList) {
		$('#div_header .text_area').remove();

		for (var i = 0, txtData; txtData = txtDataList[i]; i++) {
			var txtWrapper = new TxtWrapper({
				'idx': txtData.extra_idx,
				'left': txtData.pos_x,
				'top': txtData.pos_y,
				'content': txtData.content
			});

			extraHeaderController.addTxtWrapper(txtWrapper);
		}
	},
	reloadDateForm: function(dateDataList) {
		$('#div_header .date_area').remove();

		for (var i = 0, txtData; txtData = dateDataList[i]; i++) {
			var dateWrapper = new DateWrapper({
				'idx': txtData.extra_idx,
				'left': txtData.pos_x,
				'top': txtData.pos_y,
				'content': txtData.content
			});

			extraHeaderController.addDateWrapper(dateWrapper);
		}
	},
	reloadImgForm: function(imgDataList) {
		$('#div_header .img_area').remove();
		var maxSeq = 0;

		for (var i = 0, imgData; imgData = imgDataList[i]; i++) {
			var imgWrapper = new ImgWrapper({
				'idx': imgData.extra_idx,
				'left': imgData.pos_x,
				'top': imgData.pos_y,
				'width': imgData.width,
				'height': imgData.height,
				'seq': imgData.seq,
				'src': imgData.content
			});

			extraHeaderController.addImgWrapper(imgWrapper);

			maxSeq = imgData.seq > maxSeq ? imgData.seq : maxSeq;
		}

		extraHeaderController.imgSequence = maxSeq;
	},
	addTxtWrapper: function(txtWrapper) {
		var template = extraHeaderController.getTxtWrapperTemplate();

		var txtFormHtml = template.replace("[left]", txtWrapper.left);
		txtFormHtml = txtFormHtml.replace("[top]", txtWrapper.top);
		txtFormHtml = txtFormHtml.replace("[content]", txtWrapper.content);

		var $newWrapper = $(txtFormHtml).appendTo("#div_header");
		extraHeaderController.additionalTxtProcess($newWrapper, txtWrapper);
	},
	addDateWrapper: function(dateWrapper) {
		var template = extraHeaderController.getDateWrapperTemplate();

		var dateFormHtml = template.replace("[left]", dateWrapper.left);
		dateFormHtml = dateFormHtml.replace("[top]", dateWrapper.top);
		dateFormHtml = dateFormHtml.replace("[content]", dateWrapper.content);

		var $newWrapper = $(dateFormHtml).appendTo("#div_header");
		extraHeaderController.additionalDateProcess($newWrapper, dateWrapper);
	},
	addImgWrapper: function(imgWrapper) {
		var template = extraHeaderController.getImgWrapperTemplate();

		var imgFormHtml = template.replace("[left]", imgWrapper.left);
		imgFormHtml = imgFormHtml.replace("[top]", imgWrapper.top);
		imgFormHtml = imgFormHtml.replace("[width]", imgWrapper.width);
		imgFormHtml = imgFormHtml.replace("[height]", imgWrapper.height);
		imgFormHtml = imgFormHtml.replace("[src]", imgWrapper.src);
		imgFormHtml = imgFormHtml.replace(/\[imgSequence\]/g, imgWrapper.seq);

		var $newWrapper = $(imgFormHtml).appendTo("#div_header");
		extraHeaderController.additionalImgProcess($newWrapper, imgWrapper);
	},
	getTxtWrapperTemplate: function() {
		return '<div class="text_area" style="position: absolute; left: [left]px; top: [top]px; padding: 15px 15px 8px;">' +
			'<div class="txt_content" style="width: 100%; height: 100%;">[content]</div>' +
			'</div>';
	},
	getDateWrapperTemplate: function() {
		return '<div class="text_area" style="position: absolute; left: [left]px; top: [top]px; padding: 15px 15px 8px;">' +
			'<div class="txt_content" style="width: 100%; height: 100%;">[content]</div>' +
			'</div>';
	},
	getImgWrapperTemplate: function() {
		return '<div class="img_area" style="position: absolute; left: [left]px; top: [top]px;width: [width]px; height: [height]px; padding: 15px 15px 8px;">' +
			'<img style="width: 100%; height: 100%; resize: none;" src="[src]" />' +
			'</div>';
	},
	additionalTxtProcess: function(newWrapper, txtWrapper) {

	},
	additionalImgProcess: function(newWrapper, imgWrapper) {

	},
	additionalDateProcess: function(newWrapper, imgWrapper) {

	}
}

var infoTable = {
	addTag : null,
	add : function(){
		var category = $("#td_field_list select").val();
		if(category == 'none'){
			return;
		}

		var arrKey = new Array();
		var arrText = new Array();
		$("#td_value_list option:selected,#td_value_list input").each(function(){
			var sampleData = $(this).attr("data");
			sampleData = ((sampleData == null || sampleData == "") && $(this).val() != '%NN') ? $(this).val() : sampleData;
			arrText.push(sampleData);
			arrKey.push($(this).val() == "" ? $(this).attr("sign") : $(this).val());
		});
		infoTable.addTag(category,arrKey, arrText, $("#td_field_list select option:selected").text(), $("#td_field_list option:selected").attr("id"));
	},
	getSampleDataFormat : function(data, type){
		if (type == "idx") {
			return data.join("");
		} else if(type == "date"){
			return data.join("-");
		} else if(type=="receive"){
			return data.join(",");
		} else{
			return data.join(" ");
		}
	}
};

// Define Object
function ImgWrapper(obj) {
	if (typeof obj !== 'undefined') {
		this.idx = obj.idx || 0;
		this.left = obj.left || 0;
		this.top = obj.top || 50;
		this.width = obj.width || 200;
		this.height = obj.height || 200;
		this.seq = obj.seq || extraHeaderController.imgSequence;
		this.src = obj.src || '';
	} else {
		this.idx = 0;
		this.left = 0;
		this.top = 50;
		this.width = 200;
		this.height = 200;
		this.seq = extraHeaderController.imgSequence;
		this.src = '';
	}
}

function TxtWrapper(obj) {
	if (typeof obj !== 'undefined') {
		this.idx = obj.idx || 0;
		this.left = obj.left || 0;
		this.top = obj.top || 50;
		this.content = obj.content || ''
	} else {
		this.idx = 0;
		this.left = 0;
		this.top = 50;
		this.content = '';
	}
}

function DateWrapper(obj) {
	if (typeof obj !== 'undefined') {
		this.idx = obj.idx || 0;
		this.left = obj.left || 0;
		this.top = obj.top || 50;
		this.content = obj.content || ''
	} else {
		this.idx = 0;
		this.left = 0;
		this.top = 50;
		this.content = '';
	}
}

var smartEditorController = {
	getTextAreaIframeDoc: function(rootSelector) {
		var rootIframe = $(rootSelector).parent().find("iframe")[0];
		var rootIframeDoc = rootIframe.contentDocument || rootIframe.contentWindow.document;
		var textAreaIfrmae = $(rootIframeDoc).find("#se2_iframe")[0];
		var textAreaIframeDoc = textAreaIfrmae.contentDocument || textAreaIfrmae.contentWindow.document;

		return textAreaIframeDoc;
	}
}