 <!-- Left Panel -->
<div class="container-fluid">
    <div class="row">
        <?php
        if($_SESSION['status']==1){
            include 'panel/admin_sidebar.php';
        }
        elseif($_SESSION['status']==2){
            include 'panel/player_sidebar.php';
        }
        elseif($_SESSION['status']==3){
            include 'panel/manager_sidebar.php';
        }
        ?>
    </div>
</div>