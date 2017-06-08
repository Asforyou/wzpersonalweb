<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <meta name="description" content="这是我的个人网站-用于学习和交流">
    <meta name="keywords" content="个人网站，前后端开发，技术交流">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script src="js/r.js" defer async="true" ></script> -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/personalWebsite/Skin/css/swiper3.07.min.css">
    <link rel="stylesheet" href="/personalWebsite/Skin/css/wzBlog.css?version=1.0">
    <link rel="shortcut icon" href="/personalWebsite/Skin/img/favicon.png">
</head>
<body>
    <section class="container">
    <div class="left">
    <div class="top">
        <div class="logo">
            <a href="">
                <img src="/personalWebsite/Skin/img/logo/logo.jpg">
            </a>
        </div>
    </div>
    <div class="middle">
        <div class="itemColumn">
            <ul class="item">
                <li>
                    <a href="<?php echo U('Index/index');?>" class="index" >
                       <span class="glyphicon glyphicon-home"></span>
                        首页
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Frotend/frotend');?>" class="frotend" >
                        <span class="glyphicon glyphicon-list-alt"></span>
                        前端开发
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Admin/admin');?>" class="admin" >
                        <span class="glyphicon glyphicon-fire"></span>
                        后端开发
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Mobile/mobile');?>" class="mobile" >
                        <span class="glyphicon glyphicon-phone"></span>
                        移动开发
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Linux/linux');?>" class="linux">
                        <span class="glyphicon glyphicon-align-center"></span>
                        Linux
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Linux/linux');?>" class="php">
                        <span class="glyphicon glyphicon-hand-right"></span>
                       PHP
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Linux/linux');?>" class="python">
                        <span class="glyphicon glyphicon-heart-empty"></span>
                        Python
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottom">
        <div class="search">
            <form method="post" action="" class="searchItem">
                <input type="text" name="keyWords" class="keyWord" id="keyWords" placeholder="输入关键字">
                <input type="submit" value="搜索" class="btn">
            </form>
        </div>
    </div>
    <div class="other">
         
    </div>
</div>
        <div class="center">
           <div class="content">
                <!-- 最新发布 -->
                <div class="newPost">
                    <h3><span>后端开发</span></h3>
                    <?php if(is_array($art)): foreach($art as $key=>$art): ?><article class="excerpt excerpt-one">
                            <header>
                                <h2>
                                    <a href="../article/article/page/<?php echo ($art["art_id"]); ?>" target="_blank" ><?php echo ($art["art_title"]); ?></a>
                                </h2>
                            </header>
                            <p class="text-muted time"><?php echo ($art["art_author"]); ?> 发布于 <?php echo (date('Y-m-d',strtotime($art["art_time"]))); ?></p>
                            <?php if($art["art_href"] !=''): ?><p class="focus">
                                    <a href="../article/article/page/<?php echo ($art["art_id"]); ?>" class="thumbnail">
                                        <span>
                                            <img class="thumb" src="<?php echo ($art["art_href"]); ?>" style="display: inline;">
                                        </span>
                                    </a>
                                </p><?php endif; ?>
                            <p class="note">
                               <?php echo ($art["art_content"]); ?>
                            </p>
                            <p class="text-muted views">
                                <a target="_blank" href="../article/article/page/<?php echo ($art["art_id"]); ?>">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo ($art["art_read"]); ?>
                                </a>
                                <a target="_blank" href="../article/article/page/<?php echo ($art["art_id"]); ?>">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo ($art["idnum"]); ?>
                                </a>
                                <a href="javascript:;" class="post-like" data-pid="<?php echo ($art["art_id"]); ?>" data-event="">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>赞 (<span><?php echo ($art["art_zan"]); ?></span>)
                                </a>
                            </p>
                        </article><?php endforeach; endif; ?>
                    <div class="pageNum">
                        <a class="btn prev" style="display: <?php echo ($pageData[3]); ?>" href="<?php echo ($_SERVER['PHP_SELF']); ?>?gpage=<?php echo ($pageData[1]); ?>">上一页</a>
                        <a class="btn next" style="display: <?php echo ($pageData[4]); ?>" href="<?php echo ($_SERVER['PHP_SELF']); ?>?gpage=<?php echo ($pageData[2]); ?>">下一页</a>
                    </div>
                </div>
           </div>
           <!-- 网站底部 -->
           <footer class="footer">
    <div class="footerCont">
        <p>
            © 2017 爆炸网站蜜汁怪
            <!-- <a href="http://www.daqianduan.com">大前端</a> &nbsp; 本站DUX主题由 <a href="https://themebetter.com" target="_blank">themebetter.com</a> 提供 <a href="http://www.daqianduan.com/sitemap.xml">网站地图</a> -->
        </p>
    </div>
</footer>
        </div>
        <div class="right">
            
            <div class="searchRight">
                <h3><span>搜索</span></h3>
                <form method="post" action="" class="searchItem">
                    <input type="text" name="keyWords" class="keyWord" id="keyWords" placeholder="输入关键字">
                    <input type="submit" value="搜索" class="btn">
                </form>
            </div>
            <div class="hotLabel">
                <h3><span>热门标签</span></h3>
                <ul class="recentArticle">
                    <li><a href="">js (40)</a></li>
                    <li><a href="">css (40)</a></li>
                    <li><a href="">css3 (40)</a></li>
                    <li><a href="">小程序 (40)</a></li>
                    <li><a href="">html5 (40)</a></li>
                    <li><a href="">jq (40)</a></li>
                    <li><a href="">vue (43)</a></li>
                    <li><a href="">优化 (52)</a></li>
                    <li><a href="">过滤器 (46)</a></li>
                    <li><a href="">CSS (52)</a></li>
                    <li><a href="">前端技巧 (61)</a></li>
                    <li><a href="">SEO (40)</a></li>
                    <li><a href="">用户体验 (46)</a></li>
                    <li><a href="">设计思路 (43)</a></li>
                    <li><a href="">HTML5 (40)</a></li>
                    <li><a href="">SEO (40)</a></li>
                    <li><a href="">网页设计 (40)</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div id="ScrollToTop" style="display:none" class="btnimg Button2 WhiteButton">
    返回
    <br>
    顶部
</div>
</body>
</html>
<!-- <script type="text/javascript" data-main="js/main.js" src="js/thirdLib/requirejs/require.js"></script> -->
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/swiper3.07.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/bootstrap.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/jqAddFun.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/blog.js"></script>
<!-- <script type="text/javascript" src="/personalWebsite/Skin/js/pagination.js"></script> -->