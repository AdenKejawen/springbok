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

<h2>Milestones</h2>

<ul class="milestones">

  <?php foreach($milestones as $milestone ) : ?>
  <li>
    
    <div class="name">
      <a href="<?php echo $view->router->generate('milestone_read', array('id' => $milestone->id)) ?>">
        <?php echo $milestone->name; ?>

        (<span class="comment-count"><?php echo count($milestone->tickets); ?></span>)
      </a>
    </div>

    <div class="description">
      <?php echo $milestone->description; ?>
    </div>
    
  </li>
  <?php endforeach ?>

</ul>