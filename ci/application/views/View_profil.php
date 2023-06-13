<?=validation_errors(); ?>

<?php

    echo "<h1>".$this->session->logged['login']."</h1>";
?>
    <?=anchor('/sondage/create',"Créer un sondage",['role'=>'button'])?>
    <br/><br/><br/>
<?php
    foreach($infos as $data){
        echo "<h4>".$data['titre']." --> <a href=\"../consulter/regarder?cle=".$data['cleSondage']."\"<button type=\"button\">Consulter</button></a></h4><br/><br/>";
    }

?>