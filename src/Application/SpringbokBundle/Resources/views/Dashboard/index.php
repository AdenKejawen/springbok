<?php
/*
 * index.php
 *
 * index of the dashboard
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      View
 */

$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>

Dashboard \ò/

<?php $view->actions->output('TicketBundle:Ticket:queue'); ?>