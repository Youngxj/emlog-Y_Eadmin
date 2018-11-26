<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l" id="container">
	<script>
		$(function () {
			setTimeout('Emlogalert()',100);
		});
		function Emlogalert(){
			<?php if(isset($_GET['activated'])):?>EmlogMsgNotify('info','','模板更换成功','top right');<?php endif;?>
			<?php if(!$nonceTplData): ?>
			EmlogMsgNotify('error','','当前使用的模板(<?php echo $nonce_templet; ?>)已被删除或损坏，请选择其他模板。','top right');
			<?php else:?>
			<?php if(isset($_GET['activate_install'])):?>EmlogMsgNotify('info','','模板上传成功','top right');<?php endif;?>
			<?php if(isset($_GET['activate_del'])):?>EmlogMsgNotify('info','','删除模板成功','top right');<?php endif;?>
			<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','删除失败，请检查模板文件权限','top right');<?php endif;?>
			<?php endif;?>
		}
	</script>

	<div>
		<div class="col-lg-12 tpl_title">
			<div class="widget float-e-margins containertitle2">
				<div class="widget-content padding n_tpl_list adm_tpl_list">
					<p>当前使用的模板(<?php echo $nonce_templet; ?>)</p>
					<div class="row theme-tpl">
						<?php foreach($tpls as $key=>$value):?>
							<div class="col-md-3 tpls">
								<div class="panel panel-default <?php if($nonce_templet == $value['tplfile']){echo "active";} ?>">
									<div class="panel-body theme-screenshot">
										<a data-toggle="modal" data-target="#<?php echo $value['tplfile']; ?>">
											<img src="<?php echo TPLS_URL.$value['tplfile']; ?>/preview.jpg">
										</a>
									</div>
									<a data-toggle="modal" data-target="#<?php echo $value['tplfile']; ?>" ><span class="more-details" id="bluebox-action">主题详情</span></a>
									<div class="panel-heading" style="padding: 10px 5px;">
										<div class="pull-left"><?php echo $value['tplname']; ?></div>
										<div class="pull-right">
											<div class="btn-group btn-group-xs">
												<a href="template.php?action=usetpl&tpl=<?php echo $value['tplfile']; ?>&side=<?php echo $value['sidebar']; ?>&token=<?php echo LoginAuth::genToken(); ?>" class="btn btn-info btn-sm dropdown-toggle">启用</a>
												<a href="javascript:em_confirm('<?php echo $value['tplfile']; ?>', 'tpl', '<?php echo LoginAuth::genToken(); ?>');" class="btn btn-danger btn-sm dropdown-toggle">删除</a>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>
					<a href="template.php?action=install" class="btn btn-success">添加新主题</a>
				</div>
			</div>
		</div>
	</div>
	<?php foreach($tpls as $key=>$value):?>
		<div class="modal fade" id="<?php echo $value['tplfile']; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;filter:alpha(opacity=100);">
			<div class="modal-dialog">
				<div class="modal-content" style="border-radius:0px;z-index:1080">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><?php echo $value['tplname']; ?></h4>
					</div>
					<div class="modal-body" >
						<div class="row theme_ntpls">
							<div class="col-md-5 theme-preview">
								<div class="screenshot"><img src="<?php echo TPLS_URL.$value['tplfile']; ?>/preview.jpg" alt=""></div>
							</div>
							<div class="col-md-7 theme-info">
								<h3 class="theme-name"><?php echo $value['tplname']; ?><span class="theme-version">版本：<?php echo $value['Version']?$value['Version']:'1.2'; ?></span></h3>
								<h4 class="theme-author"><?php echo $value['Author']?$value['Author']:'emlog'; ?></h4>
								<p class="theme-description"><?php echo $value['Des']?$value['Des']:'默认模板，简洁优雅'; ?></p>

								<?php if ($value['tplfile'] == 'default'): ?>
									<div class="custom_top_button"><a href="./template.php?action=custom-top">自定义顶部图片</a></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="btn-group btn-group-xs">
							<a class="btn btn-info" href="template.php?action=usetpl&tpl=<?php echo $value['tplfile']; ?>&side=<?php echo $value['sidebar']; ?>&token=<?php echo LoginAuth::genToken(); ?>">启用</a>
							<a class="btn btn-danger" href="javascript: em_confirm('<?php echo $value['tplfile']; ?>', 'tpl', '<?php echo LoginAuth::genToken(); ?>')" >删除</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach;?>
	<script type="text/javascript">
		$("#menu_category_view").addClass('active');
		$("#menu_tpl").addClass('active');
	</script>
</div>