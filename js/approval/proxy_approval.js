
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
	
	var checkMinister = function() {
		var orgMinisterIdx = $(this).attr("id").replace("minister","");
		var ministerName = $(this).find(".minister_name").text();
		var positionName = $(this).find(".position_name").text();
		$("input[name='org_minister_idx']").val(orgMinisterIdx);
		$(".span_minister_name").text(ministerName + " " + positionName);
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
				var org_name = minister_list[i].org_name == null ? '' : minister_list[i].org_name;
				var minister_name = minister_list[i].minister_name == null ? '' : minister_list[i].minister_name;
				var name = minister_list[i].name == null ? '' : minister_list[i].name;
				var minister_idx = minister_list[i].org_minister_idx; 
				$('.minister_list tbody').append('<tr class="minister" id="minister' + minister_idx + '"><td class="org_name">'+org_name+'</td><td class="minister_name">'+minister_name+'</td><td class="position_name">'+name+'</td></tr>');
			}
		}
		$('.minister').click(checkMinister);
	});
};

$(document).ready(function(){
	showOrgChart();
	showPositionCode();
	$(".datetimepicker").datetimepicker({
		dateFormat : "yy-mm-dd",
		timeFormat : "HH:mm:ss"
	});
});

var proxyApproval = {
	saveByDocument : function(){
		if($("#form1 input[name='org_minister_idx']").val() == ''){
			alert("조직도에서 목회자를 선택하세요");
			return false;
		}

		if($("#form1 select[name='form_idx'] option:selected").attr("value") == ''){
			alert("문서를 선택하세요");
			return false;
		}
		
		$("#form1").ajaxForm(function(result){
			console.log(result);
			var d = JSON.parse(result);
			alert(d.message);
			if(d.result == true){
				document.location.reload();
			}
		}).submit();
	},
	saveByRange : function(){
		if($("#form2 input[name='org_minister_idx']").val() == ''){
			alert("조직도에서 목회자를 선택하세요");
			return false;
		}

		if($("#form2 input[name='start_date']").val() > $("#form2 input[name='end_date']").val()){
			alert("시작 날짜는 종료 날짜보다 클 수 없습니다.");
			return false;
		}
		
		$("#form2").ajaxForm(function(result){
			console.log(result);
			var d = JSON.parse(result);
			alert(d.message);
			if(d.result == true){
				document.location.reload();
			}
		}).submit();
	},
	remove : function(proxyApprovalIdx, event){
		if(confirm("삭제하시겠습니까?") == true){
			$.ajax({
				url : '/approval/proxy_approval/remove/'+proxyApprovalIdx
				,dataType : "json"
			}).done(function(d){
				if(d.result == true){
					var parent = $("#tr_"+proxyApprovalIdx).parent();
					$("#tr_"+proxyApprovalIdx).remove();

					if(parent.find("tr[class!='tr_empty']").length == 0){
						$(".tr_empty").show();
					}
				}else{
					alert(d.message);
				}
			});
		}
		
		event.stopPropagation();
	},
	get : function(proxyApprovalIdx){
		
		$.ajax({
			url : '/approval/proxy_approval/get/'+proxyApprovalIdx
			,dataType : "json"
		}).done(function(d){
			if(d.result == true){
				var data = d.data;
				var isUse = data.is_use == "Y" ? 1 : 0;
				if(data.form_idx != null){
					var isReceive = data.is_receive == "Y" ? 1 : 0;

					$("#form1 input[name='proxy_approval_idx']").val(data.proxy_approval_idx);
					$("#form1 .span_minister_name").text(data.minister_name+" "+data.position_name);
					$("#form1 input[name='org_minister_idx']").val(data.org_minister_idx);
					$("#form1 input[name='is_use']").prop("checked",false);
					$("#form1 input[name='is_use'][value='"+isUse+"']").prop("checked",true);
					

					$("#form1 input[name='is_receive']").prop("checked",false);
					$("#form1 input[name='is_receive'][value='"+isReceive+"']").prop("checked",true);
					$("#form1 select[name='form_idx'] option[value='"+data.form_idx+"']").attr("selected","selected");
					$("#form1").attr("action","/approval/proxy_approval/updateByDocument");
					
				}else{
					$("#form2 input[name='proxy_approval_idx']").val(data.proxy_approval_idx);
					$("#form2 .span_minister_name").text(data.minister_name+" "+data.position_name);
					$("#form2 input[name='org_minister_idx']").val(data.org_minister_idx);
					$("#form2 input[name='is_use']").prop("checked",false);
					$("#form2 input[name='is_use'][value='"+isUse+"']").prop("checked",true);
					
					$("#form2 input[name='start_date']").val(data.start_date);
					$("#form2 input[name='end_date']").val(data.end_date);
					$("#form2").attr("action","/approval/proxy_approval/updateByRange");
				}

			}else{
				alert(d.message);
			}
		});
	}
};