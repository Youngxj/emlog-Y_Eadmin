<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row header-nav">
	<div class="col-sm-4">
		<h2>评论管理</h2>
		<ol class="breadcrumb">
			<li><a href="./">主页</a></li>
			<li><strong>回复评论</strong></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-9">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="widget">
				<div class="widget-content padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="m-b-md">
								<h2>评论信息</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
							<dl class="dl-horizontal">
								<dt>昵称</dt><dd><?php echo $poster; ?></dd>
								<dt>来自：</dt><dd><?php echo $ip;?></dd>
							</dl>
						</div>
						<div class="col-lg-7" id="cluster_info">
							<dl class="dl-horizontal">
								<dt>评论时间：</dt><dd><?php echo $date; ?></dd>
								<dt>评论者头像：</dt>
								<dd class="project-people">
									<a><img alt="image" class="img-circle" src="http://1.gravatar.com/avatar/<?php echo md5($mail);?>?s=40&d=mm&r=g"></a>
								</dd>
							</dl>
						</div>
					</div>
					<div class="row m-t-sm">
						<div class="col-lg-12">
							<div class="panel blank-panel">
								<div class="panel-heading">
									<div class="panel-options">
										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab-1" aria-expanded="true">回复内容</a></li>
										</ul>
									</div>
								</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane active" id="tab-1">
											<div class="feed-activity-list">
												<form action="comment.php?action=doreply" method="post" class="form-horizontal">
													<div class="form-group">
														<div class="col-sm-12"><textarea name="reply" rows="5" cols="60" class="form-control"></textarea></div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label"></label>
														<div class="col-sm-10">
															<input type="hidden" value="<?php echo $commentId; ?>" name="cid" />
															<input type="hidden" value="<?php echo $gid; ?>" name="gid" />
															<input type="hidden" value="<?php echo $hide; ?>" name="hide" />
															<input type="submit" value="回复" class="btn btn-primary" />
															<?php if ($hide == 'y'): ?>
																<input type="submit" value="回复并审核" name="pub_it" class="btn btn-primary" />
															<?php endif; ?>
															<input type="button" value="取 消" class="btn btn-default" onclick="javascript: window.history.back();"/>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="wrapper wrapper-content project-manager">
			<h4><?php echo $poster; ?>的评论内容</h4>
			<p class="small">
				<br><?php echo $comment; ?></p>
			</div>
		</div>
	</div>
	<script>
		$("#menu_cm").addClass('active');
		$("#menu_cms").addClass('active');
	</script>