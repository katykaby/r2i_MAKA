<?php
class Projets extends CI_Controller{
 public function __construct()
 {

  parent::__construct();
  $this->load->model('Projet_model');
  $this->load->library('form_validation');
}
public function index()
{
  $data['villes'] = $this->Projet_model->get_villes();
  $data['nros'] = $this->Projet_model->get_nros();
  $data['tsos'] = $this->Projet_model->get_type_site_origine();
  $data['esos'] = $this->Projet_model->get_etat_site_origine();
    $data['title'] = 'Liste des projets'; // Capitalize the first letter
    $data['projet'] = $this->projet_model->get_projets();
        //print_r($data['projet']);

        //$this->load->view('template/header');
    $this->load->view('projets/index', $data);
        //$this->load->view('template/footer');


  }
  public function ajouter_projet()
  {
    $data['villes'] = $this->Projet_model->get_villes();
    $data['nros'] = $this->Projet_model->get_nros();
    $data['tsos'] = $this->Projet_model->get_type_site_origine();
    $data['esos'] = $this->Projet_model->get_etat_site_origine();
    $this->load->view('projets/ajouter_projet',$data);


  }


  public function insert(){
  $id_nro=$this->input->post('id_nro');
  $id_select_ville=$this->input->post('dep');
  $nom_ville=$this->Projet_model->get_nom_ville($id_select_ville);
  $lib_nro=$this->Projet_model->get_libnro($id_nro);
/* var_dump($nom_ville);
 die();*/
   $data = array(
    //'ville' => $this->input->post('ville'),
    'projet_nom' =>'Plaque-PON-FTTH-'. $lib_nro[0]->lib_nro."-".$nom_ville[0]->nom_ville,
    
    //'id_select_ville' => $this->input->post('ville'),
    'id_select_ville ' => $id_select_ville,
    'id_nro' => $id_nro,
    'id_site_origine_type' => $this->input->post('type_site_origine'),
    'taille' => $this->input->post('taille'),
    'id_site_origine_etat' => $this->input->post('etat_site_origine'),
    'date_mad_site_origine' => $this->input->post('date_mad_site_origine'),
    'trigram_depart'=> $this->input->post('trigramme_dept'),
    'date_creation'=> date("Y/m/d")
    );

               if($this->Projet_model->insert($data)){


                  $data['message'] = 'Data Inserted Successfully';

                $this->load->view('projets/index', $data);
                 }else{  //$data['message'] = 'Data not Inserted ';


                   $this->load->view('projets/index', $data);
               }

}



}




?>