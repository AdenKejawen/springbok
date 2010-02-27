<?php
/**
 * layout.php
 *
 * main layout for the application
 *
 * @category      Springbok
 * @package       SpringbokBundle
 * @subpackage    View
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Springbok</title>
  </head>

  <body>
    <?php $view->slots->output('_content') ?>
  </body>
  
</html>