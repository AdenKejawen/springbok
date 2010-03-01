<?php $view->extend('SpringbokBundle::layout'); ?>

<p>You are not authenticated. Trespassers may get troutslapped</p>
<img src="/bundles/GuardBundle/images/troutslapping.gif" alt="trout slapping in action" />

<p>No account? Create one!</p>

<?php echo $view->render('GuardBundle:Guard:_signup_form'); ?>

<p>You can still login, to avoid the trouts</p>

<?php echo $view->render('GuardBundle:Guard:_login_form'); ?>
