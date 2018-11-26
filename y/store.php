<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-shopping-cart fa-fw"></i> 应用中心</h2>
			</div>
			<div class="widget-content padding">
				<iframe src="<?php echo OFFICIAL_SERVICE_HOST;?>store/<?php echo Option::EMLOG_VERSION; ?>/<?php echo $site_url_encode; ?>" id="main" name="main" width="100%" height="910" frameborder="0" scrolling="yes" style="overflow: visible;display:"></iframe>
			</div>
		</div>
	</div>
</div>
<script>
	$("#menu_category_sys").addClass('active');
	$("#menu_store").addClass('active');
</script>