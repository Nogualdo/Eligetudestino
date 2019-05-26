
<h1>
    LISTADO DE TUS RELATOS, elige uno para continuar
</h1>



<?php
if(empty($listado)){
    echo 'no has creado ningun relato todavía';
}else{
    echo 'hay relatos: ';
    echo count($listado);?>


<h2>TITULO DEL RELATO</h2>
    <?php foreach ($listado as $relato){?>
        <?php echo $relato->titulo?>
<a href="<?php echo base_url()?>index.php/capitulos/lista_capitulos/<?php echo $relato->numRelato?>"> Continuar </a>
-
<a href="<?php echo base_url()?>index.php/relatos/editar/<?php echo $relato->numRelato?>"> Editar </a>
-
<a href="<?php echo base_url()?>index.php/relatos/eliminar/<?php echo $relato->numRelato?>"> Eliminar </a>
<br/><br/>
    <?php          }}?>







