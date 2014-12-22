

    <!-- Static navbar -->
<!--    <div class="navbar navbar-default navbar-static-top" role="navigation">-->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $langArray["projectName"]; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
						<?php include("php/header-1.php"); ?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
									id="themes"><?php echo $langArray["textLanguage"]; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <?php include_once("php/wrapper-languages-1.php"); ?>
              </ul>
            </li>
          </ul>
					<ul class="nav navbar-nav navbar-right">
						<li><?php include_once("php/wrapper-signup.php"); ?></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><?php include_once("php/wrapper-signin.php"); ?></li>
					</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

