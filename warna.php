<?php include 'header.php';
if (isset($_POST["approve"])) {
    print_r($_POST);
    if (add_warna($_POST) > 0) {

        echo "<script>
          alert('warna Berhasil di tambahkan');
          document.location.href = 'warna.php';
         </script>";
    } else {
        echo "<script>
          alert('errr');
    	  $id
         </script>";
        //   echo mysqli_error($conn);
        echo "error ";
    }
}
if (isset($_POST["edit"])) {
    print_r($_POST);
    if (edit_warna($_POST) > 0) {

        echo "<script>
          alert('Warna Berhasil di ubah');
          document.location.href = 'warna.php';
         </script>";
    } else {
        echo "<script>
          alert('errr');
         </script>";
        //   echo mysqli_error($conn);
        echo "error ";
    }
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container card" style="margin-right:auto; margin-left:auto; background: white;">
            <div class="panel-body">
                <div class="panel-body">
                    <center>
                        <h2 style="color: blue;"> Warna</h2>
                    </center><br>
                    <div class="table-responsive" style="overflow-x: hidden;">

                        <table id="myTable" class="table table-hover table-striped table-bordered">
                            <thead>
                                <a data-toggle="modal" data-target="#exampleModal" id="modal_approve" class="btn btn-primary" style="float: right; margin-bottom:1vw"> Tambah Warna</a>
                                <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Warna</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbdy>


                                <?php $i = 1; ?>
                                <?php foreach ($list_warna as $row) : ?>
                                    <tr class="text-center">
                                        <td><?= $i; ?></td>
                                        <td><?= $row["warna"]; ?></td>

                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModalEdit" id="modal_edit" data-id="<?= $row["id_warna"]; ?>" class="btn btn-warning ">Ubah</a>
                                            <a href="hapus.php?type=warna&&id=<?= $row["id_warna"]; ?>" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>

        <?php $i++; ?>
    <?php endforeach; ?> </tbody>
    </table> <!-- Modal -->

    </div>
</div>
<form action="" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Menambahkan Warna</h3>
                </div>
                <div class="modal-body">
                    <label> Warna : </label>
                    <input type="text" name="warna" />
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="approve" class="btn btn-primary">Yes</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="" method="post">
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Ubah warna</h3>
                </div>
                <div class="modal-body">
                    <label> Warna : </label>
                    <input hidden name="id_warna" id="id_merek">
                    <input type="text" name="warna" />
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).on("click", "#modal_edit", function() {
        var id_product = $(this).data('id');
        $("#id_merek").val(id_product);
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
</script>
<?php include 'footer.php' ?>