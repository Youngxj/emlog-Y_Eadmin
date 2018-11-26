<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row content_l">
  <div class="col-lg-12">
   <div class="widget float-e-margins">
    <div class="widget-content">
     <div id="addon_ins"><h1><span class="ajaxload"><?php echo $source_typename;?>正在下载安装中</span></h1></div>
 </div>
</div>
</div>
</div>
<script>
    $("#menu_category_sys").addClass('active');
    $("#menu_store").addClass('active');
    $(document).ready(function(){
        $.get('./store.php', {action:'addon', source:"<?php echo $source;?>", type:"<?php echo $source_type;?>" },
          function(data){
            if (data.match("succ")) {
                EmlogMsgNotify('success','<?php echo $source_typename;?>安装成功','<?php echo $source_typeurl;?>','top right');
                $("#addon_ins").html('<h3><span id="addonsucc"><?php echo $source_typename;?>安装成功，<?php echo $source_typeurl;?></span></h3>');
            } else if(data.match("error_down")){
                EmlogMsgNotify('warning','<?php echo $source_typename;?>下载失败','可能是服务器网络问题，请手动下载安装，<a href=" store.php">返回应用中心</a>','top right');
                $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?>下载失败，可能是服务器网络问题，请手动下载安装，<a href="store.php">返回应用中心</a></span>');
            } else if(data.match("error_zip")){
                EmlogMsgNotify('warning','<?php echo $source_typename;?>安装失败','可能是你的服务器空间不支持zip模块，请手动下载安装，<a href="store.php">返回应用中心</a>','top right');
                $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?>安装失败，可能是你的服务器空间不支持zip模块，请手动下载安装，<a href="store.php">返回应用中心</a></span>');
            } else if(data.match("error_dir")){
                EmlogMsgNotify('warning','<?php echo $source_typename;?>安装失败','可能是应用目录不可写，<a href="store.php">返回应用中心</a>','top right');
                $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?>安装失败，可能是应用目录不可写，<a href="store.php">返回应用中心</a></span>');
            }else{
                EmlogMsgNotify('warning','<?php echo $source_typename;?>安装失败','原因未知，<a href="store.php">返回应用中心</a>','top right');
                $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?>安装失败，<a href="store.php">返回应用中心</a></span>');
            }
        });
    })
</script>