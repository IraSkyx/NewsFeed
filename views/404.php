<!DOCTYPE html>
<html>
<?php include($rep.$contents['head']); ?>
<body>
  <div class="container align-items-center">
      <div class="row">
          <div class="col-md-12">
              <div class="error-template justify-content-center" style="text-align:center;">
                  <h1>
                      Oops !</h1>
                  <h2 style="text-align:center;">
                      404 Not Found</h2>
                  <div class="error-details">
                      Sorry, an error has occured , the requested page could not be found !
                  </div>
                  <div class="error-actions">
                      <a href="index.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home"></span>
                          Back to Home </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php
    include($rep.$contents['scripts']);
  ?>
</body>
</html>
