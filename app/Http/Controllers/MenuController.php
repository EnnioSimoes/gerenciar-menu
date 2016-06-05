<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\GeraMenuService as GeraMenu;

class MenuController extends BaseController
{
    public function index()
    {
        $menuJson = '[{"title":"Orders","customSelect":"http://example.com/page/1","id":6,"custom-select":"http://example.com/page/1","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"select2-scroll-position":{"x":0,"y":0},"children":[{"id":9,"title":"doMenu List Item. 1","customSelect":"3","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"custom-select":"3"}]},{"title":"Manage","customSelect":"select something...","id":7,"custom-select":"select something...","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}},{"title":"Settings","customSelect":"http://example.com/page/2","id":8,"custom-select":"http://example.com/page/2","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]';

        $menu = new GeraMenu($menuJson);
        $menu->setCaixaListaMenu('<ul class="nav navbar-nav">%s</ul>');
        $menu->setItemListaMenu('<li><a href="%s" alt="%s" title="%s" >%s</a></li>');
        $menu->setItemListaSubMenu('<li class="dropdown"><a href="%s" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">%s <span class="caret"></span></a><ul class="dropdown-menu">%s</ul></li>');

        return $menu->gerar();
        // return view('front.home');
    }
}
