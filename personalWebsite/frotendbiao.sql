create database frotend charset=utf8;
CREATE TABLE frotendArt(
	art_id int not null AUTO_INCREMENT,
	art_title varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	art_content varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	art_author varchar(20) COLLATE utf8_unicode_ci NOT NULL,
	primary key(art_id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO frotendArt values (1,'css居中显示方法教程',
	'常用居中方法有DIV position absolute,margin-left:50%,margin-right:50%','wang'),
(2,'闭包的理解','五、使用闭包的注意点1）由于闭包会使得函数中的变量都被保存在内存中，内存消耗很大，所以不能滥用闭包，否则会造成网页的性能问题，在IE中可能导致内存泄露。解决方法是，在退出函数之前，将不使用的局部变量全部删除。2）闭包会在父函数外部，改变父函数内部变量的值。所以，如果你把父函数当作对象（object）使用，把闭包当作它的公用方法（Public Method），把内部变量当作它的私有属性（private value），这时一定要小心，不要随便改变父函数内部变量的值。','wang');
CREATE TABLE `cast_one` (
  `cast_id` int(11) NOT NULL AUTO_INCREMENT,
  `cast_cotent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO cast_one values (3,'张三');


INSERT INTO frotendArt values (3,'css3 -webkit-line-clamp详解','-webkit-line-clamp 是一个 不规范的属性（unsupported WebKit property），它没有出现在 CSS 规范草案中。
为了实现该效果，它需要组合其他外来的WebKit属性。常见结合属性：
display: -webkit-box; 必须结合的属性 ，将对象作为弹性伸缩盒子模型显示 。
-webkit-box-orient 必须结合的属性 ，设置或检索伸缩盒对象的子元素的排列方式 。
text-overflow，可以用来多行文本的情况下，用省略号“...”隐藏超出范围的文本 。','wang');



INSERT INTO frotendArt values (3,'css3 -webkit-line-clamp详解','-webkit-line-clamp 是一个 不规范的属性（unsupported WebKit property），它没有出现在 CSS 规范草案中。
为了实现该效果，它需要组合其他外来的WebKit属性。常见结合属性：
display: -webkit-box; 必须结合的属性 ，将对象作为弹性伸缩盒子模型显示 。
-webkit-box-orient 必须结合的属性 ，设置或检索伸缩盒对象的子元素的排列方式 。
text-overflow，可以用来多行文本的情况下，用省略号“...”隐藏超出范围的文本 。','wang');

文章表,评论表,图片表

文章表
art_id art_title art_content art_author art_read art_zan art_cataogaries art_tags art_time


评论表
art_id comment com_id

图片表
art_id photo_id photohref

CREATE TABLE comment2(
	art_id int not null,
	com_id int not null AUTO_INCREMENT,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL,
	primary key(com_id,art_id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE user(
    id int(4) primary key auto_increment,
    username varchar(20),
    password varchar(20)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE comment(
	art_id int not null,
	com_id int not null primary key auto_increment,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE reply(
	art_id int not null,
	com_id int not null,
	pid int not null,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE photo(
	art_id int not null,
	photo_id int not null,
	photohref  longtext COLLATE utf8_unicode_ci NOT NULL,
	key(photo_id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- CREATE TABLE photo(
-- 	photo_num int not null,
-- 	art_id int not null,
-- 	photo_id int not null AUTO_INCREMENT,
-- 	photohref  longtext COLLATE utf8_unicode_ci NOT NULL,
-- 	primary key(photo_num)
-- ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE art(
	art_id int not null AUTO_INCREMENT,
	art_title varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	art_content longtext COLLATE utf8_unicode_ci NOT NULL,
	art_author varchar(20) COLLATE utf8_unicode_ci NOT NULL,
	art_read int not null,
	art_zan int not null,
	art_cataogaries varchar(10) COLLATE utf8_unicode_ci NOT NULL,
	art_tags varchar(10) COLLATE utf8_unicode_ci NOT NULL,
	art_href  longtext COLLATE utf8_unicode_ci NOT NULL,
	art_time timestamp not null default current_timestamp,
	primary key(art_id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- INSERT INTO article values (1,'css3 -webkit-line-clamp详解','-webkit-line-clamp 是一个 不规范的属性（unsupported WebKit property），它没有出现在 CSS 规范草案中。
-- 为了实现该效果，它需要组合其他外来的WebKit属性。常见结合属性：
-- display: -webkit-box; 必须结合的属性 ，将对象作为弹性伸缩盒子模型显示 。
-- -webkit-box-orient 必须结合的属性 ，设置或检索伸缩盒对象的子元素的排列方式 。
-- text-overflow，可以用来多行文本的情况下，用省略号“...”隐藏超出范围的文本 。','wang',23,10,'前端开发','css',);

-webkit-line-clamp 是一个 不规范的属（unsupported WebKit property），它没有出现在 CSS 规范草案中。为了实现该效果，它需要组合其他外来的WebKi-webkit-line-clamp 是一个 不规范的属性（unsupported WebKitproperty），它没有出现在 CSS 规范草案中为了实现该效果，它需要组合其他外来的WebKi-webkit-line-clamp 是一个 不规范的属性（unsupported WebKit property），它没有出现在 CSS 规范草案中。
为了实现该效果，它需要组合其他外来的WebKi

INSERT INTO photo values (5,1,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT INTO photo values (4,1,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT INTO photo values (3,1,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT INTO photo values (2,1,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT INTO photo values (1,1,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT  INTO photo values (5,2,"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180");

INSERT INTO photo values (6,1,"__ROOT__/Skin/img/banner.jpg");

INSERT INTO photo values (7,1,"");
INSERT INTO photo values (8,1,"");

INSERT INTO photo values (9,1,"");
INSERT INTO photo values (10,1,"");
INSERT INTO photo values (11,1,"");
INSERT INTO photo values (12,1,"");
INSERT INTO photo values (13,1,"");
INSERT INTO photo values (14,1,"");
INSERT INTO photo values (15,1,"");
INSERT INTO photo values (16,1,"");


INSERT INTO art values (5,'jQuery Mobile','jQuery Mobile框架能够帮助你快速开发出支持多种移动设备的Mobile应用用户界面
。jQuery Mobile最新版本是1.4.0，默认主题采用扁平化设计风格。jQuery Mobile1.4.0主要侧重于性能和控件方面的改进。
除了全新的默认主题和SVG图标，还新增了开关控件、通用过滤器、箭头弹出框、滑动提示框等一系列功能，更是集成了jQuery UI的Tab部件。
jQuery Mobile继承了jQuery的优势，并且提供了丰富的适合手机应用的UI组件。jQuery Mobile还有很多的第三方扩展。','wzz',3,20,'移动端开发','jQuery',"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180",now());


INSERT INTO art values (2,'php基础教程','PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。
PHP 是免费的，并且使用广泛。对于像微软 ASP 这样的竞争者来说，PHP 无疑是另一种高效率的选项。','wang',13,20,'后端开发','php',"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180",now());

INSERT INTO art values (3,'webApp','PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。
PHP 是免费的，并且使用广泛。对于像微软 ASP 这样的竞争者来说，PHP 无疑是另一种高效率的选项。','wang',43,230,'移动端开发','app',now());

INSERT INTO art values (4,'webApp','PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。
PHP 是免费的，并且使用广泛。对于像微软 ASP 这样的竞争者来说，PHP 无疑是另一种高效率的选项。','wang',43,230,'前端开发','app','',now());

INSERT INTO art values (7,'vue.js','Vue.js（读音 /vjuː/, 类似于 view） 是一套构建用户界面的 渐进式框架。与其他重量级框架不同的是，Vue 采用自底向上增量开发的设计。Vue 的核心库只关注视图层，并且非常容易学习，非常容易与其它库或已有项目整合。另一方面，Vue 完全有能力驱动采用单文件组件和 Vue 生态系统支持的库开发的复杂单页应用。
Vue.js 的目标是通过尽可能简单的 API 实现响应的数据绑定和组合的视图组件。
如果你是有经验的前端开发者，想知道 Vue.js 与其它库/框架的区别，查看对比其它框架。','wang',13,20,'前端开发','js',"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180",now());

INSERT INTO art values (1,'javascript深入理解js闭包','一、变量的作用域

要理解闭包，首先必须理解Javascript特殊的变量作用域。

变量的作用域无非就是两种：全局变量和局部变量。

Javascript语言的特殊之处，就在于函数内部可以直接读取全局变量。


Js代码

　　var n=999;

　　function f1(){
　　　　alert(n);
　　}

　　f1(); // 999

另一方面，在函数外部自然无法读取函数内的局部变量。

Js代码

　　function f1(){
　　　　var n=999;
　　}

　　alert(n); // error

这里有一个地方需要注意，函数内部声明变量的时候，一定要使用var命令。如果不用的话，你实际上声明了一个全局变量！

Js代码

　　function f1(){
　　　　n=999;
　　}

　　f1();

　　alert(n); // 999','wz',13,30,'前端开发','js',"http://images2015.cnblogs.com/blog/36987/201702/36987-20170201185840542-1783551065.jpg?imageView/1/w/240/h/180",now());

INSERT INTO art values (8,'Python 基础教程','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','http://localhost/personalWebsite/Skin/img/banner.jpg',now());

INSERT INTO art values (9,'PHP 数组','数组能够在单独的变量名中存储一个或多个值。','wang2',33,10,'后端开发','php',now());
INSERT INTO art values (10,'PHP Array 函数','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python',now());
INSERT INTO art values (11,'PHP 简介','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','http://localhost/personalWebsite/Skin/img/banner.jpg',now());
INSERT INTO art values (12,'PHP 脚本在服务器上执行。','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','http://localhost/personalWebsite/Skin/img/banner.jpg',now());
INSERT INTO art values (13,'PHP 是一门令人惊叹的流行语言！','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','',now());
INSERT INTO art values (14,'PHP 能够做什么？','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','',now());
INSERT INTO art values (15,'为什么使用 PHP？','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','http://localhost/personalWebsite/Skin/img/banner.jpg',now());
INSERT INTO art values (16,'Python 基础教程','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'后端开发','Python','',now());
INSERT INTO art values (17,'linux基础','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'linux','Python','',now());
INSERT INTO art values (18,'php','Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。','wang',13,20,'php','php','',now());
INSERT INTO art values (6,'JSON.parse()','JSON.parse() 方法解析一个JSON字符串，构造由字符串描述的JavaScript值或对象。可以提供可选的reviver函数以在返回之前对所得到的对象执行变换。','wang',3,10,'前端开发','json','http://localhost/personalWebsite/Skin/img/banner.jpg',now());
之前评论表
INSERT INTO comment values (1,1,'不错点个赞,这篇文章作用很大');
INSERT INTO comment values (2,1,'求资料');
INSERT INTO comment values (3,1,'点个赞');
INSERT INTO comment values (4,1,'哈哈，不错哟');
INSERT INTO comment values (5,1,'宛如一个智障');
INSERT INTO comment values (6,1,'这个评论给满分');

更改后的评论表
文章2 里面有四个评论
INSERT INTO comment values (1,1,'不错点个赞,这篇文章作用很大');
INSERT INTO comment values (1,2,'麻卖皮');
INSERT INTO comment values (2,3,'求资料');
INSERT INTO comment values (2,4,'哈哈');
INSERT INTO comment values (2,5,'呵呵');
INSERT INTO comment values (2,6,'毛线');
INSERT INTO comment values (3,7,'点个赞');
INSERT INTO comment values (3,8,'哟哟');
INSERT INTO comment values (4,9,'哈哈，不错哟');
INSERT INTO comment values (4,10,'nmmp');
INSERT INTO comment values (5,11,'宛如一个智障');
INSERT INTO comment values (5,12,'哈欠');
INSERT INTO comment values (6,13,'这个评论给满分');
INSERT INTO comment values (6,14,'满分哈比');
//自增长
INSERT INTO comment (art_id,comment) values (1,'不错点个赞,这篇文章作用很大');
INSERT INTO comment (art_id,comment) values (1,'麻卖皮');
INSERT INTO comment (art_id,comment) values (2,'求资料');
INSERT INTO comment (art_id,comment) values (2,'哈哈');
INSERT INTO comment (art_id,comment) values (2,'呵呵');
INSERT INTO comment (art_id,comment) values (2,'毛线');
INSERT INTO comment (art_id,comment) values (3,'点个赞');
INSERT INTO comment (art_id,comment) values (3,'哟哟');
INSERT INTO comment (art_id,comment) values (4,'哈哈，不错哟');
INSERT INTO comment (art_id,comment) values (4,'nmmp');
INSERT INTO comment (art_id,comment) values (5,'宛如一个智障');
INSERT INTO comment (art_id,comment) values (5,'哈欠');
INSERT INTO comment (art_id,comment) values (6,'这个评论给满分');
INSERT INTO comment (art_id,comment) values (6,'满分哈比');

回复表内容
文章2第一个评论里的回复
INSERT INTO reply values (1,1,1,'我也求资料');




CREATE TABLE commentReply(
	com_id int not null primary key auto_increment,
	art_id int not null,
	p_id int,
	user_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	commentLike int not null,
	comment_time timestamp not null default current_timestamp,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO commentReply values (1,1,0,'不错点个赞,这篇文章作用很大');
INSERT INTO commentReply values (2,2,0,'麻卖皮');
INSERT INTO commentReply values (3,2,0,'求资料');
INSERT INTO commentReply values (4,3,0,'哈哈');
INSERT INTO commentReply values (5,4,0,'呵呵');
INSERT INTO commentReply values (6,5,0,'毛线');
INSERT INTO commentReply values (7,6,0,'点个赞');
INSERT INTO commentReply values (8,7,0,'哟哟');
INSERT INTO commentReply values (9,3,0,'哈哈，不错哟');
INSERT INTO commentReply values (10,4,0,'nmmp');
INSERT INTO commentReply values (11,6,0,'宛如一个智障');
INSERT INTO commentReply values (12,5,0,'哈欠');
INSERT INTO commentReply values (13,1,0,'这个评论给满分');
INSERT INTO commentReply values (14,7,0,'满分哈比');

INSERT INTO commentReply values (15,1,1,'这个评dddd论给满分');
INSERT INTO commentReply values (16,1,13,'满分zzzzzzzz哈比');

INSERT INTO commentReply values (17,1,15,'哟哟');
INSERT INTO commentReply values (18,1,16,'某没忒');
INSERT INTO commentReply values (19,1,1,'渣渣');

//自增长
CREATE TABLE commentReply(
	com_id int not null primary key auto_increment,
	art_id int not null,
	p_id int,
	commentLike int not null,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,0,12,'不错点个赞,这篇文章作用很大');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (2,0,10,'麻卖皮');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (2,0,0,'求资料');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (3,0,3,'哈哈');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (4,0,2,'呵呵');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (5,0,7,'毛线');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (6,0,11,'点个赞');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (7,0,11,'哟哟');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (3,0,34,'哈哈，不错哟');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (4,0,12,'nmmp');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (6,0,22,'宛如一个智障');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (5,0,9,'哈欠');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,0,4,'这个评论给满分');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (7,0,7,'满分哈比');

INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,1,0,'这个评dddd论给满分');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,13,0,'满分zzzzzzzz哈比');

INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,15,0,'哟哟');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,16,0,'某没忒');
INSERT INTO commentReply (art_id,p_id,commentLike,comment) values (1,1,0,'渣渣');

CREATE TABLE account(
	user_id int not null primary key auto_increment,
	nikename varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	password varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO account values(1,'小二','12@qq.com','123456');
INSERT INTO account values(2,'王五','34@qq.com','123456');
INSERT INTO account values(3,'赵六','56@qq.com','123456');


CREATE TABLE commentReply(
	com_id int not null primary key auto_increment,
	art_id int not null,
	p_id int,
	r_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	user_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	commentLike int not null,
	comment_time timestamp not null default current_timestamp,
	comment  longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO commentReply values(1,14,0,'老王','老朱',4,);


//创建下载表
CREATE TABLE download(
	d_id int not null primary key auto_increment,
	d_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	d_href longtext COLLATE utf8_unicode_ci NOT NULL,
	d_num int not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO download values (1,'font-awesome-4.7.0','__ROOT__/Skin/download/font-awesome-4.7.0.zip',3);
INSERT INTO download values (2,'jquery-1.9.1.min.js','__ROOT__/Skin/download/jquery-1.9.1.min.zip',1);
INSERT INTO download values (3,'react.js','__ROOT__/Skin/download/react.zip',4);
INSERT INTO download values (4,'require.js','__ROOT__/Skin/download/require.zip',2);
INSERT INTO download values (5,'browser.min.js','__ROOT__/Skin/download/browser.min.zip',7);