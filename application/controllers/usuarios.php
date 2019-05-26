<?php


    class Usuarios extends CI_Controller {


        public function __construct()
        {
            parent::__construct();
            session_start();
        }

        public function index()
        {
            $this->load->helper('url');
            $this->load->model('M_usuarios');
            $data['listado'] = $this->M_usuarios->get_todos();
            $this->load->view('vista_lista_usuarios', $data);
        }


        public function agregar(){
            //para entrar a la funcion basta con poner en la url el controlador+/nombre de funcion
            //echo 'esta es la funcion de agregar';

            $this->load->helper('form');                //cargamos el helper del formulario de codeigniter
            $this->load->library('form_validation');    //cargamos la libreria de validaciones de codeigniter
            $this->load->model('M_usuarios');


            if($this->input->post()){

                $this->form_validation->set_rules('nombre','NOMBRE','required|min_length[3]');   //3 parametros, el 1º es el nombre del campo, el 2º es el nombre que va a aparecer en el mensaje,
                // y el 3º es para poner las reglas que queremos que se cumplan en ese campo

                $this->form_validation->set_rules('password','CONTRASEÑA','required');

                $this->form_validation->set_rules('correo','CORREO ELECTRÓNICO','required|valid_email');

                //$this->form_validation->set_rules('','','trim');    //esta regla recorta los espacios en blanco al ppio y final, util para no meterlos en la bd por error

                if($this->form_validation->run() == TRUE){
                    //echo 'INFORMACION RECIBIDA<br/>';
                    //print_r($this->input->post());
                    //echo 'la info esta ok';

                    $id_insertado = $this->M_usuarios->add();

                    echo " Enhorabuena! eres el usuario nº ".$id_insertado;
                    echo " Ya puedes hacer login y disfrutar de toda la funcionalidad de la web";
                    $this->load->view('vista_inicio_usuarios');
                    //$this->load->view('welcome_message');

                }else{
                    $this->load->view('vista_form_usuarios');
                }

            }else{
                $this->load->view('vista_form_usuarios');
            }

        }

        public function cerrar_sesion(){
            session_destroy();
            $this->load->helper('url');
            $this->load->view('welcome_message');
        }

        public function iniciar(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['listado'] = $this->load->model('M_usuarios');

            //OJO POR HACER
            if($this->input->post()){
                $this->form_validation->set_rules('correo','CORREO ELECTRÓNICO','required|valid_email');

                if($this->form_validation->run() == TRUE){
                   // echo 'DATOS OK, tienes que ver si existe en la bd<br/>';

                    $data = $this->M_usuarios->login();

                    if(empty($data)){
                        $credenciales = 'El correo o la contraseña son erroneos, por favor, introducelos de nuevo';
                        $this->load->view('vista_inicio_usuarios', compact("credenciales"));


                    }else{
                       // print_r($data); //datos del usuario

                        foreach ($data as $usuario){
                            $nombre = $usuario->nombre;
                            $perfil = $usuario->tipo;
                            $id = $usuario->numUsuario;
                        }
                        //creamos la sesion
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["tipo"] = $perfil;
                        $_SESSION["id"] = $id;

                        $this->load->helper('url');
                        $this->load->view('welcome_message');

                    }

                }else{

                    $this->load->view('vista_inicio_usuarios');
                }

            }else{
                $this->load->view('vista_inicio_usuarios');
            }
        }
    }




    /* fin de archivo: usuarios.php*/