<?php require "../../koneksi.php"; ?>

<?php 	
					$id		=	$_GET['idhapus'];
					$con->query("DELETE FROM pelanggan WHERE pelanggan_id = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/pelanggan/index'
					   </script>";



 ?>