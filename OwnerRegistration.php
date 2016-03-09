<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="untitledhubbbb-master/assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Register: theB&Bhub</title>
</head>
<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "untitledhubbbb-master/assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

    <?php
    if ($_SESSION["user"] != null) {
        echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
    echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
    }else{
    echo "<p id='loginText'>currently not logged in";
    }

    ?>
    <script>
        function logout() {
            window.location = "http://iainscott-rgu.azurewebsites.net/home.php?value=logout";
        }
    </script>

    </div>
</section>

<section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="B&Bregistration.html">Contact</a></li>
                <li><a href="B&Bregistration.html">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>


<section class="spacer" id="spacer">


</section>



<section class="container" id="featured">
    <div class="centre">

        <p>Register to list your Property</p>
    </div>
</section>


<section class="container" id="content2">
    <form action="ownerRegistrationResultPage.php" method="post" id="form">

        <table class="table1">

            <tr><td class="smallfont"><p>* Required Fields</p></td></tr>




            <tr><td>
                <label for="email">Email: *</label></td>
                <td><input type="text" class="inputform" id="email" name="email" placeholder="email" size="30" maxlength="50" required /></td>
            </tr>
            <tr>
                <td><label for="password">Password: *</label></td>
                <td>    <input type="password" class="inputform" id="password" name="password" placeholder="enter password" required>
                </td>
            </tr>

            <tr>
                <td><label for="password2">Retype Password: *</label></td>
                <td>    <input type="password" class="inputform" id="password2" name="password2" placeholder="enter password again" required>
                </td>
            </tr><tr><td>
            <label for="title">Title: *</label></td>
            <td><select class="inputform" id="title" name="title">
                <option value="">Select Title</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Ms">Ms</option>
            </select>
            </td>
</tr>

            <tr>
                <td><label for="firstname">First Name: *</label></td>
                <td><input type="text" class="inputform" id="firstname" name="firstname" placeholder="Enter your First Name" required /></td>
            </tr>
            <tr>
                <td><label for="surname">Surname: *</label></td>
                <td><input type="text" class="inputform" id="surname" name="surname" placeholder="Enter your Surname" required /></td>
            </tr>
            <tr>



            <tr><td>
                <label for="address">Address: *</label></td>
                <td><input type="text" class="inputform" id="address" name="address" placeholder=" Enter first line of your address" size="30" maxlength="50" required /></td>
            </tr>

            <tr><td>
                <label for="address2">Address Line 2: *</label></td>
                <td><input type="text" class="inputform" id="address2" name="address2" placeholder=" Enter second line of your address" size="30" maxlength="50" required /></td>
            </tr>


            <tr><td>
                <label for="telephone">Telephone: *</label></td>
                <td><input type="text" class="inputform" id="telephone" name="telephone" placeholder=" Enter your telephone number" size="20" maxlength="20" required /></td>
            </tr>

            <tr><td></td>
                <td><p><input id="submit" type="submit" value="Submit" class="submit" /></p></td>
            </tr>
        </table></form>

</section>
<section class="spacer" id="spacer">


</section>
<section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="B&Bregistration.html">Contact</a></li>
                <li><a href="B&Bregistration.html">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
    <div id="copyright">
        <hr width="100%" size="1">
        <p>Copyright. Team D Solutions.</p>
    </div>

</section>

</body>
</html>