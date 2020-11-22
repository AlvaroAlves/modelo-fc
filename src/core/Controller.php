<?php
include 'Request.php';
class Controller
{
    public $request;
 
    public function __construct()
    {
        $this->request = new Request;
    }

    public function view($arquivo, $data = [])
    {
        if (!is_null($data)) {
            foreach ($data as $var => $value) {
                ${$var} = $value;
            }
        }
        ob_start();
        include "../src/view/{$arquivo}.php";
        ob_flush();
    }

    public function pageNotFound()
    {
        $this->view('index');
    }
}