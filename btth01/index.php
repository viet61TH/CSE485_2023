<?php
    require 'include\header_global.php';
?>
<style>
    body{
        background-color: var(--primary-color);
    }
    h3.text-center.text-uppercase.mb-3.text-primary{
        color : #fff !important;
    }
    a.text-decoration-none.text-dark.rgba-red-strong {
        font-family: var(--fontfamily-primary);
        font-size: 18px;
    }
    a.text-decoration-none.text-dark.rgba-red-strong:hover {
        color: red !important;
        text-shadow: 0 2px 18px rgb(0 255 255 / 80%);
    }

</style>
<?php
    
?>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    <!-- </header> -->
    <main class="container-fluid mt-3">
        <div class="row">
            <?php
                require 'include\datas_include\database_connection.php';
                if(isset($_GET['submit_search'])){       
                ?>
                <h3 style = "font-family : var(--fontfamily-primary); color : #fff; " text-center text-uppercase fw-bold>Kết quả tìm kiếm:</h3>
                <?php    
                    $infoSearch= $_GET['search'];
                    if(isset($_GET['search'])){
                        $sql = "SELECT * FROM baiviet 
                        INNER JOIN theloai on theloai.ma_tloai = baiviet.ma_tloai
                        INNER JOIN tacgia on tacgia.ma_tgia = baiviet.ma_tgia 
                        WHERE tieude Like '%$infoSearch%' 
                        OR ten_bhat Like '%$infoSearch%'  
                        OR ten_tgia Like '%$infoSearch%' 
                        OR ten_tloai Like '%$infoSearch%' 
                        ORDER BY ma_bviet DESC";
                        $result = mysqli_query($conn, $sql);        
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                ?>
                                <div class="col-sm-3">
                                    <div class="card mb-2" style="width: 100%;">
                                        <img src="<?php echo $row['hinhanh'];?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="detail.php?id=<?= $row['ma_bviet'] ?>" class="text-decoration-none text-dark rgba-red-strong">
                                                <?php echo $row['tieude'];?>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                    <?php
                        }
                       }
                    else{
                    ?>  
                        <label for="">không có kết quả nào phù hợp</label>
                    <?php
                    }
                }
                
            }
            ?>
                
                
        </div>    
        <div>
            <h3 style = "font-family : var(--fontfamily-primary) " class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
            <div class="row">
                <?php
                require 'include\datas_include\database_connection.php';
                $sql = "SELECT * FROM baiviet ORDER BY ngayviet DESC LIMIT 8";
                $result = mysqli_query($conn, $sql);        
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <img src="<?php echo $row['hinhanh'];?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="detail.php?id=<?= $row['ma_bviet'] ?>" class="text-decoration-none text-dark rgba-red-strong">
                                        <?php echo $row['tieude'];?>
                                    </a>
                                </div>
                            </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>    
    </main>
<?php
    require 'include\footer_global.php';
?>