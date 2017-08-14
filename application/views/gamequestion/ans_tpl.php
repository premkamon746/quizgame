<?php $i=1;?>

<?php if(isset($answer)) :?>
<?php foreach ($answer as $ans) : ?>
      <?php require("ans_block_tpl.php"); ?>
<?php $i++; ?>
<?php endforeach ?>
<?php endif?>

<?php $ans = array();?>
<?php $count = $r+$i; ?>
<?php for ($i;$i < $count; $i++) : ?>
      <?php require("ans_block_tpl.php"); ?>
<?php endfor ?>
