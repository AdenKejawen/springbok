<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
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