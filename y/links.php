<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="row content_l">

	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="fa fa-link fa-fw"></i> 友情链接管理</h2>
			</div>
			<div class="widget-content">
				<form action="link.php?action=link_taxis" method="post">
					<div class="table-responsive">
						<table data-sortable class="table table-hover">
							<thead>
								<tr>
									<th width="50">排序</th>
									<th>链接</th>
									<th>状态</th>
									<th>描述</th>
									<th>操作</th>
								</tr>
							</thead>

							<tbody>
								<?php 
								if($links):
									foreach($links as $key=>$value):
										doAction('adm_link_display');
										?>  
										<tr>
											<td><input class="num_input" name="link[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" maxlength="4" /></td>
											<td><a href="link.php?action=mod_link&amp;linkid=<?php echo $value['id']; ?>" title="修改链接"><?php echo $value['sitename']; ?></a></td>
											<td class="tdcenter">
												<?php if ($value['hide'] == 'n'): ?>
													<a href="link.php?action=hide&amp;linkid=<?php echo $value['id']; ?>" title="点击隐藏链接">显示</a>
												<?php else: ?>
													<a href="link.php?action=show&amp;linkid=<?php echo $value['id']; ?>" title="点击显示链接" style="color:red;">隐藏</a>
												<?php endif;?>
											</td>
											<td><?php echo $value['description']; ?></td>

											<td>
												<div class="btn-group btn-group-xs">
													<a href="<?php echo $value['siteurl']; ?>" target="_blank" title="查看链接">
														<img src="./views/images/vlog.gif" align="absbottom" border="0">
													</a>
													<a title="删除" href="javascript: em_confirm(<?php echo $value['id']; ?>, 'link', '<?php echo LoginAuth::genToken(); ?>');" class="care"><i class="icon-trash-3"></i></a>
												</div>
											</td>
										</tr>
									<?php endforeach;else:?>
									<tr><td class="tdcenter" colspan="6">还没有添加链接</td></tr>
								<?php endif;?>
							</tbody>
						</table>

					</div>
					<div class="list_footer">
						<input type="submit" value="改变排序" class="btn btn-primary" />
						<a href="javascript:displayToggle('link_new', 2);" class="btn btn-warning">添加链接+</a>
					</div>
				</form>

				<form action="link.php?action=addlink" method="post" name="link" id="link" class="form-horizontal panel-body">
					<div id="link_new" class="item_edit" style="display:none">
						<div class="form-group">
							<label class="col-sm-2 control-label">序号</label>
							<div class="col-sm-10">
								<input maxlength="4" class="form-control" name="taxis" type="number" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">名称<span class="required">*</span></label>
							<div class="col-sm-10">
								<input maxlength="200" class="form-control" name="sitename" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地址<span class="required">*</span></label>
							<div class="col-sm-10">
								<input maxlength="200" style="width:100%;" class="form-control" name="siteurl" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">链接描述<span class="required">*</span></label>
							<div class="col-sm-10">
								<textarea name="description" type="text" class="form-control" style="width:100%;height:60px;overflow:auto;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="submit" name="" value="添加链接" class="btn btn-primary"/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#link_new").css('display', $.cookie('em_link_new') ? $.cookie('em_link_new') : 'none');
	$(document).ready(function(){
		$("#adm_link_list tbody tr:odd").addClass("tralt_b");
		$("#adm_link_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")})
	});

	$("#menu_link").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_taxis'])):?>EmlogMsgNotify('info','','排序更新成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','修改成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_add'])):?>EmlogMsgNotify('info','','添加成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','站点名称和地址不能为空','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','没有可排序的链接','top right');<?php endif;?>
	}
</script>