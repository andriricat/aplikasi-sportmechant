<?php include 'header.php';
$id_pembayaran = $_GET['id_pembayaran'];
$getData = query("SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
if (isset($_POST["finish"])) {
    $data=query("SELECT * FROM order_data WHERE id_pembayaran='$id_pembayaran'");
    foreach ($data as $key => $val) {
        if(approve_pembayaran_order($id_pembayaran)>0){
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
            <h2> Detail Pembayaran</h2>
            <hr>
            <img style="border-radius:10px;max-width: 35vw; margin:10px 0;
    max-height: 22vw;" src="../img/<?= $getData[0]['foto_bukti'] ?>">
        </div>
        <form id="formku" action="" method="post" enctype="multipart/form-data">
            <table style="border:none" class="table table-condensed lihat">
                <!-- <input type="hidden" name="id_province" id="id_province" value="<?php echo $id_province ?>" class="form-control"> -->
                <tr>
                    <td style="border: none;"><label for="nama">Nama Rekening</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['nama_rek'] ?>" />
                    </td >
                </tr>
                <tr>
                    <td style="border: none;"><label for="nama">No Rekening</label></td>
                    <td style="border: none;">
                        <input readonly class="form-control" value="<?= $getData[0]['no_rek'] ?>" /> </td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="pos">Bank</label></td>
                    <td style="border: none;">  <input readonly class="form-control" value="<?= $getData[0]['bank'] ?>" /></td>
                </tr>

                <tr>
                    <td style="border: none;"><label for="tlp">Grand total</label></td>
                    <td style="border: none;"> <input readonly class="form-control" value="Rp. <?= number_format($getData[0]['pembayaran']); ?>" /></td>
                </tr>
                <tr>
                    <td style="border: none;"><label for="tlp">Jumlah Transfer</label></td>
                    <td style="border: none;"><input readonly class="form-control" value="Rp. <?= number_format($getData[0]['transfer']); ?>" />
                        <input hidden name="id_pembayaran" value="<?= $id_pembayaran ?>" /></td>
                </tr>

                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;">
                    <?php 
                    if($getData[0]['lunas'] == "lunas"){

                    } else {
                        echo " <button type='submit' name='finish' class='btn btn-md btn-info'>Approve Pembayaran</button>";
                    }
                    ?>
                        <a href="pesanan.php" class="btn btn-md btn-primary">Kembali</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include 'footer.php' ?>