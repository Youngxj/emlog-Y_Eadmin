<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>
	
	$("#menu_category_sys").addClass('active');
	$("#menu_setting").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['activated'])):?>EmlogMsgNotify('info','','设置保存成功','top right');<?php endif;?>
		<?php if(isset($_GET['error'])):?>EmlogMsgNotify('error','','保存失败：根目录下的.htaccess不可写','top right');<?php endif;?>

	}
</script>
<div class="row seo_set content_l">

	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-wrench fa-fw"></i> SEO设置</h2>
			</div>
			<div class="widget-content padding">
				<ul class="nav nav-tabs nav-simple">
					<li class=""><a href="./configure.php">基本设置</a></li>
					<li class="active"><a href="./seo.php">SEO设置</a></li>
					<li class=""><a href="./blogger.php">个人设置</a></li>
				</ul>
				<div class="tab-content">
					<form action="seo.php?action=update" method="post" class="form-horizontal panel-body">
						<h4>文章链接设置：</h4>
						<div class="bs-callout bs-callout-info">
							<blockquote>
								你可以在这里修改文章链接的形式，如果修改后文章无法访问，那可能是你的服务器空间不支持URL重写，请修改回默认形式、关闭文章连接别名。<br />启用链接别名后可以自定义文章和页面的链接地址。
							</blockquote>
						</div>
						<div id="per_link">
							<li><input type="radio" name="permalink" value="0" <?php echo $ex0; ?>>默认形式：<span class="permalink_url"><?php echo BLOG_URL; ?>?post=1</span></li>
							<li><input type="radio" name="permalink" value="1" <?php echo $ex1; ?>>文件形式：<span class="permalink_url"><?php echo BLOG_URL; ?>post-1.html</span></li>
							<li><input type="radio" name="permalink" value="2" <?php echo $ex2; ?>>目录形式：<span class="permalink_url"><?php echo BLOG_URL; ?>post/1</span></li>
							<li><input type="radio" name="permalink" value="3" <?php echo $ex3; ?>>分类形式：<span class="permalink_url"><?php echo BLOG_URL; ?>category/1.html</span></li>
							<div style="border-top:1px solid #F7F7F7; width:521px; margin:10px 0px 10px 0px;"></div>
							<li>启用文章链接别名：<input type="checkbox" style="vertical-align:middle;" value="y" name="isalias" id="isalias" <?php echo $isalias; ?> /></li>
							<li>启用文章链接别名html后缀：<input type="checkbox" style="vertical-align:middle;" value="y" name="isalias_html" id="isalias_html" <?php echo $isalias_html; ?> /></li>
						</div>
						<div style="border-top:1px solid #F7F7F7; width:521px; margin:10px 0px 10px 0px;"></div>
						<div style="font-size: 14px; margin: 20px 0px 10px 10px;"><b>meta信息设置：</b></div>
						<div class="item_edit">
							<li>站点浏览器标题(title)<br /><input maxlength="200" style="width:50%;" class="form-control" value="<?php echo $site_title; ?>" name="site_title" /></li>
							<li>站点关键字(keywords)<br /><input maxlength="200" style="width:50%;" class="form-control" value="<?php echo $site_key; ?>" name="site_key" /></li>
							<li>站点浏览器描述(description)<br /><textarea name="site_description" class="form-control" cols="" rows="4" style="width:50%;"><?php echo $site_description; ?></textarea></li>
							<li>文章浏览器标题方案：
								<select name="log_title_style" class="form-control" style="width:30%;">
									<option value="0" <?php echo $opt0; ?>>文章标题</option>
									<option value="1" <?php echo $opt1; ?>>文章标题 - 站点标题</option>
									<option value="2" <?php echo $opt2; ?>>文章标题 - 站点浏览器标题</option>
								</select>
							</li>
							<li style="margin-top:10px;">
								<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
								<input type="submit" value="保存设置" class="btn btn-primary" />
							</li>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>