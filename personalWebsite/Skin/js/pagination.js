(function($,window){
    $(function(){
        var Pagination = function(element,options){
            this.ele = element;
            this.default = {
                prev:'上一页',
                next:'下一页',
                total:'30',
                singleNum:'5',
                data:{change1:1111,change2:2222,change3:3333,change4:44444,change5:5555,change6:66666,change7:77777,change8:8888,change9:9999,change10:10000,}
            }
            this.opt = $.extend({},this.default,options);
        }
        Pagination.prototype={
            initPageNumHtml:function(){
                var options = this.opt;
                var ele = this.ele;
                var numHtml ='';
                var pageHtml = '<div class="pageNum"><button class="btn prev">'+options.prev+'</button><ul class="numItem"></ul><button class="btn next">'+options.next+'</button></div>';
                for(var i = 0; i < options.total/options.singleNum; i++){
                    numHtml += '<li class="num num'+(i*1+1)+'"><a href="">'+(i*1+1)+"</a></li>";
                }
                $(ele).append(pageHtml);
                $('.numItem').append(numHtml);
            }
        }
        $.fn.pagination = function(options){
            var page = new Pagination(this,options);
            page.initPageNumHtml();
        }

        $('.newPost').pagination();
    })
})(jQuery,window);

