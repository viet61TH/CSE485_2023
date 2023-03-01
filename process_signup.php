<?php 
    require_once('include/datas_include/database_connection.php');

    if(isset($_POST['txtUser'])) 
{
    $txtUserName = $_POST['txtUser'];
    $txtUserPass = $_POST['txtPassword'];
    $txtEmail = $_POST['txtEmail'];
    
    $showAllName = "SELECT ten_dnhap FROM user";
    $result = mysqli_query($conn, $showAllName );

    $found = false;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            // echo $row[$key];
            if ($value == $txtUserName ) {
                $found = true; // trùng lặp đánh dấu true
                break 2; // thoát khỏi cả hai vòng lặp while và foreach
            }
        }
    }

    if($found){
        
?>
    <script>
        alert("Tên đăng nhập đã tồn tại");
        window.location.href = "login.php";
    </script>

    
<?php
    
    }
 else{
    $pushUserSql = "INSERT INTO user(ten_dnhap,mat_khau,email,ngay_dki) VALUES ('$txtUserName','$txtUserPass','$txtEmail',current_timestamp())";
    if(mysqli_query($conn,$pushUserSql)){
        header("Location: login.php");
    }
       
    }
}
?>