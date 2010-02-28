<?php
/**
 * read.php
 *
 * @category      Springbok
 * @package       SpringbokBundle
 * @subpackage    View
 */

?>

<div class="ticket" id="ticket-<?php echo $ticket->id; ?>">

  <h2><?php echo $ticket->title; ?></h2>

  <?php echo $ticket->description; ?>

  <div class="reporter">
    <h3>Reported by</h3>
    <?php echo $ticket->reporterName; ?>
  </div>

  <div class="assignees">
    <h3>Assigned to</h3>
    <span>
      <?php echo implode(', ', $ticket->assignedTo->getRawValue()); ?>
    </span>
  </div>

  <div class="tags">
    <h3>Tags</h3>
    <span>
      <?php echo implode(', ', $ticket->tags->getRawValue()); ?>
    </span>
  </div>

</div>