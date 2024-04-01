<?php

require 'header.php';

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$data = query("SELECT * FROM product WHERE id_product = '$id'");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			   <script>
			   	alert('Data berhasil diubah');
			   	document.location.href = 'beranda.php';
			   </script>
			   ";
	} else {
		echo "
			   <script>
			   	alert('Data gagal diubah');
			   	document.location.href = 'beranda.php';
			   </script>
			   ";
	}
}

if (!isset($_SESSION['username'])) {
	echo "<script>alert('Anda Harus Login!');</script>";
	header("Location: index.php");
	exit();
}

?>
		<div id="page-wrapper">

			<div class="container-fluid">
<div style="text-align: center; color:darkcyan">
<h3> Ubah Produk</h3>
</div>
		
				<!-- page table -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Nama Produk</label>
						<div class="col-sm-10">
							<input type="text" name="name" value="<?php echo $data['name_product']?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Katagori</label>
						<div class="col-sm-10">
							<select name="category" class="form-control"  id="exampleFormControlSelect1">
								<?php
								$i = 1;
								foreach ($list_category as $row) :	
									$name_c = $row['name_category'] ;
									$name= ucfirst($name_c);
									if( $name_c == $data['category'] ){
										echo"<option selected value='$name_c'> $name</option>";
									}else {
										echo"<option value='$name_c'>  $name</option>";
									}
								?>
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Merek</label>
						<div class="col-sm-10">
							<select name="merek" class="form-control" id="exampleFormControlSelect1">
								<?php
								$i = 1;
								foreach ($list_merek as $row) :
									$name_c = $row['name_merek'] ;
									$name= ucfirst($name_c);
									if( $name_c == $data['merek'] ){
										echo"<option selected value='$name_c'> $name</option>";
									}else {
										echo"<option value='$name_c'>  $name</option>";
									}
								?>
								
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label"> Berat (Gr)</label>
						<div class="col-sm-10">
							<input type="number" value="<?php echo $data['berat']?>" name="berat" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label"> Bahan </label>
						<div class="col-sm-10">
							<input type="text" value="<?php echo $data['bahan']?>" name="bahan" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label"> Unit </label>
						<div class="col-sm-10">
							<input type="number" value="<?php echo $data['unit']?>" name="unit" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<input type="text" value="<?php echo $data['desc']?>" name="desc" class="form-control" id="staticEmail">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Harga</label>
						<div class="col-sm-10">
							<input type="number" value="<?php echo $data['price']?>" name="harga" class="form-control" id="staticEmail" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-10">
							<input type="file" value="<?php echo $data['foto']?>" name="foto" required>
						</div>
					</div>
					<div style="text-align: center; margin-bottom:2%;">
						<button type="submit" class="btn btn-primary" name="register"> Ubah Produk</button>
					</div>

				</form>

			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
<?php include "footer.php" ?>