<?php include 'header.php';
$id_product = $_GET['id'];
$getData = query("SELECT * FROM tb_outlet WHERE id_outlet='$id_product'");
$getDataProduk=query("SELECT * FROM product WHERE id_outlet='$id_product' ");
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
            <h2> Detail Outlet</h2>
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
         
                        <img style="border-radius:10px;max-width: 30vw; margin:10px 0;
    max-height: 22vw;" src="../img/<?= $getData[0]['image_outlet'] ?>">
                   
                 
            
        </div>
        <form id="formku" action="" method="post" enctype="multipart/form-data">
            <table style="border:none" class="table table-condensed lihat">
                <!-- <input type="hidden" name="id_province" id="id_province" value="<?php echo $id_province ?>" class="form-control"> -->
                <tr>
                    <td style="border: none;"><label for="nama">Nama Outlet</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['name_outlet'] ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td style="border: none;"><label for="pos">Provinsi</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['province'] ?>" /></td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="pos">City</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['city'] ?>" /></td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="pos">Address </label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['address'] ?>" /></td>
                </tr>

                <tr>
                    <td style="border: none;"><label for="tlp">Telepon</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="<?= $getData[0]['phone'] ?>" /></td>
                </tr>
                <tr>
                <tr>
                    <td style="border: none;"><label for="tlp">Deskripsi Outlet</label></td>
                    <td style="border: none;"><textarea readonly class="form-control"> <?= $getData[0]['desc_outlet']; ?></textarea>
                </tr>
             
            </table>
        </form>

        <h3>Produk Outlet</h3>
        <div class="table-responsive">
							<form action="" method="post">
								<table id="myTable" class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col" class="text-center">Nama Produk</th>
											<th scope="col" class="text-center">Harga</th>
											<th scope="col" class="text-center">Unit</th>
											<th scope="col" class="text-center">Status</th>
											<th scope="col" class="text-center">Gambar</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbdy>


										<?php $i = 1; ?>
										<?php foreach ($getDataProduk as $row) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
												<td><?= $row["name_product"]; ?></td>
												<td>Rp.<?= number_format($row["price"]); ?></td>
												<td><?= $row["unit"]; ?></td>
												<td><?= $row["status"]; ?></td>
												<td><img src="../img/<?= $row["foto"]; ?>" width="90px"></td>
												<td>
												
													<a class="btn btn-warning" style="border: none;" href="detail_product_outlet.php?id=<?= $row["id_product"]; ?>">Detail</a>
                                                    <a href="hapus.php?type=productOutlet&&id=<?php echo "$row[id_product]&&id_outlet=$row[id_outlet]" ?>" class="btn btn-danger">Hapus</button></a>
													<input hidden name="id_product" value="<?= $row["id_product"]; ?>">
													<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Produk</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<input required hidden type="text" name="id_product" id="id_product" value="" />
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	Apakah anda yakin ingin menyetujui produk ini?
																</div>
																<div class="modal-footer">

																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<!-- <input name="id_product" value="<?= $row["id_product"]; ?>"> -->
																	<button type="submit" name="approve" class="btn btn-primary">Yes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			</td>
			</tr>
			<script>
				$(document).on("click", "#modal_approve", function() {
					var id_product = $(this).data('id');
					$(".modal-header #id_product").val(id_product);
					// As pointed out in comments, 
					// it is unnecessary to have to manually call the modal.
					// $('#addBookDialog').modal('show');
				});
			</script>
			<?php $i++; ?>
        <?php endforeach; ?> 
      </tbody>
		</table> <!-- Modal -->
        <a style="float:right; margin-top:1vw; margin-bottom:2vw" href="outlet.php" class="btn btn-md btn-primary">Kembali</a>
		</div>
    </div>
</div>


<?php include 'footer.php' ?>