<?php
$config['pagename'] = 'Main Page';
require('./lib/config.php');
?>
<!doctype html>
<html lang="en">
  <?php
  include('./inc/head.phtml');
  ?>
  <body>
    <?php
    include('./inc/header.phtml');
    ?>
    <main role="main" class="container">

      <div class="starter-template">
        <h1>Bootstrap PHP starter template</h1>
        <p class="lead"></p>
      </div>

    </main>
    <!-- /.container -->
    
    <?php
    include('./inc/footer.phtml');
    ?>
    </body>
</html>