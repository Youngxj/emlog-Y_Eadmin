<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-flag fa-fw"></i> 编辑分类</h2>
			</div>
			<div class="widget-content">
				<form action="sort.php?action=update" method="post" class="form-horizontal panel-body">
					<div class="item_edit">
						<div class="form-group">
							<label class="col-sm-2 control-label"> 名称 <span class="required">*</span></label>
							<div class="col-sm-10">
								<input value="<?php echo $sortname; ?>" name="sortname" id="sortname" class="form-control" />
							</div>
						</div>	<div class="form-group">
							<label class="col-sm-2 control-label"> 别名 <span id="alias_msg_hook"></span></label>
							<div class="col-sm-10">
								<input value="<?php echo $alias; ?>" name="alias" id="alias" class="form-control" />
							</div>
						</div>
						<?php if (empty($sorts[$sid]['children'])): ?>
							<div class="form-group">
								<label class="col-sm-2 control-label">父分类</label>
								<div class="col-sm-10">
									<select name="pid" id="pid" class="form-control">
										<option value="0"<?php if($pid == 0):?> selected="selected"<?php endif; ?>>无</option>
										<?php
										foreach($sorts as $key=>$value):
											if ($key == $sid || $value['pid'] != 0) continue;
											?>
											<option value="<?php echo $key; ?>"<?php if($pid == $key):?> selected="selected"<?php endif; ?>><?php echo $value['sortname']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">模板</label>
							<div class="col-sm-10">
								<input maxlength="200" class="form-control" name="template" id="template" value="<?php echo $template; ?>" />
								(用于自定义分类页面模板，对应模板目录下.php文件)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">分类描述</label>
							<div class="col-sm-10">
								<textarea name="description" type="text" style="width:100%;height:60px;overflow:auto;" class="form-control"><?php echo $description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="hidden" value="<?php echo $sid; ?>" name="sid" />
								<input type="submit" value="保 存" class="btn btn-primary" id="save"  />
								<input type="button" value="取 消" class="btn btn-default" onclick="javascript: window.history.back();" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_list").addClass('active');
	$("#menu_sort").addClass('active');
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
			$("#save").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，应由字母、数字、下划线、短横线组成</span>');
		}else if (2 == issortalias(a)){
			$("#save").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，不能为纯数字</span>');
		}else if (3 == issortalias(a)){
			$("#save").attr("disabled", "disabled");
			$("#alias_msg_hook").html('<span id="input_error">别名错误，与系统链接冲突</span>');
		}else {
			$("#alias_msg_hook").html('');
			$("#msg").html('');
			$("#save").attr("disabled", false);
		}
	}
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','分类名称不能为空','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','别名格式错误','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','别名不能重复','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','别名不得包含系统保留关键字','top right');<?php endif;?>
	}
</script>