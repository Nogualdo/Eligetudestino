<?php

class M_capitulos extends CI_Model {

    /*
    public function __construct()
    {
        parent::__construct();
    }
    */


        function capitulos_de_relato($id_relato){
            echo 'vamos a ver los capitulos del relato '.$id_relato;

            $this->load->database();
            $this->db->where('numRelato',$id_relato);

            $q = $this->db->get('capitulos');

            return $q->result();

        }


    function crear_capitulo(){


    }




}



/*  Fin del archivo m_relatos.php*/