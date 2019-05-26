<?php


class Relatos extends CI_Controller
{


        public function __construct()
        {
            parent::__construct();
            session_start();
        }

    public function leer()
    {
        $this->load->helper('url');
        //$this->load->model('M_usuarios');
        //$data['listado'] = $this->M_usuarios->get_todos();
        //$this->load->view('vista_lista_usuarios', $data);
    }

    public function continuar_relato(){
        $this->load->helper('url');
        $this->load->helper('form');                //cargamos el helper del formulario de codeigniter
        $this->load->library('form_validation');    //cargamos la libreria de validaciones de codeigniter
        $data['listado'] = $this->load->model('M_relatos');
        $data['listado'] = $this->M_relatos->continuar_relato();
        $this->load->view('vista_lista_mis_relatos', $data);

    }

    public function editar($id = null){
            if($id == null OR !is_numeric($id)){
                echo 'falta ID o es erroneo';
            }


            $this->load->helper('url');
            $this->load->helper('form');                //cargamos el helper del formulario de codeigniter
            $this->load->library('form_validation');    //cargamos la libreria de validaciones de codeigniter
        $this->load->model('M_relatos');

        if($this->input->post()) {

            $this->form_validation->set_rules('titulo', 'TITULO', 'required|min_length[3]');   //3 parametros, el 1º es el nombre del campo, el 2º es el nombre que va a aparecer en el mensaje,
            // y el 3º es para poner las reglas que queremos que se cumplan en ese campo

            $this->form_validation->set_rules('descripcion', 'DESCRIPCIÓN', 'required');

            $this->form_validation->set_rules('codigo', 'CÓDIGO', 'required');

            if($this->form_validation->run() == TRUE){
                $this->M_relatos->edit($id);
                redirect('relatos/continuar_relato');   //volvemos a la pagina de continuar relatos, podemos apreciar los cambios hechos en el titulo.
            }else{
                $this->load->view('vista_crear_relato');
            }


        }else{
            $data['datos_relato'] = $this->M_relatos->get_by_id($id);

            if (empty($data['datos_relato'])){
                echo 'el id es inválido';
            }else{
                $this->load->view('vista_crear_relato',$data);


            }
        }

    }

    public function eliminar($id = null){
        if($id == null OR !is_numeric($id)){
            echo 'falta ID o es erroneo';
            return;
        }

        $this->load->helper('url');
        $this->load->helper('form');                //cargamos el helper del formulario de codeigniter
        $this->load->model('M_relatos');

        if($this->input->post()) {
            $id_eliminar = $this->input->post('numRelato');
            $this->M_relatos->eliminar($id_eliminar);
            redirect('relatos/continuar_relato');

        }else{
            $data['datos_relato'] = $this->M_relatos->get_by_id($id);

            if (empty($data['datos_relato'])){
                echo 'el id es inválido';
            }else{
                $this->load->view('vista_elim_relato',$data);
            }
        }










    }


    public function crear(){
        $this->load->helper('url');

        $this->load->helper('form');                //cargamos el helper del formulario de codeigniter
        $this->load->library('form_validation');    //cargamos la libreria de validaciones de codeigniter
        $this->load->model('M_relatos');

        if($this->input->post()){

            $this->form_validation->set_rules('titulo','TITULO','required|min_length[3]');   //3 parametros, el 1º es el nombre del campo, el 2º es el nombre que va a aparecer en el mensaje,
            // y el 3º es para poner las reglas que queremos que se cumplan en ese campo

            $this->form_validation->set_rules('descripcion','DESCRIPCIÓN','required');

            $this->form_validation->set_rules('codigo','CÓDIGO','required');

            //$this->form_validation->set_rules('','','trim');    //esta regla recorta los espacios en blanco al ppio y final, util para no meterlos en la bd por error

            if($this->form_validation->run() == TRUE){
                //echo 'INFORMACION RECIBIDA<br/>';
                //print_r($this->input->post());
                //echo 'la info esta ok';

                $id_insertado = $this->M_relatos->crear_relato();

                echo " Enhorabuena! has creado el relato nº ".$id_insertado;
                echo " YA PUEDES COMENZAR A ESCRIBIR CAPÍTULOS";
                //$this->load->view('vista_inicio_usuarios');
                //$this->load->view('welcome_message');



                //aqui, una vez creado el relato, le pasamos el id del relato al controlador capitulos, para empezar a escribir capitulos

                redirect(base_url().'index.php/capitulos/lista_capitulos/'.$id_insertado);

            }else{
                $this->load->view('vista_crear_relato');
            }
        }else{
            $this->load->view('vista_crear_relato');
        }
    }


}



/* fin de archivo: relatos.php*/