<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-comments fa-fw"></i> 编辑评论</h2>
			</div>
			<div class="widget-content padding">
				<form action="comment.php?action=doedit" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">评论人</label>
						<div class="col-sm-10">
							<input type="text" value="<?php echo $poster; ?>" name="name" style="width:20%;" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">电子邮件</label>
						<div class="col-sm-10">
							<input type="text"  value="<?php echo $mail; ?>" name="mail" style="width:20%;" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">主页</label>
						<div class="col-sm-10">
							<input type="text"  value="<?php echo $url; ?>" name="url" style="width:20%;" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">评论内容</label>
						<div class="col-sm-10">
							<textarea name="comment" rows="8" cols="60" class="form-control"><?php echo $comment; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<input type="hidden" value="<?php echo $cid; ?>" name="cid" />
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
	$("#menu_cm").addClass('active');
	$("#menu_cms").addClass('active');
</script>