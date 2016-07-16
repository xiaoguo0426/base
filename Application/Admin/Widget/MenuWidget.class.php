<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/16
 * Time: 22:40
 */
use Admin\Controller\BaseController;
use Admin\Service\MenuService;

class MenuWidget extends BaseController
{
    public function get_tree_menu()
    {

        $menu_service = new MenuService();
        $active_menu = $menu_service->get_active_menu("id,name,parent_id,path,sort,icon");
        $menu = array_values($menu_service->get_tree_menu($active_menu));

        $body = "";
        $html = "";
        foreach ($menu as $key => $value) {
            $header = "<li><a href='#'><i class='fa fa-bar-chart-o'></i><span class='nav-label'>" . $value[0]['name'] . "</span><span class='fa arrow'></span></a><ul class='nav nav-second-level collapse'>";
            $footer = "</ul></li>";
            unset($value[0]);
            foreach ($value as $k => $v) {
                $body .= "<li><a href='" . $v['path'] . "'>" . $v['name'] . "</a></li>";
            }
            $html .= $header . $body . $footer;
            $body = "";
        }
        echo $html;
        echo 1111111111111111111111;
        return $html;
    }
}