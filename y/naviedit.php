<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-bars fa-fw"></i> 修改导航</h2>
			</div>
			<div class="widget-content padding">
				<form action="navbar.php?action=update" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">导航名称</label>
						<div class="col-sm-10">
							<input class="form-control" size="20" value="<?php echo $naviname; ?>" name="naviname">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">导航地址</label>
						<div class="col-sm-10">
							<input class="form-control" size="50" value="<?php echo $url; ?>" name="url" <?php echo $conf_isdefault; ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">导航是否在新窗口打开</label>
						<div class="col-sm-10">
							<input type="checkbox" style="vertical-align:middle;" value="y" name="newtab" <?php echo $conf_newtab; ?> />
						</div>
					</div>
					<?php if ($type == Navi_Model::navitype_custom && $pid != 0): ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">父导航</label>
							<div class="col-sm-10">
								<select name="pid" id="pid" class="form-control">
									<option value="0">无</option>
									<?php
									foreach($navis as $key=>$value):
										if($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
											continue;
										}
										$flg = $value['id'] == $pid ? 'selected' : '';
										?>
										<option value="<?php echo $value['id']; ?>" <?php echo $flg;?>><?php echo $value['naviname']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					<?php endif;?>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="hidden" value="<?php echo $naviId; ?>" name="navid" />
							<input type="hidden" value="<?php echo $isdefault; ?>" name="isdefault" />
							<input type="submit" value="保 存" class="btn btn-w-m btn-success" />
							<input type="button" value="取 消" class="btn btn-w-m btn-danger" onclick="javascript: window.history.back();" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_category_view").addClass('active');
	$("#menu_navi").addClass('active');
</script>