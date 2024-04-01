<?php
include "header.php";
if (isset($_POST["approve"])) {
	if (approve_product($_POST) > 0) {
		echo "<script>
          alert('Produk Berhasil diapprove');
          document.location.href = 'beranda.php';
         </script>";
	} else {
		$id = $_POST['id_product'];
		echo "<script>
          alert('errr');
		  $id
         </script>";
		//   echo mysqli_error($conn);
		echo "error ";
	}
}
?>
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Beranda
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-home"></i> Beranda
					</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<!-- page table -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Beranda</h3>
					</div>

					<div class="panel-body">
						<center>
							<h2 style="color: red;">Produk Terbaru</h2>
						</center><br>
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
										<?php foreach ($list_product as $row) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
												<td><?= $row["name_product"]; ?></td>
												<td>Rp.<?= number_format($row["price"]); ?></td>
												<td><?= $row["unit"]; ?></td>
												<td><?= $row["status"]; ?></td>
												<td><img src="../img/<?= $row["foto"]; ?>" width="90px"></td>
												<td>
													<?php if ($row["status"] == "approve") {

													?>
														<!-- <a readonly><button readonly class="btn btn-success btn-sm" name="submit">Approve</button></a> -->
													<?php } else { ?>
														<a data-toggle="modal" data-id="<?= $row["id_product"]; ?>" data-target="#exampleModal" id="modal_approve" href=""><button type="submit" class="btn btn-primary btn-sm" name="submit">Approve</button></a>

													<?php } ?>
													<a class="btn btn-warning" style="border: none;" href="detail_product.php?id=<?= $row["id_product"]; ?>">Detail</a>
													<a href="hapus.php?type=product&&id=<?= $row["id_product"]; ?>" class="btn btn-danger">Hapus</button></a>
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
		<?php endforeach; ?> </tbody>
		</table> <!-- Modal -->

		</div>
	</div>

</div>
</div>

</div>



</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php include "footer.php" ?>