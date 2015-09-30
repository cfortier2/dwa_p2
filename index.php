<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>xkcd style password generator</title>

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Bootstrap from http://getbootstrap.com/getting-started/#download -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <?php require 'logic.php'; ?>
  </head>
  <body>
<pre>
    <?php print_r($_POST); ?>
</pre>
    <div class="container-fluid">
        <div class="center">
          <!-- header -->
          <h1>xkcd Password Generator</h1>

          <!-- entry form -->
        <div class="main">
          <form method='POST' action='index.php'>
            <div class="form-group">
              <label for="numberOfWords">Number of words (max: 9)</label>
              <select class="form-control" id="numberOfWords" name="numberOfWords">
                <?php
                $max = 9;
                $numberOfWords = ($_POST['numberOfWords'] ?: 4);
                for($i =1; $i <= $max; $i++) {
                  if ($i != $numberOfWords) {
                    echo '<option>' . $i . '</option>';
                  } else {
                    echo '<option selected="selected">' . $i . '</option>';
                  }
                };?>
              </select>
            </div>
            <div class="checkbox">
              <label>
                <?php
                  $includeNumber = ($_POST['includeNumber'] ? true : false);
                  if ($includeNumber) {
                    echo '<input type="checkbox" name="includeNumber" checked> Include a number?';
                  } else {
                    echo '<input type="checkbox" name="includeNumber"> Include a number?';
                  }
                ?>
              </label>
            </div>
            <div class="checkbox">
              <label>
                <?php
                  $includeSymbol = ($_POST['includeSymbol'] ? true : false);
                  if ($includeSymbol) {
                    echo '<input type="checkbox" name="includeSymbol" checked> Include special symbols?';
                  } else {
                    echo '<input type="checkbox" name="includeSymbol"> Include special symbols?';
                  }
                ?>
              </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>

          <hr>
          <table class="table">
            <thead>
              <tr class="bg">
                <th class="center"><h1>Generated Password:</h1></th>
              </tr>
            </thead>
            <tbody>
              <tr class="success">
                <td><?php echo generate_password($numberOfWords, "-", $includeNumber, $includeSymbol) ?></td>
              </tr>
            </tbody>
          </table>
          <hr>

        </div> <!-- /main -->

          <!-- image -->
          <hr>
          <h1>xkcd Password Generator Explanation:</h1>
          <img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png'>
        </div>
    </div>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>
