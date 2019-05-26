<!--en esta vista tenemos los capitulos de determinado relato-->
<h1>
    LISTADO DE CAPITULOS
</h1>



<?php
            if(empty($listado)){
                echo 'no hay capitulos de ese relato';
            }else{
                echo 'hay estos capitulos en el relato';
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

//echo $id_insertado;



            ?>


<!--<br/><br/>-->
<!--<a href="--><?php //echo base_url()?><!--index.php/usuarios/agregar">REGISTRARSE</a>-->
<!---->
<!--<br/><br/>-->
<!--<a href="--><?php //echo base_url()?><!--index.php/usuarios/iniciar">LOGUEARSE</a>-->