<?php

    class M_usuarios extends CI_Model {

        /*
        public function __construct()
        {
            parent::__construct();
        }
        */


        function get_todos(){

            $this->load->database();                //carga la base de datos
            $query = $this->db->get('usuarios');     //get es como el from, es decir carga la tabla usuarios

            return $query->result();



        }

        function add(){
            //echo 'vamos a guardar en bd';
            $this->load->database();


            $datos_insertar = $this->input->post();
            unset($datos_insertar['bt_enviar']);    //le quitamos el boton enviar, pues no lo necesitamos para el insert de sql

            $this->db->insert('usuarios',$datos_insertar);

            return $this->db->insert_id();

        }

        public function login(){
            $this->load->database();

            $password =  $_POST["password"];
            $correo =  $_POST["correo"];


            $this->db->where('correo',$correo);
            $this->db->where('password',$password);

            $q = $this->db->get('usuarios');

            return $q->result();
        }



    }



    /*  Fin del archivo m_usuarios*/