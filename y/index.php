<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<?php if (ROLE == ROLE_ADMIN):?>
    <div class="row top-summary ">
        <div class="col-lg-3 col-md-6">
            <div class="widget green-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-newspaper-1"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"><b>文章数</b></p>
                        <h2><span class="animate-number" data-value="<?php echo $sta_cache['lognum'];?>" data-duration="3000"></span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget darkblue-2 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"><b>评论数</b></p>
                        <h2><span class="animate-number" data-value="<?php echo $sta_cache['comnum_all'];?>" data-duration="3000"></span></h2>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="widget pink-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-comment-3"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"><b>微语</b></p>
                        <h2><span class="animate-number" data-value="<?php echo $sta_cache['twnum'];?>" data-duration="3000"></span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="widget lightblue-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"><b>用户数</b></p>
                        <h2><span class="animate-number" data-value="<?php echo $usernum?$usernum:count($sta_cache)-8;?>" data-duration="3000"></span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-header ">
                    <h2><i class="fa fa-comments-o"></i> <strong>微语</strong></h2>
                    <div class="additional-btn">
                        <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                    </div>
                </div>
                <div class="widget-content padding">
                    <div class="chat-form">
                        <form method="post" action="twitter.php?action=post">
                            <div class="form-group">
                                <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
                                <textarea class="form-control box" name="t" placeholder="消息内容…" style="height: 140px; resize: none;"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <a class="btn btn-sm btn-default" id="face" title="添加表情"><i class="fa fa-smile-o"></i></a>

                                    <a id="uploadfile"></a>
                                </div>
                                <div class="col-xs-6 text-right">
                                  <input type="submit" value="发布微语" onclick="return checkt();" class="btn btn-sm btn-primary m-t-n-xs"/>
                              </div>
                          </div>
                          <div id="img_name" class="twImg" style="display:none;">
                              <a id="img_name_a" class="imgicon">{图片名称}</a>
                              <a id="img-cancel"> [取消]</a>
                              <a id="img_pop"></a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-6">
        <div class="widget">
            <div class="widget-header ">
                <h2><i class="icon-chart-pie-1"></i> <strong>服务器信息</strong></h2>
                <div class="additional-btn">
                    <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                </div>
            </div>
            <div class="widget-content padding">
                <dl class="sever_list">
                    <li>数据库表前缀：<?php echo DB_PREFIX; ?></li>
                    <li>PHP版本：<?php echo $php_ver; ?></li>
                    <li>MySQL版本：<?php echo $mysql_ver; ?></li>
                    <li>服务器环境：<?php echo $serverapp; ?></li>
                    <li>GD图形处理库：<?php echo $gd_ver; ?></li>
                    <li>服务器空间允许上传最大文件：<?php echo $uploadfile_maxsize; ?></li>
                    <li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="widget">
            <div class="widget-header ">
                <h2><i class="icon-website"></i> <strong>官方信息</strong></h2>
                <div class="additional-btn">
                    <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                </div>
            </div>
            <div class="widget-content padding" id="admindex_msg">
                <dl class="sever_list"></dl>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-info fade in nomargin" id="about">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>检查更新</h4>
    <p>您正在使用emlog <?php echo Option::EMLOG_VERSION; ?></p>
    <p>
        <button type="button" class="btn btn-info" id="ckup">查看是否最新</button>

    </p>
    <span id="upmsg"></span>
</div>

</span><?php echo $sj;?>
<div id="faceWraps"></div>
<script type="text/javascript" src="./y/assets/js/emo.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script>
    function checkt(){
          var t=$(".box").val();
          if (t.length > 140){return false;}
      }
    $(document).ready(function() {
        $("#admindex_msg dl").html("<span class=\"ajax_remind_1\">正在读取...</span>");
        $.getJSON("<?php echo OFFICIAL_SERVICE_HOST; ?>services/messenger.php?v=<?php echo Option::EMLOG_VERSION; ?>&callback=?",
            function(data) {
                $("#admindex_msg dl").html("");
                $.each(data.items, function(i, item) {
                    var image = '';
                    if (item.image != '') {
                        image = "<a href=\"" + item.url + "\" target=\"_blank\" title=\"" + item.title + "\"><img src=\"" + item.image + "\"></a><br />";
                    }
                    $("#admindex_msg dl").append("<li class=\"msg_type_" + item.type + "\">" + image + "<span>" + item.date + "</span><a href=\"" + item.url + "\" target=\"_blank\">" + item.title + "</a></li>");
                });
            });
    });
    $("#about #ckup").click(function() {
        $("#about #upmsg").html("正在检查，请稍后").addClass("ajaxload");
        $.getJSON("<?php echo OFFICIAL_SERVICE_HOST; ?>services/check_update.php?ver=<?php echo Option::EMLOG_VERSION; ?>&callback=?",
            function(data) {
                if (data.result.match("no")) {
                    $("#about #upmsg").html("目前还没有适合您当前版本的更新！").removeClass();
                } else if (data.result.match("yes")) {
                    $("#about #upmsg").html("有可用的emlog更新版本 " + data.ver + "，更新之前请您做好数据备份工作，<a id=\"doup\" href=\"javascript:doup('" + data.file + "','" + data.sql + "');\">现在更新</a>").removeClass();
                } else {
                    $("#about #upmsg").html("检查失败，可能是网络问题").removeClass();
                }
            });
    });
    function doup(source, upsql) {
        $("#about #upmsg").html("系统正在更新中，请耐心等待").addClass("ajaxload");
        $.get('./index.php?action=update&source=' + source + "&upsql=" + upsql,
            function(data) {
                $("#about #upmsg").removeClass();
                if (data.match("succ")) {
                    $("#about #upmsg").html('恭喜您！更新成功了，请<a href="./">刷新页面</a>开始体验新版emlog');
                } else if (data.match("error_down")) {
                    $("#about #upmsg").html('下载更新失败，可能是服务器网络问题');
                } else if (data.match("error_zip")) {
                    $("#about #upmsg").html('解压更新失败，可能是你的服务器空间不支持zip模块');
                } else if (data.match("error_dir")) {
                    $("#about #upmsg").html('更新失败，目录不可写');
                } else {
                    $("#about #upmsg").html('更新失败');
                }
            });
    }
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
</script>
<?php else:?>
    <div class="content_l">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row m-t-lg">
                <div class="col-lg-12">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox-content text-center">
                                    <h1><?php echo $name; ?></h1>
                                    <div class="m-b-sm">
                                        <a href="blogger.php"><img alt="image" class="img-circle" src="<?php echo empty($user_cache[UID]['avatar']) ? './y/images/other/avatar.png' : '../' . $user_cache[UID]['avatar'] ?>"></a>
                                    </div>
                                    <p class="font-bold"><?php if (ROLE == ROLE_ADMIN):?>管理员<?php else:?>成员<?php endif;?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div>
                        <table class="table" >
                            <tbody>
                                <tr style="text-align:center;">
                                    <td><button type="button" class="btn btn-primary m-r-sm"><?php echo $sta_cache[UID]['lognum'];?></button><br/>文章</td>
                                    <td><button type="button" class="btn btn-info m-r-sm"><?php echo $sta_cache[UID]['commentnum'];?></button><br/>评论</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row wrapper wrapper-content animated fadeInRight">
            <div class="alert alert-info" align="center">您正在使用emlog <?php echo Option::EMLOG_VERSION; ?></div>
        </div>
    </div>
<?php endif;?>
