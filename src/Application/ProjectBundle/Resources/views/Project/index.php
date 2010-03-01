<?php
/**
 * index.php
 *
 * index for projects
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      View
 */

?>
<ul>

  <?php foreach($projects as $project) : ?>
  <li>
    <?php echo $project->name; ?>
  </li>
  <?php endforeach; ?>

</ul>