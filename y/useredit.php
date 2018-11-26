 <?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
 <div class="row content_l">
 	
 	<div class="col-lg-12">
 		<div class="widget float-e-margins">
 			<div class="widget-header">
 				<h2><i class="fa fa-user fa-fw"></i> 修改作者资料</h2>
 			</div>
 			<div class="widget-content padding">
 				<form action="user.php?action=update" method="post" class="form-horizontal panel-body">
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">用户名</label>
 						<div class="col-sm-10"><input type="text" value="<?php echo $username; ?>" name="username" style="width:200px;" class="form-control" /></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">昵称</label>
 						<div class="col-sm-10"><input type="text" value="<?php echo $nickname; ?>" name="nickname" style="width:200px;" class="form-control" /></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">新密码(不修改请留空)</label>
 						<div class="col-sm-10"><input type="password" value="" name="password" style="width:200px;" class="form-control" /></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">重复新密码</label>
 						<div class="col-sm-10"><input type="password" value="" name="password2" style="width:200px;" class="form-control" /></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">电子邮件</label>
 						<div class="col-sm-10"><input type="text"  value="<?php echo $email; ?>" name="email" style="width:200px;" class="form-control" /></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label"></label>
 						<div class="col-sm-10">
 							<select name="role" id="role" class="form-control">
 								<option value="writer" <?php echo $ex1; ?>>作者</option>
 								<option value="admin" <?php echo $ex2; ?>>管理员</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label"></label>
 						<div class="col-sm-10">
 							<select name="ischeck" class="form-control">
 								<option value="n" <?php echo $ex3; ?>>文章不需要审核</option>
 								<option value="y" <?php echo $ex4; ?>>文章需要审核</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label">个人描述</label>
 						<div class="col-sm-10"><textarea name="description" rows="5" style="width:100%;" class="form-control"><?php echo $description; ?></textarea></div>
 					</div>
 					<div class="form-group form-inline">
 						<label class="col-sm-2 control-label"></label>
 						<div class="col-sm-10">
 							<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 							<input type="hidden" value="<?php echo $uid; ?>" name="uid" />
 							<input type="submit" value="保 存" class="btn btn-primary" />
 							<input type="button" value="取 消" class="btn btn-default" onclick="window.location='user.php';" />
 						</div>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
 <script>
 	try{setTimeout(hideActived,2600);}catch(err){}
 	$("#menu_category_sys").addClass('active');
 	$("#menu_user").addClass('active');
 	if($("#role").val() == 'admin') $("#ischeck").hide();
 	$("#role").change(function(){$("#ischeck").toggle()})
 </script>
 <script>

 	$(function () {
 		setTimeout('Emlogalert()',100);
 	});
 	function Emlogalert(){
 		<?php if(isset($_GET['error_login'])):?>EmlogMsgNotify('error','','用户名不能为空','top right');<?php endif;?>
 		<?php if(isset($_GET['error_exist'])):?>EmlogMsgNotify('error','','该用户名已存在','top right');<?php endif;?>
 		<?php if(isset($_GET['error_pwd_len'])):?>EmlogMsgNotify('error','','密码长度不得小于6位','top right');<?php endif;?>
 		<?php if(isset($_GET['error_pwd2'])):?>EmlogMsgNotify('error','','两次输入密码不一致','top right');<?php endif;?>
 	}
 </script>