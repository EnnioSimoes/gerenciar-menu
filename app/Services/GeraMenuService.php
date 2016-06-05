<?php
namespace App\Services;

class GeraMenuService
{
    /**
     * Menu em Json gerado pelo DoMenu
     * @var string
     */
    public $menuJson;
    /**
     * Container do menu com demarcacoes para sprintf (%s) Ex: <ul class="nav navbar-nav">%s</ul>
     * @var string
     */
    public $caixaListaMenu = '<ul class="nav navbar-nav">%s</ul>';
    /**
     * Template de lista do menu com demarcacoes para sprintf (%s) Ex: <li><a href="%s" alt="%s" title="%s" >%s</a></li>
     * @var string
     */
    public $itemListaMenu  = '<li><a href="%s" alt="%s" title="%s" >%s</a></li>';
    /**
     * Container que envolverá sub-menus com demarcacoes para sprintf (%s) Ex: <li class="dropdown"><a href="%s" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">%s <span class="caret"></span></a><ul class="dropdown-menu">%s</ul></li>
     * @var string
     */
    public $itemListaSubMenu  = '<li class="dropdown"><a href="%s" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">%s <span class="caret"></span></a><ul class="dropdown-menu">%s</ul></li>';

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

    /**
     * GeraLista gera listagem do menu
     * @param  Array  $menuArray Menu doMenu convertido em array
     * @return string            Lista com menus
     */
    public function geraLista(Array $menuArray)
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

    /**
     * Monta menu html completo
     * @return string Menu html
     */
    public function gerar()
    {
        $menuArray = json_decode($this->menuJson);
        $lista = $this->geraLista($menuArray);
        $menuHtml = sprintf($this->caixaListaMenu, $lista);

        return $menuHtml;
    }
}
