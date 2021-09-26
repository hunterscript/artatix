<?php
    if(isset($_SESSION['user_level'])){
        $id_u = $_SESSION['user_id'];
        $queryName = mysqli_query($konek, "SELECT user_email FROM tbl_user WHERE user_id='$id_u'");
        
        $name = mysqli_fetch_object($queryName);
        
        if($_SESSION['user_level'] === 'admin'){
            echo '<li><a href="role_admin/index.php">'.$name->user_email.'</a></li>';
        } elseif($_SESSION['user_level'] === 'member') {
            echo '<li><a href="role_member/index.php">'.$name->user_email.'</a></li>';
        } else {
            echo '<li><a href="page_login.php">Login</a></li>';
        }
    } else {
        echo '<li><a href="page_login.php">Login</a></li>';
    }
?>