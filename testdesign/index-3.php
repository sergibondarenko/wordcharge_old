
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WordCharge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <script>
		//Google Analytics Connection
     /*var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "wordcharge.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();*/

    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>

  </head>
  <body>
	<!--Top Navigation Bar-->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">WordCharge</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <?php include("php/header-1.php"); ?>
            <!--<li>
              <a href="index1.php">Home</a>
            </li>
            <li>
              <a href="newwords1.php">New Words</a>
            </li>
            <li>
              <a href="news1.php">News</a>
            </li>
            <li>
              <a href="books1.php">Books</a>
            </li>
            <li>
              <a href="about1.php">About</a>
            </li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Your Language<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <?php include_once("php/wrapper-languages-1.php"); ?>
                <!--<li><a href="#">EN</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">RU</a></li>
                <li><a href="#">UA</a></li>-->
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#">Sign up/in</a>
            </li>
			</ul>

        </div>
      </div>
    </div>
	<!--END of Top Navigation Bar-->


    <div class="container">
      
		<!--Custom Dictionary Form-->
      <div class="bs-docs-section">
        
        <div class="myEmpty-row">
        </div>

        <div class="row">
          <div class="col-lg-4 form-group">
            <label for="select" class="col-lg-2 control-label">Text language</label>
            <div class="col-lg-6">
              <select class="form-control" id="select">
                <option>Italian</option>
                <option>German</option>
                <option>French</option>
                <option>Spanish</option>
                <option>Russian</option>
                <option>Ukrainian</option>
              </select>
            </div>
          </div>
 
          <div class="col-lg-12">
            <div class="well bs-component">
              <form class="form-horizontal">
                <fieldset>
                  <!--<legend>Custom dictionary:</legend>-->
                  
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Text</label>

                    <!--Text area-->
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="9" id="textArea" placeholder="Paste your text here!"></textarea>
                    </div>
                    <!--END Text area-->

                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>

        </div>
      </div>
		<!--END of Custom Dictionary Form-->

		<!--Footer-->
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; 2014 <a href="#" rel="nofollow">Sergey Bondarenko</a>, all rights reserved. <a href="mailto:sergibondarenko@gmail.com">E-mail</a></p>
          </div>
        </div>

      </footer>
		<!--END of Footer-->

    </div>

  </body>
</html>

