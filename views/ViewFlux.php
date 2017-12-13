<?php if(isset($allFlux)){ ?>

<!DOCTYPE html>

<html lang="fr">
  <?php include($rep.$contents['head']) ?>
  <body>

  <?php include($rep.$contents['header']) ?>

   <div class="container">
     <?php if(isset($exists) && $exists) echo '<div class="alert alert-danger">Flux already in the database !</div>'; ?>
     <div class="table-responsive">
         <table class="table table-striped">
           <thead>
             <tr>
               <th>Name</th>
               <th>Link</th>
               <th>Add/Modify/Delete</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=addFlux">
                 <td><input class="form-control mr-sm-2" name="name" type="text"></td>
                 <td><input class="form-control mr-sm-2" name="link" type="text"></td>
                 <td><input class="form-control mr-sm-2" type="submit" value="&#xf00c;" style="font-family:Roboto, FontAwesome"/></td>
               </form>
             </tr>

           <?php
            if(count($allFlux)>0){
              foreach ($allFlux as $flux)
              echo '<tr>
                      <form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=updateFlux">
                        <td><input class="form-control mr-sm-2" name="name" value="'.$flux['name'].'" type="text"></td>
                        <td><input class="form-control mr-sm-2" name="name" value="'.$flux['link'].'" type="text"></td>
                        <td><input class="form-control mr-sm-2" name="name" type="submit"></td>
                        <td class="d-flex justify-content-center"><a href="index.php?action=deleteFlux&link='. $flux['link'] .'"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
                      </form>
                    </tr>';
            }
            else
              echo '<div class="row justify-content-center"><h1>Aucun flux</h1></div>';
          ?>
        </tbody>
      </table>
  </div>

   </div>

  <?php include($rep.$contents['scripts'])?>

  </body>
</html>

<?php }
else
  require_once($rep.$views['404']);?>
