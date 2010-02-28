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
?>
<ul>

  <?php foreach ($queue as $ticket) : ?>
  <li>
    <?php echo $ticket->title; ?>
  </li>
  <?php endforeach ?>
  
</ul>