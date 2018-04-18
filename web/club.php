<!DOCTYPE html>
<html>
  <head>
    <title>MPCS 53001 - Soccer Database Project</title>
    <!-- This means that the browser will render the width of the page at the width of its own screen. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
    <link href="css/my-styles.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
    <style>
      table {
          width:100%;
      }
      table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
      }
      th, td {
          padding: 5px;
          text-align: center;
      }
      table#t01 tr:nth-child(even) {
          background-color: #eee;
      }
      table#t01 tr:nth-child(odd) {
         background-color:#fff;
      }
      table#t01 th {
          background-color: black;
          color: white;
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <!-- Include a container inside of our navbar so the container will span the same width of the content -->
      <div class="container">

        <!-- navbar-toggle positions the toggle button over to the right side of the navbar in mobile views. -->
        <!-- Data-toggle attribute is a custom data attribute that calls the collapse JS plugin functions -->
        <!-- Data-target attribute id what makes the nav toggle on and off -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        

        <!-- brand will let bootstrap to place it over to the left side of the navigation. text-muted don't let text stand out -->
        <a class="navbar-brand text-muted" href="Final.html">Zhuoyu Zhu</a>
        </div>
        <div class="collapse navbar-collapse">

          <!-- navbar positions the navigation links horizontally and gives them their default color styles. -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a data-toggle="dropdown" data-target="player.html">Player<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="player.php">Player Information</a></li>
                <li><a href="playerPerf.php">Player Performance</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a data-toggle="dropdown" data-target="manager.html">Manager<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="manager.php">Manager Information</a></li>
              </ul>
            </li>

            <li class="active dropdown">
              <a data-toggle="dropdown" data-target="club.html">Club<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="club.php">Club Information</a></li>
                <li><a href="clubPerf.php">Club Performance</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a data-toggle="dropdown" data-target="match.html">Season<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="match.php">Season Statistics</a></li>
              </ul>
            </li>

          </ul>

        </div>
      </div>
    </div>
    <!-- End navbar -->



    <!-- container class inside Bootstrap can center the page content and it also sets the containers max width at every media query break point. -->
    <div class="container documentationbar">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-2 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="query">
            <form method= "get" action="">
              <fieldset>
                <legend>Club Info:</legend>
                <label for="lclubname">Club Name (Ex: Barcelona)</label>
                <input type="text" id="clubname" name="clubname" value="<?php echo htmlspecialchars($_GET['clubname']);?>">

                <label for="lhomestadium">Stadium Name (Ex: Camp Nou)</label>
                <input type="text" id="homestadium" name="homestadium" value="<?php echo htmlspecialchars($_GET['homestadium']);?>">

                <label for="league">League</label>
                <select id="league" name="league" value="<?php echo htmlspecialchars($_GET['league']);?>">
                  <option value=""></option>
                  <option value="Premier League">Premier League</option>
                  <option value="La Liga">La Liga</option>
                  <option value="Bundesliga">Bundesliga</option>
                </select>

                <label for="lmanagername">Managed By (Ex: Luis Enrique)</label>
                <input type="text" id="managername" name="managername" value="<?php echo htmlspecialchars($_GET['managername']);?>">

                <label for="lplayername">Players for this club (Ex: Neymar)</label>
                <input type="text" id="playername" name="playername" value="<?php echo htmlspecialchars($_GET['playername']);?>"><hr>
              
                <input type="submit" value="Search">
              </fieldset>
            </form>
          </div>
        </div><!--/.sidebar-offcanvas-->


        <div class="col-xs-12 col-lg-9">
        
          <div class="jumbotron">
            <form method= "post" action="">
              <?php
                  include 'inc/connection.php';
                  session_start();
                  $AddClubName = (String)trim($_REQUEST['AddClubName']);
                  $AddClubCountry = (String)trim($_REQUEST['AddClubCountry']);
                  $AddClubLeague = (String)trim($_REQUEST['AddClubLeague']);
                  $AddHomeStadium = (String)trim($_REQUEST['AddHomeStadium']);

                  if (isset($_POST['AddClub'])) {
                    
                    if (!$AddClubName || !$AddClubCountry || !$AddClubLeague || !$AddHomeStadium) {
                      print "<div class='jumbotron'><h4>Please enter all the necessary information</h4></div>";
                    } else {

                      if (ctype_digit($AddClubName)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for club name!</h4></div>";
                      } else {
                        $tempQuery = "select max(club_id)+1 as ID from club";
                        $re = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));

                        $tuple = mysqli_fetch_assoc($re);
                        $ClubID = $tuple['ID'];
                        $values = "$ClubID,'$AddClubName'";
                      }

                      if (ctype_digit($AddHomeStadium)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for club home stadium!</h4></div>";
                      } else {
                        $values = $values.",'$AddHomeStadium'";
                      }

                      if (ctype_digit($AddClubLeague)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for club's league!</h4></div>";
                      } else {
                        $values = $values.",'$AddClubLeague'";
                      }

                      if (ctype_digit($AddClubCountry)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for club's country!</h4></div>";
                      } else {
                        $values = $values.",'$AddClubCountry'";
                      }

                      if (ctype_digit($AddClubName) || ctype_digit($AddClubLeague) || ctype_digit($AddClubCountry) || ctype_digit($AddHomeStadium)) {

                      } else {
                        $query = "INSERT into club (club_id, club_name, home_stadium, league, country) 
                                VALUES (".$values.")";

                        if (mysqli_query($dbcon, $query)) {
                          print "<div class='jumbotron'><h4>New player record created successfully!</h4></div>";
                        } else {
                          die('Query failed: ' . mysqli_error($dbcon));
                        }
                      }
                      
                    }
                  }

              ?>
              <fieldset>
                <legend>Add Club:</legend>
                <label for="lclubname">Club Name</label>
                <input type="text" id="addclubname" name="AddClubName" value="<?php echo htmlspecialchars($_GET['AddClubName']);?>">

                <label for="lcountry">Country</label>
                <input type="text" id="countryname" name="AddClubCountry" value="<?php echo htmlspecialchars($_GET['AddClubCountry']);?>">

                <label for="lstadium">Home Stadium</label>
                <input type="text" id="stadiumname" name="AddHomeStadium" value="<?php echo htmlspecialchars($_GET['AddHomeStadium']);?>">

                <label for="position">League</label>
                <select id="position" name="AddClubLeague" value="<?php echo htmlspecialchars($_GET['AddClubLeague']);?>">
                  <option value=""></option>
                  <option value="Premier League">Premier League</option>
                  <option value="La Liga">La Liga</option>
                  <option value="Bundesliga">Bundesliga</option>
                </select>
              
                <input type="submit" value="Add Club" name="AddClub">

              </fieldset>
            </form>

            <form method= "post" action="">
              <?php
                  include 'inc/connection.php';
                  session_start();
                  $UpdateClubName = (String)trim($_REQUEST['UpdateClubName']);
                  $UpdateClubCountry = (String)trim($_REQUEST['UpdateClubCountry']);
                  $UpdateHomeStadium = (String)trim($_REQUEST['UpdateHomeStadium']);
                  $UpdateClubLeague = (String)trim($_REQUEST['UpdateClubLeague']);

                  if (isset($_POST['ModifyClub'])) {

                    if (!$UpdateClubName || ctype_digit($UpdateClubName)) {
                      print "<div class='jumbotron'><h4>Please enter a valid club name</h4></div>";
                    } else {
                      $tempQuery = "SELECT club_id from club where club_name = '$UpdateClubName'";

                      $search = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));
                      $tuple = mysqli_fetch_assoc($search);
                      $ClubID = $tuple['club_id'];

                      if (!$ClubID) {
                        print "<div class='jumbotron'><h4>The club you want to update doesn't exist in the database!</h4></div>";
                      } else {

                        if (!$UpdateClubCountry && !$UpdateHomeStadium && !$UpdateClubLeague) {
                          print "<div class='jumbotron'><h4>Please enter updated attribute value. No update occurs!</h4></div>";
                        } else if (ctype_digit($UpdateClubCountry)) {
                          print "<div class='jumbotron'><h4>Please enter a valid string value for club's country!</h4></div>";
                        } else if (ctype_digit($UpdateHomeStadium)) {
                          print "<div class='jumbotron'><h4>Please enter a valid string value for club's home stadium!</h4></div>";
                        } else if (ctype_digit($UpdateClubLeague)) {
                          print "<div class='jumbotron'><h4>Please enter a valid string value for club's league!</h4></div>";
                        } else {
                          if ($UpdateHomeStadium) {
                            $attribute = "home_stadium = '".$UpdateHomeStadium."'";
                          }

                          if ($UpdateClubLeague) {
                            if ($attribute) {
                              $attribute = $attribute.",league = '".$UpdateClubLeague."'";
                            } else {
                              $attribute = "league = '".$UpdateClubLeague."'";
                            }
                          }

                          if ($UpdateClubLeague) {
                            if ($attribute) {
                              $attribute = $attribute.",league = '".$UpdateClubLeague."'";
                            } else {
                              $attribute = "league = '".$UpdateClubLeague."'";
                            }
                          }

                          if ($UpdateClubCountry) {
                            if ($attribute) {
                              $attribute = $attribute.",country = '".$UpdateClubCountry."'";
                            } else {
                              $attribute = "country = '".$UpdateClubCountry."'";
                            }
                          }

                          if ($attribute) {
                            $query = "UPDATE club SET ".$attribute." where club_name = '$UpdateClubName'";

                            if (mysqli_query($dbcon, $query)) {
                              print "<div class='jumbotron'><h4>This club's record was updated successfully!</h4></div>";
                            } else {
                              die('Query failed: ' . mysqli_error($dbcon));
                            }
                          }
                        }
                      }
                    }
                  }
              ?>
              <fieldset>
                <legend>Update Club:</legend>
                <label for="lclubname">Please enter the club that you want to modify:</label>
                <input type="text" id="updateclubname" name="UpdateClubName" value="<?php echo htmlspecialchars($_GET['UpdateClubName']);?>">
                <br>

                <legend>Enter the attribute value that you want to update:</legend>
                <label for="lcountry">Country </label>
                <input type="text" id="updatecountryname" name="UpdateClubCountry" value="<?php echo htmlspecialchars($_GET['UpdateClubCountry']);?>">

                <label for="lstadium">Home Stadium</label>
                <input type="text" id="stadiumname" name="UpdateHomeStadium" value="<?php echo htmlspecialchars($_GET['UpdateHomeStadium']);?>">

                <label for="position">League</label>
                <select id="updateposition" name="UpdateClubLeague" value="<?php echo htmlspecialchars($_GET['UpdateClubLeague']);?>">
                  <option value=""></option>
                  <option value="Premier League">Premier League</option>
                  <option value="La Liga">La Liga</option>
                  <option value="Bundesliga">Bundesliga</option>
                </select>
              
                <input type="submit" value="Modify Club" name="ModifyClub">
              </fieldset>
            </form>

            <form method= "post" action="">
              <?php
                  include 'inc/connection.php';
                  session_start();
                  $DeleteClubName = (String)trim($_REQUEST['DeleteClubName']);

                  if (isset($_POST['DeleteClub'])) {

                    if (!$DeleteClubName || ctype_digit($DeleteClubName)) {
                      print "<div class='jumbotron'><h4>Please enter a valid club name</h4></div>";
                    } else {
                      $tempQuery = "SELECT club_id from club where club_name = '$DeleteClubName'";

                      $search = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));
                      $tuple = mysqli_fetch_assoc($search);
                      $ClubID = $tuple['club_id'];

                      if (!$ClubID) {
                        print "<div class='jumbotron'><h4>The club you want to remove doesn't exist in the database!</h4></div>";
                      } else {
                        $query = "DELETE from club where club_name = '$DeleteClubName'";
                        if (mysqli_query($dbcon, $query)) {
                          print "<div class='jumbotron'><h4>This club's record removed successfully!</h4></div>";
                        } else {
                          die('Query failed: ' . mysqli_error($dbcon));
                        }
                      }
                    }
                  }
              ?>
              <fieldset>
                <legend>Delete Club:</legend>
                <label for="lclubname">Please enter the club that you want to delete:</label>
                <input type="text" id="deleteclubname" name="DeleteClubName" value="<?php echo htmlspecialchars($_GET['DeleteClubName']);?>">
              
                <input type="submit" value="Delete Club" name="DeleteClub">
              </fieldset>
            </form>
          </div>

          
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <form method="get" action="">
                <h5>Page: </h5>
                <table id="t01">
                  <tr>
                    <th>Club_id</th>
                    <th>Club_name</th>
                    <th>Home_Stadium</th>
                    <th>League</th>
                    <th>Country</th>
                  </tr>
                <?php
                include 'inc/connection.php';
                session_start();

                $rec_limit = 15;
                // Getting the input parameter (user):

                $clubname = trim($_REQUEST['clubname']);
                $homestadium = trim($_REQUEST['homestadium']);
                $league = trim($_REQUEST['league']);
                $managername = trim($_REQUEST['managername']);
                $playername = trim($_REQUEST['playername']);


                $page=$_GET["page"];
                if ($page=="" || $page=="1") {
                  $page1 = 0;
                } else {
                  $page1 = ($page*15)-15;
                }

                $condition=$_GET["cc"];



                if ($clubname) {
                  $condition = "where c.club_name like '%$clubname%'";
                }

                if ($homestadium) {
                  if ($condition) {
                    $condition = $condition." and c.home_stadium = '$homestadium'";
                  } else {
                    $condition = "where c.home_stadium = '$homestadium'";
                  }
                }

                if ($league) {
                  if ($condition) {
                    $condition = $condition." and c.league = '$league'";
                  } else {
                    $condition = "where c.league = '$league'";
                  }
                }

                if ($managername) {
                  if ($condition) {
                    $condition = $condition." and m.manager_name = '$managername'";
                  } else {
                    $condition = "where m.manager_name = '$managername'";
                  }
                }

                if ($playername) {
                  if ($condition) {
                    $condition = $condition." and p.player_name = '$playername'";
                  } else {
                    $condition = "where p.player_name = '$playername'";
                  }
                }


                if (!$managername && !$playername) {
                  $query = "SELECT distinct c.club_id, c.club_name, c.home_stadium, c.league, c.country 
                          from club c ".$condition." limit $page1, 15";
                  $result = mysqli_query($dbcon, $query)
                    or die('Query failed: ' . mysqli_error($dbcon));
                } else {
                  $query = "SELECT distinct c.club_id, c.club_name, c.home_stadium, c.league, c.country 
                          from player p 
                          inner join managerplayer mp on p.player_id = mp.player_id
                          inner join manager m on m.manager_id = mp.manager_id
                          inner join playerclub pc on p.player_id = pc.player_id
                          inner join club c on c.club_id = pc.club_id ".$condition." limit $page1, 15";

                  $result = mysqli_query($dbcon, $query)
                    or die('Query failed: ' . mysqli_error($dbcon));
                }

                $totalItem = 0;
                while ($tuple = mysqli_fetch_assoc($result)) {
                  print '<tr><td>'.$tuple['club_id'].'</td>
                  <td>'.$tuple['club_name'].'</td>
                  <td>'.$tuple['home_stadium'].'</td>
                  <td>'.$tuple['league'].'</td>
                  <td>'.$tuple['country'].'</td></tr>';
                  $totalItem += 1;
                }

                if ($totalItem < 1) {
                  print "<div class='jumbotron'><h4>Search Results: Not Found. Please modify your condition!</h4></div>";
                  //"<p>Search Results: Not Found. Please modify your condition!</p>";
                }


                if (!$managername && !$playername) {
                  $query1 = "SELECT distinct c.club_id, c.club_name, c.home_stadium, c.league, c.country 
                          from club c ".$condition;
              
                  $result1 = mysqli_query($dbcon, $query1)
                    or die('Query failed: ' . mysqli_error($dbcon));
                } else {
                  $query1 = "SELECT distinct c.club_id, c.club_name, c.home_stadium, c.league, c.country 
                          from player p 
                          inner join managerplayer mp on p.player_id = mp.player_id
                          inner join manager m on m.manager_id = mp.manager_id
                          inner join playerclub pc on p.player_id = pc.player_id
                          inner join club c on c.club_id = pc.club_id ".$condition;
              
                  $result1 = mysqli_query($dbcon, $query1)
                    or die('Query failed: ' . mysqli_error($dbcon));
                }

                $total = 0;
                while ($tuple = mysqli_fetch_assoc($result1)) {
                  $total += 1;
                }

                $p = $total/15;
                $p = ceil($p);

                for ($b=1;$b<=$p;$b++) {
                  ?><a href="club.php?page=<?php echo $b; ?>&cc=<?php echo $condition; ?>"><?php echo $b." "; ?></a><?php
                }
                echo "<br>";

                ?>
                </table>
                <br>
                <br>
              </form>
              
            </div><!--/.col-xs-6.col-lg-4-->
          
          </div><!--/row-->

        </div><!--/.col-xs-12.col-sm-9-->

      </div><!--/row-->
    </div>






    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>