<?php include 'header.php';
$id_product = $_GET['id'];
$getData = query("SELECT * FROM product WHERE id_product='$id_product'");
if (isset($_POST["finish"])) {
    $data = query("SELECT * FROM order_data WHERE id_pembayaran='$id_pembayaran'");
    foreach ($data as $key => $val) {
        if (approve_pembayaran_order($id_pembayaran) > 0) {
            echo "<script>
            alert('Order Berhasil disetujui');
            document.location.href = 'pesanan.php';
           </script>";
        } else {
            echo "<script>
          console.log();
            alert('errr');
           </script>";
            //   echo mysqli_error($conn);
            echo "error ";
        };
    }
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div style="text-align: center;">
            <h2> Detail Produk</h2>
            <!-- <div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-home"></i> Beranda
					</li>
				</ol>
			</div>
		</div> -->
            <hr>
            <div id="myCarousel" class="carousel slide"  style="
     display: inline-block;" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img style="border-radius:10px;max-width: 35vw; margin:10px 0;
    max-height: 22vw;" src="../img/<?= $getData[0]['foto'] ?>">
                    </div>

                    <div class="item">
                        <?php 
                        if($getData[0]['foto1'] == ""){
                            $foto=$getData[0]['foto'];
                            echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            max-height: 22vw;' src='../img/$foto'>";
                        } else {
                            $foto=$getData[0]['foto1'];
                            echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            max-height: 22vw;' src='../img/$foto'>";
                        }
                        ?>
                      
                    </div>

                    <div class="item">
                    <?php 
                        if($getData[0]['foto2'] == ""){
                            $foto=$getData[0]['foto'];
                            echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            max-height: 22vw;' src='../img/$foto'>";
                        } else {
                            $foto=$getData[0]['foto2'];
                            echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            max-height: 22vw;' src='../img/$foto'>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a style="box-shadow: none; border-radius: 15px;
    margin: 0.7vw 0;" class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a style="box-shadow: none; border-radius: 15px;
    margin: 0.7vw 0;" class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <form id="formku" action="" method="post" enctype="multipart/form-data">
            <table style="border:none" class="table table-condensed lihat">
                <!-- <input type="hidden" name="id_province" id="id_province" value="<?php echo $id_province ?>" class="form-control"> -->
                <tr>
                    <td style="border: none;"><label for="nama">Nama Product</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['name_product'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Price</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="Rp.<?= number_format($getData[0]['price']) ?>" /> </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="pos">Category </label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['category'] ?>" /></td>
                </tr>

                <tr>
                    <td style="border: none;"><label for="tlp">Merek</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['merek'] ?>" /></td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="tlp">Jumlah Transfer</label></td>
                    <td style="border: none;"><input readonly class="form-control" value="<?= $getData[0]['unit']; ?>" />
                    <input hidden name="id_product" value="<?= $id_product ?>" /></td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="tlp">Berat</label></td>
                    <td style="border: none;"><input readonly class="form-control" value="<?= $getData[0]['unit']; ?>" />
                </tr>
                <tr>
                    <td style="border: none;"><label for="tlp">Deskripsi</label></td>
                    <td style="border: none;"><textarea readonly class="form-control"> <?= $getData[0]['desc']; ?></textarea>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;">
                    <!-- <button type="submit" name="finish" class="btn btn-md btn-info">Approve Product</button> -->
                        <a href="detail_outlet.php?id=<?php echo $getData[0]['id_outlet']?>" class="btn btn-md btn-primary">Kembali</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include 'footer.php' ?>