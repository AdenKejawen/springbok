<?php
/**
 * read.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      View
 */

$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>

<div class="milestone">

  <div class="content">
    <h2><?php echo $milestone->name; ?></h2>
    
    <?php echo $milestone->description; ?>

  </div>
  
  <div class="tickets">
    <h2>Tickets (<?php echo count($milestone->tickets); ?>)</h2>
    
    <ul>

      <?php foreach($milestone->tickets as $ticket) : ?>
      <li>
        <a href="<?php echo $view->router->generate('ticket_read', array('id' => $ticket->id)) ?>">
          <?php echo $ticket->title; ?>
        </a>
      </li>
      <?php endforeach; ?>

    </ul>
  </div>
  
</div>