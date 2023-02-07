<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">
            <img src="img/logo.png" width="100px">
            </a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!-- content1 -->
    <div class="content">
        <div class="container1 gambar">
        </div>
        <div class="clear"></div>
    </div>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category1 ORDER BY category1_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {
                ?>
                    <a href="produk.php?kat=<?php echo $k['category1_id'] ?>">
                        <div class="col-5">
                            <img src="img/vans.png">
                            <p><?php echo $k['category1_name'] ?></p>
                        </div>
                        </a>
                <?php }}else{ ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>

                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {
                ?>
                    <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/converse.png">
                            <p><?php echo $k['category_name'] ?></p>
                        </div>
                        </a>
                <?php }}else{ ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>

                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category2 ORDER BY category2_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {
                ?>
                    <a href="produk.php?kat=<?php echo $k['category2_id'] ?>">
                        <div class="col-5">
                            <img src="img/nike.png">
                            <p><?php echo $k['category2_name'] ?></p>
                        </div>
                        </a>
                <?php }}else{ ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk terbaru</h3>
            <div class="box">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($produk) > 0) {
                        while($p = mysqli_fetch_array($produk)) {
                ?>
                    <a href="detail-produk.php?id=<?php echo $p['product_id']?>">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22109.145817162036!2d110.28741650726876!3d-7.066921549568012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7062225104fdc3%3A0x960172f040610cc!2sJatisari%2C%20Mijen%2C%20Semarang%20City%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1656485648303!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class ="containerfooter">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No. Telp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2022 - Adnin Ramadhani </small>
        </div>
    </div>
</body>

</html>