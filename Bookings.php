<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking: theB&Bhub</title>
    <link rel="icon"
          type="image/png"
          href="untitledhubbbb-master/assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
</head>



    <header>
        <section class="right">
            <div class="left">
                <img src = "untitledhubbbb-master/assets/b&blogotransparentcrop.png" id="img">


            </div>
            <div class="rightside">

                </div>
            </section>

    <nav>



        <ul class="moveright">

            <!--<li><a href="B&Bregistration.html">Help</a></li>-->
            <li><a href="B&Bregistration.html">Register</a></li>
            <!-- <li><a href="B&Bregistration.html">Register</a></li> -->
            <li><a href="OwnerSignIn.php">Owner's Page</a></li>
            <li><a href="Home.php">Search</a></li>


        </ul>

    </nav>

</header>
<body>

<main>

    <form action="searchResultsPage.php" method="post">

        <table>
            <tr><td> <p>Please complete the form:</p></td></tr>

            <tr>
                <td>
                    <label for="location">Pick a location:</label></td>
                <td><select id="location" name="location">

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
                <td>
                    <label for="date">Pick a date:</label></td>
                <td><select id="date" name="date">
                    <option value="">Select a date:</option>
                    <option value="01/04/2016">01/04/2016</option>
                    <option value="02/04/2016">02/04/2016</option>
                    <option value="03/04/2016">03/04/2016</option>
                    <option value="04/04/2016">04/04/2016</option>
                </select>
                </td>
            </tr>
            <tr><td>
                <label for="duration">Number of Days:</label></td>
                <td><select id="duration" name="duration">
                    <option value="">Select Number of Days:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>

            <tr><td>
                <label for="numberofaults">Number of Adults:</label></td>
                <td><select id="numberofadults" name="numberofadults">
                    <option value="">Select Number of Adults:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>

            <tr><td>
                <label for="numberofchildren">Number of Children:</label></td>
                <td><select id="numberofchildren" name="numberofchildren">
                    <option value="">Select Number of Children:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>
            <tr>



                <td><a href="searchResultsPage.php">
                    <input type="submit" value="Submit" />
                </a></td>
            </tr>
        </table></form>

</main>




<footer>

    <p>Copyright. Team D Solutions.</p>
</footer>
</body>
</html>