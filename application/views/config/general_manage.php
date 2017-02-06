
<style>
th,td {
	text-align: center
}
</style>
<div class="page_title" style="font-size: 16px; margin: 8px 0 0 3px;">
	<i class='icon-cog' style='font-size: 22px; color: #bbbbbb;'></i>
	<span><?php /*echo $page_title; */?>일반관리</span>
</div>
<div class="panel panel-default" style="position: absolute; left: 100px; right: 100px; top: 50px;">
	<div class="panel-heading">
		<h3 class="panel-title pull-left">총회 직인 및 로고 설정</h3>
		<div class="clearfix"></div>
	</div>
	<table class="table" style="margin: 0px">
		<colgroup>
			<col width="20">
			<col width="10">
			<col width="40">
			<col width="30">
		</colgroup>
		<thead>
			<tr>
				<th>대구분</th>
				<th>소구분</th>
				<th>파일 선택</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr id="tr_AL">
				<td rowspan="3">로고 등록</td>
				<td>행정서류</td>
				<td>
					<form id="form_AL" action="/config/seal/add/AL" method="post" enctype="multipart/form-data">
						<input name="AL" type="file" class="form-control">
					</form>
				</td>
				<td>
					<button class="btn btn-primary btn-sm" style="display: none" onclick="seal.add('AL');">저장</button>
					<button class="btn btn-success btn-sm" style="display: true<?php /*echo empty($arr_seal_AL) === TRUE ? 'none' : ''*/?>" onclick="seal.show('AL');">미리보기</button>
				</td>
			</tr>
			<tr id="tr_BG">
				<td>배경</td>
				<td>
					<form id="form_BG" action="/config/seal/add/BG" method="post" enctype="multipart/form-data">
						<input name="BG" type="file" class="form-control">
					</form>
				</td>
				<td>
					<button class="btn btn-primary btn-sm" style="display: none" onclick="seal.add('BG');">저장</button>
					<button class="btn btn-success btn-sm" style="display: TRUE<?php /*echo empty($arr_seal_BG) === TRUE ? 'none' : ''*/?>" onclick="seal.show('BG');">미리보기</button>
				</td>
			</tr>
			<tr id="tr_FL">
				<td>재단서류</td>
				<td>
					<form id="form_FL" action="/config/seal/add/FL" method="post" enctype="multipart/form-data">
						<input name="FL" type="file" class="form-control">
					</form>
				</td>
				<td>
					<button class="btn btn-primary btn-sm" style="display: none" onclick="seal.add('FL');">저장</button>
					<button class="btn btn-success btn-sm" style="display: true<?php /*echo empty($arr_seal_FL) === TRUE ? 'none' : ''*/?>" onclick="seal.show('FL');">미리보기</button>
				</td>
			</tr>
			<tr id="tr_S">
				<td>직인 등록</td>
				<td></td>
				<td>
					<form id="form_S" action="/config/seal/add/S" method="post" enctype="multipart/form-data">
						<input name="S" type="file" class="form-control">
					</form>
				</td>
				<td>
					<button class="btn btn-primary btn-sm" style="display: none" onclick="seal.add('S');">저장</button>
					<button class="btn btn-success btn-sm" style="display: true<?php /*echo empty($arr_seal_S) === TRUE ? 'none' : ''*/?>" onclick="seal.show('S');">미리보기</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center; padding:30px">
			<img id="img_seal_preview" src="">
		</div>
	</div>
</div>
<script>
$("input[type='file']").on("change",function(){
	$(this).parent().parent().parent().find(".btn-primary").show();
});

var seal = {
	add : function(sealCategory){
		console.log($("#form_"+sealCategory));
		$("#form_"+sealCategory).ajaxForm(function(data){
			data = JSON.parse(data);
			alert(data.message);
			if(data.result == true){
				$("#tr_"+sealCategory+" .btn-success").show();
			}
		}).submit();
	},

	show : function(sealCategory){

		$.ajax({
			type:'get',
			url:'/config/seal/show/'+sealCategory,
			dataType:'json',
		}).done(function(d){
			$("#img_seal_preview").attr("src","/"+d.data);
			
			$(".modal").modal().on("shown.bs.modal",function(e){
				$(".modal-dialog").css("width",(parseInt($("#img_seal_preview").css("width"))+100)+"px");
			});
		});
	}
};
</script>
