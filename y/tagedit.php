<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	
	<div class="col-lg-12">
		<div class="widget float-e-margins">
			<div class="widget-header">
				<h2><i class="fa fa-tags fa-fw"></i> 标签修改</h2>
			</div>
			<div class="widget-content padding">
				<form  method="post" action="tag.php?action=update_tag" class="form-inline">
					<div>
						<li><input size="40" value="<?php echo $tagname; ?>" name="tagname" class="form-control" /></li>
						<li style="margin:10px 0px">
							<input type="hidden" value="<?php echo $tagid; ?>" name="tid" />
							<input type="submit" value="保 存" class="btn btn-primary" />
							<input type="button" value="取 消" class="btn btn-default" onclick="javascript: window.location='tag.php';"/>
						</li>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_list").addClass('active');
	$("#menu_tag").addClass('active');
</script>
<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','标签不能为空','top right');<?php endif;?>
	}
</script>