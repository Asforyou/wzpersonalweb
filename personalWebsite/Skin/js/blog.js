(function($){
    $(function(){
        function Slide(ele,obj){
            this.element = ele;
            this.defaults = {
                topDistance : 200,
                delayTime:1000
            }
            this.options = $.extend({},this.defaults,obj);
        }
        Slide.prototype={
            _initSwiper:function(){
               var mySwiper = new Swiper ('.swiper-container',{
                    direction: 'horizontal',
                    loop: true,
                    autoplay : 5000,
                    // 如果需要分页器
                    pagination: '.swiper-pagination',
                 
                    // 如果需要前进后退按钮
                    prevButton:'.swiper-button-prev',
                    nextButton:'.swiper-button-next',
                }) 
           },
            scrollShow:function(obj){
                var my = this;
                var obj = obj || {};
                $(document).scroll(function(){
                    var yScroll = document.body.scrollTop || document.documentElement.scrollTop;
                    if(yScroll >= my.options.topDistance){
                        obj.fadeIn();
                    }else{
                        obj.fadeOut();
                    }
                });
            },
            runTop:function(){
                $('html,body').animate({'scrollTop':0},2*this.options.topDistance);
            },
            initShow:function(obj){//使用require.js时候需要使用
                var my = this;
                var obj = obj || {};
                var yScroll = document.body.scrollTop || document.documentElement.scrollTop;
                if(yScroll >= my.options.topDistance){
                    obj.fadeIn();
                }else{
                    obj.fadeOut();
                }   
            },
            topAndBottomScroll:function(obj,hover){
                var my = this;
                var timer,changeMaginTop=0;
                var obj = obj || {};
                var html = '<ul class="feedItem">';
                var broadUrl = 'http://localhost/personalWebsite/index.php/Home/Index/broadcast';
                $.ajax({
                    type:'get',
                    url:broadUrl,
                    dataType:'json',
                    success:function(data){
                        for(var i = 0;i < data.length; i++){
                            html += '<li class="item"><a href="javascript:void(0)">'+data[i]['cast_content'] +'</a></li>';
                        }
                         html += '</ul>';
                        obj.append(html);
                        clearInterval(timer);
                        var changeTop = $('.feedItem .item').height();
                        function open(){
                            timer = setInterval(function(){
                                changeMaginTop += changeTop;
                                if(changeMaginTop > changeTop*(data.length - 1)){
                                    changeMaginTop = 0;
                                }
                                $('.feedItem').css('marginTop','-' + changeMaginTop + 'px');
                            },my.options.delayTime);
                        }
                        open();
                        if(hover){
                            $('.feedItem .item').hover(function(){
                                clearInterval(timer);
                            },function(){
                                open();
                            });
                        }
                    }
                });
            },
            postLike:function(obj){
                obj.click(function(){
                    var clickValue = $(this).find('span').html() * 1;
                    var artId = $(this).data('pid');
                    var zanUrl = 'http://localhost/personalWebsite/index.php/Home/Index/zan';
                    if($(this).data('event') == 'like'){
                        $.loader('点赞达人','您已经点赞',1000);
                        return;
                    }
                    clickValue += 1;
                    $(this).find('span').html(clickValue);
                    $(this).css('color','#FF5E52');
                    $(this).data('event','like');
                    $.ajax({
                        type:'post',
                        url:zanUrl,
                        data:{pid:artId,art_zan:clickValue},
                        dataType:'json',
                        success:function(data){
                        }
                    });
                });
            },
            urlActive:function(obj){
                var obj = obj || {};
                var url = window.location.href;
                var subUrl = url.substring(url.lastIndexOf('/')+1,url.indexOf('html')-1);
                obj.find('li a').each(function(){
                    var compareValue = $(this).attr('class');
                    if(subUrl == compareValue){
                        $(this).addClass('active');
                    }
                });
            }, 
            countDownload:function(obj){
                var obj = obj || {};
                obj.each(function(){
                    $(this).click(function(){
                        var did = $(this).find('a').data('id');
                        var downloadUrl = 'http://localhost/personalWebsite/index.php/Home/Index/countDownload';
                        $.ajax({
                            type:'post',
                            url:downloadUrl,
                            data:{d_id:did},
                            dataType:'json',
                            success:function(data){
                                
                            } 
                        });
                    });
                });
            },
            getWether:function(){
                
            }         
        }
        var div = $('.content');
        sli = new Slide();
        sli._initSwiper();
        sli.scrollShow($('#ScrollToTop'));
        $('#ScrollToTop').click(function(){
            sli.runTop();
        });
        sli.topAndBottomScroll($('.feed'),true);
        sli.postLike($('.post-like'));
        sli.urlActive($('.item'));
        sli.countDownload($('.downloadEle'));
    });
})(jQuery);