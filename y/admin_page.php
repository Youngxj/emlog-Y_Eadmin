<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="icon-docs"></i><strong>页面管理</strong></h2>
			</div>
			<div class="widget-content">
				<form action="page.php?action=operate_page" method="post" name="form_page" id="form_page">
					<div class="table-responsive">
						<table data-sortable class="table table-hover">
							<thead>
								<tr>
									<th colspan="2">标题</th>
									<th>模版</th>
									<th>评论</th>
									<th>时间</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($pages):
									foreach($pages as $key => $value):
										if (empty($navibar[$value['gid']]['url']))
										{
											$navibar[$value['gid']]['url'] = Url::log($value['gid']);
										}
										$isHide = $value['hide'] == 'y' ? 
										'<font color="red"> - 草稿</font>' : 
										'<a href="'.$navibar[$value['gid']]['url'].'" target="_blank" title="查看页面"><img src="./views/images/vlog.gif" align="absbottom" border="0"></a>';
										?>
										<tr>
											<td><input type="checkbox" name="page[]" value="<?php echo $value['gid']; ?>" class="ids not-switch" /></td>
											<td>
												<a href="page.php?action=mod&id=<?php echo $value['gid']?>"><?php echo $value['title']; ?></a> 
												<?php echo $isHide; ?>    
												<?php if($value['attnum'] > 0): ?><i class="icon-attach-1" align="top" title="附件：<?php echo $value['attnum']; ?>"></i><?php endif; ?>
											</td>
											<td><?php echo $value['template']?$value['template']:'page.php'; ?></td>
											<td class="tdcenter"><a href="comment.php?gid=<?php echo $value['gid']; ?>"><?php echo $value['comnum']; ?></a></td>
											<td><?php echo $value['date']; ?></td>
										</tr>
									<?php endforeach;else:?>
									<tr><td class="tdcenter" colspan="5">还没有页面</td></tr>
								<?php endif;?>
							</tbody>
						</table>
					</div>
					<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
					<input name="operate" id="operate" value="" type="hidden" />
					<div class="list_footer">
						<a href="javascript:void(0);" id="select_all" class="btn btn-default">全选</a>
						<!--<span class="btn btn-default">选中项：</span>-->
						<a href="javascript:pageact('del');" class="btn btn-danger"><i class="icon-trash-3"></i>删除</a>
						<a href="javascript:pageact('hide');" class="btn btn-primary">转为草稿</a> 
						<a href="javascript:pageact('pub');" class="btn btn-success">发布</a>
						<a href="page.php?action=new" class="btn btn-info">新建页面+</a>
					</div>
				</form>
				
				<div class="page_num"><?php echo $pageurl; ?> (有<?php echo $pageNum; ?>个页面)</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
		$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
		selectAllToggle();
	});
	
	function pageact(act){
		if (getChecked('ids') == false) {
			EmlogMsgNotify('warning','','请选择要操作的页面','top right');
			return;
		}
		if(act == 'del' && !confirm('你确定要删除所选页面吗？')){return;}
		$("#operate").val(act);
		$("#form_page").submit();
	}
	$("#menu_list").addClass('active');
	$("#menu_page").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除页面成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_hide_n'])):?>EmlogMsgNotify('info','','发布页面成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_hide_y'])):?>EmlogMsgNotify('info','','禁用页面成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_pubpage'])):?>EmlogMsgNotify('info','','页面保存成功','top right');<?php endif;?>
	}
</script>