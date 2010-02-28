<?php
/**
 * read.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      View
 */
?>

<a href="<?php echo $view->router->generate('milestone_index') ?>">
  Milestones
</a>

<h2><?php echo $milestone->name; ?></h2>
<?php echo $milestone->description; ?>

<h3>Tickets</h3>

<ul>

  <?php foreach($milestone->tickets as $ticket) : ?>
  <li>
    <?php echo $ticket->title; ?>
  </li>
  <?php endforeach; ?>
  
</ul>