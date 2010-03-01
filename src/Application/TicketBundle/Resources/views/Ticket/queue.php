<?php
/**
 * queue.php
 *
 * the current user's queue of tickets
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      View
 */

//$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>
<ul>

  <?php foreach ($queue as $ticket) : ?>
  
  <li class="ticket">
    <a href="<?php echo $view->router->generate('ticket_read', array('id' => $ticket->id)) ?>">
      
      <span class="title"><?php echo $ticket->title; ?></span>
      -
      <span class="comment-count"><?php echo count($ticket->comments); ?></span>

    </a>
  </li>
  <?php endforeach ?>
  
</ul>