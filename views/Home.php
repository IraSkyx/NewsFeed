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
            <a target="blank" href="'.$article->getLink().'">
              <div class="row shadow">
                <div style="width:100%">
                  <h3>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <time class="timeago" datetime="'.$article->getPubDate().'"></time>
                  </h3>
                </div>
                <div style="width:100%">
                  <h2>'.$article->getTitle().'</h2>
                  <h3>'.$article->getDescription().'</h3>
                </div>
              </div>
            </a>';

            if(Validation::AreSet(array($page,$limitMin,$limitMax))) {
              echo '<div class="row">';
              if(isset($count))
                echo '
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                  <h3> Visit count : '.$count.'</h3>
                </div>';

              echo '<div class="col-md-6 ';if(!isset($count)) echo 'offset-md-3 '; echo 'd-flex justify-content-center align-items-center">
                <h3>Page : </h3>';
              for ($i = ($page-$limitMin); $i < $page; $i++)
                 echo '<a href="index.php?'.$request.'page=' . $i . '"><h5>' . $i . '</h5></a> ';
              for ($i = $page ; $i <= ($page+$limitMax); $i++){
                if($i == $page)
                  echo '<a href="index.php?'.$request.'page=' . $i . '"><h5><strong>' . $i . '</strong></h5></a> ';
                else
                  echo '<a href="index.php?'.$request.'page=' . $i . '"><h5>' . $i . '</h5></a> ';
              }
              echo '</div>
              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <h3>Go to page : </h3>
                <form id="goToPage" class="form-inline my-2 my-lg-0" style="width:30%">
                  <input id="request" type="hidden" value="'.$request.'" />
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
