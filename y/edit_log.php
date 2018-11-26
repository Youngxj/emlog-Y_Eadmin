<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
$isdraft = $hide == 'y' ? true : false;
?>

<?php if($editType==1):?>
	<script src="./y/assets/libs/ckeditor/ckeditor.js"></script>
	<script src="./y/assets/libs/ckeditor/lang/zh.js"></script>
	<link href="./y/assets/libs/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
	<script src="./y/assets/libs/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
	<?php else:?>
		<script charset="utf-8" src="./editor/kindeditor.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
		<script charset="utf-8" src="./editor/lang/zh_CN.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
	<?php endif;?>
	<div class="row">
		<div class="row">
			<div class="col-lg-12">
				<div class="widget float-e-margins">
					<div class="widget-header">
						<h2><?php if ($isdraft) :?><i class="fa fa-files-o fa-fw"></i> 编辑草稿<?php else:?><i class="fa fa-list-alt fa-fw"></i> 编辑文章<?php endif;?><span id="msg_2"></span><span id="msg"></span></h2>
					</div>
					<div class="widget-content padding">
						<form action="save_log.php?action=edit" method="post" id="addlog" name="addlog">
							<div id="post">
								<div class="row">
									<div class="col-md-7">
										<div><input type="text" maxlength="200" name="title" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="输入文章标题"/></div>
										<div id="post_bar">
											<div>
												<span onclick="displayToggle('FrameUpload', 0);autosave(1);" class="show_advset btn btn-default">上传插入</span>
												<?php doAction('adm_writelog_head'); ?>
												<span id="asmsg"></span>
												<input type="hidden" name="as_logid" id="as_logid" value="<?php echo $logid; ?>">
											</div>
											<div id="FrameUpload" style="display: none;">
												<iframe style="width:100%;height:330px;" frameborder="0" src="attachment.php?action=attlib&logid=<?php echo $logid; ?>"></iframe>
											</div>
										</div>
										<div>
											<?php if($editType==1):?>
												<textarea id="content" name="content" class="ke-edit-iframe"><?php echo $content; ?></textarea>
												
												<?php else:?>
													<textarea id="content" name="content" style="width:100%; height:460px;"><?php echo $content; ?></textarea>
												<?php endif;?>
											</div>
											<div class="show_advset" onclick="displayToggle('advset', 1);">高级选项<i class="fa fa-sort"></i></div>
											<div id="advset">
												<div>文章摘要：</div>
												<div><textarea id="excerpt" name="excerpt" style="width:100%; height:260px; border:#CCCCCC solid 1px;" class="excerpt"><?php echo $excerpt; ?></textarea></div>
											</div>
										</div><!-- 编辑文章结束 -->
										<div class="col-md-5">
											<div class="panel panel-lightblue-1">
												<div class="panel-heading">设置项</div>
												<div class="panel-body">
													<select name="sort" id="sort" class="form-control">
														<option value="-1">选择分类...</option>
														<?php 
														foreach($sorts as $key=>$value):
															if ($value['pid'] != 0) {
																continue;
															}
															$flg = $value['sid'] == $sortid ? 'selected' : '';
															?>
															<option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>><?php echo $value['sortname']; ?></option>
															<?php
															$children = $value['children'];
															foreach ($children as $key):
																$value = $sorts[$key];
																$flg = $value['sid'] == $sortid ? 'selected' : '';
																?>
																<option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>>&nbsp; &nbsp; &nbsp; <?php echo $value['sortname']; ?></option>
																<?php
															endforeach;
														endforeach;
														?>
													</select>
													<p style="padding-top:10px;"><strong>标签:</strong></p>
													<input name="tag" id="tag" maxlength="200" class="form-control" value="<?php echo $tagStr; ?>" placeholder="文章标签，逗号或空格分隔，过多的标签会影响系统运行效率"/>
													<span style="color:#2A9DDB;cursor:pointer;margin-right: 40px;"><a href="javascript:displayToggle('tagbox', 0);">已有标签+</a></span>
													<div id="tagbox" style="display:none">
														<div class="well">
															<?php
															if ($tags) {
																foreach ($tags as $val){
																	$style = array('btn-red-1','btn-blue-1','btn-blue-2','btn-blue-3','btn-darkblue-1','btn-darkblue-2','btn-darkblue-3','btn-lightblue-1','btn-lightblue-2','btn-orange-1','btn-orange-2','btn-green-1','btn-green-2','btn-green-3','btn-pink-1','btn-pink-2','btn-yellow-1','btn-yellow-2','btn-warning');
																	$styleRand = array_rand($style);
																	echo " <a href=\"javascript: insertTag('{$val['tagname']}','tag');\" class=\"btn {$style[$styleRand]}\">{$val['tagname']}</a> ";
																}
															} else {
																echo '还没有设置过标签！';
															}
															?>
														</div>
													</div>
													<p style="padding-top:10px;"><strong>发布于：</strong></p>
													<input maxlength="200"name="postdate" id="postdate" value="<?php echo gmdate('Y-m-d H:i:s', $date); ?>" class="form-control"/>
													<input name="date" id="date" type="hidden" value="<?php echo $orig_date; ?>" >
													<input name="alias" id="alias" value="<?php echo $alias;?>" style="margin-top:10px;" class="form-control" placeholder="文章链接别名"/>
													<input type="text" value="<?php echo $password; ?>" name="password" id="password" style="margin-top:10px;" class="form-control" placeholder="文章访问密码："/>
													<div style="margin-top:3px;" class="form-inline">
														<span id="post_options">
															<input type="checkbox" value="y" name="top" id="top" <?php echo $is_top; ?> class="form-control"/>
															<label for="top">首页置顶</label>
															<input type="checkbox" value="y" name="sortop" id="sortop" <?php echo $is_sortop; ?> />
															<label for="sortop">分类置顶</label>
															<input type="checkbox" value="y" name="allow_remark" id="allow_remark" <?php echo $is_allow_remark; ?> />
															<label for="allow_remark">允许评论</label>
														</span>
													</div>
													<div id="post_button">
														<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
														<input type="hidden" name="ishide" id="ishide" value="<?php echo $hide; ?>" />
														<input type="hidden" name="gid" value=<?php echo $logid; ?> />
														<input type="hidden" name="author" id="author" value=<?php echo $author; ?> />
														<input type="submit" value="保存并返回" onclick="return checkform();" class="btn btn-primary" />
														<input type="button" name="savedf" id="savedf" value="保存" onclick="autosave(2);" class="btn btn-success" />
														<?php if ($isdraft) :?>
															<input type="submit" name="pubdf" id="pubdf" value="发布" onclick="return checkform();" class="btn btn-primary" />
														<?php endif;?>
													</div>
												</div>
											</div>
										</div>
									</div><!-- row end -->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if($editType==1):?>
			<script type="text/javascript" src="./y/assets/js/ckeditor.function.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
			<?php else:?>
				<script type="text/javascript" src="./y/assets/js/editor.function.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
			<?php endif;?>
			<script>

				try{
					checkalias();
				}catch(err){}

				$("#alias").keyup(function(){checkalias();});
				$("#advset").css('display', $.cookie('em_advset') ? $.cookie('em_advset') : '');
				/*$("#title").focus(function(){$("#title_label").hide();});
				$("#title").blur(function(){if($("#title").val() == '') {$("#title_label").show();}});
				$("#tag").focus(function(){$("#tag_label").hide();});
				$("#tag").blur(function(){if($("#tag").val() == '') {$("#tag_label").show();}});*/
				if ($("#title").val() != '')$("#title_label").hide();
				if ($("#tag").val() != '')$("#tag_label").hide();
				setTimeout("autosave(0)",60000);
				<?php if ($isdraft) :?>
					$("#menu_draft").addClass('active');
					<?php else:?>
						$("#menu_log").addClass('active');
					<?php endif;?>
				</script>