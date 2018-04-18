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
            <li class="active dropdown">
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

            <li class="dropdown">
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
                <legend>Query Section:</legend>
                <label for="lplayername">Player Name (Ex: Paul Pogba)</label>
                <input type="text" id="playername" name="playername" value="<?php echo htmlspecialchars($_GET['playername']);?>">

                <label for="lcountry">Country (Ex: Spain)</label>
                <input type="text" id="countryname" name="playercountry" value="<?php echo htmlspecialchars($_GET['playercountry']);?>">

                <label for="position">Position</label>
                <select id="position" name="position" value="<?php echo htmlspecialchars($_GET['position']);?>">
                  <option value=""></option>
                  <option value="Goalkeeper">Goalkeeper</option>
                  <option value="Defender">Defender</option>
                  <option value="Midfielder">Midfielder</option>
                  <option value="Forward">Forward</option>
                </select>

                <label for="lmanagername">Managed By (Ex: Jose Mourinho)</label>
                <input type="text" id="managername" name="managername" value="<?php echo htmlspecialchars($_GET['managername']);?>">

                <label for="lclubname">Plays for which club (Ex: Manchester United)</label>
                <input type="text" id="clubname" name="clubname" value="<?php echo htmlspecialchars($_GET['clubname']);?>"><hr>

                <label for="lage">For one age value, enter same value:</label>
                <label for="lminage">Minimum Age (>=)</label>
                <input type="text" id="lminage" name="playerminage" value="<?php echo htmlspecialchars($_GET['playerminage']);?>">

                <label for="lmaxage">Maximum Age (<=)</label>
                <input type="text" id="lmax" name="playermaxage" value="<?php echo htmlspecialchars($_GET['playermaxage']);?>">
              
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
                  $PlayerName = (String)trim($_REQUEST['PlayerName']);
                  $PlayerCountry = (String)trim($_REQUEST['PlayerCountry']);
                  $PlayerPosition = trim($_REQUEST['PlayerPosition']);
                  $PlayerAge = (int)trim($_REQUEST['PlayerAge']);

                  if (isset($_POST['AddPlayer'])) {
                    
                    if (!$PlayerName || !$PlayerCountry || !$PlayerPosition || !$PlayerAge) {
                      print "<div class='jumbotron'><h4>Please enter all the necessary information</h4></div>";
                    } else {

                      if (ctype_digit($PlayerName)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for player name!</h4></div>";
                      } else {
                        $tempQuery = "select max(player_id)+1 as ID from player";
                        $re = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));

                        $tuple = mysqli_fetch_assoc($re);
                        $PlayerID = $tuple['ID'];
                        $values = "$PlayerID,'$PlayerName'";
                      }

                      if (is_int($PlayerAge) && $PlayerAge >= 15 && $PlayerAge <= 40) {
                        $values = $values.",$PlayerAge,'$PlayerPosition'";
                      } else {
                        print "<div class='jumbotron'><h4>Please enter an valid integer value between 15 and 40 inclusive for player age</h4></div>";
                      }

                      if (ctype_digit($PlayerCountry)) {
                        print "<div class='jumbotron'><h4>Please enter a valid string value for player country!</h4></div>";
                      } else {
                        $values = $values.",'$PlayerCountry'";
                      }

                      if (ctype_digit($PlayerName) || !is_int($PlayerAge) || ctype_digit($PlayerCountry) || ($PlayerAge < 15 || $PlayerAge > 40)) {

                      } else {
                        $query = "INSERT into player (player_id, player_name, age, position, country) 
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
                <legend>Add Player:</legend>
                <label for="lplayername">Player Name</label>
                <input type="text" id="playername" name="PlayerName" value="<?php echo htmlspecialchars($_GET['PlayerName']);?>">

                <label for="lcountry">Country (Ex: Spain)</label>
                <input type="text" id="countryname" name="PlayerCountry" value="<?php echo htmlspecialchars($_GET['PlayerCountry']);?>">

                <label for="position">Position</label>
                <select id="position" name="PlayerPosition" value="<?php echo htmlspecialchars($_GET['PlayerPosition']);?>">
                  <option value=""></option>
                  <option value="Goalkeeper">Goalkeeper</option>
                  <option value="Defender">Defender</option>
                  <option value="Midfielder">Midfielder</option>
                  <option value="Forward">Forward</option>
                </select>

                <label for="age">Age</label>
                <input type="number" id="age" name="PlayerAge" value="<?php echo htmlspecialchars($_GET['PlayerAge']);?>">
              
                <input type="submit" value="Add Player" name="AddPlayer">

              </fieldset>
            </form>

            <form method= "post" action="">
              <?php
                  include 'inc/connection.php';
                  session_start();
                  $UpdatePlayerName = (String)trim($_REQUEST['UpdatePlayerName']);
                  $UpdatePlayerCountry = (String)trim($_REQUEST['UpdatePlayerCountry']);
                  $UpdatePlayerPosition = trim($_REQUEST['UpdatePlayerPosition']);
                  $UpdatePlayerAge = (int)trim($_REQUEST['UpdatePlayerAge']);

                  if (isset($_POST['ModifyPlayer'])) {

                    if (!$UpdatePlayerName || ctype_digit($UpdatePlayerName)) {
                      print "<div class='jumbotron'><h4>Please enter a valid player name</h4></div>";
                    } else {
                      $tempQuery = "SELECT player_id from player where player_name = '$UpdatePlayerName'";

                      $search = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));
                      $tuple = mysqli_fetch_assoc($search);
                      $PlayerID = $tuple['player_id'];

                      if (!$PlayerID) {
                        print "<div class='jumbotron'><h4>The player you want to update doesn't exist in the database!</h4></div>";
                      } else {

                        if (!$UpdatePlayerCountry && !$UpdatePlayerPosition && !$UpdatePlayerAge) {
                          print "<div class='jumbotron'><h4>Please enter updated attribute value. No update occurs!</h4></div>";
                        } else if (ctype_digit($UpdatePlayerCountry)) {
                          print "<div class='jumbotron'><h4>Please enter a valid string value for player's country!</h4></div>";
                        } else if (!is_int($UpdatePlayerAge)) {
                          print "<div class='jumbotron'><h4>Please enter an integer value for player's age!</h4></div>";
                        } else {
                          if ($UpdatePlayerCountry) {
                            $attribute = "country = '".$UpdatePlayerCountry."'";
                          }
                          if ($UpdatePlayerPosition) {
                            if ($attribute) {
                              $attribute = $attribute.",position = '".$UpdatePlayerPosition."'";
                            } else {
                              $attribute = "position = '".$UpdatePlayerPosition."'";
                            }
                          }
                          if ($UpdatePlayerAge) {
                            if ($UpdatePlayerAge >= 15 && $UpdatePlayerAge <= 40) {
                              if ($attribute) {
                                $attribute = $attribute.",age = ".$UpdatePlayerAge;
                              } else {
                                $attribute = "age = ".$UpdatePlayerAge;
                              }
                            } else {
                              print "<div class='jumbotron'><h4>Please enter an valid integer value between 15 and 40 inclusive for player age</h4></div>";
                            }
                            
                          }

                          if ($attribute) {
                            $query = "UPDATE player SET ".$attribute." where player_name = '$UpdatePlayerName'";

                            if (mysqli_query($dbcon, $query)) {
                              print "<div class='jumbotron'><h4>This player's record was updated successfully!</h4></div>";
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
                <legend>Update Player:</legend>
                <label for="lplayername">Please enter the player that you want to modify: (Ex: Paul Pogba)</label>
                <input type="text" id="updateplayername" name="UpdatePlayerName" value="<?php echo htmlspecialchars($_GET['UpdatePlayerName']);?>">
                <br>

                <legend>Enter the attribute value that you want to update:</legend>
                <label for="lcountry">Country (Ex: Spain)</label>
                <input type="text" id="updatecountryname" name="UpdatePlayerCountry" value="<?php echo htmlspecialchars($_GET['UpdatePlayerCountry']);?>">

                <label for="position">Position</label>
                <select id="updateposition" name="UpdatePlayerPosition" value="<?php echo htmlspecialchars($_GET['UpdatePlayerPosition']);?>">
                  <option value=""></option>
                  <option value="Goalkeeper">Goalkeeper</option>
                  <option value="Defender">Defender</option>
                  <option value="Midfielder">Midfielder</option>
                  <option value="Forward">Forward</option>
                </select>

                <label for="age">Age</label>
                <input type="number" id="updateplayerage" name="UpdatePlayerAge" value="<?php echo htmlspecialchars($_GET['UpdatePlayerAge']);?>">
              
                <input type="submit" value="Modify Player" name="ModifyPlayer">
              </fieldset>
            </form>

            <form method= "post" action="">
              <?php
                  include 'inc/connection.php';
                  session_start();
                  $DeletePlayerName = (String)trim($_REQUEST['DeletePlayerName']);

                  if (isset($_POST['DeletePlayer'])) {

                    if (!$DeletePlayerName || ctype_digit($DeletePlayerName)) {
                      print "<div class='jumbotron'><h4>Please enter a valid player name</h4></div>";
                    } else {
                      $tempQuery = "SELECT player_id from player where player_name = '$DeletePlayerName'";

                      $search = mysqli_query($dbcon, $tempQuery) or die('Query failed: ' . mysqli_error($dbcon));
                      $tuple = mysqli_fetch_assoc($search);
                      $PlayerID = $tuple['player_id'];

                      if (!$PlayerID) {
                        print "<div class='jumbotron'><h4>The player you want to remove doesn't exist in the database!</h4></div>";
                      } else {
                        $query = "DELETE from player where player_name = '$DeletePlayerName'";
                        if (mysqli_query($dbcon, $query)) {
                          print "<div class='jumbotron'><h4>This player's record removed successfully!</h4></div>";
                        } else {
                          die('Query failed: ' . mysqli_error($dbcon));
                        }
                      }
                    }
                  }
              ?>
              <fieldset>
                <legend>Delete Player:</legend>
                <label for="lplayername">Please enter the player that you want to delete</label>
                <input type="text" id="deleteplayername" name="DeletePlayerName" value="<?php echo htmlspecialchars($_GET['DeletePlayerName']);?>">
              
                <input type="submit" value="Delete Player" name="DeletePlayer">
              </fieldset>
            </form>

          </div>

          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <form method="get" action="">
                <h5>Page: </h5>
                <table id="t01">
                  <tr>
                    <th>Player_id</th>
                    <th>Player_name</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Country</th>
                  </tr>
                <?php
                include 'inc/connection.php';
                //session_start();

                $rec_limit = 50;
                // Getting the input parameter (user):
                $playername = trim($_REQUEST['playername']);
                $playercountry = trim($_REQUEST['playercountry']);
                $position = trim($_REQUEST['position']);
                $managername = trim($_REQUEST['managername']);
                $clubname = trim($_REQUEST['clubname']);
                $playerminage = trim($_REQUEST['playerminage']);
                $playermaxage = trim($_REQUEST['playermaxage']);


                $page=$_GET["page"];
                if ($page=="" || $page=="1") {
                  $page1 = 0;
                } else {
                  $page1 = ($page*50)-50;
                }
                $condition=$_GET["cc"];

                if ($playername) {
                  $condition = "where p.player_name like '%$playername%'";
                }

                if ($playercountry) {
                  if ($condition) {
                    $condition = $condition." and p.country = '$playercountry'";
                  } else {
                    $condition = "where p.country = '$playercountry'";
                  }
                }

                if ($position) {
                  if ($condition) {
                    $condition = $condition." and p.position = '$position'";
                  } else {
                    $condition = "where p.position = '$position'";
                  }
                }

                if ($managername) {
                  if ($condition) {
                    $condition = $condition." and m.manager_name = '$managername'";
                  } else {
                    $condition = "where m.manager_name = '$managername'";
                  }
                }

                if ($clubname) {
                  if ($condition) {
                    $condition = $condition." and c.club_name = '$clubname'";
                  } else {
                    $condition = "where c.club_name = '$clubname'";
                  }
                }

                if ($playerminage) {
                  if ($condition) {
                    $condition = $condition." and p.age >= '$playerminage'";
                  } else {
                    $condition = "where p.age >= '$playerminage'";
                  }
                }

                if ($playermaxage) {
                  if ($condition) {
                    $condition = $condition." and p.age <= '$playermaxage'";
                  } else {
                    $condition = "where p.age <= '$playermaxage'";
                  }
                }

                if (!$managername && !$clubname) {
                  $query = "SELECT p.player_id, p.player_name, p.age, p.position, p.country FROM player p ".$condition."limit $page1, 50";
                  $result = mysqli_query($dbcon, $query)
                  or die('Query failed: ' . mysqli_error($dbcon));
                } else {
                  $query = "SELECT p.player_id, p.player_name, p.age, p.position, p.country FROM player p 
                          inner join managerplayer mp on p.player_id = mp.player_id 
                          inner join manager m on m.manager_id = mp.manager_id 
                          inner join playerclub pc on p.player_id = pc.player_id 
                          inner join club c on c.club_id = pc.club_id ".$condition." limit $page1, 50";
                          $result = mysqli_query($dbcon, $query)
                  or die('Query failed: ' . mysqli_error($dbcon)); 
                }

                $totalItem = 0;
                while ($tuple = mysqli_fetch_assoc($result)) {
                  print '<tr><td>'.$tuple['player_id'].'</td>
                  <td>'.$tuple['player_name'].'</td>
                  <td>'.$tuple['age'].'</td>
                  <td>'.$tuple['position'].'</td>
                  <td>'.$tuple['country'].'</td></tr>';
                  $totalItem += 1;
                }

                if ($totalItem < 1) {
                  print "<div class='jumbotron'><h4>Search Results: Not Found. Please modify your condition!</h4></div>";
                  //"<p>Search Results: Not Found. Please modify your condition!</p>";
                }
                

                if (!$managername && !$clubname) {
                  $query1 = "SELECT p.player_id, p.player_name, p.age, p.position, p.country FROM player p ".$condition;
                  $result1 = mysqli_query($dbcon, $query1)
                  or die('Query failed 3th: ' . mysqli_error($dbcon));
                } else {
                  $query1 = "SELECT p.player_id, p.player_name, p.age, p.position, p.country FROM player p 
                          inner join managerplayer mp on p.player_id = mp.player_id 
                          inner join manager m on m.manager_id = mp.manager_id 
                          inner join playerclub pc on p.player_id = pc.player_id 
                          inner join club c on c.club_id = pc.club_id ".$condition;
                          $result1 = mysqli_query($dbcon, $query1)
                  or die('Query failed 4th: ' . mysqli_error($dbcon));
                }

                $total = 0;
                while ($tuple = mysqli_fetch_assoc($result1)) {
                  $total += 1;
                }

                $p = $total/50;
                $p = ceil($p);

                for ($b=1;$b<=$p;$b++) {
                  ?><a href="player.php?page=<?php echo $b; ?>&cc=<?php echo $condition; ?>"><?php echo $b." "; ?></a><?php
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