<?php
include "header.php";
$id_user=$_SESSION['id_user'];
$query    = mysqli_query($conn, "SELECT * FROM tb_login WHERE id_user='$id_user'");
$tampil    = mysqli_fetch_array($query);
if (isset($_POST["edit"])) {
 print_r($_POST);
    if(edit_profile_admin($_POST) > 0) {

        echo "<script>
          alert('Nama Berhasil di ubah');
          document.location.href = 'admin.php';
         </script>";
    } else {
        echo "<script>
          alert('Nama yang digunakan sama');
         </script>";
        //   echo mysqli_error($conn);
        echo "error ";
    }
}
if (isset($_POST["change"])) {
    if(edit_profile_admin_password($_POST) > 0) {
        echo "<script>
          alert('Password Berhasil di ubah');
          document.location.href = 'admin.php';
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

<div class="container-fluid" style="height:55vw;background: white;" >
    <!-- page table -->
    <div class="row" style="    margin-top: 10vw;">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary" style="box-shadow: -8px 7px 19px -1px rgba(122,169,240,0.69);
    border-radius: 15px; border:none">
                <div class="panel-heading" style="border-top-left-radius: 15px; background: #1392ff;
    border-top-right-radius: 15px; border:none;">
    <p style="text-align: center;"> Halaman Admin </p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- <a style="border-radius:50%;height:7vw; margin:1.2vw" class="avatar rounded-circle">
                            <input style="display: none;" hidden id="upload" name="foto" type="file">
                            <img id="profile" style="border-radius:50%;height:7vw;margin-left:6.5vw; max-width: 7.5vw;" alt="Image placeholder" src="../img/<?php echo $tampil['image']; ?>">
                        </a> -->
                </div>
                <div class="panel-body">

                    <fieldset>
                        <div class="row">
                            <!-- <div class="col-md-4">
                        <div class="form-group">
                          <label>No.</label>
                          <input class="form-control" name="id" type="text" value="">
                        </div>
                      </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name :</label>
                                    <input class="form-control" name="name" type="text" id="name" value="<?= $tampil['name'] ?>" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username :</label> -->
                            <input hidden name="username" value="<?= $tampil['username'] ?>">
                            <input hidden name="id_user" value="<?= $tampil['id_user'] ?>">
                            <!-- </div>
                            </div> -->
                         
                            <div class="col-md-6">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <a class="btn btn-warning" style="border:none" data-toggle="modal" data-id="<?= $tampil['id_user'] ?>" data-target="#exampleModalResi" id="modal_approve_resi" >Change Password </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary" style="border:none" name="edit">Edit </button>
                                    </div>
                                </div>
                            </div>

                    </fieldset>

                    </form>
                    <form>

                    </form>
                    <form action="" method="post">
                    <div class="modal fade" id="exampleModalResi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" style="text-align: center;" id="exampleModalLabel-reject">Masukkan password baru</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <!-- <input  type="text" name="id_order" id="id_order" value="232"/> -->
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="text-align: center;">
                                            Password : 
                                            <input type="password" minlength="8" name="password" id="no_resi" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer modal-footer-reject">
                                        <input hidden type="text" name="id_user" id="id_order_resi" value="" />
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <input name="id_product" value="<?= $row["id_product"]; ?>"> -->
                                        <button type="submit" name="change" class="btn btn-primary">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                
                </div>



            </div>
        </div>

    </div>
</div>
<script>
$(document).on("click", "#modal_approve_resi", function() {
                            var id_order = $(this).data('id');
                            console.log(id_order);
                            $("#id_order_resi").val(id_order);
                            // As pointed out in comments, 
                            // it is unnecessary to have to manually call the modal.
                            // $('#addBookDialog').modal('show');
                        });
                    </script>
<?php
include "footer.php";?>