<div class="page_title" style="font-size:16px;margin:8px 0 10px 3px;">
	<i class='icon-cog' style='font-size:22px;color:#bbbbbb;'></i> <span><?php /*echo $page_title; */?>각 카테고리 제목</span>
</div>
<div class="col-md-12"  id="div_config_tab">
	<ul class="nav nav-tabs">
		<li id="tab1"><a href="/approval/main/modify_approval_line_form">결재선</a></li>
		<li id="tab2"><a href="/approval/main/modify_seal_form">직인(서명)</a></li>
		<li id="tab3"><a href="/approval/main/modify_password_form">비밀번호</a></li>
		<li id="tab4"><a href="/approval/main/modify_proxy_approval_form">대리결재자</a></li>
		<li id="tab5"><a href="/approval/main/modify_notify_form">알림</a></li>
	</ul>
</div>
<script>
$("#div_config_tab #<?php /*echo $sub_tab_id;*/?>1").addClass("active");
</script>

