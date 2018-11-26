<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>try{setTimeout(hideActived,2600);}catch(err){}</script>
<div class="row content_l">
	
	<?php if(isset($_GET['error_c'])): ?>
		<div class="alert alert-info">
			手动安装插件： <br />
			1、把解压后的插件文件夹上传到 content/plugins 目录下。<br />
			2、登录后台进入插件管理,插件管理里已经有了该插件，点击激活即可。<br />
		</div>
	<?php endif; ?>
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-plug fa-fw"></i> 插件安装</h2>
			</div>
			<div class="widget-content padding">
				<form action="./plugin.php?action=upload_zip" method="post" class="form-inline" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-6">
							<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
							<input name="pluzip" type="file" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-12">
							<input type="submit" value="上传安装" class="btn btn-info" /> （上传一个zip压缩格式的插件安装包）
						</div>
					</div>
				</form>
				<div style="margin:10px 20px;">获取更多插件：<a href="store.php">应用中心&raquo;</a></div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_category_sys").addClass('active');
	$("#menu_plug").addClass('active');
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){

		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','只支持zip压缩格式的插件包','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','上传失败，插件目录(content/plugins)不可写','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','空间不支持zip模块，请按照提示手动安装插件','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','请选择一个zip插件安装包','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','安装失败，插件安装包不符合标准','top right');<?php endif;?>
	}
</script>