<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="/css/stat/manage.css?151001">
<style>
	.nav-cog li a {font-size:12px;}
	.default_button{background: #7b44ae !important; color: white; border:1px solid #7b44ae}
	.nav-pills > li.active > a{background-color: #ffffff;}
	.actives > a{color: #FBA244;}
	.li_create2 .sub_li > a{display: none;}
	.sub_li > a:before {content:"- ";color:#555555;}
	.li_create2{font-weight: bold;}
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

<div class="snb_approval" style="position:absolute;width:141px;top:0;bottom:0;">
	<div class="config-nav-title"><i class='glyphicon glyphicon-signal' style="color:#FBA244;"></i>교세통계</div>

	<ul class="nav nav-pills nav-stacked">

		<!--<li class="li_create">
			<a href="/approval/main/create_approval_document">결재문서 작성</a>
		</li>-->
		<li class="li_create2">
			<a href="#">전체통계</a>
		</li>
		<li id='local_total' class="li_create2 actives">
			<a href="#">지방회별 통계</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">서울지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">경기지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">인천지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">강원지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">충청지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">경기지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">경기지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">경기지역</a>
		</li>
		<li class="li_create2 sub_li">
			<a href="#">경기지역</a>
		</li>

		<li class="li_create2">
			<a href="#">개교회별통계</a>
		</li>
	</ul>
</div>
<div style="position:absolute;left:139px;top:0;bottom:0;width:1px;margin:1px;background-color:#D0D0D0;">
</div>
<script src="/js/jquery-1.10.2.min.js"></script>>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/bower_components/underscore/underscore-min.js"></script>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/moment/min/moment-with-locales.min.js?1"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/common.js?20160119" ></script>


<script>
	var now_menu = 'system';

	$(function(){
		if(now_menu !== '') {
			var target = $("li[data-kind="+now_menu+"]");
			target.addClass("active");
			if(target.parents("li").length > 0)
				target.parents("li").addClass("active");
		}

		$(".config-nav>li:has(>ul)>a").on("click",function(){
			$(this).siblings("ul").find(">li:first-child>a").get(0).click();
		});
	});

</script>
<div style="position:absolute;left:141px;right:0;top:0;bottom:0;overflow:auto;">
