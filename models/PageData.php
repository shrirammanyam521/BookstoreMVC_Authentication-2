<?php

class PageData {
    public $title = "";
    public $content = "";
    public $css = "";
    public $embeddedStyle = "";
    //declare a new property for script elements   
    public $scriptElements = "";
    public $navigation = "";

    //declare a new method for adding Javascript files    
    public function addScript($src) {
        $this->scriptElements .= "<script src='$src'></script>";
    }

    public function addCSS($href) {
        $this->css .= "<link href='$href' rel='stylesheet' />";
    }

}
