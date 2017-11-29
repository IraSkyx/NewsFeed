<?php if(isset($allNews) && isset($nbNews)){?>

<!DOCTYPE html>

<html lang="fr">
  <?php include($rep.$contents['head']) ?>
  <body>

    <?php include($rep.$contents['header']) ?>

   <div class="container">

       <?php
        if(count($allNews)>0){
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

            /*echo'<div class="row justify-content-center">';
            if($page>1)
               echo '<a class="numPage" href="index.php?page=' . ($page-1) .'"><</a>';
            echo '<a class="numPage" href="index.php?page='.$page.'">'.$page.'</a>';
            if($page<$nbNews-1)
               echo '<a class="numPage" href="index.php?page='. ($page+1) .'">></a>';
            echo '</div>';*/
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
