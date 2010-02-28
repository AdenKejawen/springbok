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
<div class="project">
  <div class="content">
    <h2>Project shit goes here</h2>
    lalalalalalalala
    <h3>Some Info</h3>
    blah
  </div>

  <div class="milestones">
    <h2>Milestones</h2>

    <ul>

      <?php foreach($milestones as $milestone ) : ?>
      <li>

        <div class="name">
          <a href="<?php echo $view->router->generate('milestone_read', array('id' => $milestone->id)) ?>">
            <?php echo $milestone->name; ?> - <?php echo $milestone->id ?>
            
            (<span class="comment-count"><?php echo count($milestone->tickets); ?></span>)
          </a>
        </div>

        <div class="description">
          <?php echo $milestone->description; ?>
        </div>

      </li>
      <?php endforeach ?>

    </ul>
  </div>
  
</div>