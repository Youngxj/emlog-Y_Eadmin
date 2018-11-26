<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
// 0 -> 原生editor编辑器
// 1 -> 多功能的Ckeditor编辑器
$editType = '1';
//侧边栏公告
$Notice = '欢迎使用Y+Eadmin';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>管理中心 - <?php echo Option::get('blogname'); ?></title>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
    <meta name="author" content="Huban Creative">

    <!--Emlog核心js-->
    <!-- <script type="text/javascript" src="../include/lib/js/jquery/jquery-1.7.1.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script> -->
    <script src="./y/assets/libs/jquery/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
    
    <!-- Base Css Files -->
    <link href="./y/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
    <link href="./y/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./y/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./y/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
    <link href="./y/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
    <link href="./y/assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
    <link href="./y/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
    <link href="./y/assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
    <link href="./y/assets/libs/pace/pace.css" rel="stylesheet" />
    <link href="./y/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
    <link href="./y/assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="./y/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
    <!-- Code Highlighter for Demo -->
    <link href="./y/assets/libs/prettify/github.css" rel="stylesheet" />

    <!-- 分类选择器 -->
    <!-- <link href="./y/assets/libs/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" /> -->



    <link href="./y/assets/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />

    <!-- Extra CSS Libraries Start -->
    <link href="./y/assets/libs/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/morrischart/morris.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/jquery-clock/clock.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/bootstrap-calendar/css/bic_calendar.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/jquery-weather/simpleweather.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/libs/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="./y/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Extra CSS Libraries End -->
    <link href="./y/assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./y/assets/css/main.css?v2.0">
    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php doAction('adm_head');?>
</head>
<body class="fixed-left">
    <div class="md-modal md-3d-flip-vertical" id="task-progress">
      <div class="md-content">
         <h3><strong>关于 Y+Eadmin Ver1.0</strong></h3>
         <div>
            <p>Y+Eadmin 底层模版是COCO</p>
            <p>由Youngxj整理并适配到emlog后台</p>
            <p>使用中如果有任何疑问和问题请联系作者</p>
            <p>QQ：1170535111</p>
            <p>博客：<a href="https://www.youngxj.cn" target="_black">杨小杰博客</a></p>
            <p>邮箱：blog@youngxj.cn</p>
            <p>微博：<a href="https://weibo.com/youngxj0" target="_black">Young杨小杰</a></p>
            <p>使用帮助及说明文档<a href="./y/doc/index.html">点击进入</a></p>
            <p class="text-right"><small>PS：请遵守GPL-3.0开源协议</small></p>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
  <div class="md-content">
     <h3><strong>退出确认</strong></h3>
     <div>
        <p class="text-center">你确定要退出后台吗？</p>
        <p class="text-center">
            <button class="btn btn-danger md-close">不了！</button>
            <a href="./?action=logout" class="btn btn-success md-close">确认</a>
        </p>
    </div>
</div>
</div>
<!-- Modal End -->	
<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1><a href="./"><img src="./y/images/Y+admin.png" alt="Logo"></a></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav hidden-xs">
                        <li class="language_bar dropdown hidden-xs">
                            <a href="../" class="dropdown-toggle" target="_blank" title="在新窗口浏站点">
                                <i class="fa fa-home"></i>
                                <?php 
                                $blog_name = Option::get('blogname');
                                echo empty($blog_name) ? '查看我的站点' : subString($blog_name, 0, 24);
                                ?>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-navbar">

                        <li class="iconify log_checked">
                            <?php
                            $checknum = $sta_cache['checknum'];
                            if (ROLE == ROLE_ADMIN && $checknum > 0):
                                $n = $checknum > 999 ? '...' : $checknum;
                                ?>
                                <a href="./admin_log.php?checked=n" ><i class="fa fa-file-text"></i><span class="label label-danger absolute"><?php echo $n; ?></span></a>
                            <?php endif;?>
                        </li>
                        <li class="iconify content_hide">
                            <?php
                            $hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
                            if ($hidecmnum > 0):
                                $n = $hidecmnum > 999 ? '...' : $hidecmnum;
                                ?>
                                <a href="./comment.php?hide=y" ><i class="fa fa-envelope"></i><span class="label label-danger absolute"><?php echo $n; ?></span></a>
                            <?php endif;?>
                        </li>
                        <li class="iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="<?php echo empty($user_cache[UID]['avatar']) ? './y/images/other/avatar.png' : '../' . $user_cache[UID]['avatar'] ?>" onerror="this.src='./y/images/y159.png'"></span> <strong><?php echo subString($user_cache[UID]['name'], 0, 12) ?></strong> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="./blogger.php" title="<?php echo subString($user_cache[UID]['name'], 0, 12) ?>"><i class="icon-info-1"></i>我的信息</a></li>
                                <?php if (ROLE == ROLE_ADMIN):?>
                                    <li><a href="./configure.php"><i class="icon-cog-2"></i>设置</a></li>
                                    <li class="dividerder"></li>
                                <?php endif;?>
                                <li><a class="md-trigger" data-modal="logout-modal" href="javascript:void(0)"><i class="icon-logout-1"></i> 退出</a></li>
                            </ul>
                        </li>
                        <?php if (ROLE == ROLE_ADMIN):?>
                            <!-- 右侧边栏按钮
                            <li class="right-opener">
                                <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></a>
                            </li> -->
                        <?php endif;?>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Left Sidebar Start -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
         <!-- Search form -->
           <!-- <form role="search" class="navbar-form">
            <div class="form-group">
                <input type="text" placeholder="Search" class="form-control">
                <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
            </div>
        </form> -->
        <div class="clearfix"></div>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
              <a href="./blogger.php" class="rounded-image profile-image"><img src="<?php echo empty($user_cache[UID]['avatar']) ? './y/images/other/avatar.png' : '../' . $user_cache[UID]['avatar'] ?>" onerror="this.src='./y/images/y159.png'"></a>
          </div>
          <div class="col-xs-8">
            <div class="profile-text"><b><?php if (ROLE == ROLE_ADMIN):?>管理员<?php else:?>成员<?php endif;?></b></div>
            <div class="profile-buttons">
                <a href="./comment.php" title="评论列表"><i class="fa fa-comments pulse"></i></a>
                <?php if (ROLE == ROLE_ADMIN):?>
                  <a href="twitter.php" title="微语"><i class="fa fa-twitter"></i></a>
              <?php endif;?>
              <a href="javascript:void(0);" title="注销" class="md-trigger" data-modal="logout-modal"><i class="fa fa-power-off text-red-1"></i></a>
          </div>
      </div>
  </div>
  <!--- Divider -->
  <div class="clearfix"></div>
  <hr class="divider" />
  <div class="clearfix"></div>
  <!--- Divider -->
  <div id="sidebar-menu">
    <ul>
        <li class='has'><a href='./'><i class='icon-home-3'></i><span>主页</span></i></a>
        </li>
        <li class='has_sub'><a href='javascript:void(0);'><i class='icon-feather'></i><span>文章管理</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
            <ul>
                <li><a href='write_log.php'><span>发布文章</span></a></li>
                <li><a href='admin_log.php?pid=draft'><span>草稿箱</span>
                    <?php
                    if (ROLE == ROLE_ADMIN) {
                        echo $sta_cache['draftnum'] == 0 ? '' : '<span class="label label-success pull-right">' . $sta_cache['draftnum'] . '</span>';
                    } else {
                        echo $sta_cache[UID]['draftnum'] == 0 ? '' : '<span class="label label-success pull-right">' . $sta_cache[UID]['draftnum'] . '</span>';
                    }?>
                </a></li>
                <li><a href='admin_log.php'><span>文章列表</span></a></li>
            </ul>
        </li>
        <?php if (ROLE == ROLE_ADMIN):?>
            <li class='has'><a href='tag.php'><i class='icon-tag-2'></i><span>标签</span></i></a>
            </li>
            <li class='has'><a href='sort.php'><i class='icon-flag-1'></i><span>分类</span></i></a>
            </li>
            <li class='has'><a href='link.php'><i class='icon-link'></i><span>链接</span></i></a>
            </li>
            <li class='has'><a href='page.php'><i class='icon-docs'></i><span>页面</span></i></a>
            </li>
            <li class='has'><a href='widgets.php'><i class="fa fa-th-list"></i><span>侧边栏</span></a></li>
            <li class='has'><a href='navbar.php'><i class="icon-doc-text"></i><span>导航</span></a></li>
            <li class='has'><a href='user.php'><i class="icon-users-1"></i><span>用户</span></a></li>
            <li class='has_sub'><a href='javascript:void(0);'><i class='icon-cog-2'></i><span>系统设置</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                <ul>
                    <li><a href='configure.php'><span>设置</span></a></li>
                    <li><a href='data.php'><span>数据</span></a></li>
                </ul>
            </li>
            <li class='has_sub'><a href='javascript:void(0);'><i class='icon-archive'></i><span>应用扩展</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                <ul>
                    <li><a href='template.php'><span>模版</span></a></li>
                    <li><a href='plugin.php'><span>插件</span></a></li>
                    <li><a href='store.php'><span>应用</span></a></li>
                </ul>
            </li>
            <?php if (!empty($emHooks['adm_sidebar_ext'])): ?>
                <li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-th-large'></i><span>插件扩展</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        <li><?php doAction('adm_sidebar_ext'); ?></li>
                    </ul>
                </li>
            <?php endif;?>
        <?php endif;?>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="portlets">

    <div id="recent_tickets" class="widget transparent nomargin">
        <h2>公告</h2>
        <div class="widget-content">
            <ul class="list-unstyled">
                <li>
                    <a href="javascript:;"><?=$Notice;?></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div><br><br><br>
</div>
<div class="left-footer">
    <center><a data-toggle="tooltip" title="Y+Eadmin Ver1.0" class="md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a></center>

</div>
</div>
<!-- Left Sidebar End -->
<!-- Right Sidebar Start -->
<?php if (ROLE == ROLE_ADMIN):?>
<!--     <div class="right side-menu">
     <ul class="nav nav-tabs nav-justified" id="right-tabs">
        <li class="active"><a href="#feed" data-toggle="tab" title="Live Feed"></a></li>
    </ul>
    <div class="clearfix"></div>
    <div class="tab-content">
       <div class="tab-pane active" id="feed">
        <div class="tab-inner slimscroller">
            右侧栏，作为保留
        </div>
    </div>

</div>
</div> -->
<?php endif;?>
<!-- Right Sidebar End -->		
<!-- Start right content -->
<div class="content-page">
    <!-- ============================================================== -->
    <!-- Start Content here -->
    <!--模版正文开始-->
    <!-- ============================================================== -->
    <div class="content content_l">
      <!-- Start info box -->
      <?php doAction('adm_main_top'); ?>