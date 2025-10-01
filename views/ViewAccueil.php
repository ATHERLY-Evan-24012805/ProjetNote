<?php 
foreach($notes as $note): ?>
<h2><?php echo $note->getTitre(), $note->getContenue()?></h2>
<?php endforeach;?>