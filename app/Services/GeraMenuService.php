<?php
namespace App\Services;

class GeraMenuService
{
    // Menu em Json
    public $menuJson;
    // Ex: <ul class="nav navbar-nav"></ul>
    public $caixaListaMenu;
    // Ex: <li><a href="#">Link</a></li>
    public $itemListaMenu;
    // Ex: <li class="dropdown"> </li>
    public $itemListaSubMenu;
    // Ex: <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a><ul class="dropdown-menu">
    public $caixaListaSubMenu;

    public function __construct($menuJson)
    {
        $this->menuJson = $menuJson;
    }

    public function setCaixaListaMenu($caixaListaMenu)
    {
        $this->caixaListaMenu = $caixaListaMenu;
        return $this;
    }
    public function setItemListaMenu($itemListaMenu)
    {
        $this->itemListaMenu = $itemListaMenu;
        return $this;
    }
    public function setItemListaSubMenu($itemListaSubMenu)
    {
        $this->itemListaSubMenu = $itemListaSubMenu;
        return $this;
    }
    public function setCaixaListaSubMenu($caixaListaSubMenu)
    {
        $this->caixaListaSubMenu = $caixaListaSubMenu;
        return $this;
    }

    public function geraLista()
    {
        $lista = '';
        $listaSub = '';

        $menuArray = json_decode($this->menuJson);
// dd($menuArray);
        foreach ($menuArray as $key => $value) {
            if(!$value->children){
                // <li><a href="%s" alt="%s" title="%s" >%s</a></li>
                $lista .= sprintf($this->itemListaMenu, $value->customSelect, $value->title, $value->title, $value->title);
            } else {
                foreach ($value->children as $key2 => $value2) {
                    $listaSub .= sprintf($this->itemListaMenu, $value->customSelect, $value->title, $value->title, $value->title);
                }
                // CONTINUAR AQUI
                // <li class="dropdown">%s</li>
                $lista .= sprintf($this->itemListaSubMenu, $listaSub);
            }
        }

        echo $lista;
        die();



        // dd($lista);


        return $lista;
    }







    public function gerar()
    {
        $lista = $this->geraLista();
        $menuHtml = $this->caixaListaMenu;

        // $menuHtml = sprintf($menuHtml, 'testeeeeeee');



        return $menuHtml;
    }
}
