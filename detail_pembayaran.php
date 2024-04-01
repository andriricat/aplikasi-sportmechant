<?php include 'header.php';
$id_product = $_GET['id'];
$getData = query("SELECT * FROM order_data LEFT JOIN  tb_outlet on tb_outlet.id_outlet = order_data.id_outlet WHERE order_data.id_order='$id_product'");
if (isset($_POST["edit"])) {

  if (transfer($_POST, $_FILES) > 0) {
    echo "<script>
            alert('Data transfer berhasil dibuat');
            document.location.href = 'pembayaran.php';
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
$jmlhfoto = 3;
if ($getData[0]['gambar2'] == "") {
  $jmlhfoto = $jmlhfoto - 1;
}
if ($getData[0]['gambar3'] == "") {
  $jmlhfoto = $jmlhfoto - 1;
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
      <?php
      if ($jmlhfoto == 3) {
      ?>
        <div id="myCarousel" class="carousel slide" style="
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
    " src="../img/<?= $getData[0]['gambar'] ?>">
            </div>

            <div class="item">
              <?php
              $gambar2 = $getData[0]['gambar2'];
              echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            ' src='../img/$gambar2'>";

              ?>

            </div>

            <div class="item">
              <?php
              $gambar3 = $getData[0]['gambar3'];
              echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            ' src='../img/$gambar3'>";
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
      <?php
      } else if ($jmlhfoto == 2) { ?>

        <div id="myCarousel" class="carousel slide" style="
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
    " src="../img/<?= $getData[0]['gambar'] ?>">
            </div>

            <div class="item">
              <?php
              if ($getData[0]['gambar2'] == '') {
                $gambar2 = $getData[0]['gambar3'];
              } else {
                $gambar2 = $getData[0]['gambar2'];
              }

              echo "<img style='border-radius:10px;max-width: 35vw; margin:10px 0;
                            ' src='../img/$gambar2'>";

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
      <?php
      } else {
      ?>
        <img style="border-radius:10px;max-width: 35vw; margin:10px 0;
    " src="../img/<?= $getData[0]['gambar'] ?>">
      <?php
      }
      ?>
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
          <td style="border: none;"><label for="nama">Nama Penerima</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="<?= $getData[0]['nama_penerima'] ?>" />
          </td>
        </tr>
        <tr>
          <td style="border: none;"><label for="nama">Nama Outlet</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="<?= $getData[0]['nama_penerima'] ?>" />
          </td>
        </tr>
        <tr>
          <td style="border: none;"><label for="nama">Bank Outlet</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="<?= $getData[0]['bank'] ?>" />
          </td>
        </tr>
        <tr>
          <td style="border: none;"><label for="nama">No Rekening</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="<?= $getData[0]['no_rek'] ?>" />
          </td>
        </tr>
        <tr>
          <td style="border: none;"><label for="pos">Alamat</label></td>
          <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['alamat_order'] ?>" /></td>
        </tr>

        <tr>
          <td style="border: none;"><label for="tlp">Warna</label></td>
          <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['warna'] ?>" /></td>
        </tr>

        <tr>
          <td style="border: none;"><label for="tlp">Ukuran</label></td>
          <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['warna'] ?>" /></td>
        </tr>
        <tr>
          <td style="border: none;"><label for="tlp">Jumlah Transfer</label></td>
          <td style="border: none;"><input readonly class="form-control" value="<?= $getData[0]['unit']; ?>" />
            <input hidden name="id_product" value="<?= $id_product ?>" /></td>
        </tr>
        <tr>
          <td style="border: none;"><label for="tlp">Berat</label></td>
          <td style="border: none;"><input readonly class="form-control" value="<?= $getData[0]['berat_order']; ?> Gr" />
        </tr>
        <tr>
          <td style="border: none;"><label for="tlp">Deskripsi</label></td>
          <td style="border: none;"><textarea readonly class="form-control"> <?= $getData[0]['desc_order']; ?></textarea>
        </tr>
        <tr>
          <td style="border: none;"><label for="nama">Ongkir</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="Rp.<?= number_format($getData[0]['ongkir']) ?>" /> </td>
        </tr>
        <tr>
          <td style="border: none;"><label for="nama">Pembayaran</label></td>
          <td style="border: none;">
            <input readonly class="form-control" value="Rp.<?= number_format($getData[0]['total_order']) ?>" /> </td>
        </tr>
        <tr>
          <td style="border: none;"></td>
          <td style="border: none;">
            <?php
            $data = query("SELECT COUNT(*) as total FROM transfer_pembayaran WHERE id_order ='$id_product' ");
            // print_r($data[0]['total']);
            if ($data[0]['total'] == 0) { ?>
              <a data-toggle="modal" data-target="#exampleModalEdit" id="modal_edit" class="btn btn-md btn-info">Transfer Dana</a>
            <?php } else {
            ?>
              <a data-toggle="modal" data-target="#exampleModalDetail" id="modal_edit" class="btn btn-md btn-info">Detail Transfer</a>
            <?php
            } ?>
            <a href="pembayaran.php" class="btn btn-md btn-primary">Kembali</a></td>
        </tr>
      </table>
    </form>
  </div>
</div>

<form action="" method="post" enctype="multipart/form-data">
  <input hidden name="id_user" value="<?= $getData[0]['id_user'] ?>">
  <input hidden name="id_outlet" value="<?= $getData[0]['id_outlet'] ?>">
  <input hidden name="id_order" value="<?= $id_product ?>">
  <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Transfer Dana </h3>
        </div>
        <div style="margin-left:2%" class="modal-body">
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Nama Pemilik Rekening : </label>
            </div>

            <input class="form-control" style="width: 35%;" type="text" readonly value="<?= $getData[0]['nama_rek'] ?>" />

          </div>
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Bank : </label>
            </div>
            <input class="form-control" style="width: 35%;" type="text" readonly value="<?= $getData[0]['bank'] ?>" />

          </div>
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Nomor : </label>
            </div>

            <input class="form-control" style="width: 35%;" type="text" readonly value="<?= $getData[0]['no_rek'] ?>" />

          </div>
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Dana transfer : </label>
            </div>

            <input class="form-control" style="width: 35%;" type="text" readonly value="<?= $getData[0]['total_order'] ?>" />

          </div>
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Jumlah Transfer : </label>
            </div>

            <input class="form-control" style="width: 35%;" type="text" name="jumlah" required />

          </div>
          <div class="row" style="display: flex; margin-bottom:2%">
            <div style="width: 30%;">
              <label> Bukti Transfer : </label>
            </div>
            <input name="foto" type="file" required />

          </div>
        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="exampleModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Detail Dana </h3>
      </div>
      <div style="margin-left:2%" class="modal-body">
        <?php
        $data_a = query("SELECT * FROM transfer_pembayaran WHERE id_order = '$id_product'");
        ?>
        <div style="text-align: center;">
          <img src="../img/<?= $data_a[0]['bukti_foto'] ?>" style="max-width: 500px; max-height: 500px;">
        </div>
        <h4>
          Jumlah transfer : Rp. <?= number_format($data_a[0]['jumlah']) ?>
        </h4>
        <h4>
          Status : <?= ucfirst($data_a[0]['status']) ?>
        </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="edit" class="btn btn-primary">Edit</button> -->
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>