<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM theme";
        $menu =array();
        foreach ($link->query($sql) as $value) {
            $menu[$value['name']] = array('page' => $value['page'] , 'id' => $value['id'],  'parent' => '');
        }
        

		$this->view->menu = $menu;
    }

}

