<?php include "header.php";
$list_user2 = query("SELECT * FROM tb_login where id_user != '$_SESSION[id_user]'");

?>
<div class="container-fluid">

		<!-- Page Heading -->

		<!-- /.row -->

		<!-- page table -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>User</h3>
					</div>

					<div class="panel-body">
						<!-- <center>
							<h2 style="color: red;">User</h2>
						</center><br> -->
						<div class="table-responsive">
							<form action="" method="post">
								<table id="myTable" class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col" class="text-center">Nama User</th>
											<th scope="col" class="text-center">Provinsi</th>
											<th scope="col" class="text-center">Kota</th>
                                            <th scope="col" class="text-center">Alamat</th>
                                            <th scope="col" class="text-center">Telepon</th>
                                            <th scope="col" class="text-center">Email</th>
											<th scope="col" class="text-center">Gambar</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbdy>


										<?php $i = 1; ?>
										<?php foreach ($list_user2 as $row) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
												<td><?= $row["name"]; ?></td>
												<td><?= $row["province"]; ?></td>
												<td><?= $row["city"]; ?></td>
                                                <td><?= $row["alamat"]; ?></td>
                                                <td><?= $row["tlp"]; ?></td>
                                                <td><?= $row["email"]; ?></td>
												<td><img src="../img/<?= $row["image"]; ?>" width="90px"></td>
												<td>
												
													<a class="btn btn-warning" style="border: none;" href="detail_user.php?id=<?= $row["id_user"]; ?>">Detail</a>
													<a href="hapus.php?type=user&&id=<?= $row["id_user"]; ?>" class="btn btn-danger">Hapus</button></a>
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
<?php include 'footer.php'?>