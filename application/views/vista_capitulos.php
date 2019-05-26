<h1>
    CREAR RELATO
</h1>



<br/><br/><br/>



<?php
$input_titulo = array(
    'name'          => 'titulo',
    'id'            => 'titulo',
    'maxlength'     => '100',
    'size'          => '100',
    //'style'         => 'width:50%'
    'value'         => set_value('nombre'),   //set_value lo usaremos para repoblar el formulario en el caso de que salte un error de validacion
);

$input_descripcion = array(
    'name'          => 'descripcion',
    'id'            => 'descripcion',
    'maxlength'     => '100',
    'size'          => '100',
    //'style'         => 'width:50%'
    'value'         => set_value('descripcion'),
);

$input_codigo = array(
    'name'          => 'codigo',
    'id'            => 'codigo',
    'maxlength'     => '6',
    'size'          => '6',
    //'style'         => 'width:50%'
    'value'         => set_value('codigo'),


);

$input_autor = array(
    'name'          => 'autor',
    'id'            => 'autor',
    'maxlength'     => '6',
    'size'          => '6',
    //'style'         => 'width:50%'
    'value'         => $_SESSION["id"],
);

?>

<?php //echo validation_errors()  ?>
<?php
if(isset($_SESSION["nombre"])) {
    $nombre = $_SESSION["nombre"];
}

    echo $nombre.' ¿cual va a ser tu relato?';
echo form_open()  ?>

<?php echo form_label('Título del Relato','titulo')  ?>
<br/><br/>
<?php echo form_input($input_titulo)   ?> <?php echo form_error('titulo')   ?>
<br/><br/>



<?php echo form_label('Descripción','descripcion')  ?>
<br/><br/>
<?php echo form_input($input_descripcion)  ?> <?php echo form_error('descripcion')   ?>
<br/><br/>


<?php echo form_label('Codigo','codigo')  ?>
<br/><br/>
<?php echo form_input($input_codigo)  ?> <?php echo form_error('codigo')   ?>
<br/><br/>


<?php echo form_label('ID','autor')  ?>
<br/><br/>
<?php echo form_input($input_autor)  ?> <?php echo form_error('autor')   ?>
<br/><br/>



<?php echo form_submit('bt_enviar','CREAR RELATO')  ?>



<?php echo form_close() ?>