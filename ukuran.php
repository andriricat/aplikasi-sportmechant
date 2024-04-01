<?php include 'header.php';
if (isset($_POST["approve"])) {
    print_r($_POST);
    if (add_ukuran($_POST) > 0) {

        echo "<script>
          alert('Ukuran Berhasil di tambahkan');
          document.location.href = 'ukuran.php';
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
    if (edit_ukuran($_POST) > 0) {

        echo "<script>
          alert('Ukuran Berhasil di ubah');
          document.location.href = 'ukuran.php';
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
                        <h2 style="color: blue;"> Ukuran </h2>
                    </center><br>
                    <div class="table-responsive" style="overflow-x: hidden;">

                        <table id="myTable" class="table table-hover table-striped table-bordered">
                            <thead>
                                <a data-toggle="modal" data-target="#exampleModal" id="modal_approve" class="btn btn-primary" style="float: right; margin-bottom:1vw"> Tambah Ukuran</a>
                                <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Ukuran</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbdy>


                                <?php $i = 1; ?>
                                <?php foreach ($list_ukuran as $row) : ?>
                                    <tr class="text-center">
                                        <td><?= $i; ?></td>
                                        <td><?= $row["ukuran"]; ?></td>

                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModalEdit" id="modal_edit" data-id="<?= $row["id_ukuran"]; ?>" class="btn btn-warning ">Ubah</a>
                                            <a href="hapus.php?type=ukuran&&id=<?= $row["id_ukuran"]; ?>" class="btn btn-danger">Hapus</button></a>
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
                    <h3 class="modal-title" id="exampleModalLabel">Menambahkan Ukuran</h3>
                </div>
                <div class="modal-body">
                    <label> Ukuran : </label>
                    <input type="text" name="ukuran" />
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
                    <h3 class="modal-title" id="exampleModalLabel">Ubah ukuran</h3>
                </div>
                <div class="modal-body">
                    <label> Ukuran : </label>
                    <input hidden name="id_ukuran" id="id_merek">
                    <input type="text" name="ukuran" />
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