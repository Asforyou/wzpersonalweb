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
    <link rel="stylesheet" href="/personalWebsite/Skin/css/font-awesome.css">
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
                    <a href="<?php echo U('Optionpage/frotend');?>" class="frotend" >
                        <span class="glyphicon glyphicon-list-alt"></span>
                        前端开发
                    </a>
                </li>
                <!-- <li> 需要时候再加上
                    <a href="<?php echo U('Optionpage/admin');?>" class="admin" >
                        <span class="glyphicon glyphicon-fire"></span>
                        后端开发
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo U('Optionpage/mobile');?>" class="mobile" >
                        <span class="glyphicon glyphicon-phone"></span>
                        移动开发
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Optionpage/linux');?>" class="linux">
                        <span class="glyphicon glyphicon-align-center"></span>
                        Linux
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Optionpage/php');?>" class="php">
                        <span class="glyphicon glyphicon-hand-right"></span>
                       PHP
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Optionpage/python');?>" class="python">
                        <span class="glyphicon glyphicon-heart-empty"></span>
                        Python
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottom">
        <!-- div class="search">
            <form method="post" action="" class="searchItem">
                <input type="text" name="keyWords" class="keyWord" id="keyWords" placeholder="输入关键字">
                <input type="submit" value="搜索" class="btn">
            </form>
        </div> -->
        <!-- <div class="leaveMessage"> 留言框
            <div class="message">
                <a class="icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                <div class="content" contenteditable="true">
                    
                </div>
                <button class="leave btn">留言</button>
            </div>
            
        </div> -->
        <!-- 对本网站支持 -->
        
    </div>
    <div class="other">
         
    </div>
</div>
            <div class="center">
                <div class="content">
                    <!--轮播图-->
                    <div id="slide">
                        <div class="slides">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img class="sliderBg" src="/personalWebsite/Skin/img/img1.jpg">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img class="sliderBg" src="/personalWebsite/Skin/img/img2.jpg">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img class="sliderBg" src="/personalWebsite/Skin/img/img3.jpg">
                                        </a>
                                    </div>
                                </div>
                                <!-- 如果需要分页器 -->
                                <div class="swiper-pagination"></div>
                                 
                                <!-- 如果需要导航按钮 -->
                                <div class="swiper-button-prev bannerBoxPrev"></div>
                                <div class="swiper-button-next bannerBoxNext"></div>
                            </div>
                            <!-- 导航等组件可以放在container之外 -->
                        </div>
                    </div>
                    <!-- 前端动态提示 -->
                    <div id="feedroll">
                        <label>
                            <span class="glyphicon glyphicon-volume-down"></span>
                            <span>前端广播：</span>
                        </label>
                        <div class="feed">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- 一周热门排行 -->
                    <div class="weekHot">
                        <h3><span>一周热门排行</span></h3>
                        <ul class="hotItem">
                            <?php if(is_array($weekRank)): foreach($weekRank as $k=>$weekRank): ?><li>
                                    <p class="text-muted">
                                        <span class="post-comments">阅读 (<?php echo ($weekRank["art_read"]); ?>)</span>
                                        <a href="javascript:;" class="post-like" data-pid="<?php echo ($weekRank["art_id"]); ?>" data-event="">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>赞 (<span><?php echo ($weekRank["art_zan"]); ?></span>)
                                        </a>
                                    </p>
                                    <span class="label label-<?php echo ($k+1); ?>"><?php echo ($k+1); ?></span>
                                    <a href="../article/article/page/<?php echo ($weekRank["art_id"]); ?>" target="_blank"><?php echo ($weekRank["art_title"]); ?></a>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <!-- 最新发布 -->
                    <div class="newPost">
                        <h3><span>最新发布</span><small class="pull-right"></small></h3>
                        <?php if($noData["status"] == 0): ?><div class="nodata"><?php echo ($noData["result"]); ?></div>
                        <?php else: ?>
                            <?php if(is_array($newArt)): foreach($newArt as $key=>$newArt): ?><article class="excerpt excerpt-one">
                                    <header>
                                        <a class="cat label label-important" data-original-title="" title="">
                                            <?php echo ($newArt["art_cataogaries"]); ?>
                                            <i class="label-arrow"></i>
                                        </a> 
                                        <h2>
                                            <a href="../article/article/page/<?php echo ($newArt["art_id"]); ?>" target="_blank"><?php echo ($newArt["art_title"]); ?></a>
                                        </h2>
                                    </header>
                                    <p class="text-muted time"><?php echo ($newArt["art_author"]); ?> 发布于 <?php echo (date('Y-m-d',strtotime($newArt["art_time"]))); ?></p>
                                    <?php if($newArt["art_href"] !=''): ?><p class="focus">
                                            <a href="../article/article/page/<?php echo ($newArt["art_id"]); ?>" target="_blank" class="thumbnail">
                                                <span>
                                                    <img data-thumb="1" class="thumb" src="<?php echo ($newArt["art_href"]); ?>" style="display: inline;">
                                                </span>
                                            </a>
                                        </p><?php endif; ?> 
                                    <p class="note">
                                        <?php echo ($newArt["art_content"]); ?>
                                    </p>
                                    <p class="text-muted views">
                                        <a target="_blank" href="../article/article/page/<?php echo ($newArt["art_id"]); ?>">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;<?php echo ($newArt["art_read"]); ?>
                                        </a>
                                        <a target="_blank" href="../article/article/page/<?php echo ($newArt["art_id"]); ?>">
                                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;<?php echo ($newArt["idnum"]); ?>
                                        </a>
                                        <a href="javascript:;" class="post-like" data-pid="<?php echo ($newArt["art_id"]); ?>" data-event="">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>赞 (<span><?php echo ($newArt["art_zan"]); ?></span>)
                                        </a>
                                        <!-- <span>
                                            <span class="glyphicon glyphicon-yen" aria-hidden="true"></span> 
                                            4
                                        </span> -->
                                    </p>
                                </article><?php endforeach; endif; ?>
                            <div class="pageNum">
                                <a class="btn prev" style="display: <?php echo ($pageData[3]); ?>" href="<?php echo ($_SERVER['PHP_SELF']); ?>?gpage=<?php echo ($pageData[1]); ?>">上一页</a>
                                <a class="btn next" style="display: <?php echo ($pageData[4]); ?>" href="<?php echo ($_SERVER['PHP_SELF']); ?>?gpage=<?php echo ($pageData[2]); ?>">下一页</a>
                            </div><?php endif; ?>
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
                <div class="recent">
                    <h3><span>热门资料工具下载</h3>
                    <i class="fa fa-arrow-right" aria-hidden="true" style="color:#FF5E52;"></i>
                    <a class ="download" href="<?php echo U('Optionpage/download');?>" target="_blank">进入下载页</a>
                    <span class="tipNum">下载次数</span>
                    <ul class="recentArticle">
                        <?php if(is_array($download)): foreach($download as $key=>$download): ?><li>
                                <span class="downloadEle">
                                    <a data-id="<?php echo ($download["d_id"]); ?>" download href="<?php echo ($download["d_href"]); ?>"><?php echo ($download["d_name"]); ?></a>
                                </span>
                                <span class="downloadNum"><?php echo ($download["d_num"]); ?></span>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <!-- <div class="collect">
                    <h3><span>文章归档</span></h3>
                    <ul class="recentArticle">
                        <li><a href="">2017年二月</a></li>
                        <li><a href="">2017年二月</a></li>
                        <li><a href="">2017年二月</a></li>
                    </ul>
                </div> -->
                <div class="wether">
                    <h3><span>所在地天气</span></h3>
                    <div class="wetherContent">
                    </div>
                </div>
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
<script type="text/javascript" src="/personalWebsite/Skin/js/jquery.leoweather.min.js"></script>
<!-- <script type="text/javascript" src="/personalWebsite/Skin/js/pagination.js"></script> -->

<script>
    (function($){
        $(function(){
            $('.wetherContent').leoweather({format:'<i class="icon-{图标}">{气温}℃</i><p>{城市}<span>|</span>{天气}<span>|</span>{风向}{风级}级</p>'});
        })
    })(jQuery)
</script>