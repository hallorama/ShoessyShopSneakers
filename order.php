<?php
    error_reporting(0);
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
    <title>Produk</title>
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

	<div class="container">
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_bukawarung";
		$product_id="";
	

	if (isset($_GET['product_id'])){
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		$product_id=$_GET['product_id'];
		$sql = "SELECT * FROM db_bukawarung WHERE product_id=".$_GET['product_id'];
		$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	  echo'
		<div class="row">
			<div class="col-25">
				<img src='.$row['product_image'].' alt="Foto Produk" width="300" height="200">
		</div>
		<div class="col-75">
			<b><div class="name">'.$row['product_name'].'</div></b>
		</div>
		</div>
	  ';
	  
	  }
	} else {
	  echo "0 results";
	}
	$conn->close();
	}
	
	if (isset($_GET['submit'])){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO tb_order (product_id, nama, hp, Jumlah, alamat, kode_pos)
		VALUES ('".$_GET['product_id']."', '".$_GET['nama']."', '".$_GET['hp']."','".$_GET['Jumlah']."', '".$_GET['alamat']."','".$_GET['kode_pos']."')";

		if ($conn->query($sql) === TRUE) {
			echo '
				<div class="row">
					<div class="report">
						Pemesanan telah diterima. Terimakasih telah order ditempat kami. 
					</div>
				</div>
			';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	
	?>
		
		<form action="order.php">
		<div class="row">
		<div class="col-25">
			<label for="product_id">ID Barang</label>	
		</div>
		<div class="col-75">
			<input type="text" id="product_id" name="product_id" value="<?php echo$product_id?>">
		</div>
		</div>
		<div class="row">
		<div class="col-25">
			<label for="lname">Nama</label>
		</div>
		<div class="col-75">
			<input type="text" id="nama" name="nama" placeholder="Nama Anda..">
		</div>
		</div>
		<div class="row">
		<div class="col-25">
			<label for="country">Nomor HP</label>
		</div>
		<div class="col-75">
			<input type="text" id="hp" name="hp" placeholder="Nomor HP Anda..">
		</div>
		</div>
		<div class="row">
		<div class="col-25">
		<label for="country">Kode POS</label>
		</div>
		<div class="col-75">
			<input type="text" id="kode_pos" name="kode_pos" placeholder="Kode Pos Anda..">
		</div>
		</div>
		<div class="row">
		<div class="col-25">
			<label for="subject">Jumlah</label>
		</div>
		<div class="col-75">
			<select id="Jumlah" name="Jumlah">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
        <option value="5">5</option>
      </select>
		</div>
		</div>
		<div class="row">
		<div class="col-25">
			<label for="lname">Alamat</label>
		</div>
		<div class="col-75">
			<textarea id="alamat" name="alamat" placeholder="Alamat Rumah Anda.." style="height:200px">
			</textarea>
		</div>
		</div>
		<div class="row">
			<input type="submit" name="submit" value="Submit">
		</div>
		</form>
		</div>
	</div>
	</div>

	 <!-- footer -->
	 <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Adnin Ramadhani</small>
        </div>
    </footer>
</body>

</html>
</body>
</html>