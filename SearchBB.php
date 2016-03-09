<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="untitledhubbbb-master/assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Search: theB&Bhub</title>



    <script type="text/javascript">
        //<![CDATA[

        var tabLinks = new Array();
        var contentDivs = new Array();

        function init() {

            // Grab the tab links and content divs from the page
            var tabListItems = document.getElementById('tabs').childNodes;
            for ( var i = 0; i < tabListItems.length; i++ ) {
                if ( tabListItems[i].nodeName == "LI" ) {
                    var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
                    var id = getHash( tabLink.getAttribute('href') );
                    tabLinks[id] = tabLink;
                    contentDivs[id] = document.getElementById( id );
                }
            }

            // Assign onclick events to the tab links, and
            // highlight the first tab
            var i = 0;

            for ( var id in tabLinks ) {
                tabLinks[id].onclick = showTab;
                tabLinks[id].onfocus = function() { this.blur() };
                if ( i == 0 ) tabLinks[id].className = 'selected';
                i++;
            }

            // Hide all content divs except the first
            var i = 0;

            for ( var id in contentDivs ) {
                if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
                i++;
            }
        }

        function showTab() {
            var selectedId = getHash( this.getAttribute('href') );

            // Highlight the selected tab, and dim all others.
            // Also show the selected content div, and hide all others.
            for ( var id in contentDivs ) {
                if ( id == selectedId ) {
                    tabLinks[id].className = 'selected';
                    contentDivs[id].className = 'tabContent';
                } else {
                    tabLinks[id].className = '';
                    contentDivs[id].className = 'tabContent hide';
                }
            }

            // Stop the browser following the link
            return false;
        }

        function getFirstChildWithTagName( element, tagName ) {
            for ( var i = 0; i < element.childNodes.length; i++ ) {
                if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
            }
        }

        function getHash( url ) {
            var hashPos = url.lastIndexOf ( '#' );
            return url.substring( hashPos + 1 );
        }

        //]]>
    </script>
</head>

<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "untitledhubbbb-master/assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php

        if($_GET['value']=="logout"){
            session_unset();
        }
        if ($_POST['user'] != null) {
            $_SESSION["user"] = $_POST['user'];
        }
        if ($_SESSION["user"] != null) {
            echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
            echo "<p id='loginText'>currently not logged in!";
        }


        ?>
        <script>
            function logout() {
                window.location = "http://thebbhubdotcom.azurewebsites.net/SearchBB.php?value=logout";
            }
        </script>
    </div>
</section>

<section class="container" id="navigation">
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

<section class="container" id="content">
    <form action="searchResultsPage.php" method="post">
        <table class="tablesearch">
            <tr><td colspan="4"><h1>Search for a B&B</h1></td></tr>
            <tr><td colspan="4"><h4>* Search all across the UK for B&B's</h4></td></tr>
            <tr><td colspan="2"><label for="location">Pick a location:</label></td></tr>
            <tr><td colspan="2"><select class="inputform" id="location" name="location">

                    <?php
                        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    try{
                    $st = $conn-> query("SELECT DISTINCT [city] FROM [B&B]");
                    foreach($st->fetchAll() as $row) {
                    $newhtml =
<<<NEWHTML
                    <option value="{$row[city]}">{$row[city]}</option>
NEWHTML;
                    print($newhtml);
                    }
                    }
                    catch(PDOException $e)
                    {print"$e";}
                    ?>

                </select>
              </td>
            </tr>



            <tr>
                <td colspan="2"><label for="dateday">Check In Date:</label></td>
                <td colspan="2"><label for="datemonth">Check Out Date:</label></td>
                </tr>
            <tr>
                <td><select id="date" class="inputform" name="date">
                        <option value="day">Select Day:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>

                <td><select id="month" class="inputform" name="month">
                        <option value="month">Select Month:</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                    </select>
                </td>



                <td><select id="date" class="inputform" name="date">
                        <option value="day">Select Day:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>

                <td><select id="month" class="inputform" name="month">
                        <option value="month">Select Month:</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                    </select>
                </td>



            </tr>


           <tr>
               <td colspan="4">

              <a href="searchResultsPage.php"><input id="submit" class="submit" type="submit" value="Search"  /></a></td>
          </tr>
      </table>
    </form>

</section>


<section class="spacer" id="spacer">


</section>


<section class="container" id="featured">
<div class="centre">
    <p>Search for a bed and breakfast by region</p>
     </div>

</section>

<body onload="init()">


    <ul id="tabs">
        <li><a href="#about">Regional Area's</a></li>
        <li><a href="#advantages">Town's & City's</a></li>
        <li><a href="#usage">Most Popular</a></li>
    </ul>

    <div class="tabContent" id="about">

        <div>
            <p>JavaScript tabs partition your Web page content into tabbed sections. Only one section at a time is visible.</p>
            <p>The code is written in such a way that the page degrades gracefully in browsers that don't support JavaScript or CSS.</p>
        </div>
    </div>

    <div class="tabContent" id="advantages">

        <div>
            <p>JavaScript tabs are great if your Web page contains a large amount of content.</p>
            <p>They're also good for things like multi-step Web forms.</p>
        </div>
    </div>

    <div class="tabContent" id="usage">

        <div>
            <p>Click a tab to view the tab's content. Using tabs couldn't be easier!</p>
        </div>
    </div>


<section class="spacer" id="spacer">


</section>



 <section class="container" id="featured">
<div class="centre">

    <p>Featured bed and breakfast destinations</p>
</div>
 </section>



<main>


<section class="container2" id="spotlight">
    <nav role="sub2">
    <img src="untitledhubbbb-master/assets/london.jpg" id="img2">
    <p>London, England</p>
    <p><li><strong><a href="#">click to view</a></strong></li></p>
    <img src="untitledhubbbb-master/assets/edinburgh.jpg" id="img2">
    <p>Edinburgh, Scotland</p>
    <p><li><strong><a href="#">click to view</a></strong></li></p>
        </nav>


</section>

    <section class="container2" id="spotlight2">
        <nav role="sub2">
        <img src="untitledhubbbb-master/assets/glasgow.jpg" id="img2">
        <p>Glasgow, Scotland</p>
        <p><li><strong><a href="#">click to view</a></strong></li></p>
        <img src="untitledhubbbb-master/assets/Aberdeen.jpg" id="img2">
        <p>Aberdeen, Scotland</p>
        <p><li><strong><a href="#">click to view</a></strong></li></p>
            </nav>
    </section>

    <section class="container2" id="spotlight3">
        <nav role="sub2">
        <img src="untitledhubbbb-master/assets/dundee.jpeg" id="img2">
        <p>Dundee, Scotland</p>
        <p><li><strong><a href="#">click to view</a></strong></li></p>
        <img src="untitledhubbbb-master/assets/manchester.jpg" id="img2">
        <p>Manchester, England</p>
        <p><li><strong><a href="#">click to view</a></strong></li></p>
        </nav>
    </section>


</main>

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
