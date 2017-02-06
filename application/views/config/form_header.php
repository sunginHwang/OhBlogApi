<style>
	a.format_title:hover {
		color: #e73c50;
	}
	a:hover {
		color: #e73c50;
	}
	.navbar {
		margin-bottom: 0px;
	}
	.nav-tabs {
		border-bottom: 0px;
	}
	.nav-tabs>li>a {
		border-radius: 3px;
		border: 0px;
		background-color: #e0e0e0;
		font-weight: bold;
	}
	.nav-tabs>li>a:hover {
		color: #27af61;
	}
	.nav-tabs>li+li {
		margin-left: 3px;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
		background-color: #27af61;
		color: #fff;
		border: 0px;
	}
</style>
<div class="col-md-12" id="div_config_tab" style="background-color: #f3f3f3;padding-top: 10px;">
	<ul class="nav nav-tabs">
		<li id="li_header">
			<a href="/config/document_form/approval_document_header_config_form"> 헤더 양식 설정</a>
		</li>
		<li id="li_content">
			<a href="/config/document_form/approval_document_content_config_form"> 본문 양식 설정</a>
		</li>
	</ul>
</div>
<script>
$("#div_config_tab #<?php /*echo $sub_tab_id;*/?>1").addClass("active");
</script>
