@extends('template/site')
@section('conteudo')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        {!! $menuHtml !!}

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Exemplo de DoMenuJs e Select2
        </div>
        <div class="panel-body">

            <div class="dd" id="domenu-1">
              <button id="domenu-add-item-btn" class="dd-new-item">+</button>
              <!-- .dd-item-blueprint is a template for all .dd-item's -->
              <li class="dd-item-blueprint">
                <!-- @migrating-from 0.48.59 button container -->
                <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
                <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">
                  <span class="item-name">[item_name]</span>
                  <!-- @migrating-from 0.13.29 button container-->
                  <!-- .dd-button-container will hide once an item enters the edit mode -->
                  <div class="dd-button-container">
                    <!-- @migrating-from 0.13.29 add button-->
                    <button class="custom-button-example">&#x270E;</button>
                    <button class="item-add">+</button>
                    <button class="item-remove" data-confirm-class="item-remove-confirm">&times;</button>
                  </div>
                  <!-- Inside of .dd-edit-box you can add your custom input fields -->
                  <div class="dd-edit-box" style="display: none;">
                    <!-- data-placeholder has a higher priority than placeholder -->
                    <!-- data-placeholder can use token-values; when not present will be set to "" -->
                    <!-- data-default-value specifies a default value for the input; when not present will be set to "" -->
                    <input type="text" name="title" autocomplete="off" placeholder="Item"
                           data-placeholder="Any nice idea for the title?"
                           data-default-value="doMenu List Item. {?numeric.increment}">
                    <select name="custom-select">
                      <option>select something...</option>
                      <optgroup label="Pages">
                        <option value="http://example.com/page/1">http://example.com/page/1</option>
                        <option value="http://example.com/page/2">http://example.com/page/2</option>
                      </optgroup>
                      <optgroup label="Categories">
                        <option value="3">News</option>
                        <option value="4">Stories</option>
                      </optgroup>
                    </select>
                    <i class="end-edit">save</i>
                  </div>
                </div>
              </li>

              <ol class="dd-list"></ol>
            </div>

            <div id="domenu-1-output" class="output-preview-container">
              <h4>JSON Output Preview (User menu)</h4>
              <textarea style="width: 100%; min-height: 300px;" name="jsonOutput" class="jsonOutput"></textarea>
              <input type="checkbox" name="keepchages" class="keepChanges" checked> Keep changes after page reload (localStorage)
              <br><br>
              <input style="display:none;" type="button" name="clearLocalStorage" class="clearLocalStorage" value="Reset demo">
            </div>

        </div>
        <div class="panel-footer">
                Por Ennio Simões http://mechanicious.github.io/domenu/
        </div>
    </div>
</div>
@endsection
