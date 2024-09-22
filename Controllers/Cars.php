<?php
class Cars extends Controller
{
    public function __construct() {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['active'] = 'cars';
        $data['title'] = 'VALLAS';
        $data['detail'] = 'Elige tu Valla';
        $data['vehiculos'] = $this->model->getVehiculos(0);
        $this->views->getView("cars", $data);
    }

    public function single($valor)
    {
        $id = $valor;
        $data['active'] = 'cars';
        $data['vehiculo'] = $this->model->getVehiculo($id);
        $data['title'] = 'Detalle';
        $data['detail'] = $data['vehiculo']['tipo'];
        $this->views->getView("car-single", $data);
    }
}
