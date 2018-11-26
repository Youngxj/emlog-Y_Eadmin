<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget-content m-b-sm border-bottom padding header-nav">
			<div class="p-xs">
				<div class="pull-left m-r-md">
					<i class="fa fa-comments text-blue-1 big-icon mid-icon"></i>
				</div>
				<h2>评论管理 <span class="label"><?php echo $cmnum; ?></span></h2>
				<span>
					<?php if ($hideCommNum > 0) :?>
						<ol class="breadcrumb">
							<li><a href="./comment.php?<?php echo $addUrl_1 ?>">全部</a></li>
							<li><a href="./comment.php?hide=y&<?php echo $addUrl_1 ?>">待审<?php
							$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
							if ($hidecmnum > 0) echo '('.$hidecmnum.')';
							?></a></li>
							<li><a href="comment.php?hide=n&<?php echo $addUrl_1 ?>">已审</a></li>
						</ol>
					<?php else:?>
						你可以自由管理您站内的评论。
					<?php endif;?>
				</span>
			</div>
		</div>
		<div class="widget float-e-margins">
			<div class="widget-content padding">
				<form action="comment.php?action=admin_all_coms" method="post" name="form_com" id="form_com">
					<div class="tab-content">
						<div class="tab-pane active">
							<div class="feed-activity-list">
								<?php
								if($comment):
									foreach($comment as $key=>$value):
										$ishide = $value['hide']=='y'?'<font color="red">[待审]</font>':'';
										$mail = !empty($value['mail']) ? "{$value['mail']}" : '';
										$ip = !empty($value['ip']) ? "{$value['ip']}" : '';
										$poster = !empty($value['url']) ? '<a href="'.$value['url'].'" target="_blank">'. $value['poster'].'</a>' : $value['poster'];
										$value['content'] = str_replace('<br>',' ',$value['content']);
										$sub_content = subString($value['content'], 0, 50);
										$value['title'] = subString($value['title'], 0, 42);
										doAction('adm_comment_display');
										?>
										<div class="feed-element">
											<a href="profile.html#" class="pull-left"><img alt="image" class="img-circle" src="http://cn.gravatar.com/avatar/<?php echo md5($mail);?>?s=64&d=monsterid&r=g"></a>
											<div class="media-body ">
												<small class="pull-right"></small>
												<strong><?php echo $poster;?></strong><br>
												<small class="text-muted"><?php echo $value['date']; ?> 来自 <?php echo $ip; ?><?php if (ROLE == ROLE_ADMIN): ?><a href="javascript: em_confirm('<?php echo $value['ip']; ?>', 'commentbyip', '<?php echo LoginAuth::genToken(); ?>');" title="删除来自该IP的所有评论" class="care">(X)</a><br/>来自文章：<a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a><?php endif;?></small>
												<div class="<?php if($value['hide'] == 'y'):?>well badge-primary<?php else: ?>well<?php endif;?>"><?php echo $sub_content; ?></div>
												<div class="pull-right">
													<a class="btn btn-xs btn-white"><input type="checkbox" value="<?php echo $value['cid']; ?>" name="com[]" class="ids not-switch" /></a>
													<a href="javascript: em_confirm(<?php echo $value['cid']; ?>, 'comment', '<?php echo LoginAuth::genToken(); ?>');" class="btn btn-xs btn-danger"><i class="fa fa-close fa-fw"></i> 删除</a>
													<a href="comment.php?action=edit_comment&amp;cid=<?php echo $value['cid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit fa-fw"></i> 编辑</a>
													<a href="comment.php?action=reply_comment&amp;cid=<?php echo $value['cid']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil fa-fw"></i> 回复</a>
													<a href="<?php echo Url::log($value['gid']); ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-eye fa-fw"></i> 查看</a>
													<?php if($value['hide'] == 'y'):?>
														<a href="comment.php?action=show&amp;id=<?php echo $value['cid']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-share-square-o fa-fw"></i> 审核</a>
													<?php else: ?>
														<a href="comment.php?action=hide&amp;id=<?php echo $value['cid']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-random fa-fw"></i> 隐藏</a>
													<?php endif;?>
												</div>
											</div>
										</div>
									<?php endforeach;else:?>
									<div class="alert alert-warning">还没有收到评论</div>
								<?php endif;?>
								<div class="list_footer" style="margin-top:20px;">
									<a href="javascript:void(0);" id="select_all" class="btn btn-default">全选</a>
									<a href="javascript:commentact('del');" class="btn btn-default">删除</a>
									<a href="javascript:commentact('hide');" class="btn btn-default">隐藏</a>
									<a href="javascript:commentact('pub');" class="btn btn-success">审核</a>
									<input name="operate" id="operate" value="" type="hidden" />
								</div>
								<div class="page_num"><?php echo $pageurl; ?></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		selectAllToggle();
	});


	function commentact(act){
		if (getChecked('ids') == false) {
			EmlogMsgNotify('warning','','请选择要操作的评论','top right');
			return;
		}
		if(act == 'del' && !confirm('你确定要删除所选评论吗？')){return;}
		$("#operate").val(act);
		$("#form_com").submit();
	}
	$("#menu_cm").addClass('active');
	$("#menu_cms").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除评论成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_show'])):?>EmlogMsgNotify('info','','审核评论成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_hide'])):?>EmlogMsgNotify('info','','隐藏评论成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','修改评论成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_rep'])):?>EmlogMsgNotify('info','','回复评论成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','请选择要执行操作的评论','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','请选择要执行的操作','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','回复内容不能为空','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','内容过长','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','评论内容不能为空','top right');<?php endif;?>
	}
</script>