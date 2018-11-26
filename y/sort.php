<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<script></script>
<div class="row content_l">
	
	<div class="col-md-12">				
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="icon-flag-1"></i><strong> 分类管理</strong> <?php echo $sortnum; ?></h2>
			</div>
			<div class="widget-content">
				<form  method="post" action="sort.php?action=taxis">
					<div class="table-responsive">
						<table data-sortable class="table table-hover">
							<thead>
								<tr>
									<th>排序</th>
									<th>分类</th>
									<th>别名</th>
									<th>模版</th>
									<th>文章</th>
									<th>操作</th>
								</tr>
							</thead>

							<tbody>
								<?php 
								if($sorts):
									foreach($sorts as $key=>$value):
										if ($value['pid'] != 0) {
											continue;
										}
										?>
										<tr>
											<td>
												<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
												<input maxlength="4" class="num_input" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
											</td>
											<td><a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></a></td>
											<td><span class="views-number"><?php if($value['alias']==''):?>/<?php else:?><?php echo $value['alias']; ?><?php endif;?></span></td>
											<td><span class="views-number"><?php if($value['template']==''):?>/<?php else:?><?php echo $value['template']; ?><?php endif;?></span></td>
											<td><span class="views-number"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></span></td>
											<td>
												<div class="btn-group btn-group-xs">
													<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank" title="在新窗口查看">
														<img src="./views/images/vlog.gif" align="absbottom" border="0">
													</a>
													<a title="删除" href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care"><i class="icon-trash-3"></i></a>
												</div>
											</td>
										</tr>
										<?php
										//子分类
										$children = $value['children'];
										foreach ($children as $key):
											$value = $sorts[$key];
											?>
											<tr>
												<td>
													<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
													<input maxlength="4" class="num_input" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
												</td>
												<td><a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"> --- <?php echo $value['sortname']; ?></a></td>
												<td><span class="views-number"><?php if($value['alias']==''):?>/<?php else:?><?php echo $value['alias']; ?><?php endif;?></span></td>
												<td><span class="views-number"><?php if($value['template']==''):?>/<?php else:?><?php echo $value['template']; ?><?php endif;?></span></td>
												<td><span class="views-number"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></span></td>
												<td>
													<div class="btn-group btn-group-xs">
														<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank" title="在新窗口查看">
															<img src="./views/images/vlog.gif" align="absbottom" border="0">
														</a>
														<a title="删除" href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care"><i class="icon-trash-3"></i></a>
													</div>
												</td>
												<td class="tdcenter">
													
												</td>
											</tr>
										<?php endforeach; ?>

									<?php endforeach;else:?>
									<blockquote class="text-warning" style="font-size:14px">
										<h4 class="text-danger">还没有添加分类</h4>
									</blockquote>
								<?php endif;?>
							</tbody>
						</table>						
					</div>
					<div class="list_footer">
						<input type="submit" value="改变排序" class="btn btn-primary" />
						<a href="javascript:displayToggle('sort_new', 2);" class="btn btn-warning">添加分类+</a>
					</div>
				</form>

				<form action="sort.php?action=add" method="post" class="form-horizontal panel-body">
					<div id="sort_new" class="item_edit" style="display:none">
						<div class="form-group">
							<label class="col-sm-2 control-label">序号</label>
							<div class="col-sm-10">
								<input maxlength="4" name="taxis" class="form-control" type="number" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">名称<span class="required">*</span></label>
							<div class="col-sm-10">
								<input maxlength="200" class="form-control" name="sortname" id="sortname" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">别名 (用于URL的友好显示)</label>
							<div class="col-sm-10">
								<input maxlength="200" class="form-control" name="alias" id="alias" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">父分类</label>
							<div class="col-sm-10">
								<select name="pid" id="pid" class="form-control">
									<option value="0">无</option>
									<?php
									foreach($sorts as $key=>$value):
										if($value['pid'] != 0) {
											continue;
										}
										?>
										<option value="<?php echo $key; ?>"><?php echo $value['sortname']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">模板</label>
							<div class="col-sm-10">
								<input maxlength="200" class="form-control" name="template" id="template" value="log_list" />
								(用于自定义分类页面模板，对应模板目录下.php文件，默认为log_list.php)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">分类描述</label>
							<div class="col-sm-10">
								<textarea name="description" type="text" style="width:100%;height:60px;overflow:auto;" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
								<input type="submit" id="addsort" value="添加新分类" class="btn btn-primary"/><span id="alias_msg_hook"></span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#sort_new").css('display', $.cookie('em_sort_new') ? $.cookie('em_sort_new') : 'none');
	$("#alias").keyup(function(){checksortalias();});
	function issortalias(a){
		var reg1=/^[\w-]*$/;
		var reg2=/^[\d]+$/;
		if(!reg1.test(a)) {
			return 1;
		}else if(reg2.test(a)){
			return 2;
		}else if(a=='post' || a=='record' || a=='sort' || a=='tag' || a=='author' || a=='page'){
			return 3;
		} else {
			return 0;
		}
	}
	function checksortalias(){
		var a = $.trim($("#alias").val());
		if (1 == issortalias(a)){
			$("#addsort").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，应由字母、数字、下划线、短横线组成</span>');
		}else if (2 == issortalias(a)){
			$("#addsort").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，不能为纯数字</span>');
		}else if (3 == issortalias(a)){
			$("#addsort").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，与系统链接冲突</span>');
		}else {
			$("#alias_msg_hook").html('');
			$("#msg").html('');
			$("#addsort").attr("disabled", false);
		}
	}
	$(document).ready(function(){
		$("#adm_sort_list tbody tr:odd").addClass("tralt_b");
		$("#adm_sort_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
		$("#menu_list").addClass('active');
		$("#menu_sort").addClass('active');
	});
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_taxis'])):?>EmlogMsgNotify('info','','排序更新成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除分类成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','修改分类成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_add'])):?>EmlogMsgNotify('info','','添加分类成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','分类名称不能为空','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','没有可排序的分类','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','别名格式错误','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','别名不能重复','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','别名不得包含系统保留关键字','top right');<?php endif;?>
	}
</script>