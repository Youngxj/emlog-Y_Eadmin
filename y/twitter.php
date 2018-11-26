<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="row">

  <div class="col-lg-12">
    <div class="widget">
      <div class="widget-content padding">
        <div class="user-profile-content">

          <!-- Begin timeline -->
          <div class="the-timeline">
            <form role="form" class="post-to-timeline" method="post" action="twitter.php?action=post">
              <input type="hidden" name="img" id="imgPath" />
              <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
              <div class="message">
                <a class="message-author" href="#"></a>
                <span class="message-date"></span>
                <div class="msg">你还可以输入500字</div>
                <textarea class="form-control box" name="t" style="height: 150px;" placeholder="你想记录点什么……"></textarea>
                <div class="row">
                  <div class="col-sm-6">
                    <a id="uploadfile_click" class="btn btn-sm btn-default" title="图片上传"><i class="fa fa-camera"></i></a>
                    <a class="btn btn-sm btn-default" id="face" title="添加表情"><i class="fa fa-smile-o"></i></a>
                    
                    <a id="uploadfile"></a>
                  </div>
                  <div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary" onclick="return checkt();">发布</button></div>
                </div>
                
                <div id="img_name" class="twImg" style="display:none;">
                  <a id="img_name_a" class="imgicon">{图片名称}</a>
                  <a id="img-cancel"> [取消]</a>
                  <a id="img_pop"></a>
                </div>
              </div>
            </form>
            <br><br>
            <ul>
              <?php
              foreach($tws as $val):
                $author = $user_cache[$val['author']]['name'];
                $avatar = empty($user_cache[$val['author']]['avatar']) ? './y/images/other/avatar.png' : '../' . $user_cache[$val['author']]['avatar'];
                $tid = (int)$val['id'];
                $replynum = $Reply_Model->getReplyNum($tid);
                $hidenum = $replynum - $val['replynum'];
                $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;max-width:100%" src="'.BLOG_URL.$val['img'].'"/></a>';
                ?>

                <li>
                  <div class="the-date">
                    <img class="img-circle" src="<?php echo $avatar; ?>" style="width: 100%;">
                  </div>
                  <h4><?php echo $author; ?></h4>
                  <p>
                    <?php echo $val['t'];?><?php echo $img;?>
                  </p>
                  <!-- <label class="form-inline"></label> -->
                  <div class="tw_cz">
                    <div class="row">
                      <div class="col-sm-6"><small ><code><?php echo $val['date'];?></code></small></div>
                      <div class="col-sm-6 text-right"><a  class="btn btn-sm btn-primary" href="javascript: em_confirm(<?php echo $tid;?>, 'tw', '<?php echo LoginAuth::genToken(); ?>');"><i class="fa fa-trash-o fa-fw"></i> 删除</a></div>
                    </div>
                    
                  </div>
                  
                  <!-- <div class="form-inline">
                    <p class="text-right"></p>
                    <span class="vertical-date text-left"><br></span>
                  </div> -->
                  
                </li>
              <?php endforeach;?>

            </ul>
            <div class="page_num"><?php echo $pageurl;?></div>
          </div><!-- End div .the-timeline -->
          <!-- End timeline -->
        </div>
      </div>
    </div>
  </div>
</div>
<div id="faceWraps"></div>


</div>
<!-- <script type="text/javascript" src="../include/lib/js/uploadify/jquery.uploadify.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script> -->
<script type="text/javascript" src="./y/assets/js/emo.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script type="text/javascript" src="./y/assets/js/upload.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script type="text/javascript">
  $(function(){
    var up = $('#uploadfile').Huploadify({
      auto:true, 
      fileTypeExts: '*.jpg;*.png;*.gif;*.jpeg',
      multi:false, 
      fileObjName:'attach',
      formData:{key: '<?php echo AUTH_COOKIE_NAME;?>',key2:'<?php echo $_COOKIE[AUTH_COOKIE_NAME];?>'}, 
      fileSizeLimit: 20971520, 
      showUploadedPercent:false,
      showUploadedSize:false,
      removeTimeout:9999999,
      buttonText:' <i class="zmdi zmdi-camera-add"></i>',
      uploader:'attachment.php?action=upload_tw_img',		
      onUploadComplete:function(file,data){
        var data = eval("("+data+")");
        $("#imgPath").val(data.filePath);
        $("#uploadfile").hide();
        $("#img_name").show();
        $("#img_name_a").text(file.name);
      },
    });
    $('#img-cancel').click(function(){
      up.cancel('*');
      $("#imgPath").val("");
      $("#uploadfile").show();
      $("#img_name").hide();
      $("#img_name_a").text("{图片名称}");
      $("#img_pop").empty();
    });
  });
  $("#uploadfile_click").click(function(){
    $('#select_btn_1').click();
  });
</script>
<script>
  $(document).ready(function(){
    $(".post a").toggle(
      function () {
        tid = $(this).parent().attr('id');
        $("#r_" + tid).html('<p class="loading"></p>');
        $.get("twitter.php?action=getreply&tid="+tid+"&stamp="+timestamp(), function(data){
          $("#r_" + tid).html(data);
          $("#rp_"+tid).show();
        })},
        function () {
          tid = $(this).parent().attr('id');
          $("#r_" + tid).html('');
          $("#rp_"+tid).hide();
        });
    $(".box").keyup(function(){
      var t=$(this).val();
      var n = 500 - t.length;
      if (n>=0){
        $(".msg").html("你还可以输入<code>"+n+"</code>字");
      }else {
        $(".msg").html("<span style=\"color:#FF0000\">已超出"+Math.abs(n)+"字</span>");
      }
    });
    
    //$("#sz_box").css('display', $.cookie('em_sz_box') ? $.cookie('em_sz_box') : '');
    $("#menu_tw").addClass('sidebarsubmenu1');
    $(".box").focus();

    $("#twitter").click(function(e){
      $("#twitter").hide();
      $("#twitters").show();
    });
    $("#menu_tw").addClass('active');


    $("#face").click(function(e){
      var wrap = $("#faceWraps");
      if(!wrap.html()){
        var emotionsStr = [];
        $.each(emo,function(k,v){
          emotionsStr.push('<img style="cursor: pointer;padding: 3px;" title="'+k+'" src="./editor/plugins/emoticons/images/'+v+'"/>');
        });
        wrap.html(emotionsStr.join(""));
      }

      wrap.children().unbind('click').click(function () {
        var val= $("textarea").val();
        $("textarea").val((val||"")+$(this).attr("title"));
        $("textarea").focus();
      });

      var offset = $(this).offset();
      wrap.css({
        left : offset.left,
        top : offset.top
      });
      wrap.show();
      e.stopPropagation();
      e.preventDefault();
      $(document.body).unbind('click').click(function (e) {
        wrap.hide();
      });
      $(document).unbind('click').scroll(function (e) {
        wrap.hide();
      });
    });

  });

  function onUploadSuccess(file, data, response){
    var data = eval("("+data+")");
    if(data.filePath){
      $("#imgPath").val(data.filePath);
      $("#img_select").hide();
      $("#img_name").show();
      $("#img_name_a").text(file.name);
      $("#img_pop").html("<img src='"+data.filePath+"'/>");
    }else{
      alert("上传失败！");	
    }
  }
  function onUploadError(file, errorCode, errorMsg, errorString){
    alert(errorString);
  }
  function unSelectFile(){
    $.get("attachment.php?action=del_tw_img",{filepath:$("#imgPath").val()});
    $("#imgPath").val("");
    $("#img_select").show();
    $("#uploadfile").show();
    $("#img_name").hide();
    $("#img_name_a").text("{图片名称}");
    $("#img_pop").empty();
  }
  function reply(tid, rp){
    $("#rp_"+tid+" textarea").val(rp);
    $("#rp_"+tid+" textarea").focus();
  }
  function doreply(tid){
    var r = $("#rp_"+tid+" textarea").val();
    var post = "r="+encodeURIComponent(r);
    $.post('twitter.php?action=reply&tid='+tid+"&stamp="+timestamp(), post, function(data){
      data = $.trim(data);
      if (data == 'err1'){
        $(".huifu span").text('回复长度需在140个字内');
      }else if(data == 'err2'){
        $(".huifu span").text('该回复已经存在');
      }else{
        $("#r_"+tid).append(data);
        var rnum = Number($("#"+tid+" span").text());
        $("#"+tid+" span").html(rnum+1);
        $(".huifu span").text('')
      }
    });
  }
  function delreply(rid,tid){
    if(confirm('你确定要删除该条回复吗？')){
      $.get("twitter.php?action=delreply&rid="+rid+"&tid="+tid+"&stamp="+timestamp(), function(data){
        var tid = Number(data);
        var rnum = Number($("#"+tid+" span").text());
        $("#"+tid+" span").text(rnum-1);
        if ($("#reply_"+rid+" span a").text() == '审核'){
          var rnum = Number($("#"+tid+" small").text());
          if(rnum == 1){$("#"+tid+" small").text('');}else{$("#"+tid+" small").text(rnum-1);}
        }
        $("#reply_"+rid).hide("slow");
      })}else {return;}
    }
    function hidereply(rid,tid){
      $.get("twitter.php?action=hidereply&rid="+rid+"&tid="+tid+"&stamp="+timestamp(), function(){
        $("#reply_"+rid).css('background-color','#FEE0E4');
        $("#reply_"+rid+" span a").text('审核');
        $("#reply_"+rid+" span a").attr("href","javascript: pubreply("+rid+","+tid+")");
        var rnum = Number($("#"+tid+" small").text());
        $("#"+tid+" small").text(rnum+1);
      });
    }
    function pubreply(rid,tid){
      $.get("twitter.php?action=pubreply&rid="+rid+"&tid="+tid+"&stamp="+timestamp(), function(){
        $("#reply_"+rid).css('background-color','#FFF');
        $("#reply_"+rid+" span a").text('隐藏');
        $("#reply_"+rid+" span a").attr("href","javascript: hidereply("+rid+","+tid+")");
        var rnum = Number($("#"+tid+" small").text());
        if(rnum == 1){$("#"+tid+" small").text('');}else{$("#"+tid+" small").text(rnum-1);}
      });
    }
    function checkt(){
      var t=$(".box").val();
      if (t.length > 140){return false;}
    }
  </script>
  <script>

    $(function () {
      setTimeout('Emlogalert()',100);
    });
    function Emlogalert(){
      <?php if(isset($_GET['active_t'])):?>EmlogMsgNotify('info','','发布成功','top right');<?php endif;?>
      <?php if(isset($_GET['active_set'])):?>EmlogMsgNotify('info','','设置保存成功','top right');<?php endif;?>
      <?php if(isset($_GET['active_del'])):?>EmlogMsgNotify('info','','微语删除成功','top right');<?php endif;?>
      <?php if(isset($_GET['error_a'])):?>EmlogMsgNotify('error','','微语内容不能为空','top right');<?php endif;?>
    }
  </script>