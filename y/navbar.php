<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=" content_l">
	<div class="row">

		<div class="col-lg-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><i class="fa fa-sitemap"></i><strong> 导航管理</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
						<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
					</div>
				</div>
				<div class="widget-content">
					<form action="navbar.php?action=taxis" method="post">
						<div class="table-responsive">
							<table width="100%" id="adm_navi_list" class="table table-hover">
								<thead>
									<tr>
										<th width="50"><b>序号</b></th>
										<th width="230"><b>导航</b></th>
										<th width="60" class="tdcenter"><b>类型</b></th>
										<th width="60" class="tdcenter"><b>状态</b></th>
										<th width="360"><b>地址</b></th>
										<th width="100">操作</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									if($navis):
										foreach($navis as $key=>$value):
											if ($value['pid'] != 0) {
												continue;
											}
											$value['type_name'] = '';
											switch ($value['type']) {
												case Navi_Model::navitype_home:
												case Navi_Model::navitype_t:
												case Navi_Model::navitype_admin:
												$value['type_name'] = '系统';
												break;
												case Navi_Model::navitype_sort:
												$value['type_name'] = '<font color="blue">分类</font>';
												break;
												case Navi_Model::navitype_page:
												$value['type_name'] = '<font color="#00A3A3">页面</font>';
												break;
												case Navi_Model::navitype_custom:
												$value['type_name'] = '<font color="#FF6633">自定</font>';
												break;
											}
											doAction('adm_navi_display');

											?>  
											<tr>
												<td><input class="num_input" name="navi[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" maxlength="4" /></td>
												<td><a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>" title="编辑导航"><?php echo $value['naviname']; ?></a></td>
												<td class="tdcenter"><?php echo $value['type_name'];?></td>
												<td class="tdcenter">
													<?php if ($value['hide'] == 'n'): ?>
														<a href="navbar.php?action=hide&amp;id=<?php echo $value['id']; ?>" title="点击隐藏导航">显示</a>
													<?php else: ?>
														<a href="navbar.php?action=show&amp;id=<?php echo $value['id']; ?>" title="点击显示导航" style="color:red;">隐藏</a>
													<?php endif;?>
												</td>
												<td><?php echo $value['url']; ?></td>
												<td>
													<div class="btn-group btn-group-xs">

														<a title="编辑" href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a>
														<?php if($value['isdefault'] == 'n'):?>
															<a title="删除" href="javascript: em_confirm(<?php echo $value['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care"><i class="icon-trash-3"></i></a>
														<?php endif;?>
														<a href="<?php echo $value['url']; ?>" target="_blank">
															<img src="./views/images/vlog.gif" align="absbottom" border="0">
														</a>
													</div>
												</td>

											</tr>
											<?php
											if(!empty($value['childnavi'])):
												foreach ($value['childnavi'] as $val):
													?>
													<tr>
														<td><input class="num_input" name="navi[<?php echo $val['id']; ?>]" value="<?php echo $val['taxis']; ?>" maxlength="4" /></td>
														<td>---- <a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>" title="编辑导航"><?php echo $val['naviname']; ?></a></td>
														<td class="tdcenter"><?php echo $value['type_name'];?></td>
														<td class="tdcenter">
															<?php if ($val['hide'] == 'n'): ?>
																<a href="navbar.php?action=hide&amp;id=<?php echo $val['id']; ?>" title="点击隐藏导航">显示</a>
															<?php else: ?>
																<a href="navbar.php?action=show&amp;id=<?php echo $val['id']; ?>" title="点击显示导航" style="color:red;">隐藏</a>
															<?php endif;?>
														</td>
														<td class="tdcenter">
															<a href="<?php echo $val['url']; ?>" target="_blank">
																<img src="./views/images/<?php echo $val['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a>
															</td>
															<td><?php echo $val['url']; ?></td>
															<td>
																<a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>">编辑</a>
																<?php if($val['isdefault'] == 'n'):?>
																	<a href="javascript: em_confirm(<?php echo $val['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
																<?php endif;?>
															</td>
														</tr>
													<?php endforeach;endif; ?>
												<?php endforeach;else:?>
												<tr><td class="tdcenter" colspan="4">还没有添加导航</td></tr>
											<?php endif;?>
										</tbody>
									</table>
								</div>
								<div class="list_footer"><input type="submit" value="改变排序" class="btn btn-info " /></div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="widget">
						<div class="widget-header">
							<h2>添加自定义导航+</h2>
							<div class="additional-btn">
								<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
								<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
							</div>
						</div>
						<div class="widget-content padding">
							<form action="navbar.php?action=add" method="post" name="navi" id="navi" class="form-horizontal">
								<div id="navi_add_custom">
									<div class="form-group">
										<label class="col-sm-4 control-label">序号</label>
										<div class="col-sm-6">
											<input maxlength="4" style="width:60px;" name="taxis" class="form-control" type="number" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">导航名称<span class="required">*</span></label>
										<div class="col-sm-6">
											<input maxlength="200" style="width:168px;" name="naviname"  class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">地址(带http)<span class="required">*</span></label>
										<div class="col-sm-6">
											<input maxlength="200" style="width:168px;" name="url" id="url" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">父导航</label>
										<div class="col-sm-6">
											<select name="pid" id="pid" class="form-control">
												<option value="0">无</option>
												<?php
												foreach($navis as $key=>$value):
													if($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
														continue;
													}
													?>
													<option value="<?php echo $value['id']; ?>"><?php echo $value['naviname']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">在新窗口打开</label>
										<div class="col-sm-6">
											<input type="checkbox" style="vertical-align:middle;" value="y" name="newtab"/>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<input type="submit" name="" value="添加" class="btn btn-info"/>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget">
						<div class="widget-header">
							<h2>添加分类到导航+</h2>
							<div class="additional-btn">
								<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
								<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
							</div>
						</div>
						<div class="widget-content padding">
							<form action="navbar.php?action=add_sort" method="post" name="navi" id="navi" class="form-horizontal">
								<div>
									<ul id="navi_add_sort" class="nav_add">
										<?php 
										if($sorts):
											foreach($sorts as $key=>$value):
												if ($value['pid'] != 0) {
													continue;
												}
												?>
												<li>
													<input type="checkbox" style="vertical-align:middle;" name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
													<?php echo $value['sortname']; ?>
												</li>
												<?php
												$children = $value['children'];
												foreach ($children as $key):
													$value = $sorts[$key];
													?>
													<li>
														<input type="checkbox" style="vertical-align:middle;" name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
														<?php echo $value['sortname']; ?>
													</li>
													<?php 
												endforeach;
											endforeach;
											?>
											<li><input type="submit" name="" value="添加" class="btn btn-info" style="margin-top:10px;"/></li>
										<?php else:?>
											<li>还没有分类，<a href="sort.php">新建分类</a></li>
										<?php endif;?> 
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget">
						<div class="widget-header">
							<h2>添加页面到导航+</h2>
							<div class="additional-btn">
								<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
								<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
							</div>
						</div>
						<div class="widget-content padding">
							<form action="navbar.php?action=add_page" method="post" name="navi" id="navi" class="form-horizontal">
								<div>
									<ul id="navi_add_page" class="nav_add">
										<?php 
										if($pages):
											foreach($pages as $key=>$value): 
												?>
												<li>
													<input type="checkbox" style="vertical-align:middle;" name="pages[<?php echo $value['gid']; ?>]" value="<?php echo $value['title']; ?>" class="ids" />
													<?php echo $value['title']; ?>
												</li>
											<?php endforeach;?>
											<li><input type="submit" name="" value="添加" class="btn btn-info" style="margin-top:10px;"/></li>
										<?php else:?>
											<li>还没页面，<a href="page.php">新建页面</a></li>
										<?php endif;?> 
									</ul>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$("#navi_add_custom").css('display', $.cookie('em_navi_add_custom') ? $.cookie('em_navi_add_custom') : '');
			$("#navi_add_sort").css('display', $.cookie('em_navi_add_sort') ? $.cookie('em_navi_add_sort') : '');
			$("#navi_add_page").css('display', $.cookie('em_navi_add_page') ? $.cookie('em_navi_add_page') : '');
			$(document).ready(function(){
				$("#adm_navi_list tbody tr:odd").addClass("tralt_b");
				$("#adm_navi_list tbody tr")
				.mouseover(function(){$(this).addClass("trover")})
				.mouseout(function(){$(this).removeClass("trover")})
			});

			$("#menu_category_view").addClass('active');
			$("#menu_navi").addClass('active');
		</script>
		<script>
			$(function () {
				setTimeout('Emlogalert()',100);
			});
			function Emlogalert(){
				<?php if(isset($_GET['active_taxis'])):?>EmlogMsgNotify('info','','排序更新成功','top right');<?php endif;?>
				<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除导航成功','top right');<?php endif;?>
				<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','修改导航成功','top right');<?php endif;?>
				<?php if(isset($_GET['active_add'])):?>EmlogMsgNotify('info','','添加导航成功','top right');<?php endif;?>
				<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','导航名称和地址不能为空','top right');<?php endif;?>
				<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','没有可排序的导航','top right');<?php endif;?>
				<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','默认导航不能删除','top right');<?php endif;?>
				<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','请选择要添加的分类','top right');<?php endif;?>
				<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','请选择要添加的页面','top right');<?php endif;?>
				<?php if(isset($_GET['error_f'])):?>EmlogMsgNotify('error','','导航地址格式错误(需包含http等前缀)','top right');<?php endif;?>
			}
		</script>