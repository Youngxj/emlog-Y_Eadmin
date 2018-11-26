<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-link fa-fw"></i> 编辑链接</h2>
			</div>
			<div class="widget-content padding">
				<form action="link.php?action=update_link" method="post" class="form-horizontal panel-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">名称<span class="required">*</span></label>
						<div class="col-sm-10">
							<input size="40" value="<?php echo $sitename; ?>" class="form-control" name="sitename" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">地址<span class="required">*</span></label>
						<div class="col-sm-10">
							<input size="40" value="<?php echo $siteurl; ?>" class="form-control" name="siteurl" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">链接描述<span class="required">*</span></label>
						<div class="col-sm-10">
							<textarea name="description" rows="3" class="form-control" cols="42"><?php echo $description; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<input type="hidden" value="<?php echo $linkId; ?>" name="linkid" />
							<input type="submit" value="保 存" class="btn btn-primary" />
							<input type="button" value="取 消" class="btn btn-default" onclick="javascript: window.history.back();" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_link").addClass('active');
</script>