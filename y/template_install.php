<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">

	<?php if(isset($_GET['error_c'])): ?>
		<div class="alert alert-info">
			手动安装模板： <br />
			1、把解压后的模板文件夹上传到 content/templates目录下。 <br />
			2、登录后台换模板，模板库中已经有了你刚才添加的模板，点击使用即可。 <br />
		</div>
	<?php endif; ?>
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-eye fa-fw"></i> 模版安装</h2	>
			</div>
			<div class="widget-content padding">
				<form action="./template.php?action=upload_zip" method="post" class="form-inline" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-6">
							<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
							<input name="tplzip" type="file" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-12">
							<input type="submit" value="上传安装" class="btn btn-info" /> （上传一个zip压缩格式的插件安装包）
						</div>
					</div>
				</form>
				<div style="margin:10px 20px;">获取更多模板：<a href="store.php">应用中心&raquo;</a></div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_category_view").addClass('active');
	$("#menu_tpl").addClass('active');
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','只支持zip压缩格式的模板包','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','上传失败，模板目录(content/plugins)不可写','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','空间不支持zip模块，请按照提示手动安装模板','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','请选择一个zip模板安装包','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','安装失败，模板安装包不符合标准','top right');<?php endif;?>
	}
</script>