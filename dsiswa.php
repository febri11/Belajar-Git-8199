<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['a']; // membuat dinamis dengan mengtikan nilai di alamat url
if(!is_numeric($id)){
	
	exit('Access Forbiden');
}
$siswa = new Siswa();
$data = $siswa->readSiswa($id);

if(empty($data)){
	
	exit('Data not Found');
	
}

$dt = $data[0];



?>

<table border="1px">
			<tr>
				<td>Id Siswa</td>
				<td><?php echo $dt['id_siswa']; ?></td>
			</tr>
			
			<tr>
				<td>Full Name</td>
				<td><?php echo $dt['full_name']; ?></td>
				
			</tr>
			
			<tr>
				<td>Date Of Birth</td>
				<td><?php echo $dt['date_ob']; ?></td>
			</tr>
			
			<tr>
				<td>Nationality</td>
				<td><?php echo $dt['nationality']; ?></td>
			</tr>
</table>
<br />
<a href="siswa.php">Kembali</a>