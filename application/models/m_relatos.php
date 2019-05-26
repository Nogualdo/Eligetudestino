<?php

class M_relatos extends CI_Model {

    /*
    public function __construct()
    {
        parent::__construct();
    }
    */


    public function continuar_relato(){
            $this->load->database();

            $this->db->where('autor',$_SESSION["id"]);

            $q = $this->db->get('relatos');

            return $q->result();
        }


    public function get_by_id($id){
        $this->load->database();
        $query = $this->db->where('numRelato',$id);
        $query = $this->db->get('relatos');                 //get es como el from, es decir carga la tabla relatos

        return $query->result();

    }

    public function edit($id){
        $this->load->database();
        $datos_insertar = $this->input->post();
        unset($datos_insertar['bt_enviar']);    //le quitamos el boton enviar, pues no lo necesitamos para el insert de

        $this->db->where('numRelato',$id);
        $this->db->update('relatos',$datos_insertar);

    }

    public function eliminar($id){
        $this->load->database();

        //borramos primero todos los capitulos de ese relato
        $this->db->where('numRelato',$id);
        $this->db->delete('capitulos');

        //borramos finalmente el relato
        $this->db->where('numRelato',$id);
        $this->db->delete('relatos');

    }


    function crear_relato(){
        //echo 'vamos a guardar en bd';
        $this->load->database();

        $datos_insertar = $this->input->post();
        unset($datos_insertar['bt_enviar']);    //le quitamos el boton enviar, pues no lo necesitamos para el insert de

        //print_r($datos_insertar);
        $this->db->insert('relatos',$datos_insertar);

        //insertamos el relato en nuestra BD
        $id_relato = $this->db->insert_id();

        //tras crear el relato, insertamos el primer capitulo, pues todos los relatos constarán de al menos un capitulo
        $datos_primer_capitulo = array(
            "numRelato" => $id_relato,
            "texto" => 'CAPÍTULO 1:'
        );

        //print_r($datos_primer_capitulo);
        $this->db->insert('capitulos',$datos_primer_capitulo);

        return $id_relato;
    }
/*
    public function login(){
        $this->load->database();

        $password =  $_POST["password"];
        $correo =  $_POST["correo"];


        $this->db->where('correo',$correo);
        $this->db->where('password',$password);

        $q = $this->db->get('usuarios');

        return $q->result();
    }
*/


}



/*  Fin del archivo m_relatos.php*/