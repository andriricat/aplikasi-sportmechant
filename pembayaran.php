<?php include "header.php";
$list_pembayaran=query("SELECT * FROM order_data LEFT JOIN tb_outlet on order_data.id_outlet = tb_outlet.id_outlet WHERE order_data.status ='selesai'");
$total = 0;
foreach ($list_pembayaran as $row){
 $total += $row['total_order'];
}
print_r($total);

?>
<div class="container-fluid">

		<!-- Page Heading -->

		<!-- /.row -->

		<!-- page table -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">
						<h3>Daftar Pesanan yang selesai</h3>
				
					</div>

					<div class="panel-body">
					<h2 style="color: red; ">Total Pesanan : <span style="color: black;"> Rp. <?= number_format($total);?></span></h2>
							
						<br>
						<div class="table-responsive">
							<form action="" method="post">
								<table id="myTable" class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col" class="text-center">Nama Product</th>
                                            <th scope="col" class="text-center">Nama Penerima</th>
                                            <th scope="col" class="text-center">Nama Outlet</th>
											<th scope="col" class="text-center">Kota</th>
                                            <th scope="col" class="text-center">Alamat</th>
                                            <th scope="col" class="text-center">Telepon</th>
                                            <th scope="col" class="text-center">Pembayaran</th>
                                            <th scope="col" class="text-center">Tanggal</th>
											<th scope="col" class="text-center">Gambar</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbdy>
										<?php $i = 1; ?>
										<?php foreach ($list_pembayaran as $row) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
                                                <td><?= $row["name_product"]; ?></td>
                                                <td><?= $row["nama_penerima"]; ?></td>
                                                <td><?= $row["name_outlet"]; ?></td>
												<td><?= $row["city"]; ?></td>
                                                <td><?= $row["alamat_order"]; ?></td>
                                                <td><?= $row["telp"]; ?></td>
                                              
                                                <td>Rp. <?= $row["total_order"]; ?></td>
                                                <td><?= $row["date"]; ?></td>
												<td><img src="../img/<?= $row["gambar"]; ?>" width="90px"></td>
												<td>
												
													<a class="btn btn-warning" style="border: none;" href="detail_pembayaran.php?id=<?= $row["id_order"]; ?>">Detail</a>
													<!-- <a href="hapus.php?id=<?= $row["id_product"]; ?>"><button type="submit" class="btn btn-danger btn-sm" name="hapus">Hapus</button></a> -->
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