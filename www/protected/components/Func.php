<?php
/**
 * 
 * 函数
 * @author wanghongfeng
 *
 */
class Func
{
	public static function thumb($org,$w=0,$h=0)
	{
		return I_SITE.str_replace('.', "_{$w}x{$h}.", $org);
	}
	
	//分页
    public static function pagg_html($total,$size,$page_size,$page)
    {
        $uri      = $_SERVER['REQUEST_URI'];
        $uriArray = parse_url($uri);
        $baseUrl  = htmlspecialchars($uriArray['path']) ;
        //替换分页参数
        $baseUrl = preg_replace('|(\d+)\/|i', '$1',  $baseUrl);
        $baseUrl = preg_replace('|p(\d+)|i', '',  $baseUrl);
        $baseUrl = preg_replace('|p(\d+)\/|i', '',  $baseUrl);
        $last_str = mb_substr($baseUrl, -1, 1);
        $baseUrl = $last_str == "/" ? mb_substr($baseUrl, 0, mb_strlen($baseUrl) - 1) : $baseUrl;
        $baseUrl = $baseUrl.'/p';

        $page = ($page < 1) ? 1 : $page;
        $cutpage_num	=	(int)ceil($total/$size);
        $se 			= 	(int)floor($page_size/2);
        $start_num		=	$page - $se;

        if($start_num < 1)
            $start_num = 1;

        $end_num 	= 	$start_num + $page_size - 1;

        if($end_num > $cutpage_num)
            $end_num = $cutpage_num;
        else if($end_num < $page_size)
            $start_num = 1;

        if($start_num > $page_size && $end_num - $start_num + 1 < $page_size)
            $start_num = $end_num - $page_size + 1;

        $pages = "<div class='message'>共<i class='blue'>{$total}</i>条记录，当前显示第&nbsp;<i class='blue'>{$page}&nbsp;</i>页</div>";

        $pages .= '<ul class="paginList">';
        $pages .= "<li class='paginItem'><a href='{$baseUrl}1'>首页</a></li>";

        if($page > 1)
        {
            $up_page = $page - 1;
            $pages .= "<li class='paginItem'><a href='{$baseUrl}{$up_page}'>«</a></li>";
        }

        for($i=$start_num;$i<=$end_num;$i++)
        {
            if ($i == $page)
                $pages .= '<li class="paginItem current"><a href="javascript:void(0);">'.$i.'</a></li>';
            else
                $pages .= "<li class='paginItem'><a href='{$baseUrl}{$i}'>$i</a></li>";
        }

        if($page < $cutpage_num)
        {
            $next_num = $page + 1;
            $pages .= "<li class='paginItem'><a href='{$baseUrl}{$next_num}'>»</a></li>";

        }

        $pages .= "<li class='paginItem'><a href='{$baseUrl}{$cutpage_num}'>末页</a></li>";

        //if($cutpage_num > $end_num)


        $pages .="</ul>";

        return $pages;
    }
}