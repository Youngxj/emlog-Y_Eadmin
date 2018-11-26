<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
	
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header">
				<h2><i class="fa fa-plug text-navy mid-icon"></i> 插件管理</h2>
			</div>
			<div class="widget-content padding">

				<div class="table-responsive">
					<table data-sortable="" class="table table-hover table-striped" data-sortable-initialized="true">
						<thead>
							<tr>
								<th>插件名</th>
								<th>作者</th>
								<th>版本</th>
								<th>适配</th>
								<th>操作</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							if($plugins):
								$i = 0;
								foreach($plugins as $key=>$val):
									$plug_state = 'inactive';
									$plug_action = 'active';
									$plug_state_des = '点击激活插件';
									if (in_array($key, $active_plugins))
									{
										$plug_state = 'active';
										$plug_action = 'inactive';
										$plug_state_des = '点击禁用插件';
									}
									$i++;
									if (TRUE === $val['Setting']) {
										//$val['Name'] = "<a data-toggle=\"collapse\" href=\"#plugin{$i}\" class=\"faq-question\">{$val['Name']}</a> <a href=\"./plugin.php?plugin={$val['Plugin']}\" title=\"点击设置插件\"></a>";
										
										
										$val['Set'] = '<a  data-toggle="tooltip" data-original-title="点击插件设置" href="./plugin.php?plugin='.$val['Plugin'].'"><i class="fa fa-edit"></i></a>';
										$val['Set_more'] = $val['Url'] != ''?"<a href=\'".$val['Url']."\' target=\'_blank\'>更多信息<\/a>":'';
									}
									$status_p = $plug_state=='active'?'<i class="fa fa-circle text-green-1"></i>':'<i class="fa fa-circle-o text-red-1"></i>';
									// $status_ps = $plug_state=='active'?'禁用':'启动';
									// $status_color = $plug_state=='active'?'success':'danger';
									$val['plugin_status'] = '<a href="./plugin.php?action='.$plug_action.'&plugin='.$key.'&token='.LoginAuth::genToken().'"  data-original-title="'.$plug_state_des.'" data-toggle="tooltip">'.$status_p.'</a>';
									//$val['plugin_status'] = '<span class="label label-'.$status_color.'"><a href="./plugin.php?action='.$plug_action.'&plugin='.$key.'&token='.LoginAuth::genToken().'"  data-original-title="'.$plug_state_des.'" data-toggle="tooltip">'.$status_ps.'</a></span>';
									
									?>
									<tr>
										<td>
											<a data-toggle="collapse" href="javascript:void(0)" class="faq-question" onclick="EmlogMsgNotify('info','<?=$val['Name'];?>','<?=$val['Description'].$val['Set_more'];?>','top right')"><?php echo $val['Name']; ?></a>
										</td>
										<td>
											<?php if ($val['Author'] != ''):?>
												<?php if ($val['AuthorUrl'] != ''):?>
													<a href="<?php echo $val['AuthorUrl'];?>" target="_blank"><?php echo $val['Author'];?></a>
												<?php else:?>
													<?php echo $val['Author'];?>
												<?php endif;?>
											<?php endif;?>
										</td>
										<td><?php echo $val['Version']; ?></td>
										<td><?php echo $val['ForEmlog'] != ''?$val['ForEmlog']:'未标注';?></td>
										<td>
											<div class="btn-group">
												<?=$val['plugin_status'];?>
												<a data-original-title="删除" data-toggle="tooltip" href="javascript: em_confirm('<?php echo $key; ?>', 'plu', '<?php echo LoginAuth::genToken(); ?>');" ><i class="icon-trash-3"></i></a>
												<?=$val['Set'];?>
											</div>

										</td>
									</tr>
								<?php endforeach;else: ?>
								<div class="alert alert-warning">还没有安装插件</div>
							<?php endif;?>
						</tbody>
					</table>
				</div>
				<div class="add_plugin"><a class="btn btn-outline btn-info" href="./plugin.php?action=install">安装插件</a></div>
			</div>
		</div>
	</div>
</div>
<div class="notifyjs-corner" style="top: 0px; right: 0px;"></div>
<script>
	$("#adm_plugin_list tbody tr:odd").addClass("tralt_b");
	$("#adm_plugin_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")})
	
	$("#menu_category_sys").addClass('active');
	$("#menu_plug").addClass('active');
</script>
<script>
	$(function () {
		setTimeout('Emlogalert()',100);
	});
	function Emlogalert(){
		<?php if(isset($_GET['activate_install'])):?>EmlogMsgNotify('info','','插件上传成功，请激活使用','top right');<?php endif;?>
		<?php if(isset($_GET['active'])):?>EmlogMsgNotify('info','','插件激活成功','top right');<?php endif;?>
		<?php if(isset($_GET['activate_del'])):?>EmlogMsgNotify('info','','删除成功','top right');<?php endif;?>
		<?php if(isset($_GET['active_error'])):?>EmlogMsgNotify('error','','插件激活失败','top right');<?php endif;?>
		<?php if(isset($_GET['inactive'])):?>EmlogMsgNotify('info','','插件禁用成功','top right');<?php endif;?>
		<?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','删除失败，请检查插件文件权限','top right');<?php endif;?>
	}
</script>