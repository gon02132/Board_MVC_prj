<?php
@session_start();
include_once 'model/Model.php';
Class MainController{
    private $list;
    private $pagenation;
    private $print_pagenation;

    function __construct(){
        $this->list = new Model();
    }
    function start_fun(){

        //model에서 게시글의 총 갯수를 가져온다
        $total_num = $this->list->get_all_num();

        include_once 'controller/PagenationCon.php';
        //가져온 변수로 페이지네이션 객체를 만들고
        $this->pagenation = new PagenationCon($total_num);

        //view페이지네이션공간을 채운다
        $this->print_pagenation = $this->pagenation->get_pagenation();

        //model에서 DB자료를 가져오고
        $result = $this->list->get_list();

        //view에서 리스트화면을 가져온다
        include_once 'view/view_main_page.php';
        //DB닫기
        $this->list->close_DB();
    }
}
?>