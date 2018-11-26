<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header ">
				<h2><i class="fa fa-database fa-fw"></i> 数据库备份</h2>
			</div>
			<div class="widget-content">
				<form  method="post" action="data.php?action=dell_all_bak" name="form_bak" id="form_bak">
					<div class="table-responsive">
						<table id="adm_bakdata_list" class="table table-hover">
							<thead>
								<tr>
									<th  colspan="2"><b>备份文件</b></th>
									<th><b>备份时间</b></th>
									<th><b>文件大小</b></th>
									<th>操作</th>
								</tr>
							</head>
							<tbody>
								<?php
								if($bakfiles):
									foreach($bakfiles  as $value):
										$modtime = smartDate(filemtime($value),'Y-m-d H:i:s');
										$size =  changeFileSize(filesize($value));
										$bakname = substr(strrchr($value,'/'),1);
										?>
										<tr>
											<td width="22"><input type="checkbox" value="<?php echo $value; ?>" name="bak[]" class="ids not-switch" /></td>
											<td width="661"><a href="../content/backup/<?php echo $bakname; ?>"><?php echo $bakname; ?></a></td>
											<td><?php echo $modtime; ?></td>
											<td><?php echo $size; ?></td>
											<td><a href="javascript: em_confirm('<?php echo $value; ?>', 'backup', '<?php echo LoginAuth::genToken(); ?>');">导入</a></td>
										</tr>
									<?php endforeach;else:?>
									<tr><td class="tdcenter" colspan="5">还没有备份</td></tr>
								<?php endif;?>
							</tbody>
						</table>
					</div>
					<div class="list_footer">
						<a href="javascript:void(0);" id="select_all" class="btn btn-default">全选</a> 选中项：<a href="javascript:bakact('del');" class="care btn btn-danger">删除</a></div>
					</form>

					<div style="margin:50px 0px 20px 20px;">
						<a href="javascript:$('#import').hide();$('#cache').hide();displayToggle('backup', 0);" style="margin-right: 16px;">备份数据库+</a> 
						<a href="javascript:$('#backup').hide();$('#cache').hide();displayToggle('import', 0);" style="margin-right: 16px;">导入本地备份+</a> 
						<a href="javascript:$('#backup').hide();$('#import').hide();displayToggle('cache', 0);" style="margin-right: 16px;">更新缓存+</a>
					</div>

					<form action="data.php?action=bakstart" method="post" style="margin-left: 20px;">
						<div id="backup" style="display:none;">
							<p>可备份的数据库表：<br />
								<select multiple="multiple" size="12" name="table_box[]">
									<?php foreach($tables  as $value): ?>
										<option value="<?php echo DB_PREFIX; ?><?php echo $value; ?>" selected="selected"><?php echo DB_PREFIX; ?><?php echo $value; ?></option>
									<?php endforeach; ?>
								</select>
							</p>
							<p>将站点内容数据库备份到：
								<select name="bakplace" id="bakplace" class="form-control">
									<option value="local" selected="selected">本地（自己电脑）</option>
									<option value="server">服务器空间</option>
								</select>
							</p>
							<p id="local_bakzip">压缩成zip包：<input type="checkbox" style="vertical-align:middle;" value="y" name="zipbak" id="zipbak"></p>
							<p>
								<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
								<input type="submit" value="开始备份" class="btn btn-info" />
							</p>
						</div>
					</form>

					<form action="data.php?action=import" enctype="multipart/form-data" method="post" style="margin-left: 20px;">
						<div id="import" style="display:none;">
							<p class="des">仅可导入相同版本emlog导出的数据库备份文件，且数据库表前缀需保持一致。<br />当前数据库表前缀：<?php echo DB_PREFIX; ?></p>
							<p>
								<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
								<input type="file" name="sqlfile" /> <input type="submit" value="导入" class="btn btn-info" />
							</p>
						</div>
					</form>

					<div id="cache" class="bs-callout bs-callout-info" style="display:none;margin-left: 20px;">
						<p class="des">缓存可以加快站点的加载速度。通常系统会自动更新缓存，无需手动。有些特殊情况，比如缓存文件被修改、手动修改过数据库、页面出现异常等才需要手动更新。</p>
						<p><input type="button" onclick="window.location='data.php?action=Cache';" value="更新缓存" class="btn btn-info" /></p>
					</div>

				</div>
			</div>
		</div>
	</div>
	<script>
		
		$(document).ready(function(){
			selectAllToggle();
			$("#adm_bakdata_list tbody tr:odd").addClass("tralt_b");
			$("#adm_bakdata_list tbody tr")
			.mouseover(function(){$(this).addClass("trover")})
			.mouseout(function(){$(this).removeClass("trover")});
			$("#bakplace").change(function(){$("#server_bakfname").toggle();$("#local_bakzip").toggle();});
		});
		function bakact(act){
			if (getChecked('ids') == false) {
				EmlogMsgNotify('warning','','请选择要操作的备份文件','top right');
				return;
			}
			if(act == 'del' && !confirm('你确定要删除所选备份文件吗？')){return;}
			$("#operate").val(act);
			$("#form_bak").submit();
		}
		$("#menu_category_sys").addClass('active');
		$("#menu_data").addClass('active');
	</script>
	<script>
		$(function () {
			setTimeout('Emlogalert()',100);
		});
		function Emlogalert(){
			<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','备份文件删除成功','top right');<?php endif;?>
			<?php if(isset($_GET['active_backup'])):?>EmlogMsgNotify('info','','数据备份成功','top right');<?php endif;?>
			<?php if(isset($_GET['active_import'])):?>EmlogMsgNotify('info','','备份导入成功','top right');<?php endif;?>
			<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','请选择要删除的备份文件','top right');<?php endif;?>
			<?php if(isset($_GET['error_b'])):?>EmlogMsgNotify('error','','备份文件名错误','top right');<?php endif;?>
			<?php if(isset($_GET['error_c'])):?>EmlogMsgNotify('error','','服务器空间不支持zip，无法导入zip备份','top right');<?php endif;?>
			<?php if(isset($_GET['error_d'])):?>EmlogMsgNotify('error','','上传备份失败','top right');<?php endif;?>
			<?php if(isset($_GET['error_e'])):?>EmlogMsgNotify('error','','错误的备份文件','top right');<?php endif;?>
			<?php if(isset($_GET['error_f'])):?>EmlogMsgNotify('error','','服务器空间不支持zip，无法导出zip备份','top right');<?php endif;?>
			<?php if(isset($_GET['active_mc'])):?>EmlogMsgNotify('info','','缓存更新成功','top right');<?php endif;?>
		}
	</script>