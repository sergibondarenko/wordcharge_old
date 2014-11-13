function displayBooks(arr) {
    var out = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        //out += '<a href="' + arr[i].url + '">' + 
        //arr[i].title + '</a><br>';
        /*out += '<div class="bookCover">' +
        '<form action="getbooksdict-1.php?myLang=' + '<?php echo $myLang; ?>' +' method="post" target="_blank">' + 
        '<input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/hamlet.txt">' +
        '<input type="hidden" name="langId" value="<?php echo $langId;?>">' +
        '<input class="btn btn-default btn-md" type="submit" name="makeDict" class="makeDict" value="' + '<?php echo $langArray["textButtonMakeDict"]; ?>' + '">' +
        '<?php include("php/setbookpage.php"); ?>' +
        '<br><br>' +
        '<a target="_blank" href="http://wordcharge.com/books/en/hamlet.txt">' +
        '<img src="bookscovers/hamlet.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140"></a></form>' +
        '<div class="bookDesc">The Tragedy of Hamlet, Prince of Denmark. Written by William Shakespeare at an uncertain date between 1599 and 1602.</div>' +
        '<br><br></div>';*/
        out += '<?php echo "Hello friend!";?>'.'<br>';
    }
    document.getElementById("booksShelf").innerHTML = out;
}