<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章</title>
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
    <link rel="stylesheet" href="/personalWebsite/Skin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/personalWebsite/Skin/css/wzBlog.css?version=1.0">
    <link rel="stylesheet" href="/personalWebsite/Skin/css/wzArticle.css?version=1.0">
    <link rel="shortcut icon" href="/personalWebsite/Skin/img/favicon.png">
</head>
    <body>
        <nav class="nav-bar">
            <div class="width-limit">
                <a class="logo">
                    <img src="http://cdn-qn0.jianshu.io/assets/web/logo-58fd04f6f0de908401aa561cda6a0688.png" alt="Logo">
                </a>
                <a class="backIndex" href="<?php echo U('Index/index');?>" target="_blank">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <span>首页</span>
                </a>
                <div class="stock">
                    <div class="search">
                        <form target="_blank" action="" accept-charset="UTF-8" method="get">
                            <input name="utf8" type="hidden" value="✓">
                            <input type="text" name="q" id="q" value="" placeholder="搜索" class="search-input">
                            <a class="search-btn" href="javascript:void(null)" style="background-color: rgb(150, 150, 150); border-radius: 50%; color: rgb(255, 255, 255) !important;"><span class="glyphicon glyphicon-search"></span>
                            </a>
                                  <!-- <div id="navbar-trending-search"></div> -->
                        </form>
                    </div>
                </div>
                <?php if(!isset($_SESSION['nikename'])): ?><a class="btn log-in">登录</a>
                    <a class="btn sign-up">注册</a>
                <?php else: ?>
                    <!-- 用户登录显示 -->
                    <div id="header-avator" class="userLogin">
                        <img class="default-img" width="40" height="40" src="/personalWebsite/Skin/img/default.png">
                        <span class="name" data-username="<?php echo (session('nikename')); ?>"><?php echo (session('nikename')); ?>,你好!</span>
                        <a class="logout">退出登录</a>
                    </div><?php endif; ?>
            </div>
        </nav>
        <!-- 登录注册模块 -->
        <div class="login_register" style="display:none">
            <div class="userPanel">
                <div class="top">
                    <span data-name = "login" class="tab active login">登录</span>
                    <span data-name = "register" class="tab register">注册</span>
                    <span class="panelClose"></span>
                </div>
                <div class="loginFace">
                    <form>
                        <p class="tips"></p>
                        <div class="userName">
                        <?php if(empty($_COOKIE['username'])): ?><input type="text" name="userName" autocomplete="on" placeholder="请输入昵称或者邮箱" class="loginName in">
                        <?php else: ?>
                            <input type="text" name="userName" autocomplete="on" value="<?php echo ($_COOKIE['username']); ?>" class="loginName in"><?php endif; ?>
                            <div class="nameError errorHint"></div>
                        </div>
                        <div class="password">
                        <?php if(empty($_COOKIE['username'])): ?><input type="password" name="password" placeholder="6-16位密码，区分大小写，不能用空格" class="loginPsw in">
                        <?php else: ?>
                            <input type="password" name="password" value="<?php echo ($_COOKIE['password']); ?>" class="loginPsw in"><?php endif; ?>
                            <div class="pswError errorHint"></div>
                        </div>
                        <div class="verify">
                            <input type="text" name="verify" autocomplete="off" data-open="0" maxlength=4 placeholder="请输入验证码">
                            <a href="javascript:void(0)" class="verify-img-wrap js-verify-refresh">
                                <img class="verify-img" src="http://localhost/personalWebsite/index.php/Home/Article/loginVerifyCode">
                            </a>
                            <div class="verifyError errorHint">请输入正确验证码</div>
                        </div>
                        <div class="otherOptions">
                            <label for="auto-signin" class="autoin">
                                <input type="checkbox" checked="checked" class="auto-cbx" id="auto-signin">下次自动登录</label>
                            <a href="/user/newforgot" class="forgetPsw" target="_blank">忘记密码 </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="loginBtn">
                            <input type="button" value="登录" class="submit">
                             <i></i>
                        </div>
                    </form>
                </div>
                <div class="registerFace" style="display:none;">
                    <form>
                        <p class="tips"></p>
                        <div class="nikename">
                            <input type="text" placeholder="设置昵称" class="setnike in">
                            <div class="nikenameError errorHint"></div>
                        </div>
                        <div class="rigsterEmail">
                            <input type="email" placeholder="邮箱" class="email in">
                            <div class="emailError errorHint"></div>
                        </div>
                        <div class="enterPassword">
                            <input type="password" data-open="0" placeholder="密码长度6-16位且只能是字母数字下划线" class="password in">
                            <div class="pswError errorHint"></div>
                        </div>
                        <div class="verify">
                            <input type="text" maxlength=4 autocomplete="off" data-open="0" placeholder="请输入验证码">
                            <a href="javascript:void(0)" class="verify-img-wrap js-verify-refresh">
                                <img class="verify-img" src="http://localhost/personalWebsite/index.php/Home/Article/registerVerifyCode">
                            </a>
                            <div class="verifyError errorHint">验证码错误</div>
                        </div>
                        <div class="registerBtn">
                            <input type="button" value="注册" class="submit">
                            <i></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="page-back">
                <div class="page-content">
                    <img src="/personalWebsite/Skin/img/avatar.jpg" class="avatar">
                    <p class="welcome"></p>
                </div>
            </div>
        </div>
        <div class="content" data-page="<?php echo ($content["art_id"]); ?>">
            <div class="article">
                <h1 class="title"><?php echo ($content["art_title"]); ?></h1>
                <!-- 作者区域 -->
                <div class="info">
                    <!-- 文章数据信息 -->
                    <div class="meta">
                        <span class="publish-time"><?php echo (date('Y-m-d',strtotime($content["art_time"]))); ?></span>
                        <span class="wordage">字数 <?php echo (mb_strlen(preg_replace('# #','',$content["art_content"]),'utf-8')); ?></span>
                        <span class="views-count">阅读 <?php echo ($content["art_read"]); ?></span>
                        <span class="comments-count"></span>
                        <span class="likes-count">喜欢 <?php echo ($content["art_zan"]); ?></span>
                    </div>
                </div>
                <!-- 文章内容 -->
                <div class="show-content">
                    <?php echo ($content["art_content"]); ?>
                </div>
                <div class="show-foot">
                    <!-- <a class="notebook" href="/nb/10110665">
                        <i class="iconfont ic-search-notebook"></i> 
                        <span>日记本</span>
                    </a>  -->         
                    <div class="copyright" data-toggle="tooltip" data-html="true" data-original-title="转载请联系作者获得授权，并标注“简书作者”。">
                        © 著作权归作者所有
                    </div>
                </div>
            </div>
            <div class="support-author">
                <p>如果觉得我的文章对您有用，请随意打赏。您的支持将鼓励我继续创作！</p>
                <p>感谢支持！</p> 
                <div class="btn btn-pay">赞赏支持</div> <!----> <!----> <!---->
                <div class="supportUser"></div>
            </div>
            <div class="comment-list" id="comment-list">
                <?php if(isset($_SESSION['nikename'])): ?><div class="write-comment">
                        <form class="new-comment" data-id="0">
                            <textarea placeholder="写下你的评论...."></textarea>
                            <div class="write-function-block">
                                <div class="emoji-modal-wrap">
                                    <a class="emoji">
                                        <i class="fa fa-smile-o"></i>
                                    </a> <!---->
                                    <div id="emoji-modal" class="emoji-modal arrow-top" style="display:none;">
                                        <div id="emojiTabContent" class="tab-content">
                                            <div class="tab_pane">
                                                <ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-send">发送</a>
                                <a class="cancel">取消</a>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="relog">
                        <a class="avatar"><img src="/personalWebsite/Skin/img/default.png"></a>
                        <div class="sign-container"><a class="btn btn-sign">登录</a> <span>后发表评论</span></div> 
                    </div><?php endif; ?>
                <div class="normal-comment-list" id="normal-comment-list">
                    <div class="comment-top">
                        <div>
                            <div class="top">
                                <span class="commentNum"></span>
                                <div class="pull-right">
                                    <span class="request">请文明发言,不当言论将会被管理员删除</span>
                                    <!-- <a class="active">按喜欢排序</a>
                                    <a class="">按时间正序</a>
                                    <a class="">按时间倒序</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div id="ScrollToTop" style="display:none" class="btnimg Button2 WhiteButton">
    返回
    <br>
    顶部
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
    </body>
</html>
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/jquery-1.9.1.min.js"></script>
<!-- <script type="text/javascript" data-main="js/main.js" src="js/thirdLib/requirejs/require.js"></script> -->
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/swiper3.07.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/thirdLib/jqueryjs/bootstrap.min.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/jqAddFun.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/blog.js"></script>
<script type="text/javascript" src="/personalWebsite/Skin/js/jquery.leoweather.min.js"></script>
<!-- <script type="text/javascript" src="/personalWebsite/Skin/js/pagination.js"></script> -->

<script type="text/javascript">
    (function($){
        $(function(){
            //登录注册$('.log-in')
            function login(){
                if(arguments.length>0){
                    for(var i = 0; i < arguments.length;i++){
                        $(arguments[i]).click(function(){
                            $('.login_register').fadeIn(300);
                            $('.login_register .loginFace').show();
                            $('.login_register .registerFace').hide();
                            $('.login_register .login').addClass('active').siblings().removeClass('active');
                        }); 
                    }
                }
            }
            login($('.log-in'),$('.btn-sign'));
            $('.sign-up').click(function(){
                $('.login_register').fadeIn(300);
                $('.login_register .registerFace').show();
                $('.login_register .loginFace').hide();
                $('.login_register .register').addClass('active').siblings().removeClass('active');
            });
            $(document).click(function(eve){
                var e = eve || window.event;
                var regu = "log-in|sign-up|btn-sign";
                var re = new RegExp(regu);
                if(e.target.className == 'panelClose'){
                    $('.login_register').fadeOut(200);
                }else if($(e.target).parents('.login_register').length == 0 && !re.test(e.target.className)){
                    $('.login_register').fadeOut(200);
                }
            });
            $('.login_register .tab').click(function(){
                $(this).addClass('active').siblings().removeClass('active');
                var operater = $(this).data('name');
                if(operater == 'login'){
                    $('.login_register .loginFace').show();
                    $('.login_register .registerFace').hide();
                }else if(operater == 'register'){
                    $('.login_register .registerFace').show();
                    $('.login_register .loginFace').hide();
                }
            });
            //验证码刷新
            $('.js-verify-refresh').each(function(){
                $(this).click(function(){
                    if($(this).parents('.loginFace').length > 0){
                        $(this).find('img').attr('src','http://localhost/personalWebsite/index.php/Home/Article/loginVerifyCode?' + Math.random());
                    }else if($(this).parents('.registerFace').length > 0){
                        $(this).find('img').attr('src','http://localhost/personalWebsite/index.php/Home/Article/registerVerifyCode?' + Math.random());
                    }
                });                
            });
            //验证码确认
            $('.login_register .verify input').blur(function(){
                if($(this).parents('.loginFace').length > 0){
                    var status = 'login';
                }else if($(this).parents('.registerFace').length > 0){
                    var status = 'register';
                }
                var that = this;
                var verifyCode = $(this).val();
                var verifyUrl = 'http://localhost/personalWebsite/index.php/Home/Article/chargeCode';
                $.ajax({
                    type:'post',
                    url:verifyUrl,
                    data:{verifyCode:verifyCode,status:status},
                    dataType:'JSON',
                    success:function(data){
                        if(data.status == 0){
                            $(that).next().next().addClass('show').html(data.result);
                        }else{
                            $(that).next().next().removeClass('show').html();
                            $(that).data('open',1);
                        }
                    }
                });
            }); 
            //点击注册
            //昵称失去焦点触发请求
            $('.registerFace .setnike').blur(function(){
                var registerUrl = 'http://localhost/personalWebsite/index.php/Home/Article/register';
                var nikename = $(this).val();
                $.ajax({
                    type:'post',
                    url:registerUrl,
                    data:{nikename:nikename},
                    dataType:'JSON',
                    success:function(data){
                        if(data.status == 0){
                            $('.registerFace .nikenameError').addClass('show').html(data.result);
                        }else if(data.status == 1){
                            $('.registerFace .nikenameError').removeClass('show').html();
                        }
                    }
                });
            });
            //邮箱失去焦点触发请求
            $('.registerFace .email').blur(function(){
                var registerUrl = 'http://localhost/personalWebsite/index.php/Home/Article/register';
                var emailVal = $(this).val();
                $.ajax({
                    type:'post',
                    url:registerUrl,
                    data:{email:emailVal},
                    dataType:'JSON',
                    success:function(data){
                        if(data.status == 0){
                            $('.registerFace .emailError').addClass('show').html(data.result);
                        }else if(data.status == 1){
                            $('.registerFace .emailError').removeClass('show').html();
                        }
                    }
                });
            });
            $('.registerBtn .submit')[0].addEventListener('click',function(){
                var registerUrl = 'http://localhost/personalWebsite/index.php/Home/Article/register';
                var emailVal = $(this).parents('.registerFace').find('.email').val();
                var password = $(this).parents('.registerFace').find('.password').val();
                var nikename = $(this).parents('.registerFace').find('.setnike').val();
                var verifyVal = $(this).parents('.registerFace').find('.verify input').val();
                var lock = $(this).parents('.registerFace').find('.verify input').data('open');
                var space = /\s/;
                var psw = /^[\w]{6,16}$/;
                var timeout = null;
                if(nikename == ""){
                    $('.registerFace .nikenameError').addClass('show').html('请输入昵称');
                    return;
                }
                if(emailVal == ""){
                    $('.registerFace .emailError').addClass('show').html('请输入邮箱');
                    return;
                }
                if(password == ""){
                    $('.registerFace .pswError').addClass('show').html('请输入密码');
                }else if(!psw.test(password)){
                    $('.registerFace .pswError').addClass('show').html('密码格式不正确');
                }else if(verifyVal == ""){
                    $('.registerFace .verifyError').addClass('show').html('请输入验证码');
                    return;
                }else if(lock == 1){
                    $('.registerFace .pswError').removeClass('show').html();
                    $.ajax({
                        type:'post',
                        url:registerUrl,
                        data:{nikename:nikename,email:emailVal,password:password},
                        dataType:'JSON',
                        beforeSend:function(){
                            $('.registerBtn .submit').addClass('processing');
                        },
                        success:function(data){
                            clearTimeout(timeout);
                            if(data.status == 2){
                                $('.registerFace .tips').addClass('show').html(data.result);
                            }else if(data.status == 1){
                                $('.registerFace').find('.verify input').data('open',0);
                                $('.login_register .userPanel').hide();
                                $('.login_register .page-back').css({'transform':'rotateY(0deg)'});
                                $('.login_register .page-back .welcome').html(data.result);
                                timeout = setTimeout(function(){
                                    $('.login_register').fadeOut(200,function(){
                                        $('.login_register .userPanel').show();
                                        $('.login_register .page-back').css({'transform':'rotateY(90deg)'});
                                        window.location.reload();
                                    });
                                },1500);
                            }
                            $('.registerBtn .submit').removeClass('processing');
                        }
                    });
                }
            },false);
            //点击登录
            $('.loginBtn .submit')[0].addEventListener('click',function(){
                var loginUrl = 'http://localhost/personalWebsite/index.php/Home/Article/login';
                var loginName = $(this).parents('.loginFace').find('.loginName').val();
                var loginPsw = $(this).parents('.loginFace').find('.loginPsw').val();
                var loginVerifyVal = $(this).parents('.loginFace').find('.verify input').val(); 
                var lock = $(this).parents('.loginFace').find('.verify input').data('open');
                var checked = $('#auto-signin').prop('checked');
                var timeout = null;
                if(loginName == ""){
                    $('.loginFace .nameError').addClass('show').html('请输入昵称或邮箱');
                    return;
                }
                if(loginPsw == ""){
                    $('.loginFace .pswError').addClass('show').html('请输入密码');
                    return;
                }
                if(loginVerifyVal == ""){
                    $('.loginFace .verifyError').addClass('show').html('请输入验证码');
                    return;
                }else if(lock == 1){
                    $.ajax({
                        type:'post',
                        url:loginUrl,
                        data:{loginName:loginName,loginPsw:loginPsw,checked:checked},
                        dataType:'JSON',
                        beforeSend:function(){
                            $('.loginBtn .submit').addClass('processing');
                        },
                        success:function(data){
                            clearTimeout(timeout);
                            $('.login_register .errorHint').removeClass('show');
                            if(data.status == 0){
                                $('.loginFace .tips').addClass('show').html(data.result);
                            }else if(data.status == 1){
                                $('.loginFace').find('.verify input').data('open',0);
                                $('.login_register .userPanel').hide();
                                $('.login_register .page-back').css({'transform':'rotateY(0deg)'});
                                $('.login_register .page-back .welcome').html(data.result);
                                timeout = setTimeout(function(){
                                    $('.login_register').fadeOut(200,function(){
                                        $('.login_register .userPanel').show();
                                        $('.login_register .page-back').css({'transform':'rotateY(90deg)'});
                                        window.location.reload();
                                    });
                                },1500);
                            }
                            $('.loginBtn .submit').removeClass('processing');
                        }
                    });
                }
            },false);
            //退出登录
            $('#header-avator .logout').click(function(){
                var logoutUrl = 'http://localhost/personalWebsite/index.php/Home/Article/logout';
                $.ajax({
                    type:'get',
                    url:logoutUrl,
                    data:{action:'logout'},
                    dataType:'JSON',
                    success:function(data){
                        if(data.status == 1){
                            window.location.reload();
                        }else{

                        }
                    }
                });
            });
        })
    })(jQuery);
    (function($){
        $(function(){
            //赞赏支持http://musicapi.duapp.com/#/index/rage
            
            //表情包加载
            var emojiModal = {
                baseUrl : '/personalWebsite/Skin/img/emojis/',
                time:300,
                name:[
                        'smile','blush','smiley','relaxed','wink','heart_eyes','kissing_heart','kissing_closed_eyes',
                        'flushed','grin','relieved','stuck_out_tongue_winking_eye','stuck_out_tongue_closed_eyes',
                        'unamused','smirk','sweat','pensive','confounded','disappointed_relieved','cold_sweat','fearful',
                        'persevere','cry','sob','joy','scream','angry','sleepy','mask','innocent','yum','anguished','frowning',
                        'hushed','dizzy_face','stuck_out_tongue','no_mouth','sunglasses','sweat_smile','worried','+1','-1',
                        'clap','v','pray','fist','heart','broken_heart','heartbeat','sparkling_heart'
                    ],
                loadImg:function($html){
                    for(var j = 0; j < emojiModal.name.length; j++){
                        var domStr = '<li>'+
                                        '<a>'+
                                            '<img src='+ emojiModal.baseUrl + emojiModal.name[j]+".png"+' alt=":'+emojiModal.name[j]+':" title='+emojiModal.name[j]+' class='+emojiModal.name[j]+'>'
                                        '</a>'+
                                    '</li>';
                        $html.append(domStr);
                    }
                },
                insertTextarea:function(obj,str){
                    obj = obj[0];
                    obj.focus();
                    if (document.selection) {
                        var sel = document.selection.createRange();
                        sel.text = str;
                    } else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') {
                        var startPos = obj.selectionStart,
                            endPos = obj.selectionEnd,
                            cursorPos = startPos,
                            tmpStr = obj.value;
                        obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
                        cursorPos += str.length;
                        obj.selectionStart = obj.selectionEnd = cursorPos;
                    } else {
                        obj.value += str;
                    }
                },
                bindEmoji:function(obj){
                    obj.each(function(){
                        $(this).click(function(){
                            emojiModal.insertTextarea($(this).closest('.write-function-block').prev(),$(this).find('a img').attr('alt'));
                            $(this).closest('.emoji-modal-wrap').find('#emoji-modal').fadeOut();
                        });
                    });
                },
                setEmoji:function(imgName){
                    var imgStr = '<img src='+ emojiModal.baseUrl +"$1.png"+' alt=":$1:" title="$1" class="$1" width="20" height="20" />';
                    str = imgName.replace(/\:([\w]+)\:/g,imgStr);
                    return str;
                },
                init:function(obj){
                    $(document).click(function(e){
                        var target = $(e.target);
                        if(target.closest('.emoji').length == 1){
                            target.closest('.emoji').parents('.emoji-modal-wrap').find('#emoji-modal').toggle();
                            return;
                        }
                        if(target.closest('#emoji-modal').length == 0){
                            $('.emoji-modal-wrap').find('#emoji-modal').fadeOut();
                        }
                    }); 
                    obj.each(function(){
                        emojiModal.loadImg($(this));
                        emojiModal.bindEmoji($(this).find('li'));
                    });
                }
            }

            //评论区
            var artCommentUrl = 'http://localhost/personalWebsite/index.php/Home/Article/comment';
            var artPage = $('.content').data('page');
            $.ajax({
                type:'get',
                url:artCommentUrl,
                data:{page:artPage},
                dataType:'json',
                success:function(data){ 
                    for(var i = 0; i < data.length; i++){
                        if(data[i].p_id == 0){
                            var commentHtml = '<div class="comment" id="comment-'+data[i].com_id+'">'
                                                 +'<div class="author">'
                                                     +'<a target="_blank" class="avatar">'
                                                         +'<img src="/personalWebsite/Skin/img/default.png">'
                                                     +'</a>'
                                                     +'<div class="info">'
                                                         +'<a href="" target="_blank" class="name">'
                                                             + data[i].user_name
                                                         +'</a>'
                                                         + '<p class="comment-time">'
                                                            +  data[i].comment_time
                                                         + '</p>'
                                                     +'</div>'
                                                 +'</div>'
                                                 +'<div class="comment-wrap">'
                                                     +'<p>'
                                                         + data[i].comment
                                                     +'</p>'
                                                     +'<div class="tool-group">'
                                                       +'<a class="zan">'
                                                           +'<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>'
                                                           +'<span>赞('+data[i].commentlike+')</span>'
                                                       +'</a>'
                                                       +'<?php if(isset($_SESSION['nikename'])): ?>'
                                                           +'<a class="rereview" data-hide="0">'
                                                               +'<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>'
                                                               +'<span>回复</span>'
                                                           +'</a>'
                                                       + '<?php endif; ?>'
                                                     +'</div>'
                                                  +'</div>'
                                                 +'<div class="sub-comment-list hide">'
                                                     +'<form class="new-comment"  data-id="'+data[i].com_id+'">'
                                                       +'<textarea placeholder="写下你的评论..."></textarea>'
                                                       +'<div class="write-function-block">'
                                                          +'<div class="emoji-modal-wrap">'
                                                               +'<a class="emoji">'
                                                                   +'<i class="fa fa-smile-o"></i>'
                                                               +'</a>'
                                                               +'<div id="emoji-modal" class="emoji-modal arrow-top" style="display:none;">'
                                                                   +'<div id="emojiTabContent" class="tab-content">'
                                                                        +'<div class="tab_pane">'
                                                                            +'<ul>'
                                                                            +'</ul>'
                                                                        +'</div>'
                                                                   +'</div>'
                                                                +'</div>'
                                                           +'</div>'
                                                           +'<a class="btn btn-send" data-status="1">发送</a>'
                                                           +'<a class="cancel">取消</a>'
                                                           +'<div class="clearfix"></div>'
                                                       +'</div>'
                                                   +'</form>'
                                                +'</div>'
                                         +'</div>';
                                    $('.normal-comment-list').append(commentHtml);
                        }
                        for(var j =0; j < data.length; j++){
                            if(data[j].p_id == data[i].com_id){
                                var replayHtml = '<div class="replay" id="comment-'+data[j].com_id+'" data-lock="open">'
                                                +'<div class="author">'
                                                    +'<a href="" target="_blank" class="name">';
                                                    if(data[j].r_name == ''){
                                                        replayHtml += '<span class="rname">' + data[j].user_name + '</span>';
                                                    }else{
                                                        replayHtml += '<span class="rname">' + data[j].user_name + '</span>' + ' : @' + data[j].r_name;
                                                    }
                                                replayHtml += '</a>'
                                                    + '<span> '
                                                        +  data[j].comment
                                                    + '</span>'
                                                +'</div>'
                                                +'<div class="comment-wrap">'
                                                    +'<a class="replay-time">'
                                                        +'<span>'+data[j].comment_time+'</span>'
                                                    +'</a>&nbsp;&nbsp;'
                                                    +'<?php if(isset($_SESSION['nikename'])): ?>'
                                                        +'<a class="rereview" data-hide="0">'
                                                           +'<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>'
                                                           +'<span>回复</span>'
                                                        +'</a>'
                                                    +'<?php endif; ?>'
                                                +'</div>'
                                                +'<div class="sub-comment-list hide">'
                                                     +'<form class="new-comment"  data-id="'+data[i].com_id+'">'
                                                       +'<textarea placeholder="写下你的评论..."></textarea>'
                                                       +'<div class="write-function-block">'
                                                          +'<div class="emoji-modal-wrap">'
                                                               +'<a class="emoji">'
                                                                   +'<i class="fa fa-smile-o"></i>'
                                                               +'</a>'
                                                               +'<div id="emoji-modal" class="emoji-modal arrow-top" style="display:none;">'
                                                                   +'<div id="emojiTabContent" class="tab-content">'
                                                                        +'<div class="tab_pane">'
                                                                            +'<ul>'
                                                                            +'</ul>'
                                                                        +'</div>'
                                                                   +'</div>'
                                                                +'</div>'
                                                           +'</div>'
                                                           +'<a class="btn btn-send" data-status="0">发送</a>'
                                                           +'<a class="cancel">取消</a>'
                                                           +'<div class="clearfix"></div>'
                                                       +'</div>'
                                                   +'</form>'
                                                +'</div>'
                                           +'</div>';
                                $('#comment-'+data[i].com_id+'').append(replayHtml);
                            }
                        }
                    }
                    $('.top .commentNum').html(data.length + '人参与评论');
                    $('.comments-count').html('评论' + data.length);
                    $('.rereview').click(function(){
                        var hideValue = $(this).data('hide');
                        if(hideValue == 0){
                            $(this).parents('.comment-wrap').parent().find('.sub-comment-list').eq(0).removeClass('hide');
                            $(this).parents('.comment-wrap').parent().find('.sub-comment-list textarea').focus();
                            $(this).data('hide','1');
                        }else if(hideValue == 1){
                            $(this).parents('.comment-wrap').parent().find('.sub-comment-list').eq(0).addClass('hide');
                            $(this).data('hide','0');
                        }
                    });
                    var postCommentUrl = "http://localhost/personalWebsite/index.php/Home/Article/postComment";
                    $('.btn-send').click(function(){
                        var sonId;
                        var rname;
                        var $textHtml = $(this).parent().parent().find('textarea').eq(0);
                        var comment = $(this).parent().parent().find('textarea').eq(0).val();
                        comment = emojiModal.setEmoji(comment);
                        var user_name = $('.userLogin .name').data('username');
                        ($(this).parent().parent().eq(0).data('id') != 0) ? sonId = $(this).parent().parent().eq(0).data('id') : sonId = 0;
                        ($(this).data('status') == 0) ? rname = $(this).parents('.replay').find('.author .rname').html() : rname = '';
                        var regu = "^[ ]+$";
                        var re = new RegExp(regu);
                        if(comment.length== 0 ){
                            $.loader('不能为空哟','请重新输入评论',1000);
                        }else if(re.test(comment)){
                            $.loader('不能都是空格哟','请重新输入评论',1000);
                        }else{
                            $.ajax({
                                type:'POST',
                                url:postCommentUrl,
                                data:{page:artPage,comment:comment,pid:sonId,uname:user_name,r_name:rname},
                                dataType:'json',
                                success:function(data){
                                    $textHtml.val('');
                                    window.location.reload();
                                }
                            });
                        }
                    });
                    $('.cancel').click(function(){
                        $('.comment-list .new-comment textarea').val('');
                    });
                    emojiModal.init($('#emojiTabContent .tab_pane ul'));
                }
            });
        });
    })(jQuery);
</script>