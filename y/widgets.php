<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>
	$("#menu_category_view").addClass('active');
	$("#menu_widget").addClass('active');
</script>
<div class="content_l">
	<div class="widget-content padding header-nav">
		侧边栏组件管理
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="widget">
				<div class="widget-header">
					<h2>可选组件</h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
						<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
					</div>
				</div>
				<div class="widget-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="widget">
								<div class="widget-content padding" id="adm_widget_list">
									<form action="widgets.php?action=setwg&wg=blogger" method="post" class="form-group">
										<div class="panel-default" id="blogger">
											<div class="widget-top">
												<li class="widget-title">个人资料</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['blogger']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=calendar" method="post" class="form-group">
										<div class="panel-lightblue-2" id="calendar">
											<div class="widget-top">
												<li class="widget-title">日历</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['calendar']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=twitter" method="post" class="form-group">
										<div class="panel-default" id="twitter">
											<div class="widget-top">
												<li class="widget-title">最新微语</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['twitter']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<label>首页显示最新微语数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('index_newtwnum'); ?>" name="index_newtwnum" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=tag" method="post" class="form-group">
										<div class="panel-lightblue-2" id="tag">
											<div class="widget-top">
												<li class="widget-title">标签</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['tag']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=sort" method="post" class="form-group">
										<div class="panel-default" id="sort">
											<div class="widget-top">
												<li class="widget-title">分类</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['sort']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=archive" method="post" class="form-group">
										<div class="panel-lightblue-2" id="archive">
											<div class="widget-top">
												<li class="widget-title">存档</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['archive']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=newcomm" method="post" class="form-group">
										<div class="panel-default" id="newcomm">
											<div class="widget-top">
												<li class="widget-title">最新评论</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['newcomm']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<label>首页最新评论数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('index_comnum'); ?>" name="index_comnum" class="form-control"/>
												</div>
												<div class="form-group">
													<label>新近评论截取字节数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('comment_subnum'); ?>" name="comment_subnum" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=newlog" method="post" class="form-group">
										<div class="panel-lightblue-2" id="newlog">
											<div class="widget-top">
												<li class="widget-title">最新文章</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['newlog']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<label>首页显示最新文章数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('index_newlognum'); ?>" name="index_newlog" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=hotlog" method="post" class="form-group">
										<div class="panel-default" id="hotlog">
											<div class="widget-top">
												<li class="widget-title">热门文章</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['hotlog']; ?>" class="form-control"/>
												</div>
												<li>首页显示热门文章数</li>
												<div class="form-group">
													<label>首页显示热门文章数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('index_hotlognum'); ?>" name="index_hotlognum" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=random_log" method="post" class="form-group">
										<div class="panel-lightblue-2" id="random_log">
											<div class="widget-top">
												<li class="widget-title">随机文章</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['random_log']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<label>首页显示随机文章数</label>
													<input maxlength="5" size="10" value="<?php echo Option::get('index_randlognum'); ?>" name="index_randlognum" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=link" method="post" class="form-group">
										<div class="panel-default" id="link">
											<div class="widget-top">
												<li class="widget-title">链接</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['link']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
									<form action="widgets.php?action=setwg&wg=search" method="post" class="form-group">
										<div class="panel-lightblue-2" id="search">
											<div class="widget-top">
												<li class="widget-title">搜索</li>
												<li class="widget-act-add"></li>
												<li class="widget-act-del"></li>
											</div>
											<div class="panel-body widget-control">
												<div class="form-group">
													<label>标题</label>
													<input type="text" name="title" value="<?php echo $customWgTitle['search']; ?>" class="form-control"/>
												</div>
												<div class="form-group">
													<input type="submit" name="" value="更改" class="btn btn-success" />
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="widget">
				<div class="widget-header">
					<h2>使用中的组件</h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
						<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<form action="widgets.php?action=compages" method="post">
						<div id="adm_widget_box">
							<?php if($tpl_sidenum > 1):?>
								<p>
									<select id="wg_select" class="form-control">
										<?php
										for ($i=1; $i<=$tpl_sidenum; $i++):
											if($i == $wgNum):
												?>
												<option value="<?php echo $i;?>" selected>侧边栏<?php echo $i;?></option>
											<?php else:?>
												<option value="<?php echo $i;?>">侧边栏<?php echo $i;?></option>
											<?php endif;endfor;?>
										</select>
									</p>
								<?php endif;?>
								<ul style="padding-left:0px;">
									<?php 
									foreach ($widgets as $widget):
										//是否为自定义组件
										$flg = strpos($widget, 'custom_wg_') === 0 ? true : false;
										//获取自定义组件标题
										$title = ($flg && isset($custom_widget[$widget]['title'])) ? $custom_widget[$widget]['title'] : '';
										if($flg && empty($title)){
											preg_match("/^custom_wg_(\d+)/", $widget, $matches);
											$title = '未命名组件('.$matches[1].')';
										}	
										?>
										<li class="sortableitem" id="em_<?php echo $widget; ?>">
											<input type="hidden" name="widgets[]" value="<?php echo $widget; ?>" />
											<?php
											if ($flg){
												echo $title;
											}else{
												echo $widgetTitle[$widget];
											}?>
										</li>
									<?php endforeach;?>
								</ul>
								<input type="hidden" name="wgnum" id="wgnum" value="<?php echo $wgNum; ?>" />
								<div style="margin:20px 0px;">
									<input type="submit" value="保存组件排序" class="btn btn-success" />
									<a href="javascript: em_confirm(0, 'reset_widget', '<?php echo LoginAuth::genToken(); ?>');" class="btn btn-warning">恢复组件设置到初始安装状态</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="widget">
					<div class="widget-header">
						<h2>自定义组件</h2>
						<div class="additional-btn">
							<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
							<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
						</div>
					</div>
					<div class="widget-content">
						<div class="row">
							<div class="col-lg-12">
								<div class="widget">
									<div class="widget-content padding">
										<div id="adm_widget_list">
											<?php
											foreach ($custom_widget as $key=>$val): 
												preg_match("/^custom_wg_(\d+)/", $key, $matches);
												$custom_wg_title = empty($val['title']) ? '未命名组件('.$matches[1].')' : $val['title'];
												?>
												<form action="widgets.php?action=setwg&wg=custom_text" method="post" class="form-group">
													<div class="panel-default" id="<?php echo $key; ?>">
														<div class="widget-top">
															<li class="widget-title"><?php echo $custom_wg_title; ?></li>
															<li class="widget-act-add"></li>
															<li class="widget-act-del"></li>
														</div>
														<div class="panel-body widget-control">
															<div class="form-group">
																<input type="hidden" name="custom_wg_id" value="<?php echo $key; ?>" />
																<input type="text" name="title" style="width:100%;" value="<?php echo $val['title']; ?>" class="form-control"/>
															</div>
															<div class="form-group">
																<textarea name="content" rows="8" style="width:100%;overflow:auto;" class="form-control"><?php echo $val['content']; ?></textarea>
															</div>
															<div class="form-group">
																<input type="submit" name="" value="更改" class="btn btn-success"/>
																<a href="widgets.php?action=setwg&wg=custom_text&rmwg=<?php echo $key; ?>" class="btn btn-warning">删除该组件</a>
															</div>
														</div>
													</div>
												</form>


											<?php endforeach;?>
											<form action="widgets.php?action=setwg&wg=custom_text" method="post">
												<div class="wg_line2"><a href="javascript:displayToggle('custom_text_new', 2);" class="btn btn-block btn-info">自定义一个新的组件+</a></div>
												<div id="custom_text_new">
													<div class="form-group">
														<label>组件名</label>
														<input type="text" class="form-control" name="new_title" value="" style="width:100%;" placeholder="组件名称"/>
													</div>
													<div class="form-group">
														<label>内容 （支持html）</label>
														<textarea name="new_content" class="form-control" rows="10" style="width:100%;"></textarea>
													</div>
													<div class="form-group">
														<input type="submit" name="" value="添加组件" class="btn btn-success"/>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			//$("#custom_text_new").css('display', $.cookie('em_custom_text_new') ? $.cookie('em_custom_text_new') : 'none');
			var widgets = $(".sortableitem").map(function(){return $(this).attr("id");});
			$.each(widgets,function(i,widget_id){
				var widget_id = widget_id.substring(3);
				$("#"+widget_id+" .widget-act-add").hide();
				$("#"+widget_id+" .widget-act-del").show();
			});
    //show edit form
    $("#adm_widget_list .widget-title").click(
    	function(){$(this).parent().next(".widget-control").slideToggle('fast');}
    	);
    //add widget
    $("#adm_widget_list .widget-act-add").click(function(){
    	var wgnum = $("#wgnum").val();
    	var title = $(this).prevAll(".widget-title").html();
    	var widget_id = $(this).parent().parent().attr("id");
    	var widget_element = "<li class=\"sortableitem\" id=\"em_"+widget_id+"\">"+title+"<input type=\"hidden\" name=\"widgets[]\" value=\""+widget_id+"\" /></li>";
    	$("#adm_widget_box ul").append(widget_element);
    	$(this).hide();
    	$(this).next(".widget-act-del").show();
    });
    //remove widget
    $("#adm_widget_list .widget-act-del").click(function(){
    	var widget_id = $(this).parent().parent().attr("id");
    	$("#adm_widget_box ul #em_" + widget_id).remove();
    	$(this).hide();
    	$(this).prev(".widget-act-add").show();
    });
    //拖动排序
    $(function() {
    	$( "#adm_widget_box ul" ).sortable();
    	$( "#adm_widget_box ul" ).disableSelection();
    });


    $("#wg_select").change(function(){
    	window.location = "widgets.php?wg="+$(this).val();
    });
});
</script>

<script>

	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['activated'])):?>EmlogMsgNotify('info','','设置保存成功','top right');<?php endif;?>
	}
</script>