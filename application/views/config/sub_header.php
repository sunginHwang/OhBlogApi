<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">
<style>
	.nav-cog li a {font-size:12px;}
	.default_button{background: #7b44ae !important; color: white; border:1px solid #7b44ae}
</style>
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/json.js"></script>
<script src="/js/jquery.form.js"></script>
<!--[if lt IE 9]>
  <script src="/js/html5shiv.js"></script>
  <script src="/js/respond.min.js"></script>
<![endif]-->
<div class="<?php /*echo isset($menu_id) ? 'snb_'.$menu_id : null; */?>" style="position:absolute;width:130px;top:0;bottom:0;padding:5px;z-index: 3;background-color: #fff;">
	<ul class="nav nav-pills nav-stacked nav-cog">
		<li class="li_main active">
			<a href="/config/main">일반관리</a>
		</li>
		<?php /*if ($has_master_authority === TRUE) { */?>
		<li class="li_auth">
			<a href="/config/auth/auth_group">권한관리</a>
		</li>
		<?php /*} */?>
		<?php /*if($document_form_auth === TRUE):*/?>
		<li class="li_document_form">
			<a href="/config/document_form">문서양식설정</a>
		</li>
		<?php /*endif;*/?>
		<li class="li_approval_config">
			<a href="/config/approval_config">결재환경설정</a>
		</li>
	</ul>
</div>
<div style="position:absolute;left:140px;top:0;bottom:0;width:1px;margin:0px;background-color:#aaa;z-index: 3;">
</div>
<script src="/bower_components/underscore/underscore-min.js"></script>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/moment/min/moment-with-locales.min.js?1"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/common.js?20160119" ></script>
<script>
$(".nav-cog").find("li.li_<?php /*echo $sub_menu_id; */?>").addClass("active");
</script>
<div style="position:absolute;left:141px;right:0;top:0;bottom:0;overflow:auto;">
