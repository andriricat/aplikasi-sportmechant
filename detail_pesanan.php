<?php include 'header.php';
$id_pembayaran = $_GET['id_pembayaran'];
$getData = query("SELECT * FROM order_data LEFT JOIN tb_outlet ON tb_outlet.id_outlet = order_data.id_outlet WHERE order_data.id_pembayaran='$id_pembayaran'");

?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div style="text-align: center;">
            <h2> Detail Pesanan</h2>
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
         	<table id="myTable" class="table table-hover table-striped table-bordered" style="overflow: auto;">
									<!-- <thead> -->
										<tr>
											<th scope="col" class="text-center">No.</th>
                                            <th scope="col" class="text-center">Nama Produk</th>
                                            <th scope="col" class="text-center">Nama Outlet</th>
                                            <th scope="col" class="text-center">Nama Penerima</th>
                                            <th scope="col" class="text-center">Alamat Penerima</th>
                                            <th scope="col" class="text-center">Deskripsi Order</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">Ukuran / Warna</th>
                                            <th scope="col" class="text-center">Unit</th>
                                          
											<th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">Gambar</th>
                                   
                                            <th scope="col" class="text-center">Ongkir</th>
                                            <th scope="col" class="text-center">Sub total</th>
										</tr>
									<!-- </thead> -->
									<tbdy>


										<?php $i = 1; ?>
										<?php foreach ($getData as $row) : ?>
											<tr class="text-center">
												<td><?= $i; ?></td>
                                                <td><?= $row["name_product"]; ?></td>
                                                <td><?= $row["name_outlet"]; ?></td>
                                                <td><?= $row["nama_penerima"]; ?></td>
                                                <td><?= $row["alamat_order"]; ?></td>
                                                <td><?= $row["desc_order"]; ?></td>
                                                <td><?= $row["email"]; ?></td>
                                                <td><?php echo "$row[ukuran]( $row[warna] )   "; ?></td>
                                                <td><?= $row["unit"]; ?></td>
                                                <td><?= $row["status"]; ?></td>
                                                <td><img src="../img/<?= $row["gambar"]; ?>" width="90px"></td>
										
                                                <td><?= $row["ongkir"]; ?></td>
                                                <td>Rp.<?= number_format($row["total_order"]); ?></td>
											
											
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
<a class="btn btn-primary"  style="float:right; margin:1vw" href="pesanan.php"> Kembali</a>
    </div>
</div>


<?php include 'footer.php' ?>