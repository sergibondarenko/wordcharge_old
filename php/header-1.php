<li id="indexMenu"><a id="indexManu" href="index.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["textHome"]; ?></a></li>
<li id="newwordsMenu"><a href="newwords-1.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["textNewwords"]; ?></a></li> 
<!--<li id="flashwordsMenu"><a href="flashwords.php?myLang=<?php //echo $myLang; ?>"><?php //echo $langArray["WordsTestMenu"]; ?></a></li>-->
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $langArray["WordGames"]; ?> <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="flashwords.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["WordsTestMenu"]; ?></a></li>
                        <li><a href="dragwords.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["WordGamesDrugDrop"]; ?> <sup>Demo</sup></a></li>
                      </ul>
                    </li>
<li id="newsMenu"><a href="news-1.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["textNews"]; ?></a></li> 
<li id="booksMenu"><a href="books-1.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["textBooks"]; ?></a></li> 
<li id="aboutMenu"><a href="about-1.php?myLang=<?php echo $myLang; ?>"><?php echo $langArray["textAbout"]; ?></a></li> 
