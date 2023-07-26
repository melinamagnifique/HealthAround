<?php

$bdd = new PDO('mysql:host=localhost;dbname=healtharound;charset=utf8;', 'root', '');
$recupMessage = $bdd-> query('SELECT *FROM messages');
while($message = $recupMessage->fetch()){
    ?>
    
    <div class="message">
        <h4><?=$message['pseudo'];?></h4>
        <p><?= $message['message']; ?></p>
    </div>

    <?php
}

?>