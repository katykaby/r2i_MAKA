<?php

  class Projet_model extends CI_Model {
     public function __construct(){
     	//load the data from the database
     	$this->load->database();
     }

     public function get_projets(){
     
       //select all the project from the database     
        $query = $this->db->get('projet');
        return $query->result_array();
     }

       public function get_villes(){
         $query = $this->db->get('select_ville');
         return $query->result();

     }
      public function get_nros(){
          $query = $this->db->get('nro');
          return $query->result();

      }
  public function get_nom_ville($id_ville){
         $query = $this->db->get_where('select_ville',array('code_ville' => $id_ville));
         return $query->result();

     }    
 public function get_libnro($id_nro){
         
          $query =$this->db->get_where('nro',array('id_nro' => $id_nro));
          return $query->result();

      }

      public function get_type_site_origine(){
          $query = $this->db->get('select_site_origine_type');
          return $query->result();

      }
      public function get_etat_site_origine(){
          $query = $this->db->get('select_site_origine_etat');
          return $query->result();

      }

     public function num_rows(){
      $query = $this->db
                          ->select(['projet_nom','date_creation','date_attribution'])
                          ->from ('projet')
                          ->get();
        return $query->num_rows(); 

     }
  public function insert($data){

        return  $this->db->insert('projet',$data);
     }

 }

 ?>