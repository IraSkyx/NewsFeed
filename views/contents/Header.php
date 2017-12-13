<header>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <a class="navbar-brand" href="index.php">News Feed</a>

   <div class="collapse navbar-collapse">
     <ul class="navbar-nav mr-auto">

       <?php
       if(isset($admin))
         echo '<li class="nav-item active">
                  <a class="nav-link" href="index.php?action=viewFlux">Add RSS</a>
              </li>';
       ?>

     </ul>
     <form class="form-inline my-2 my-lg-0" method="GET" action="index.php">
       <input type="hidden" name="action" value="search" />
       <input class="form-control mr-sm-2" id="search" name="keyWord" type="text" value="<?php echo isset($_GET['keyWord']) ? $_GET['keyWord'] : ''; ?>" placeholder="&#xf002; Search" style="font-family:Roboto, FontAwesome" >
     </form>

     <?php
     if(isset($admin))
       echo '<form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=logout">
                <h4>Welcome '.$admin->getUsername().'</h4>
                <button class="btn btn-outline-secondary my-2 my-sm-0">Log out</button>
             </form>';

     else
         echo '<form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=login">
                <button class="btn btn-outline-secondary my-2 my-sm-0">Log in</button>
              </form>';
     ?>

   </div>
 </nav>
</header>
