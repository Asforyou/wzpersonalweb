<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PublicController {
	//广播方法
	public function broadcast(){
		$res = D('cast_one')->select();
		$this->ajaxreturn($res);
	}
	//主页更新 一周热门
	public function index(){
		$now_time = NOW_TIME;  
		$end_time = strtotime(date('Y-m-d H:i:s', strtotime('-7 day')));
	  	$weekRank = D('Art')->field('art_id,art_read,art_zan,art_title')->where("UNIX_TIMESTAMP(art_time) > $end_time and UNIX_TIMESTAMP(art_time) < $now_time")->limit(0,5)->order('art_read desc')->select();
	  	//下载热门
	  	$sqlDownload = D('download');
        $downloadRes = $sqlDownload->limit(0,5)->order('d_num desc')->select(); 
	  	//上下页
	  	$artNum = D('Art')
	  	->field('art.art_id,art_title,art_content,art_author,art_read,art_zan,art_cataogaries,art_tags,art_time,art_href,count(com_id) as idnum')
	  	->join('left join commentreply on commentreply.art_id = art.art_id')
	  	->group('art.art_id')
	  	->order('art_time desc')->select(); 

	  	$totalnum=count($artNum);
		//每页显示条数
		$pagesize=5;
		//总共有几页
		$maxpage=ceil($totalnum/$pagesize);
		$page=isset($_GET['gpage'])?$_GET['gpage']:1;
		$prevShow = 'inline-block';
		$nextShow = 'inline-block';
		if($page <1){
			$page=1;
		}
		if($page>$maxpage){
			$page=$maxpage;
		}
		try {
			$newArt = D('Art')
		  	->field('art.art_id,art_title,art_content,art_author,art_read,art_zan,art_cataogaries,art_tags,art_time,art_href,count(com_id) as idnum')
		  	->join('left join commentreply on commentreply.art_id = art.art_id')
		  	->group('art.art_id')
		  	->order('art_time desc')->limit(($page-1)*$pagesize,$pagesize)->select(); 
		} catch (\Think\Exception $e) {
            $noData = array(
                'status' => 0,
                'result' => '无数据'
            );
            $this->assign('noData',$noData);
            $this->display();
            exit();
        }
	  	$prevPage = $page-1;
	  	$nextPage = $page+1;
	  	if($prevPage <1){
			$prevPage=1;
			$prevShow = 'none';
		}
		if($nextPage>$maxpage){
			$nextPage=$maxpage;
			$nextShow = 'none';
		}
	  	$pageData = array($page,$prevPage,$nextPage,$prevShow,$nextShow);
	  	$noData = array(
            'status' => 1,
            'result' => '数据载入'
        );
        $this->assign('download',$downloadRes);
        $this->assign('noData',$noData);
		$this->assign('pageData',$pageData);
        $this->assign('newArt',$newArt);
        $this->assign('weekRank',$weekRank);
        $this->display();
	}
	//点赞操作
	public function zan($pid,$art_zan){
		$res = D('Art');
		$data['art_zan'] = "$art_zan";
		$res->where("art_id = $pid")->save($data);
	}
	//计算下载次数
	public function countDownload(){
		$sqlDownload = D('download');
		$data['d_id'] = $_POST['d_id'];
		$update = $sqlDownload->where($data)->setInc('d_num',1);
		if($update){
			$res = array(
				'status' => 1,
				'message' => 'success'
			);
			$this->ajaxreturn($res);
		}else{
			$res = array(
				'status' => 0,
				'message' => 'fail'
			);
			$this->ajaxreturn($res);
		}
	}
}