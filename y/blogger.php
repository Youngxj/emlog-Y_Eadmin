<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-wrench fa-fw"></i> 个人设置</h2>
			</div>
			<div class="widget-content padding">
				<ul class="nav nav-tabs nav-simple">
					<?php if (ROLE == ROLE_ADMIN):?>
						<li class=""><a href="./configure.php">基本设置</a></li>
						<li class=""><a href="./seo.php">SEO设置</a></li>
						<li class="active"><a href="./blogger.php">个人设置</a></li>
					<?php else:?>
						<li class="active"><a href="./blogger.php">个人设置</a></li>
					<?php endif;?>
				</ul>
				<div class="tab-content user_set">
					<form action="blogger.php?action=update" method="post" name="blooger" id="blooger" enctype="multipart/form-data" class="form-horizontal panel-body">
						
						<div class="col-md-4 col-md-push-8">
							<div class="widget">
								<div class="widget-content padding">
									<center>
										<div class="item_edit" style="margin-left:30px;">
											<li>头像：</li>
											<li>
												<?php echo $icon; ?>
											</li>
											<li><input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
											</li>
											<p><input name="photo" type="file" /></p>
											<p>支持JPG、PNG格式图片</p>
										</div>
									</center>
									
								</div>
							</div>
						</div>
						<div class="col-md-8 col-md-pull-4">
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">昵称</label>
								<div class="col-sm-10"><input maxlength="50"  class="form-control" value="<?php echo $nickname; ?>" name="name" placeholder="昵称"/></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">邮箱</label>
								<div class="col-sm-10"><input name="email" class="form-control" value="<?php echo $email; ?>"  maxlength="200" placeholder="邮箱"/></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">个人描述</label>
								<div class="col-sm-10"><textarea name="description" class="form-control"  type="text" maxlength="500"><?php echo $description; ?></textarea></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">登陆名</label>
								<div class="col-sm-10"><input maxlength="200"  class="form-control" value="<?php echo $username; ?>" name="username" placeholder="登陆名"/></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">新密码(不小于6位)</label>
								<div class="col-sm-10"><input type="password" maxlength="200" class="form-control"  value="" name="newpass" placeholder="不修改请留空"/></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label">再输入一次新密码</label>
								<div class="col-sm-10"><input type="password" maxlength="200" class="form-control"  value="" name="repeatpass" placeholder="再输入一次"/></div>
							</div>
							<div class="form-group form-inline">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
									<input type="submit" value="保存资料" class="btn btn-primary" />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#chpwd").css('display', $.cookie('em_chpwd') ? $.cookie('em_chpwd') : 'none');
	
	$("#menu_category_sys").addClass('active');
	$("#menu_setting").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','个人资料修改成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','头像删除成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','昵称不能太长','top right');<?php endif;?>
		<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','电子邮件格式错误','top right');<?php endif;?>
		<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','密码长度不得小于6位','top right');<?php endif;?>
		<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','两次输入的密码不一致','top right');<?php endif;?>
		<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','该登录名已存在','top right');<?php endif;?>
		<?php if(isset($_GET['error_f'])):?>EmlogMsgNotify('error','','该昵称已存在','top right');<?php endif;?>
	}
</script>