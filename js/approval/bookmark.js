$(document).ready(function(){
	showOrgChart();
	showPositionCode();
	lineProcess.init();
});

function select_node() {
	selected_node = this;
	if (selected_node.id == -2) {
		alert('열람 권한이 있는 교회가 없습니다.');
		return;
	}
	start_minister = 0;
	selected_position = '';
	$('#position_name').text('전체 직책');
	$('#minister_name').val('');
	showMinisterList();
}

var showOrgChart = function(period_idx,category_idx) {
	var period_idx = period_idx || now_period_idx;
	var category_idx = category_idx || now_category_idx;
	
	$("#org_ajax_tree").empty().treeview({
		url:"/org_chart/tree/async",
		ajax : { 
			data : {
				"period" : period_idx,
				"category" : category_idx
			}				
		},
		icon:"icon-home",
		collapsed: true,
		toggle : select_node,
		count : true
	});
};


var showPositionCode = function() {
	$.ajax({
		url : '/config/auth/get_position_code'
		,dataType : "json"
	}).done(function(PositionCode){
		$('#position_code_list').append('<li><a href="#" id="">전체 직책</a></li>');
		for(var i = 0,len=PositionCode.length;i< len;i++){
			$('#position_code_list').append('<li><a href="#" id="'+ PositionCode[i].position_code +'">' + PositionCode[i].name + '</a></li>');
		}
	
		$('#position_code_list a').click(function(){
			$(this).closest('div').find('#position_name').text($(this).text());
			selected_position = $(this).attr('id');
			start_minister = 0;
			showMinisterList();
		});
		$('#minister_name').keyup(function(){
			start_minister = 0;
			showMinisterList();
		});
		
	});
};

var showMinisterList = function() {
	
	var checkMinister = function(e) {
		$('.minister.active').removeClass('active');
		$(this).addClass('active');
	};
	
	$.ajax({
		url : '/config/auth/get_minister_list',
		type : 'post',
		async: false,
		data : {
			period_idx : now_period_idx,
			minister_name : $('#minister_name').val(),
			position : selected_position,
			start : start_minister,
			org_idx : selected_node.id
		},
		dataType : "json"
	}).done(function(minister_list){
		// 기본적으로 목록을 100개씩 가져온 뒤 더 보기 버튼을 눌러 계속 가져오지만 start_minister가 -1일때는 그냥 다가져옴
		// start_minister 가 0일 때는 다른 조직을 선택하거나 직책을 새로 선택해서 목록을 새로 불러오는 경우이므로 목록을 비워줌
		if(start_minister < 1){
			$('.minister_list').parent().scrollTop(0);
			$('.minister_list tbody').empty();
		}else{
			// 더보기를 누른 경우는 더보기 버튼 삭제
			$('.more').remove();
		}
		if(minister_list.length == 0){
			$('.minister_list tbody').append('<tr ><td colspan="3" class="text-center">검색 결과가 없습니다.</td></tr>');
		}
		for(var i = 0;i < minister_list.length;i++){
			// 목록을 100개씩 불러오지만 100개 이상이 있는 지 확인하기 위해 서버에서는 101개를 던져줌
			// 101번째 데이터는 화면에 보여주지 않고 더 보기 버튼으로 대체함
			if(i == 100 && start_minister > -1){
				start_minister += 100;
				$('<tr class="more"><td colspan="3" class="text-center"><span class="icon-down-dir"></span> 더 보기</td></tr>').appendTo('.minister_list tbody').click(function(){
					showMinisterList();
				});
			}else{
				var minister = minister_list[i];
				var org_name = minister.org_name == null ? '' : minister.org_name;
				var minister_name = minister.minister_name == null ? '' : minister.minister_name;
				var name = minister.name == null ? '' : minister.name;
				var minister_idx = minister.org_minister_idx;
				var ministerHtml = '<tr class="minister"' +
					'data-minister-idx="' + minister.minister_idx + '"' +
					'data-minister-name="' + minister.minister_name + '"' +
					'data-duty="' + minister.name + '"' +
					'data-org-idx="' + minister.org_idx + '"' +
					'data-org-name="' + minister.org_name + '"' +
					'data-org-minister-idx="' + minister.org_minister_idx + '"' +
					' id="minister' + minister_idx + '">' +
					'<td class="org_name">'+org_name+'</td>' +
					'<td class="minister_name">'+minister_name+'</td>' +
					'<td class="position_name">'+name+'</td>' +
					'</tr>';
				$('.minister_list tbody').append(ministerHtml);
			}
		}
		$('.minister').click(checkMinister);
		$('.minister').dblclick(lineProcess.add);
	});
};

var lineProcess = {
	duplicatedMinister: false,
	init : function() {
		$(".line-minister").on("click",this.checkMinister);
		$(".table_approval_line .td_item_add_remove").each(function() {
			$(this).find(".item-remove").on("click",function() {
				if($('.line-minister.active').length == 0) {
					alert('교역자를 선택해주세요!');
					return;
				}
				lineProcess.removeMinister($('.line-minister.active')[0]);
			});
		});

		$(".table_approval_line .td_item_up_down").each(function() {
			var target = $(this).parent().find(".td_line_list .list-group").get(0);
			$(this).find(".item-up").on("click",function() {
				var selectedMinister = $(target).find("li.active");
				var selectedIdx =  selectedMinister.index();
				var firstIdx = $(target).find("li:first").index();

				if(selectedIdx == -1){
					alert('선택하신 항목이 없습니다.');
					return;
				}
				if(selectedIdx == firstIdx){
					alert('최상위 입니다.');
					return;
				}

				$(target).find("li").eq(selectedIdx).insertBefore($(target).find("li").eq(selectedIdx-1));

				$(target).find("li").each(function(index){
// 						$(target).attr("data-ord",~~index+1);
				});
			});
			$(this).find(".item-down").on("click",function() {
				var selectedMinister = $(target).find("li.active");
				var selectedIdx = selectedMinister.index();
				var lastIdx = $(target).find("li:last").index();

				if(selectedIdx == -1){
					alert('선택하신 항목이 없습니다.');
					return;
				}
				if(selectedIdx == lastIdx){
					alert('최하위 입니다.');
					return;
				}

				$(target).find("li").eq(selectedIdx).insertAfter($(target).find("li").eq(selectedIdx+1));

				$(target).find("li").each(function(index){
// 						$(this).attr("data-ord",~~index+1);
				});
			});
			$(this).find(".item-cancel").on("click",function() {
				var selectedMinister = $(target).find("li.active");
				var selectedIdx = selectedMinister.index();
				var lastIdx = $(target).find("li:last").index();

				if(selectedIdx == -1){
					alert('선택하신 항목이 없습니다.');
					return;
				}

				selectedMinister.remove();
				alert('화면에서만 삭제되었습니다.');
				return;
			});
		});
	}
	,checkMinister : function() {
		$('.line-minister.active').removeClass('active');
		$(this).addClass('active');
	}
	,add: function() {
		var process = $(".btn-select[data-checked='true']").attr("data-proc");
		var role = "";
		var roleCode = "";
		var targetULSelector = "";
		var type = "";

		switch(process) {
			case "approval":
				role = "결재";
				roleCode = "BT0404";
				type = "approval";
				targetULSelector = "#ul_approval";
				break;
			case "reference":
				role = "참조";
				roleCode = "BT0402";
				type = "approval";
				targetULSelector = "#ul_approval";
				break;
			case "reception":
				roleCode = "BT0401";
				type = 'receive';
				targetULSelector = "#ul_reception";
				break;
			case "completion":
				roleCode = "BT0403";
				type = 'receive';
				targetULSelector = "#ul_completion";
				break;
			default:
				return;
		}
		var $minister = $('.minister.active');
		var $org = $("#org_ajax_tree span.selected");

		var ministerIdx = 0;
		var ministerName = '';
		var duty = '';
		var orgIdx = 0
		var orgMinisterIdx = 0;
		var orgName = '';

		var arbitraryDecisionPermission = $("#arbitrary_decision_permission").prop("checked");

		var $target = $(targetULSelector);

		var action = '';

		if($minister.length > 0){
			ministerIdx = $minister.attr("data-minister-idx");
			ministerName = $minister.attr("data-minister-name");
			duty = $minister.attr("data-duty");
			orgIdx = $minister.attr("data-org-idx");
			orgMinisterIdx = $minister.attr("data-org-minister-idx");
			orgName = $minister.attr("data-org-name");

			var existOrgMinister = $target.find("li[data-org-minister-idx='" + orgMinisterIdx + "']").length > 0;

			if (lineProcess.duplicatedMinister == false) {
				if (existOrgMinister === true) {
					alert("중복으로 추가할 수 없습니다");
					return;
				}
			}

			if (arbitraryDecisionPermission === true) {
				if ($target.find("li[data-adp='true']").length > 0) {
					alert("전결자는 1명만 등록 가능합니다.");
					return;
				}
			}

			action = "minister";
		}else if($org.length > 0){
			orgIdx = $org.parent().attr("id");
			orgName = $.trim($org.text());

			if ($target.attr('id') == 'ul_approval') {
				alert("결재선에는 기관을 추가할 수 없습니다");
				return;
			}

			var existOrg = $target.find("li[data-org-idx='" + orgIdx + "']").length > 0;

			if (lineProcess.duplicatedMinister == false) {
				if (existOrg === true) {
					alert("중복으로 추가할 수 없습니다");
					return;
				}
			}

			action = "org";
		}else{
			alert('교역자나 기관을 선택해주세요');
			return;
		}

		var approvalMember = new ApprovalMember({
			'role': role,
			'roleCode': roleCode,
			'ministerIdx': ministerIdx,
			'ministerName': ministerName,
			'duty': duty,
			'orgIdx': orgIdx,
			'orgMinisterIdx': orgMinisterIdx,
			'orgName': orgName,
			'arbitraryDecisionPermission': arbitraryDecisionPermission
		});

		lineProcess.appendLine(approvalMember, type, action, $target)
	}
	,removeMinister : function(minister) {
		$(minister).remove();
	}
	,getLineTemplate: function() {
		return "<li class='list-group-item line-minister' data-org-minister-idx='[orgMinisterIdx]' data-adp='[adp]' data-org-idx='[orgIdx]'>" +
			"<input type='hidden' class='list_val' name='[type]_[action][]' value='[value]' />" +
			"[role][arbitraryDecisionPermission] [ministerName] [duty][orgName]" +
			"</li>";
	}
	,appendLine: function(approvalMember, type, action, target) {
		var template = lineProcess.getLineTemplate();
		template = template.replace("[orgMinisterIdx]", approvalMember.orgMinisterIdx);
		template = template.replace("[adp]", approvalMember.arbitraryDecisionPermission);
		template = template.replace("[orgIdx]", approvalMember.orgIdx);
		template = template.replace("[type]", type);
		template = template.replace("[action]", action);
		template = template.replace("[value]", JSON.stringify(approvalMember));
		template = template.replace("[role]", approvalMember.role);
		template = template.replace("[arbitraryDecisionPermission]", approvalMember.arbitraryDecisionPermission === true ? "(전결)" : "")
		template = template.replace("[ministerName]", approvalMember.ministerName);
		template = template.replace("[duty]", approvalMember.duty);
		template = template.replace("[orgName]", "(" + approvalMember.orgName + ")");

		var $newNode = $(template).appendTo($(target));
		$newNode.click(lineProcess.checkMinister);
	}
};

function ApprovalMember(obj) {
	if (typeof obj != 'undefined') {
		this.role = obj.role || '';
		this.roleCode = obj.roleCode || '';
		this.ministerIdx = obj.ministerIdx || 0;
		this.ministerName = obj.ministerName || '';
		this.duty = obj.duty || '';
		this.orgIdx = obj.orgIdx || 0;
		this.orgName = obj.orgName || '';
		this.orgMinisterIdx = obj.orgMinisterIdx || 0;
		this.arbitraryDecisionPermission = obj.arbitraryDecisionPermission || false;
	} else {
		this.role = '';
		this.roleCode = '';
		this.ministerIdx = 0;
		this.ministerName = '';
		this.duty = '';
		this.orgIdx = 0;
		this.orgName = '';
		this.orgMinisterIdx = 0;
		this.arbitraryDecisionPermission = false;
	}
}

var bookmark = {
	add: function(){
		$("#form").attr("action","/approval/approval_bookmark/save");
		$("#bookmark_idx").val("-1");
		$(".list-group").empty();
		$("input[name='approval_bookmark_name']").val("");
	},
		
	save : function(){
		var jsonLastApprovalMember = $("#ul_approval li:last-child input.list_val").val();
		var lastApprovalMember = JSON.parse(jsonLastApprovalMember);

		if (lastApprovalMember.roleCode == 'BT0402') {
			alert("참조자를 최종 결재자로 설정할 수 없습니다.");
			return;
		}

		$("#form").ajaxForm(function(result){
			var d = JSON.parse(result);
			alert(d.message);
			if(d.result == true){
				$("#bookmark_idx").val(d.data);
				$("#form").attr("action", "/approval/approval_bookmark/modify");
			}
		}).submit();
	},
	
	load : function(bookmarkIdx){
		$.ajax({
			url : "/approval/approval_bookmark/load/"+bookmarkIdx,
			type : 'post',
			dataType : "json"
		}).done(function(d){
			if(d.result == true){
				$("table .list-group").empty();
				var arrApproval = d.data.arr_approval;
				var arrBookmark = d.data.arr_bookmark;
				var arrReceiveMinister = d.data.arr_receive_minister;
				var arrReceiveOrg = d.data.arr_receive_org;

				for(var i=0,len=arrApproval.length; i<len; i++){
					var approval = arrApproval[i];
					var approvalMember = new ApprovalMember({
						'role': approval.approval_category_name,
						'roleCode': approval.approval_category,
						'ministerIdx': approval.minister_idx,
						'ministerName': approval.minister_name,
						'duty': approval.position_name,
						'orgIdx': approval.org_idx,
						'orgMinisterIdx': approval.org_minister_idx,
						'orgName': approval.org_name,
						'arbitraryDecisionPermission': approval.arbitrary_decision_permission == "T"
					});

					lineProcess.appendLine(approvalMember, "approval", "minister", "#ul_approval");
				}

				for(var i=0,len=arrReceiveMinister.length; i<len; i++){
					var receive = arrReceiveMinister[i];
					var approvalMember = new ApprovalMember({
						'roleCode': receive.receive_category,
						'ministerIdx': receive.minister_idx,
						'ministerName': receive.minister_name,
						'duty': receive.position_name,
						'orgIdx': receive.org_idx,
						'orgMinisterIdx': receive.org_minister_idx,
						'orgName': receive.org_name
					});

					var targetSelector = approvalMember.roleCode == "BT0401" ? "#ul_reception" : "#ul_completion";

					lineProcess.appendLine(approvalMember, "receive", "minister", targetSelector);
				}

				for(var i=0,len=arrReceiveOrg.length; i<len; i++){
					var receive = arrReceiveOrg[i];
					var approvalMember = new ApprovalMember({
						'roleCode': receive.receive_category,
						'orgIdx': receive.org_idx,
						'orgName': receive.name
					});

					var targetSelector = approvalMember.roleCode == "BT0401" ? "#ul_reception" : "#ul_completion";

					lineProcess.appendLine(approvalMember, "receive", "org", targetSelector);
				}

				$("input[name='approval_bookmark_name']").val(arrBookmark[0].name);
				$("#bookmark_idx").val(arrBookmark[0].bookmark_idx);
				$("#form").attr("action", "/approval/approval_bookmark/modify");
			}else{
				alert(d.message);
			}
		});
	},
	remove : function(){
		var bookmarkIdx = $("#bookmark_idx").val();
		if(bookmarkIdx == -1)
		{
			alert("삭제할 결재선을 불러와주세요");
			return;
		}

		if(confirm("이 결재선을 삭제합니다") == true){
			$.ajax({
				url : "/approval/approval_bookmark/remove/"+bookmarkIdx,
				type : 'post',
				dataType : "json"
			}).done(function(d){
				alert(d.message);
				if(d.result == true){
					document.location.reload();
				}
			});
		}
	}		
};