<header>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <a class="navbar-brand" href="index.php">News Feed</a>

   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
     <ul class="navbar-nav mr-auto">

       <li class="nav-item active">
         <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
       </li>

     </ul>
     <form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=search">
       <input class="form-control mr-sm-2" name="keyWord" type="text" placeholder="Search">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
   </div>
 </nav>
</header>
