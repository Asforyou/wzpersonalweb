<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	//获得文章内容信息
    public function article($page){
        //页面载入统计阅读量
        $readNum = D('Art')->where("art_id=$page")->setInc('art_read',1);
        //获取文章信息
    	$res = D('Art')->where("art_id=$page")->find();
    	$this->assign('content',$res);
    	$this->display();
    }
    //页面载入初始化评论
    public function comment($page){
    	$comment = D('Commentreply')->where("art_id=$page")->order('com_id desc')->select();
    	$this->ajaxreturn($comment);
    }
    //获取评论
    public function postComment(){
    	header("Content-Type:text/html; charset=utf-8");
    	$comment = D('Commentreply');
    	$data['art_id'] = $_POST['page'];
        $data['p_id'] = $_POST['pid'];
        $data['r_name'] = $_POST['r_name'];
        $data['user_name'] = $_POST['uname'];
        $data['commentLike'] = '0';
    	$data['comment'] = $_POST['comment'];
    	$comment->data($data)->add($data);
    	$this->ajaxreturn($data);
    }
    //用户注销
    public function logout(){
        //注销登录
        if($_GET['action'] == "logout"){
            session('username',null);
            session('user_id',null);
            session('email',null);
            session('[destroy]');
            $arr = array(
                'status' => 1,
                'result' => '退出成功'
            );
            $this->ajaxreturn($arr,'JSON');
        }
    }
    //设置cookie自动登录
    public function autologin($checked,$cookie){
        if($checked == 'true'){
            foreach ($cookie as $key => $value) {
                cookie($key,$value,time()+7*24*3600);
            }
        }else{
            foreach ($cookie as $key => $value) {
                cookie($key,null);
            }
        }
    }
    //登录
    public function login(){
        header('Content-Type:text/html; charset=utf-8');//防止出现乱码
        $login = D('Account');
        session_start();

        $loginName = $_POST['loginName'];
        $loginPsw = md5($_POST['loginPsw']);
        $checked = $_POST['checked'];
        $format = '/@+/';
        // echo $_COOKIE["username"].$_COOKIE["password"];
        if(!empty($loginName) && !empty($loginPsw)){
            //组合查询数据
            if(!preg_match($format,$loginName)){
                $data['nikename'] = htmlspecialchars($loginName);
            }else{
                $data['email'] = htmlspecialchars($loginName);
            }
            $data['password'] = $loginPsw;

            $today = date('Y-m-d H:i:s');//获取登录时间
            $ip = $_SERVER['REMOTE_ADDR'];//获取登录ip
            // if(!isset($_POST['submit'])){
            //     exit('非法访问!');
            // }
            //查询
            $loginResult = $login->where($data)->select();
            if(count($loginResult) != 0){
                $_SESSION['nikename'] = $loginResult[0]['nikename'];
                $_SESSION['email'] = $loginResult[0]['email'];
                $_SESSION['user_id'] = $loginResult[0]['user_id'];
                $this->autologin($checked,array('username' => $loginName,'password' => $_POST['loginPsw']));
                $arr = array(
                    'status' => 1,
                    'result' => '登录成功',
                    'name' => $loginName
                );
                $this->ajaxreturn($arr,'JSON');
            }else{
                $arr = array(
                    'status' => 0,
                    'result' => '用户名或密码错误'
                );
                $this->ajaxreturn($arr,'JSON');
            }
        }
    }
    //注册
    public function register(){
        header('Content-Type:text/html; charset=utf-8');//防止出现乱码
        session_start();
        $register = D('Account');
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['email'])){
            $data['email'] = $_POST['email'];
            $data['password'] = md5($_POST['password']);
            $data['nikename'] = $_POST['nikename'];
            $result = $register->add($data);
            if($result){
                $_SESSION['nikename'] = $data['nikename'];
                $arr = array(
                    'status' => 1,
                    'result' => '注册成功'
                );
                $this->ajaxreturn($arr,'JSON');
            }else{
                $arr = array(
                    'status' => 2,
                    'result' => '注册失败'
                );
                $this->ajaxreturn($arr,'JSON');
            }
        }
        if(!empty($_POST['email'])){
            $email['email'] = $_POST['email'];
            $emailformat = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
            if(!preg_match($emailformat,$_POST['email'])){
                $arr = array(
                    'status' => 0,
                    'result' => '请输入正确的邮箱'
                );
                $this->ajaxreturn($arr,'JSON');
            }else{
                $reg = $register->where($email)->limit(1)->select();
                if(count($reg) != 0){
                    $arr = array(
                        'status' => 0,
                        'result' => '邮箱已注册'
                    );
                    $this->ajaxreturn($arr,'JSON');
                }else{
                    $arr = array(
                        'status' => 1,
                        'result' => '邮箱可用'
                    );
                    $this->ajaxreturn($arr,'JSON');
                }
            }
        }
        if(!empty($_POST['nikename'])){
            $chinese = "/[\x{4e00}-\x{9fa5}\w]+$/u";
            $nike['nikename'] = $_POST['nikename'];
            if(!preg_match($chinese, $_POST['nikename'])){
                $arr = array(
                    'status' => 0,
                    'result' => '昵称只能包含汉字数字字母下划线'
                );
                $this->ajaxreturn($arr,'JSON');
            }else{
                $nikeResult = $register->where($nike)->limit(1)->select();
                if(count($nikeResult) != 0){
                    $arr = array(
                        'status' => 0,
                        'result' => '昵称已占用'
                    );
                    $this->ajaxreturn($arr,'JSON');
                }else{
                    $arr = array(
                        'status' => 1,
                        'result' => '昵称可用'
                    );
                    $this->ajaxreturn($arr,'JSON');
                }
            }
        }
    }
    //charge 验证码
    public function chargeCode(){
        $verifyCode = trim($_POST['verifyCode']);
        $status = $_POST['status'];
        if($status == 'login'){
            $charge = $_SESSION["login"];
        }else if($status == 'register'){
            $charge = $_SESSION["register"];
        }
        if($verifyCode != $charge){
            $arr = array(
                'status' => 0,
                'result' => '验证码不正确'
            );
            $this->ajaxreturn($arr,'JSON');
            exit;
        }else{
            $arr = array(
                'status' => 1,
                'result' => '验证码正确'
            );
            $this->ajaxreturn($arr,'JSON');
        }
    }
    //登录验证码自定义大小数量
    public function loginVerifyCode(){
        session_start(); 
        $this->verifyImg(4,100,42,'login');
    }
    //注册验证码自定义大小数量
    public function registerVerifyCode(){
        session_start(); 
        $this->verifyImg(4,100,42,'register');
    }
    //验证码图像生成
    public function verifyImg($num,$w,$h,$sessionVal){
        $code = ""; 
        for ($i = 0; $i < $num; $i++) { 
            $code .= rand(0, 9); 
        } 
        //4位验证码也可以用rand(1000,9999)直接生成 
        //将生成的验证码写入session，备验证时用 
        $_SESSION[$sessionVal] = $code; 
        //创建图片，定义颜色值 
        header("Content-type: image/PNG"); 
        $im = imagecreate($w, $h); 
        $lineTwo = imagecolorallocate($im, 200, 200, 200); 
        $bgcolor = imagecolorallocate($im, 245, 222, 179);
        $lineOne = imagecolorallocate($im, 49, 148, 208);
        $pointColor = imagecolorallocate($im, 120, 232, 125);
        $strColor = imagecolorallocate($im, 236, 142, 112);
        //填充背景 
        imagefill($im, 0, 0, $bgcolor); 
     
        //画边框 
        imagerectangle($im, 0, 0, $w-1, $h-1, $bgcolor); 
     
        //随机绘制两条虚线，起干扰作用 
        $style = array ($lineOne,$lineOne,$lineOne,$lineOne,$lineOne, 
            $lineTwo,$lineTwo,$lineTwo,$lineTwo,$lineTwo 
        ); 
        imagesetstyle($im, $style); 
        $y1 = rand(0, $h); 
        $y2 = rand(0, $h); 
        $y3 = rand(0, $h); 
        $y4 = rand(0, $h); 
        imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED); 
        imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED); 
     
        //在画布上随机生成大量黑点，起干扰作用; 
        for ($i = 0; $i < 80; $i++) { 
            imagesetpixel($im, rand(0, $w), rand(0, $h), $pointColor); 
        } 
        //将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成 
        $strx = rand(3, 8); 
        for ($i = 0; $i < $num; $i++) { 
            $strpos = rand(1, 6); 
            imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $strColor); 
            $strx += rand(8, 12); 
        } 
        imagepng($im);//输出图片 
        imagedestroy($im);//释放图片所占内存 
    }
}