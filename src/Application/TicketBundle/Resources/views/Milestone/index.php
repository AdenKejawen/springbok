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
    <a href="<?php echo $view->router->generate('tickets_per_milestone', array('milestone' => $milestone->id)) ?>">
      <?php echo $milestone->name; ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>