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
                <legend>Player Performance:</legend>

                <label for="stat">Performance (Default Value: Goal Score)</label>
                <select id="stat" name="stat" value="<?php echo htmlspecialchars($_GET['stat']);?>">
                  <option value=""></option>
                  <option value="score">score</option>
                  <option value="assist">assist</option>
                  <option value="card">card</option>
                </select>

                <label for="lclubname">Plays for which club (Ex: Chelsea)</label>
                <input type="text" id="clubname" name="clubname" value="<?php echo htmlspecialchars($_GET['clubname']);?>"><hr>

              
                <input type="submit" value="Search">
              </fieldset>
            </form>
          </div>
        </div><!--/.sidebar-offcanvas-->


        <div class="col-xs-12 col-lg-9">
          
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <h5>Page: </h5>
              <form method="get" action="">
                <table id="t01">
                  <tr>
                    <th>Club_name</th>
                    <th>Player_name</th>
                    <th>Stat</th>
                  </tr>
                <?php
                include 'inc/connection.php';


                // style="width:100%; border: 1px solid black; border-collapse: collapse;"
                session_start();


                $rec_limit = 20;
                // Getting the input parameter (user):
                $clubname = trim($_REQUEST['clubname']);
                $stat = trim($_REQUEST['stat']);
                

                $page=$_GET["page"];
                if ($page=="" || $page=="1") {
                  $page1 = 0;
                } else {
                  $page1 = ($page*20)-20;
                }

                $condition=$_GET["cc"];

                if (!$stat) {
                  $stat=$_GET["st"];
                }
                

                if ($clubname) {
                  $condition = "where club_name like '%$clubname%'";
                }

                $query = "SELECT club_name, player_name, count(goal_id) as stat
                          from player p
                          inner join goalscore gs
                          on p.player_id = gs.player_id
                          inner join playerclub pc
                          on p.player_id = pc.player_id
                          inner join club c
                          on pc.club_id = c.club_id ".$condition."group by player_name limit $page1, 50
                          ";



                if ($stat == 'card') {
                  $query = "SELECT club_name, player_name, count(card_type) as stat
                          from player p
                          inner join card ca
                          on p.player_id = ca.player_id
                          inner join playerclub pc
                          on p.player_id = pc.player_id
                          inner join club c
                          on pc.club_id = c.club_id ".$condition."group by player_name limit $page1, 50
                          ";
                } else if ($stat == 'assist') {
                  $query = "SELECT club_name, player_name, count(assist_id) as stat
                          from player p
                          inner join assist a
                          on p.player_id = a.player_id
                          inner join playerclub pc
                          on p.player_id = pc.player_id
                          inner join club c
                          on pc.club_id = c.club_id ".$condition."group by player_name limit $page1, 50
                          ";
                }


              
                $result = mysqli_query($dbcon, $query)
                  or die('Query failed : ' . mysqli_error($dbcon));

                $totalItem = 0;
                while ($tuple = mysqli_fetch_assoc($result)) {
                  print '<tr><td>'.$tuple['club_name'].'</td>
                  <td>'.$tuple['player_name'].'</td>
                  <td>'.$tuple['stat'].'</td></tr>';
                  $totalItem += 1;
                }

                if ($totalItem < 1) {
                  print "<div class='jumbotron'><h4>Search Results: Not Found. Please modify your condition!</h4></div>";
                  //"<p>Search Results: Not Found. Please modify your condition!</p>";
                }

                $query1 = "SELECT club_name, player_name, count(goal_id) as stat
                            from player p
                            inner join goalscore gs
                            on p.player_id = gs.player_id
                            inner join playerclub pc
                            on p.player_id = pc.player_id
                            inner join club c
                            on pc.club_id = c.club_id ".$condition."group by player_name
                            ";
                
                if ($stat == 'assist') {
                  $query1 = "SELECT club_name, player_name, count(assist_id) as stat
                          from player p
                          inner join assist a
                          on p.player_id = a.player_id
                          inner join playerclub pc
                          on p.player_id = pc.player_id
                          inner join club c
                          on pc.club_id = c.club_id ".$condition."group by player_name
                          ";
                } else if ($stat == 'card') {
                  $query1 = "SELECT club_name, player_name, count(card_type) as stat
                          from player p
                          inner join card ca
                          on p.player_id = ca.player_id
                          inner join playerclub pc
                          on p.player_id = pc.player_id
                          inner join club c
                          on pc.club_id = c.club_id ".$condition."group by player_name
                          ";
                }
              
                $result1 = mysqli_query($dbcon, $query1)
                  or die('Query failed: ' . mysqli_error($dbcon));

                $total = 0;
                while ($tuple = mysqli_fetch_assoc($result1)) {
                  $total += 1;
                }

                $p = $total/20;
                $p = ceil($p);

                for ($b=1;$b<=$p;$b++) {
                  ?><a href="playerPerf.php?page=<?php echo $b; ?>&cc=<?php echo $condition; ?>&st=<?php echo $stat; ?>"><?php echo $b." "; ?></a><?php
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