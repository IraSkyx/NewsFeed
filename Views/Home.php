<!DOCTYPE html>

<html lang="fr">
  <?php include($rep.$contents['head']) ?>
  <body>

    <?php include($rep.$contents['header']) ?>

   <div class="container">

       <?php foreach ($allNews as $article)
         echo '<a href="'.$article['Link'].'"><div class="row shadow"><div><h3><i class="fa fa-clock-o" aria-hidden="true"></i><time class="timeago" datetime="'.$article['PubDate'].'"></time></h3><div><h2>'.$article['Title'].'</h2><h3>'.$article['Description'].'</h3></div></a>';
       ?>

   </div>

  <?php include($rep.$contents['scripts'])?>

  </body>
</html>
