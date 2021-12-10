<?php
namespace Controller;


class BaseController
{
    protected $folder;

    public function __construct(){

    }

    public function render($file, $data = array()){
        extract($data);
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';
        require_once($view_file);
    }
}