
<h1>Eliminar Relato</h1>

¿Está seguro de eliminar el siguiente relato?: <br/> <?php echo $datos_relato[0]->titulo ?><br/>


<?php

    $numRelato = array(
        'numRelato'     => set_value($datos_relato[0]->numRelato)

    )
?>
<br/>
<?php echo form_open()  ?>

<?php echo form_hidden('numRelato',$datos_relato[0]->numRelato)  ?>
<?php echo form_submit('bt_enviar','Si deseo Eliminarlo')  ?>



<?php echo form_close() ?>