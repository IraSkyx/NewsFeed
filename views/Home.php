<?php if(isset($allNews) && isset($nbNews)){ ?>

<!DOCTYPE html>

<html lang="fr">
  <?php include($rep.$contents['head']) ?>
  <body>

  <?php include($rep.$contents['header']) ?>

   <div class="container">

       <?php
        if(count($allNews)>0) {
          foreach ($allNews as $article)
            echo '
            <a href="'.$article['Link'].'">
              <div class="row shadow">
                <div style="width:100%">
                  <h3>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <time class="timeago" datetime="'.$article['PubDate'].'"></time>
                  </h3>
                </div>
                <div style="width:100%">
                  <h2>'.$article['Title'].'</h2>
                  <h3>'.$article['Description'].'</h3>
                </div>
              </div>
            </a>';

            if(Validation::AreSet(array($page,$limitMin,$limitMax))) {
              echo '<div class="row">
              <div class="col-md-6 offset-md-3 d-flex justify-content-center align-items-center">
                <h3>Page : </h3>';
              for ($i = ($page-$limitMin); $i < $page; $i++)
                 echo '<a href="index.php?page=' . $i . '"><h5>' . $i . '</h5></a> ';
              for ($i = $page ; $i <= ($page+$limitMax); $i++){
                if($i == $page)
                  echo '<a href="index.php?page=' . $i . '"><h5><strong>' . $i . '</strong></h5></a> ';
                else
                  echo '<a href="index.php?page=' . $i . '"><h5>' . $i . '</h5></a> ';
              }
              echo '</div>
              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <h3>Go to page : </h3>
                <form id="goToPage" class="form-inline my-2 my-lg-0" style="width:30%">
                  <input id="goToPageNb" class="form-control mr-sm-2" type="text" style="width:100%;margin:0.3em;">
                </form>
              </div>
              </div>';
            }
        }
        else
          echo '<div class="row justify-content-center"><h1>Aucun résultat pour votre recherche</h1></div>';
      ?>

   </div>

  <?php include($rep.$contents['scripts'])?>

  </body>
</html>

<?php }
else
  require_once($rep.$views['404']);?>
