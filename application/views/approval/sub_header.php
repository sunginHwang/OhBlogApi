<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">
<style>
	.nav-cog li a {font-size:12px;}	
	.default_button{background: #27af61 !important; color: white; border:1px solid #27af61}
</style>
<div class="<?php /*echo isset($menu_id) ? 'snb_'.$menu_id : null; */?>snb_approval" style="position:absolute;width:176px;top:0;bottom:0;margin:5px;">
	<ul class="nav nav-pills nav-stacked nav-cog">
		<li class="li_home">
			<a href="/approval/Main">전자결재 요약</a>
		</li>
		<!--<li class="li_create">
			<a href="/approval/main/create_approval_document">결재문서 작성</a>
		</li>-->
		<li class="li_create2 active">
			<a href="/approval/Main/approval_form_list">문서양식 목록</a>
		</li>
		<li class="li_receive">
			<a href="/approval/Main/list_my_receive_approval">내가받은 결재</a>
		</li>
		<li class="li_send">
			<a href="/approval/Main/list_my_send_approval">내가올린 결재</a>
		</li>
		<li class="li_org_receive">
			<a href="/approval/Main/list_organization_receive_approval">수신부서함</a>
		</li>
		<li class="li_ref_display">
			<a href="/approval/Main/list_reference_display_approval">공람함</a>
		</li>
		<li class="li_config">
			<a href="/approval/Main/config_approval">전자결재 설정</a>
		</li>
	</ul>
</div>
<div style="position:absolute;left:185px;top:0;bottom:0;width:1px;margin:1px;background-color:#aaa;">
</div>
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/json.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script>
$(".nav-cog").find("li.li_<?php /*echo $sub_menu_id; */?>1").addClass("active");
</script>
<div style="position:absolute;left:186px;right:0;top:0;bottom:0;overflow:auto;">
