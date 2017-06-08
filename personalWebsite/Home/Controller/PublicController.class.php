<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
    function _empty(){
        header("Location:/404.html");
    }
}
?>