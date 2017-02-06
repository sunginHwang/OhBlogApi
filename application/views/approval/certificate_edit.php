
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?/*=$title*/?>수정제목</title>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.touchspin.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>

<!-- <script src="/js/bootstrap-datepicker.js"></script> -->
<script src='/js/fastclick.js'></script>
<script type="text/javascript" src="/js/se/js/HuskyEZCreator.js" charset="utf-8"></script>
<link rel="stylesheet" href="/css/fontello.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/css/default.css" rel="stylesheet">
<!-- <link href="/css/datepicker.css" rel="stylesheet"> -->
<link href="/css/flick/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/jcarousel/jcarousel.connected-carousels.css">
<!--[if lt IE 9]>
  <script src="/js/html5shiv.js"></script>
  <script src="/js/respond.min.js"></script>
<![endif]-->
<style>
<!--
.navbar-nav.navbar-right:last-child {margin-right: 0px;}
body {overflow-y: auto;margin-top: 50px;}
-->
</style>
</head>


<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?/*=$title*/?>수정a태그제목</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="javascript:selectSealDocument()"><span class="glyphicon glyphicon-qrcode"></span> 직인삽입</a></li>
        <li><a href="/approval/approval/certificate/view/<?php /*echo $application_idx; */?><?php /*echo $language; */?>"><span class="icon-doc-text"></span> 미리보기</a></li>
        <li><a href="javascript:save();"><span class="icon-floppy"></span> 저장</a></li>
        <li><a href="javascript:window.close();"><span class="icon-cancel-circled"></span> 닫기</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div id="wrap" style="width:715px;margin:auto;position:relative">
		<div id="div_content">
			<textarea name="content" id="ir1" rows="10" cols="100" style="width: 100%; height:800px; display: none;"><?php /*echo $content;*/?>수정제목콘텐츠</textarea>
		</div>
	</div>
<div id="modal" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content"></div>
	</div>
</div>
<script type="text/javascript" src="/js/jcarousel/jquery.jcarousel.min.js"></script> 
<script type="text/javascript">
var oEditors = [];
var lang = "<?php echo $language; ?>";
function save(){
	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	$.ajax({
		url : '/approval/approval/edit_certificate/<?php /*echo $application_idx; */?>/*/*/<?php /*echo $language; */?>',
		type : 'post',
		dataType : 'json',
		data : { content : $('#ir1').val() }
		}).done(function(data){
			alert(data.msg);
			if(!data.result){
				window.onbeforeunload = null;
				window.close();
			}
		});
}

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/js/se/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				
		bUseVerticalResizer : true,		
		bUseModeChanger : true,		
		fOnBeforeUnload : function(){}
	},
	fOnAppLoad : function(){
	},
	fCreator: "createSEditor2"
});
window.onbeforeunload = function(e) {
    return '저장하지 않은 내용은 잃게 됩니다.';
};

function selectSealDocument(){
	if(confirm("총회 직인 및 총회장 직인을 삽입합니다.")){

		var seal = "<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'seal.png'; */?>";
		var general_seal = "<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'general_seal.png'; */?>";
	var content = $(oEditors.getById["ir1"].getIR()).clone().wrapAll("<div/>").parent();

		if($(content).find("#end_area #seal").length > 0){
			alert("이미 직인이 삽입되었습니다.")
		}else{
			if(lang == "eng"){
				$(content).find("#end_area div:last-child").append($("<img/>",{"src":seal}).attr("id","seal").css("opacity","0.7").css("position","absolute").css("width","100px").css("height","100px").css("left","486px").css("top","-50px"));
				$(content).find("#end_area div:first-child").append($("<img/>",{"src":general_seal}).attr("id","general_seal").css("opacity","0.7").css("position","absolute").css("width","75px").css("height","75px").css("left","411px").css("top","-11px"));
			}else{
				$(content).find("#end_area div:first-child").append($("<img/>",{"src":seal}).attr("id","seal").css("opacity","0.7").css("position","absolute").css("width","100px").css("height","100px").css("left","486px").css("top","-50px"));
				$(content).find("#end_area div:last-child").append($("<img/>",{"src":general_seal}).attr("id","general_seal").css("opacity","0.7").css("position","absolute").css("width","75px").css("height","75px").css("left","489px").css("top","4px"));
			}

			oEditors.getById["ir1"].setIR($(content).html());
			$("iframe").contents().find("#se2_iframe").contents().scrollTop($("iframe").contents().find("#se2_iframe").contents().height());
		}
	}
}

function insertSeal(){
	var sealTag = $("#div_seal_list li[class='active']").html();
	var width = $("#div_seal_list li[class='active']").data("width") != undefined ? $("#div_seal_list li[class='active']").data("width") : "110px";
	var height = $("#div_seal_list li[class='active']").data("height") != undefined ? $("#div_seal_list li[class='active']").data("height") : "110px";
	
	if(sealTag == null){
		alert('직인(로고)를 선택해주세요');
		return;
	}

	sealTag = $(sealTag).addClass("dragSeal").css("opacity","0.7").css("position","absolute").attr("width",width).attr("height",height);
	var div = $("<div/>",{class:"dragWrapper"}).append(oEditors.getById["ir1"].getIR()).prepend(sealTag);
	div.find(".dragWrapper").css("position","");
	div.find(".dragWrapper:first").css("position","relative");
	var modalObj = $("#modal_seal_insert_content").html().replace("{CONTENT}",div.html());
	$(".modal .modal-content").html(modalObj);
	var width = parseInt($("iframe").contents().find("iframe").contents().find("body").css("width"));
	$(".modal-lg").css("width",width);
	$(".modal .modal-content .dragSeal").draggable({ containment: ".modal-content", scroll: false });
}

function insertSealReal(){
	var tag = $(".modal-body").html();
	oEditors.getById["ir1"].setIR(tag);
	$(".modal").modal('hide');
}
</script>
</body>
</html>

<!-- 직인선택 버튼을 눌렀을 때 모달 박스 내용 -->
<script id="modal_seal_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">삽입할 직인(로고)를 선택해주세요</h4>
</div>
<div class="modal-body">
	<div class="wrapper">
		<div class="connected-carousels">
			<div class="stage" style="align:center">
<!--				<?php /*if(sizeof($arr_seal) > -1) :*/?>
				<div class="carousel carousel-stage" style="width:220px; margin:auto">
					<ul>
						<li>
							<div><img src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'seal.png'; */?>?20150506" width="200px" height="200px" alt=""></div>
							<div style="padding-top:10px; text-align:center; width:200px; word-break:break-all">총회직인</div>
						</li>
						<li>
							<div><img src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'general_seal.png'; */?>?20150506" width="200px" height="200px" alt=""></div>
							<div style="padding-top:10px; text-align:center; width:200px; word-break:break-all">총회장인</div>
						</li>
						<?php /*foreach($arr_seal as $seal) :*/?>
							<li>
								<div><img src="/uploads/seal/<?php /*echo $seal['file_name']*/?>" width="200px" height="200px" alt=""></div>
								<div style="padding-top:10px; text-align:center; width:200px; word-break:break-all"><?php /*echo $seal['description']*/?></div>
							</li>
						<?php /*endforeach; */?>
					</ul>
				</div>
				<a href="#" class="prev prev-stage" style="height:100% !important"><span>&lsaquo;</span></a> 
				<a href="#" class="next next-stage" style="height:100% !important"><span>&rsaquo;</span></a>
				<?php /*elseif(sizeof($arr_seal) === -1) :*/?>
					<p>사용할 수 있는 직인이 없습니다.</p>
					<p><a style="font-weight:bold" href="/approval/main/modify_seal_form">전자결재>전자결재 설정>직인(서명)</a> 에서 직인을 설정 할 수 있습니다.</p>
				--><?php /*endif;*/?>
			</div>

<!--			--><?php /*if(sizeof($arr_seal) > -1) :*/?>
			<div class="navigation">
				<a href="#" class="prev prev-navigation">&lsaquo;</a> <a href="#"
					class="next next-navigation">&rsaquo;</a>
				<div class="carousel carousel-navigation" id="div_seal_list">
					<ul>
<!--						<li><img src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'seal.png'; */?>?20150506" width="50px" height="50px" alt=""></li>
						<li data-width="60px" data-height="60px"><img src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.'general_seal.png'; */?>?20150506" width="50px" height="50px" alt=""></li>
						<?php /*foreach($arr_seal as $seal) :*/?>
							<li><img src="/uploads/seal/<?php /*echo $seal['file_name']*/?>" width="50px" height="50px" alt=""></li>
						--><?php /*endforeach; */?>
					</ul>
				</div>
			</div>
<!--			--><?php /*endif;*/?>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default input-sm" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button input-sm"
		onclick="insertSeal();">삽입</button>
</div>
</script>
<!-- 직인선택 버튼을 눌렀을 때 모달 박스 내용 -->
<!-- 직인 위치지정 -->	
<script id="modal_seal_insert_content" type="text/html">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title">직인의 위치를 움직여 삽입할 자리를 찾으세요</h4>
</div>
<div class="modal-body">
{CONTENT}	
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default input-sm" data-dismiss="modal">취소</button>
	<button type="button" class="btn default_button input-sm"
		onclick="insertSealReal();">삽입</button>
</div>
</script>
<!-- 직인 위치지정 -->
