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

$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>
<ul>

  <?php foreach ($queue as $ticket) : ?>
  
  <li>
    <a href="<?php echo $view->router->generate('ticket_read', array('id' => $ticket->id)) ?>">
      <?php echo $ticket->title; ?>
    </a>
  </li>
  <?php endforeach ?>
  
</ul>