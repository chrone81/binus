<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('JawabanModel');
        $this->load->model('DimensiModel');
        $this->load->model('KuesionerModel');
    }
    public function index(){
        $data['jwbdmn1']=$this->JawabanModel->getJawabanDimensi(1);
        $data['jwbdmn2']=$this->JawabanModel->getJawabanDimensi(2);
        $data['jwbdmn3']=$this->JawabanModel->getJawabanDimensi(3);
        $data['jwbdmn4']=$this->JawabanModel->getJawabanDimensi(4);
        $data['bbtdmn1']=$this->DimensiModel->getBobotDimensi(1);
        $data['bbtdmn2']=$this->DimensiModel->getBobotDimensi(2);
        $data['bbtdmn3']=$this->DimensiModel->getBobotDimensi(3);
        $data['bbtdmn4']=$this->DimensiModel->getBobotDimensi(4);
        $this->load->view('template',$data);
    }
    public function kuisioner(){
        $data['kuesioner']=$this->KuesionerModel->getKuisioner();
        $this->load->view('kuisioner',$data);
    }
}