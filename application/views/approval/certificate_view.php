<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?/*=$title*/?>증명서출력뷰</title>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.touchspin.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>

<!-- <script src="/js/bootstrap-datepicker.js"></script> -->
<script src='/js/fastclick.js'></script>

<link rel="stylesheet" href="/css/fontello.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/css/default.css" rel="stylesheet">
<!-- <link href="/css/datepicker.css" rel="stylesheet"> -->
<link href="/css/flick/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<!--[if lt IE 9]>
  <script src="/js/html5shiv.js"></script>
  <script src="/js/respond.min.js"></script>
<![endif]-->
<style>
<!--
.navbar-nav.navbar-right:last-child {margin-right: 0px;}
.print_watermark {display:none;}
@media print {
.navbar {display: none;}
#wrap { zoom:1;}
.print_<?php /*echo $certificate_mode; */?>view {display:block;}
}
#wrap { zoom:0.9; margin-top: 50px;}
body {overflow-y: auto;}
-->
</style>

	<![if !IE]>
		<style>
			.bottom_message1{letter-spacing: 1.25px}
			.bottom_message2{letter-spacing: 1.9px}
		</style>
		<script>
			function wprint(){
				window.print();
			}
		</script>
	<![endif]-->
	<![if IE]>
		<style>
			.bottom_message1{letter-spacing: 0.8px}
			.bottom_message2{letter-spacing: 1.5px}
		</style>
		<script>
			function wprint(){
				window.print();
			}
		</script>
	<![endif]-->


</head>


<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?/*=$title*/?>a태그 제목</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="/approval/approval/certificate/edit/<?php /*echo $application_idx; */?><?php /*echo $language; */?>"><span class="icon-pencil"></span> 수정</a></li>
        <li><a href="javascript:wprint();"><span class="icon-print"></span> 인쇄</a></li>
        <li><a href="javascript:window.close();"><span class="icon-cancel-circled"></span> 닫기</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="print_watermark print_ADMIN">
<div style="position:relative;width:65%;top:3%;left:47%;margin-left:-30%;text-align:center;padding-top:30px;">
	<img style="width:90%" src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.$seal_top; */?>?20150722">
</div>
<img style="position:absolute;width:55%;top:58%;left:52%;margin-left:-30%;margin-top:-30%;opacity: 0.3" src="<?php /*echo '/'.GENERAL_SEAL_UPLOAD_PATH.$seal_middle; */?>?20150506">

<div style="position:absolute;width:90%;bottom:3%;left:50%;margin-left:-45%;text-align:center;font-size:0.9em;overflow:hidden;">
<hr>
<span class="bottom_message1">
	[150-870] 서울특별시 영등포구 국회대로 76길 10(여의도동) 12층 Tel. 02-2683-6693, Fax. 02-3666-7007
</span>
<br/>
<span class="bottom_message2">
	10, Gukhoe-daero 76-gil, Yeongdeungpo-gu, Seoul, Korea  /  http://www.koreabaptist.or.kr
</span>
</div>
</div>

<div class="print_watermark print_FOUND" style="position:relative;margin-bottom:200px;">
</div>

	<div id="wrap" style="width:610px;padding-left:21px; position:relative;margin:auto; ">
		<?/*=$content*/?>출력내용
	</div>
	
</body>
</html>
