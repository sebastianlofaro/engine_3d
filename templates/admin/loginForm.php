<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
  <link rel="stylesheet" href="styles/css/style.css">
  <title>Engine 3D</title>
</head>
<body class="login">

<div class="login-wrapper">
  <form class="" action="admin.php?action=login" method="post">
    <input type="hidden" name="login" value="true">
    <?php // FIXME: Make sure this is the correct targeting ($results['errorMessage'])?>
    <?php if (isset($results['errorMessage'])) {?>
      <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>
    <div class="content">
      <div class="login-wrapper">
        <div class="login-container">
          <div class="bezel-shadow">
            <img class="logo" src="img/logo.png" alt="">
            <div class="form-fields">
              <div class="inputs">
                <input type="text" name="username" value="" placeholder="username">
                <input type="text" name="password" value="" placeholder="password">
              </div>
              <input class="submit-btn" type="submit" name="login-btn" value="LOGIN">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
