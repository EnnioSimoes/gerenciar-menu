<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\GeraMenuService as GeraMenu;

class MenuController extends BaseController
{
    public function index()
    {
        $menuJson = '[{"title":"Account","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0},"id":1,"custom-select":"select something...","__domenu_params":{}},{"title":"Settings","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0},"id":2,"custom-select":"select something...","__domenu_params":{},"children":[{"id":8,"title":"doMenu List Item. 1","customSelect":"select something...","__domenu_params":{}}]},{"title":"Call","customSelect":"select something...","id":3,"custom-select":"select something...","__domenu_params":{},"children":[{"title":"Orders","customSelect":"select something...","id":6,"custom-select":"select something...","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]},{"title":"Manage","customSelect":"select something...","id":7,"custom-select":"select something...","__domenu_params":{}}]';

        $menu = new GeraMenu($menuJson);
        $menu->setCaixaListaMenu('<ul class="nav navbar-nav">%s</ul>');
        $menu->setItemListaMenu('<li><a href="%s" alt="%s" title="%s" >%s</a></li>');
        $menu->setItemListaSubMenu('<li class="dropdown">%s</li>');
        $menu->setCaixaListaSubMenu('<ul class="dropdown-menu">%s</ul>');

        return $menu->gerar();
        // return view('front.home');
    }
}
