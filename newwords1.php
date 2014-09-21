<?php
session_start();
?>
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
            <li>
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
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Your Language<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="#">EN</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">RU</a></li>
                <li><a href="#">UA</a></li>
              </ul>
            </li>
            <!--<li><a href="#" target="_blank">EN</a></li>
            <li><a href="#" target="_blank">IT</a></li>
            <li><a href="#" target="_blank">RU</a></li>
            <li><a href="#" target="_blank">UA</a></li>-->
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
          
 
          <div class="col-lg-12">
            <div class="well bs-component">
              <form class="form-horizontal">
                <fieldset>
                  
                  <div class="form-group">
                    <div class="col-lg-10">

							<!--Dictionary Table-->
   						 <?php 
   						     include("php/vars.php");
   						     include("php/latestdict.php"); 
   						 ?>
							<div class="bs-docs-section">
							
							  <div class="row">
							    <div class="col-lg-12">
							      <div class="page-header">
							        <h2 id="tables">New Words</h2>
							      </div>
							
							      <div class="bs-component">
							        <table class="table table-striped table-hover ">
							          <thead>
							            <tr>
							              <th>#</th>
							              <th>Column heading</th>
							              <th>Column heading</th>
							              <th>Column heading</th>
							            </tr>
							          </thead>
							          <tbody>
							            <tr>
							              <td>1</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr>
							              <td>2</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr class="info">
							              <td>3</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr class="success">
							              <td>4</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr class="danger">
							              <td>5</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr class="warning">
							              <td>6</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							            <tr class="active">
							              <td>7</td>
							              <td>Column content</td>
							              <td>Column content</td>
							              <td>Column content</td>
							            </tr>
							          </tbody>
							        </table> 
							      </div><!-- /example -->
							    </div>
							  </div>
							      </div>

                    </div>
                  </div>
                  
                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-lg-offset-1">

              

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

