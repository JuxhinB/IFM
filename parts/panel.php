 <!-- Left Panel -->
<div class="container-fluid">
    <div class="row">
        <?php
        if($_SESSION['status']==1){
            include 'admin_sidebar.php';
            include 'admin_body.php';
        }
        elseif($_SESSION['status']==2){
            include 'player_sidebar.php';
            include 'player_body.php';
        }
        elseif($_SESSION['status']==3){
            include 'manager_sidebar.php';
            include 'manager_body.php';
        }
        ?>
    </div>
</div>