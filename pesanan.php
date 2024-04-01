<?php include 'header.php' ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="container card" style="margin-right:auto; margin-left:auto; background: white;">
            <div style="text-align: center;">
                <h3> Daftar Pesanan</h3>
            </div>
            <hr>
            </hr>
            <?php $j = 1;
            $i = 0; ?>
            <?php 
            foreach ($list_pembayaran as $data) : $count = 0; ?>
                <div style="border: solid 1px #2424; padding-top:2%; padding-bottom:2%; ">
                    <?php $i = 0; ?>
                    <?php
                    $id_pembayaran = $data['id_pembayaran'];
                    $list_order = query("SELECT * FROM order_data LEFT JOIN tb_outlet ON order_data.id_outlet = tb_outlet.id_outlet WHERE order_data.id_pembayaran = '$id_pembayaran' ORDER BY order_data.id_order Desc ");
                    foreach ($list_order as $row) :
                        if ($row['status'] == "waiting payment") {
                            $count = 0;
                        } else {
                            $count++;
                        }
                    ?>
                        <div class="row">
                            <div class="col-md-5" style="text-align: center">
                                <img style="min-height:220;max-height:220px; border-radius:10px ; min-width:250px" src="../img/<?php echo $row['gambar']; ?>">
                            </div>
                            <div class="col-md-7">
                                <h4><?= ucfirst($row['name_product']) ?></h4>
                                <p>Toko : <?= ucfirst($row['name_outlet']) ?></p>
                                <p>Tanggal : <?= ucfirst($row['date']) ?></p>
                                <p>Status : <?= ucfirst($row['status']) ?></p>
                                <p>Deskripsi : <?= ucfirst($row['desc_order']) ?></p>
                                <p>No Telepon : <?= ucfirst($row['telp']) ?></p>
                                <p style="color:coral"> Pembayaran : Rp. <?= number_format($row['total_order']) ?></p>
                            </div>
                        </div>
                        <hr>
                        </hr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    <div class="row">
                        <div class="col-md-5"> </div>
                        <div class="col-md-7">
                            <p style="color:coral">Total Pembayaran : Rp. <?= number_format($data['pembayaran']) ?></p>
                            <div>
                                <?php
                                if ($count == $i) {
                                ?>
                                    <div class="col-md-3" style="padding-left:0px;">
                                        <a href="lihat_pembayaran.php?id_pembayaran=<?= $data['id_pembayaran'] ?>&&g_total=<?= $data['pembayaran'] ?>" class="btn btn-primary"> Lihat Pembayaran </a>
                                    </div>
                                <?php
                                } else {
                                    echo "<h4>Pesanan belom di bayar </h4>";
                                }
                                ?>

                                <div class="col-md-4">
                                    <a href="detail_pesanan.php?id_pembayaran=<?= $data['id_pembayaran'] ?>" class="btn btn-warning"> Detail Pesanan </a>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>


                <hr>
                </hr>
                <?php $j++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>