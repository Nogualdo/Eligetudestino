<h1>NUEVO USUARIO</h1>


<br/><br/><br/>



<?php
    $input_nombre = array(
        'name'          => 'nombre',
        'id'            => 'nombre',
        'maxlength'     => '80',
        'size'          => '80',
        //'style'         => 'width:50%'
        'value'         => set_value('nombre'),   //set_value lo usaremos para repoblar el formulario en el caso de que salte un error de validacion
    );

    $input_pass = array(
        'name'          => 'password',
        'id'            => 'password',
        'maxlength'     => '100',
        'size'          => '100',
        //'style'         => 'width:50%'
        'value'         => set_value('password'),
    );

    $input_mail = array(
        'name'          => 'correo',
        'id'            => 'correo',
        'maxlength'     => '80',
        'size'          => '80',
        //'style'         => 'width:50%'
        'value'         => set_value('correo'),
    );

    $input_tipo = array(
        'A'          => 'ADMINSITADOR',
        'U'          => 'USUARIO',
    );


?>

<?php //echo validation_errors()  ?>
<?php echo form_open()  ?>

<?php echo form_label('Nombre','nombre')  ?>
<br/><br/>
<?php echo form_input($input_nombre)   ?> <?php echo form_error('nombre')   ?>
<br/><br/>

<?php echo form_label('Contraseña','password')  ?>
<br/><br/>
<?php echo form_input($input_pass)  ?> <?php echo form_error('password')   ?>
<br/><br/>

<?php echo form_label('Email','correo')  ?>
<br/><br/>
<?php echo form_input($input_mail)  ?> <?php echo form_error('correo')   ?>
<br/><br/>

<?php echo form_submit('bt_enviar','Guardar')  ?>



<?php echo form_close() ?>