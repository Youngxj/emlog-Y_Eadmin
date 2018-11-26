<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-users fa-fw"></i> 用户列表</a></h2>
			</div>
			<div class="widget-content padding">
				<?php
				if($users):
					foreach($users as $key => $val):
						$avatar = empty($user_cache[$val['uid']]['avatar']) ? './y/images/other/avatar.png' : '../' . $user_cache[$val['uid']]['avatar'];
						?>

						<div class="col-lg-4 user_id">
							<div class="contact-box" id="adm_user">
								<div class="col-sm-4">
									<div class="text-center center-vertical">
										<img alt="image" class="img-circle m-t-xs" style="width:70px;height:70px;" src="<?php echo $avatar; ?>" onerror="this.src='./y/images/other/avatar.png'">
										<p>
											<?php echo $val['role'] == ROLE_ADMIN ? $val['uid'] == 1 ? '创始人':'管理员' : '作者'; ?>
										</p>
									</div>
								</div>
								<div class="col-sm-8">
									<h3><strong><?php echo empty($val['name']) ? $val['login'] : $val['name']; ?>
										<?php if ($val['role'] == ROLE_WRITER && $val['ischeck'] == 'y') echo '<small><code>文章需审核</code></small>';?></strong></h3>
										<address>
											<p>
												E-mail:<?php if($val['email']==''):?>暂无邮箱<?php else:?><?php echo $val['email']; ?><?php endif;?>
											</p>
											<p>
												Des:<?php if($val['description']==''):?>暂无描述<?php else:?><?php echo subString($val['description'], 0,10); ?><?php endif;?>
											</p>
											<p>
												文章:<code><a href="./admin_log.php?uid=<?php echo $val['uid'];?>"><?php echo $sta_cache[$val['uid']]['lognum']; ?></a></code>
												<span style="display:none; margin-left:8px;">
													<?php if (UID != $val['uid']): ?>
														<a href="user.php?action=edit&uid=<?php echo $val['uid']?>">编辑</a> |
														<a href="javascript: em_confirm(<?php echo $val['uid']; ?>, 'user', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
													<?php else:?>
														<a href="blogger.php">编辑</a>
													<?php endif;?>
												</span>
											</p>

											
										</address>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<?php endforeach;else:?>
						<div class="alert alert-info">还没有添加作者</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="page_num"><?php echo $pageurl; ?></div> 
	<div class="row" style="display:block">
		<div class="col-lg-12">
			<div class="widget">
				<div class="widget-header">
					<h2><i class="fa fa-user fa-fw"></i> 添加用户</a></h2>
				</div>
				<div class="widget-content padding">
					<form action="user.php?action=new" method="post" class="form-horizontal panel-body">
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label">类别</label>
							<div class="col-sm-10">
								<select name="role" id="role" class="form-control">
									<option value="writer">作者（投稿人）</option>
									<option value="admin">管理员</option>
								</select>
							</div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-10"><input name="login" type="text" id="login" value="" style="width:180px;" class="form-control" /></div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label">密码 (大于6位)</label>
							<div class="col-sm-10"><input name="password" type="password" id="password" value="" style="width:180px;" class="form-control" /></div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label">重复密码</label>
							<div class="col-sm-10"><input name="password2" type="password" id="password2" value="" style="width:180px;" class="form-control" /></div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label">站点副标题：</label>
							<div class="col-sm-10">
								<select name="ischeck" class="form-control">
									<option value="n">文章不需要审核</option>
									<option value="y">文章需要审核</option>
								</select>
							</div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
								<input type="submit" name="" value="添加用户" class="btn btn-info" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#adm_user address:odd").addClass("tralt_b");
		$("#adm_user address")
		.mouseover(function(){$(this).addClass("trover");$(this).find("span").show();})
		.mouseout(function(){$(this).removeClass("trover");$(this).find("span").hide();})
		$("#role").change(function(){$("#ischeck").toggle()})
	});
	
	$("#menu_category_sys").addClass('active');
	$("#menu_user").addClass('active');
</script>

<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_update'])):?>EmlogMsgNotify('info','','修改用户资料成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_add'])):?>EmlogMsgNotify('info','','添加用户成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_login'])):?>EmlogMsgNotify('error','','用户名不能为空','top right');<?php endif;?>
		<?php if(isset($_GET['error_exist'])):?>EmlogMsgNotify('error','','该用户名已存在','top right');<?php endif;?>
		<?php if(isset($_GET['error_pwd_len'])):?>EmlogMsgNotify('error','','密码长度不得小于6位','top right');<?php endif;?>
		<?php if(isset($_GET['error_pwd2'])):?>EmlogMsgNotify('error','','两次输入密码不一致','top right');<?php endif;?>
		<?php if(isset($_GET['error_del_a'])):?>EmlogMsgNotify('error','','不能删除创始人','top right');<?php endif;?>
		<?php if(isset($_GET['error_del_b'])):?>EmlogMsgNotify('error','','不能修改创始人信息','top right');<?php endif;?>
	}
</script>