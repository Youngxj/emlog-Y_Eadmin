<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-image"></i> 自定义顶部图片</h2>
			</div>
			<div class="widget-content padding">
				<?php if(!$topimg || !file_exists('../' . $topimg)): ?>
					<div class="warning">当前未使用顶部图片或者使用中的顶部图片被删除</div>
				<?php else:?>
					<div id="topimg_preview"><img src="<?php echo '../'.$topimg; ?>" style="width: 100%;"/></div>
				<?php endif;?>
				<form action="configure.php?action=mod_config" method="post" name="input" id="input">
					<div class="topimg_line">可选图片</div>
					<div id="topimg_default">
						<?php 
						foreach ($topimgs as $val): 
							$imgpath = $val;
							if(is_array($val)) {
								$imgpath = $val['path'];
							}
							$imgpath_url = urlencode($imgpath);
							$mini_imgpath = str_replace('.jpg', '_mini.jpg', $imgpath);
							if (!file_exists('../' . $mini_imgpath)) {
								continue;
							}
							?>
							<div style="margin: 20px;">
								<a href="./template.php?action=update_top&top=<?php echo $imgpath_url; ?>" title="点击使用该图片" >
									<img src="../<?php echo $mini_imgpath; ?>" width="230px" height="48px" class="topTH" style="border: 1px dashed #777;"/>
								</a>
								<?php if (!is_array($val)):?>
									<li class="admin_style_info" >
										<a href="./template.php?action=del_top&top=<?php echo $imgpath_url; ?>" class="care btn btn-danger">删除</a>
									</li>
								<?php endif;?>
							</div>
						<?php endforeach; ?>

						<div style="margin: 20px 0 20px 0;">
							<a href="./template.php?action=update_top" title="不使用顶部图片" class="btn btn-default">
								不使用顶部图片
							</a>
						</div>
					</div>
				</form>
				<div class="topimg_line"><h2>自定义图片</h2></div>
				<form action="./template.php?action=upload_top" method="post" enctype="multipart/form-data" >
					<div id="topimg_custom">
						<li></li>
						<li>
							<input name="topimg" type="file" />
							<input type="submit" value="上传" class="btn btn-success" /> (上传一张你喜欢的顶部图片，支持JPG、PNG格式)
						</li>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_tpl").addClass('sidebarsubmenu1');
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['activated'])):?>EmlogMsgNotify('info','','顶部图片更换成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','裁剪图片失败','top right');<?php endif;?>
	}
</script>