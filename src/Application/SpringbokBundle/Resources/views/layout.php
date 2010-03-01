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

    <link href="/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="/css/springbok.css" rel="stylesheet" type="text/css" />
    
  </head>

  <body>

    <div id="all">

      <div id="top">
        <h1>
          <a href="<?php echo $view->router->generate('homepage') ?>">
            Springbok
          </a>
        </h1>

        <div id="nav">

          <div class="username">
            Naneau
          </div>

          <ul>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Blah</a></li>
            <li><a href="#">Queue</a></li>
          </ul>

          <div class="logout">
            <a href="#">
              logout
            </a>
          </div>

        </div>
      </div>
      
      <div id="content">
        <?php $view->slots->output('_content') ?>
      </div>
      
    </div>

  </body>
  
</html>