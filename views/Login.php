<!DOCTYPE html>
<html lang="en">

  <?php include($rep.$contents['head']) ?>

  <body>

    <?php include($rep.$contents['header']) ?>

    <div class="container" style="padding-top: 5rem;">

      <form class="form-signin" method="post" action="index.php?action=signin">

        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="inputUsername" class="form-control inputMargin" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" class="form-control inputMargin" placeholder="Password" required>

        <?php if(isset($wrong) && $wrong) echo '<div class="alert alert-danger">Wrong username or password !</div>'; ?>

        <button class="btn btn-lg btn-outline-secondary btn-block" type="submit">Sign in</button>

      </form>

    </div>

    <?php include($rep.$contents['scripts'])?>

  </body>
</html>
