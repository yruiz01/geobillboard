<?php
class About extends Controller
{
    public function __construct() {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Sobre nosotros';
        $data['detail'] = 'Sobre nosotros';
        $data['active'] = 'about';
        $this->views->getView("about", $data);
    }
}
