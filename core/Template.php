<?php

namespace core;

use Exception;

class Template {
    protected $path;
    protected $params;

    public function __construct($path) {
        $this->path = $path;
        $this->params = [];
    }

    public function addParam($field, $value){
        $this->params[$field] = $value;
    }

    public function addParams($params){
        $this->params = array_merge($this->params, $params);
    }

    public function getHTML(){
        if (!is_file($this->path)) {
            throw new Exception("Not found", 404);
        }
        ob_start();
        extract($this->params);
        include($this->path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

}