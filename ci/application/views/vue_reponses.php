<?=validation_errors(); ?>
<?php
echo "<h1>Répondre à un sondage</h1>";
echo "<h3>".$array[0][0]['titre']."</h3>";
echo $array[0][0]['descriptif'];
print_r('<br/>');
echo $array[0][0]['createur'];
print_r('<br/>');
echo $array[0][0]['open'];
print_r('<br/>');
?>
<?=form_open('reponses/rep')?>



