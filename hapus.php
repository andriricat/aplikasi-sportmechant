<?php  
require '../config/functions.php';

$id = $_GET["id"];
$type = $_GET['type'];
global $conn;
if($type=="category"){
	

	if (mysqli_query($conn,"DELETE from category WHERE id_category='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'category.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'category.php';
			 </script>";
	}
}

if($type=="merek"){
	

	if (mysqli_query($conn,"DELETE from merek WHERE id_merek='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'merek.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'merek.php';
			 </script>";
	}
}
if($type=="warna"){
	

	if (mysqli_query($conn,"DELETE from warna WHERE id_warna='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'warna.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'warna.php';
			 </script>";
	}
}
if($type=="ukuran"){
	

	if (mysqli_query($conn,"DELETE from ukuran WHERE id_ukuran='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'ukuran.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'ukuran.php';
			 </script>";
	}
}
if($type=="product"){

	if (mysqli_query($conn,"DELETE from product WHERE id_product='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'beranda.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'beranda.php';
			 </script>";
	}
}
if($type=="productOutlet"){
 $id_outlet=$_GET['id_outlet'];
	if (mysqli_query($conn,"DELETE from product WHERE id_product='$id' ")) {
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'detail_outlet.php?id=$id_outlet';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'detail_outlet.php?id=$id_outlet';
			 </script>";
	}
}
if($type=="productuser"){
	$id_product=$_GET['id_product'];
	   if (mysqli_query($conn,"DELETE from product WHERE id_product='$id' ")) {
		   echo "<script>
					   alert('Data berhasil dihapus');
					   document.location.href = '../outlet.php';
				</script>";
	   } else {
		   echo "<script>
					   alert('Data gagal dihapus');
					   document.location.href = '../outlet.php';
				</script>";
	   }
   }
if($type=="user"){
	   if (mysqli_query($conn,"DELETE from tb_login WHERE id_user='$id' ")) {
		mysqli_query($conn,"DELETE from tb_outlet WHERE id_user='$id' ");
		mysqli_query($conn,"DELETE from product WHERE id_user='$id' ");
		   echo "<script>
					   alert('Data berhasil dihapus');
					   document.location.href = 'user.php';
				</script>";
	   } else {
		   echo "<script>
					   alert('Data gagal dihapus');
					   document.location.href = 'user.php';
				</script>";
	   }
   }
   if($type=="outlet"){
	if (mysqli_query($conn,"DELETE from tb_outlet WHERE id_outlet='$id' ")) {
	 mysqli_query($conn,"DELETE from product WHERE id_outlet='$id' ");
		echo "<script>
					alert('Data berhasil dihapus');
					document.location.href = 'outlet.php';
			 </script>";
	} else {
		echo "<script>
					alert('Data gagal dihapus');
					document.location.href = 'outlet.php';
			 </script>";
	}
}
