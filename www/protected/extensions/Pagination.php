<?php
    class Pagination {
        public function init(){}
          private $total;      //总记录
          private $pagesize;    //每页显示多少条
          private $limit;          //limit
          private $page;           //当前页码
          private $pagenum;      //总页码
          private $url;           //地址
          private $bothnum;      //两边保持数字分页的量

      //构造方法初始化
      public function __construct($_total = 0, $_pagesize = 10) {
         $this->total = $_total ? $_total : 1;
         $this->pagesize = $_pagesize;
         $this->pagenum = ceil($this->total / $this->pagesize);
         $this->page = $this->setPage();
         $this->limit = "LIMIT ".($this->page-1)*$this->pagesize.",$this->pagesize";
         $this->url = $this->setUrl();
         $this->bothnum = 2;
      }

      //拦截器
      public function  __get($_key) {
         return $this->$_key;
      }

      //获取当前页码
      private function setPage() {
         if (!empty($_GET['page'])) {
                if ($_GET['page'] > 0) {
                   if ($_GET['page'] > $this->pagenum) {
                          return $this->pagenum;
                   } else {
                          return $_GET['page'];
                   }
                } else {
                   return 1;
                }
         } else {
                return 1;
         }
      }

      //获取地址
      private function setUrl() {
         $_url = $_SERVER["REQUEST_URI"];
         $_par = parse_url($_url);
         if(!strstr($_url,'?') == '?'){
         	$_url = $_url.'?';
         }
         if (isset($_par['query'])) {
                parse_str($_par['query'],$_query);
                unset($_query['page']);
                $_url = $_par['path'].'?'.http_build_query($_query);
         }
         return $_url;
      } //数字目录
      private function pageList() {
      	 $_pagelist = '';
         for ($i=$this->bothnum;$i>=1;$i--) {
            $_page = $this->page-$i;
            if ($_page < 1) continue;
                $_pagelist .= ' <a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a> ';
         }
         $_pagelist .= ' <span>'.$this->page.'</span> ';
         for ($i=1;$i<=$this->bothnum;$i++) {
            $_page = $this->page+$i;
            if ($_page > $this->pagenum) break;
            $_pagelist .= ' <a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a> ';
         }
         return $_pagelist;
      }
      
      //首页
      private function first() {
         return ' <a class="first" href="'.$this->url.'">首页</a>';
      }

      //上一页
      private function prev() {
         if ($this->page == 1) {
                return '<a class="prve disabled">上一页</a>';
         }
         return ' <a class="prve" href="'.$this->url.'&page='.($this->page-1).'">上一页</a> ';
      }

      //下一页
      private function next() {
         if ($this->page == $this->pagenum) {
                return '<a class="next disabled">下一页</a>';
         }
         return ' <a class="next" href="'.$this->url.'&page='.($this->page+1).'">下一页</a> ';
      }

      //尾页
      private function last() {
         if ($this->pagenum - $this->page > 0) {
                return '<a href="'.$this->url.'&page='.$this->pagenum.'" class="last" >尾页</a> ';
         }else{
         	return '<a class="last disabled" >尾页</a> ';
         }
      }

      //分页信息
      public  function showpage() {
      	 $_page ='';
         $_page .= self::first();
         $_page .= self::prev();
         $_page .= self::pageList();
         $_page .= self::next();
         $_page .= self::last();
         $_page .= '<em class="all_page">'.$this->page.'/'.$this->pagenum.' 页</em>';
         return $_page;
      }
 }