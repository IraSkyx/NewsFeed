<!DOCTYPE html>
<html>
<?php include($rep.$contents['head']); ?>
<body>
  <div class="container align-items-center">
      <div class="row">
          <div class="col-md-12">
              <div class="error-template justify-content-center" style="text-align:center;">
                  <h1>
                      Oups !</h1>
                  <h2 style="text-align:center;">
                      404 Page introuvable</h2>
                  <div class="error-details">
                      Désolé, une erreur s'est produite, la page demandée n'a pas été trouvée !
                  </div>
                  <div class="error-actions">
                      <a href="<?php $rep.$views['home'] ?>" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home"></span>
                          Retour à l'accueil </a>
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
