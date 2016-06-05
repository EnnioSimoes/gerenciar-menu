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

    public $menuCompleto;


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

    public function geraLista(Array $menuArray, $sub = false)
    {
        $lista = '';
        foreach ($menuArray as $key => $item) {
            if(!isset($item->children)) {
                $lista .= sprintf($this->itemListaMenu, $item->customSelect, $item->title, $item->title, $item->title);
            } else {
                $lista .= sprintf($this->itemListaSubMenu, $item->customSelect, $item->title, $this->geraLista($item->children));
            }
        }
        return $lista;
    }

    public function gerar()
    {
        $menuArray = json_decode($this->menuJson);
        $lista = $this->geraLista($menuArray);
        echo $lista;
        die();
        $menuHtml = $this->caixaListaMenu;

        return $menuHtml;
    }
}
