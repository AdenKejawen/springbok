<?php
/**
 * index.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      View
 */

$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>
<ul>
  <?php foreach($milestones as $milestone ) : ?>
  <li>
    <?php echo $milestone->name; ?>
  </li>
  <?php endforeach ?>
</ul>