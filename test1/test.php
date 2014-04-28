<!DOCTYPE html>
<!--
<html>
<head>
  <title>WordCharge</title>
  <link href="css/site.css" rel="stylesheet">
</head>
<body>

  <?php //include("php/header.php"); ?>
  <div id="wrapper-main">
    <h2>WordCharge</h2>
    <p>Test</p>
    <?php //include("testmake.php"); ?>
    <?php //include("php/footer.php"); ?>
  </div>

</body>
</html>
-->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>jQuery UI Dialog - Modal form</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<!--        <script src="js/jquery.min.js"></script>
-->
        <script src="js/updatetable.js"></script>
    </head>
    <body>
        <div id="dialog-form" title="Create new user">
            <p class="validateTips">
                All form fields are required.
            </p>
            <form>
                <fieldset>
                    <label for="first_name">First Name</label>
                    <select id="first-name">
                        <option value="1">Arun</option>
                        <option value="2">Ganesh</option>
                        <option value="3">Suresh</option>
                        <option value="4">Sanganabasu</option>
                    </select>
                    <label for="last_name">Last Name</label>
                    <select id="last-name">
                        <option value="1">Hulagabal</option>
                        <option value="2">Cheemalamudi</option>
                        <option value="3">Ganiger</option>
                        <option value="4">Kattriguppe</option>
                    </select>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
                </fieldset>
            </form>
        </div>
        <div id="users-contain" class="ui-widget">
            <h1>Existing Users:</h1>
            <table id="users" class="ui-widget ui-widget-content">
                <thead>
                    <tr class="ui-widget-header ">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="custom-name">John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>johndoe1</td>
                        <td><a href="">Edit</a></td>
                        <td><span class="delete"><a href="">Delete</a></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button id="create-user">
            Create new user
        </button>
    </body>
</html>
