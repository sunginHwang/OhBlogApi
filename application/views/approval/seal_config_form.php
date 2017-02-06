<style>
#table_seal th {
	text-align: center
}
</style>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.multimenu.min.css">
<link rel="stylesheet" href="/css/fontello.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="/css/flick/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="/css/jcarousel/jcarousel.connected-carousels.css">
<link rel="stylesheet" type="text/css" href="jcarousel.connected-carousels.css">
<?php include('config_header.php')?>
<div class="col-xs-12 col-lg-8">
	<div class="panel panel-default" style="margin-top: 30px">
		<div class="panel-body">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1,#bs-example-navbar-collapse-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form id="form_seal_upload" class="form-inline" role="form" enctype="multipart/form-data" method="post" action="/approval/seal/add" onsubmit='return validate(this)'>
							<ul class="navbar-form navbar-left" role="search">
								<li class="form-group" style="padding-top: 3px"></li>
								<li class="form-group" style="padding-top: 3px">
									<input id="file_seal" name="userfile" type="file" class="form-control input-sm btn btn-sm">
								</li>
								<li class="form-group" style="padding-top: 3px">
									<input placeholder="직인에 대한 설명" name="description" type="text" class="form-control input-sm">
								</li>
								<li class="form-group" style="padding-top: 3px">
									<button class="btn btn-sm default_button">저장</button>
								</li>
								<li class="form-group" style="padding-top: 3px">
									<img id="img_loading" src="/images/common/loading.gif" style="display: none">
								</li>
							</ul>
						</form>
					</div>
				</div>
			</nav>
			<div class="col-xs-12">
				<table id="table_seal" class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="col-xs-3">이미지</th>
							<th class="col-xs-8">설명</th>
							<th class="col-xs-1"></th>
						</tr>
					</thead>
<!--					<?php /*foreach($arr_seal as $seal):*/?>
						<tr>
						<td style="text-align: center">
							<img style="width: 50px; height: 50px" src="<?php /*echo '/'.SEAL_UPLOAD_PATH.$seal['file_name'];*/?>">
						</td>
						<td><?php /*echo $seal['description'];*/?></td>
						<td>
							<div class="glyphicon glyphicon-remove-circle" style="cursor: pointer; color: #b94a48" onclick="removeSeal('<?php /*echo $seal['seal_idx'];*/?>')"></div>
						</td>
					</tr>
					--><?php /*endforeach;*/?>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/json.js"></script>
<script src="/js/jquery.form.js"></script>

<script>

var maxFileSize = <?php /*echo SEAL_UPLOAD_FILE_SIZE;*/?>1*1000;
var options = { 
	    complete: function(response){
	    	var data = JSON.parse(response.responseText);
	    	alert(data.message);
	    	if(data.result == true){
		    	document.location.reload();
	    	}
	    }
	};
$('#form_seal_upload').ajaxForm(options);

function validate(form)
{
	if($("#file_seal").val() == '' || $("#file_seal").val().match(/\.(gif|jpg|png)$/g) == null){
		alert("jpg, gif, png 파일을 첨부해주세요");
		return false;
	}
	
	if(document.getElementById("file_seal").files[0].size > maxFileSize){
		alert("파일 사이즈는 3MB 이하여야 합니다.");
		return false;
	}

	return true;
}

function removeSeal(sealIdx)
{
	if(confirm('직인을 삭제합니다.') == true){
		$.post("/approval/seal/remove",{'seal_idx':sealIdx}, function(data){
			var d = JSON.parse(data);
			alert(d.message);
			if(d.result == true){
		    	document.location.reload();
	    	}
		});
	}
}


</script>