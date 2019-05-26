<h1>INICIAR SESSIÓN</h1>


<br/><br/><br/>



<?php

    $input_pass = array(
        'name'          => 'password',
        'id'            => 'password',
        'maxlength'     => '100',
        'size'          => '100',
        //'style'         => 'width:50%'
        //'value'         => set_value('password'),
    );

    $input_mail = array(
        'name'          => 'correo',
        'id'            => 'correo',
        'maxlength'     => '80',
        'size'          => '80',
        //'style'         => 'width:50%'
        //'value'         => set_value('correo'),
    );


?>

<?php //echo validation_errors()  ?>
<?php echo form_open()  ?>

<?php echo form_label('Email','correo')  ?>
<br/><br/>
<?php echo form_input($input_mail)  ?> <?php echo form_error('correo')   ?>
<br/><br/><br/><br/>
<?php echo form_label('Contraseña','password')  ?>
<br/><br/>
<?php echo form_input($input_pass)  ?> <?php echo form_error('password')   ?>
<?php if(isset($credenciales)){
    echo'<br/>';
    echo $credenciales;
} ?>
<br/><br/>
<?php echo form_submit('bt_enviar','Iniciar Sesión')  ?>

<?php echo form_close() ?>

