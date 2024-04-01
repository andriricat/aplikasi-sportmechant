<?php include 'header.php';
$id_product = $_GET['id'];
$getData = query("SELECT * FROM tb_login WHERE id_user='$id_product'");
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
            <h2> Detail User</h2>
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
            
                        <img style="border-radius:10px;max-width: 35vw; margin:10px 0;
    max-height: 22vw;" src="../img/<?= $getData[0]['image'] ?>">
                    
                </div>

                <!-- Left and right controls -->
               
        </div>
        <form id="formku" action="" method="post" enctype="multipart/form-data">
            <table style="border:none" class="table table-condensed lihat">
                <!-- <input type="hidden" name="id_province" id="id_province" value="<?php echo $id_province ?>" class="form-control"> -->
                <tr>
                    <td style="border: none;"><label for="nama">Nama User</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['name'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Username</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['username'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Email</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['email'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Provinsi</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['province'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Kota</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['city'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">Kode Pos</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['kode_pos'] ?>" />
                    </td>
                </tr>
               
                <tr>
                    <td style="border: none;"><label for="pos">Alamat</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['alamat'] ?>" /></td>
                </tr>

                <tr>
                    <td style="border: none;"><label for="tlp">Telepon</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['tlp'] ?>" /></td>
                </tr>
                                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;">
                    <!-- <button type="submit" name="finish" class="btn btn-md btn-info">Approve Product</button> -->
                        <a href="user.php" class="btn btn-md btn-primary">Kembali</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

<!-- Flot Charts JavaScript -->
<!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>
<script src="js/plugins/flot/flot-data.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="../datatables/datatables.min.js"></script>
<!-- tooltip -->
<script>
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
</script>

<!-- generate datatable on our table -->
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>

</html>