<?php if(isset($allNews) && isset($nbNews)){ ?>

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
            $nbNewsPerPage=5;
            $nbPageAfterCurrent=5;

            $limitMin= $page-$nbPageAfterCurrent <= 0 ? $page-1 : $nbPageAfterCurrent;
            $limitMax= $page+$nbPageAfterCurrent > ceil($nbNews / $nbNewsPerPage) ? (ceil($nbNews / $nbNewsPerPage)-$page) : $nbPageAfterCurrent;
            echo '<div class="row justify-content-center">
                  <h3>Page : </h3>';
            for ($i = ($page-$limitMin); $i < $page; $i++)
               echo '<a href="index.php?page=' . $i . '"><h5>' . $i . '</h5></a> ';
            for ($i = $page ; $i <= ($page+$limitMax); $i++){
              if($i == $page)
                echo '<a href="index.php?page=' . $i . '"><h5><strong>' . $i . '</strong></h5></a> ';
              else
                echo '<a href="index.php?page=' . $i . '"><h5>' . $i . '</h5></a> ';
            }
            echo '</div>';
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
