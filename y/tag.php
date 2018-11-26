<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">

	<div class="col-sm-12">
		<div class="widget">
			<div class="widget-header ">
				<h2><i class="icon-tags"></i> <strong>标签管理</strong></h2>
				<div class="additional-btn">
					<a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
				</div>
			</div>
			<div class="widget-content padding">
				<form action="tag.php?action=dell_all_tag" method="post" name="form_tag" id="form_tag">
					<?php if($tags):?>
						<div class="row">
							<?php foreach($tags as $key=>$value):?>
								<div class="col-xs-12 col-sm-6 col-md-2">
									<div class="checkbox form-inline">
										<label>
											<input type="checkbox" name="tag[<?php echo $value['tid']; ?>]" class="ids not-switch" value="1" ><a href="tag.php?action=mod_tag&tid=<?php echo $value['tid']; ?>"><span class="text-info"><?php echo $value['tagname']; ?></span></a>
										</label>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
						<li style="margin:20px 0px;list-style: none;">
							<a href="javascript:void(0);" id="select_all" class="btn btn-info">全选</a> 选中项：
							<a href="javascript:deltags();" class="care btn btn-danger" ><i class="icon-trash-3"></i>删除</a>
						</li>
					<?php else:?>
						<blockquote class="text-warning">
							<h4 class="text-danger">还没有标签，写文章的时候可以给文章打标签</h4>
						</blockquote>
					<?php endif;?>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function deltags(){
		if (getChecked('ids') == false) {
			alert('请选择要删除的标签');
			return;
		}
		if(!confirm('你确定要删除所选标签吗？')){return;}
		$("#form_tag").submit();
	}
	$(document).ready(function(){
		selectAllToggle();
	});
	$("#menu_list").addClass('active');
	$("#menu_tag").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','删除标签成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_edit'])):?>EmlogMsgNotify('info','','修改标签成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','请选择要删除的标签','top right');<?php endif;?>
	}
</script>