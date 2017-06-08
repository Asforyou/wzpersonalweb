<?php
namespace Home\Controller;
use Think\Controller;
class OptionpageController extends PublicController{
    public function data($art_cataogaries){
        $resNum = D('Art')
        ->field('art.art_id,art_title,art_content,art_author,art_read,art_zan,art_cataogaries,art_tags,art_time,art_href,count(com_id) as idnum')
        ->join('left join commentreply on commentreply.art_id = art.art_id')
        ->where("art_cataogaries='$art_cataogaries'")
        ->group('art.art_id')
        ->order('art_time desc')->select(); 

        $totalnum=count($resNum);
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
            $res = D('Art')
            ->field('art.art_id,art_title,art_content,art_author,art_read,art_zan,art_cataogaries,art_tags,art_time,art_href,count(com_id) as idnum')
            ->join('left join commentreply on commentreply.art_id = art.art_id')
            ->where("art_cataogaries='$art_cataogaries'")
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
        $this->assign('noData',$noData);
        $this->assign('pageData',$pageData);
        $this->assign('art',$res);
        $this->display();
        $this->assign('art',$res);
        $this->display();
    }
    public function mobile(){
        $this->data('移动端开发');
  	}
    public function linux(){
        $this->data('linux');
    }
    public function frotend(){
        $this->data('前端开发');
    }
    public function admin(){
        $this->data('后端开发');
    }
    public function php(){
        $this->data('php');
    }
    public function python(){
        $this->data('python');
    }
    public function download(){
        $sqlDownload = D('download');
        $resNum = $sqlDownload->select(); 
        $totalnum=count($resNum);
        //每页显示条数
        $pagesize=20;
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
            $res = $sqlDownload->limit(($page-1)*$pagesize,$pagesize)->select();
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
        $this->assign('download',$res);
        $this->assign('noData',$noData);
        $this->assign('pageData',$pageData);
        $this->display();
    }
}