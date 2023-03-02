<?php
    require 'include\header_global.php';
?>
   <style>
        main.container.mt-5{
            font-family: var(--fontfamily-primary) ;
            font-size: 19px ;
        }
   </style>

<?php
    
?>
    <main class="container mt-5" style="margin-top:200px!important" >
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <?php
        require 'include\datas_include\database_connection.php';
        $post_id = $_GET['id'];
        $sql = "SELECT * 
        FROM baiviet 
        Where ma_bviet=$post_id";
        $result = mysqli_query($conn, $sql);   
        $row = mysqli_fetch_assoc($result);

        $sql1 = "SELECT ten_tloai FROM theloai
        INNER JOIN baiviet on baiviet.ma_tloai = theloai.ma_tloai
        WHERE baiviet.ma_bviet =$post_id";
        $result1 = mysqli_query($conn, $sql1);   
        $row1 = mysqli_fetch_assoc($result1);

        $sql2 = "SELECT ten_tgia FROM tacgia
        INNER JOIN baiviet on baiviet.ma_tgia = tacgia.ma_tgia
        WHERE baiviet.ma_bviet =$post_id";
        $result2 = mysqli_query($conn, $sql2);   
        $row2 = mysqli_fetch_assoc($result2);

        ?>
        <div class="row mb-5">
            <div class="col-sm-4">
                <img src="<?php echo $row['hinhanh'];?>" class="img-fluid" alt="...">
            </div>
            <div class="col-sm-8">
                <h5 class="card-title mb-2">
                    <a href="" class="text-decoration-none"><?php echo $row['tieude'];?></a>
                </h5>
                <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $row['ten_bhat'];?></p>
                <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $row1['ten_tloai'];?></p>
                <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $row['tomtat'];?></p>
                <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $row['tomtat'];?></p>
                <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $row2['ten_tgia'];?></p>

            </div>          
        </div>
    </main>
<?php
    require 'include\footer_global.php';
?>