
<h1>
    LISTADO DE USUARIOS  v1
</h1>



<?php
            if(empty($listado)){
                echo 'no hay usuarios en la bd';
            }else{
                echo 'hay usuarios en la bd';
                echo count($listado);


               // print_r($listado);
/*
                foreach ($listado as $usuario){
                    echo $usuario->nombre;
                    echo $usuario->perfil;
                    echo $usuario->correo;
                }
*/


            }



            ?>


<br/><br/>
<a href="<?php echo base_url()?>index.php/usuarios/agregar">REGISTRARSE</a>

<br/><br/>
<a href="<?php echo base_url()?>index.php/usuarios/iniciar">LOGUEARSE</a>