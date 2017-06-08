(function($){
    $(function(){
        $.extend({
            //弹出层功能，可以设定弹出层标题内容自动弹出时间
            loader:function(title,content,timeout){
                if($('.layer').length != 0){
                    return;
                }
                var T,out;
                var layHtml = '<div class="layer"><div class="layer-container"> <div class="title">' + title
                + '</div><div class="layer_content">' + content + '</div><span class="layer-close glyphicon glyphicon-remove"></span>'
                + '</div></div>';
                $('html body').after(layHtml);
                $('.layer').addClass('layer-name');
                //设定弹出层位置

                //退出弹窗
                function exit(){
                    $('.layer').addClass('layer-out');
                    clearTimeout(T);
                    T = setTimeout(function(){
                        $('.layer').remove();
                    },500);
                }
                //给close注册点击事件
                $('.layer-close').click(function(){
                    exit();
                });
                //判断是否有设定几秒后自动退出
                if(typeof timeout !== 'undefined' && timeout !== ''){
                    clearTimeout(out);
                    out = setTimeout(function(){
                        exit();
                    },timeout);
                }
            },
            //图片预下载
            loadImage:function(url, callback) { 
                var img = new Image(); //创建一个Image对象，实现图片的预下载 
                img.src = url; 
                if (img.complete){ // 如果图片已经存在于浏览器缓存，直接调用回调函数 
                    callback.call(img); 
                    return; // 直接返回，不用再处理onload事件 
                } 
                img.onload = function (){ //图片下载完毕时异步调用callback函数。 
                    callback.call(img);//将回调函数的this替换为Image对象 
                }; 
            },
            //阻止冒泡
            stopEvents:function(e) {
                //如果提供了事件对象，则这是一个非IE浏览器
                if(e && e.stopPropagation) {
                　　//因此它支持W3C的stopPropagation()方法
                　　e.stopPropagation();
                } else {
                　　//否则，我们需要使用IE的方式来取消事件冒泡
                　　window.event.cancelBubble = true;
                }
                return false;
            },
            //动态加载js
            createScript:function(url){
                var script = document.createElement('script');
                script.src=url;
                script.type='text/javascript';
                script.defer=true;
                void(document.getElementsByTagName("head")[0].appendChild(script));
            },
            //动态加载css
            createCss:function(url){
                var link = document.createElement('link');
                link.type = 'text/css';
                link.rel = 'stylesheet';
                link.href = url;
                void(document.getElementsByTagName("head")[0].appendChild(link));
            },
            //预定义的字符转换为 HTML 实体
            htmlspecialchars:function(string){
                return string.replace(/&/g, '&amp;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, "'")
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
            },
            //预定义的 HTML 实体转换为字符
            htmlspecialchars_decode:function(string){
                return string.replace(/&amp;/g, '&')
                    .replace(/&quot;/g, '"')
                    .replace(/'/g, "'")
                    .replace(/&lt;/g, '<')
                    .replace(/&gt;/g, '>');
            }, 
        });
    })
})(jQuery);
