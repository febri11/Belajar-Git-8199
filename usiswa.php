<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = $_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbiden');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new nationality();
$data_nation = $nation->readAllNationality();

if(empty($data)){
	exit('Siswa not found');
}

$dt = $data[0];


?>

<h1>Edit Data Siswa</h1>
<form action="editsiswa.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td>
				<input type="text" value="<?php echo $dt['id_siswa']?>" name="in_nis" readonly="true">
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td>
				<input type="text" name="in_name" value="<?php echo $dt['full_name']?>">
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td maxlength="50">
				<input type="text" name="in_email" value="<?php echo $dt['email']?>">
			</td>
		</tr>
		<tr>
			<td>Kewarganegarran</td>
			<td>:</td>
			<td>
				<select name="in_nation">
					<option value=""> --Pilih Negara-- </option>
						<?php foreach($data_nation as $n): ?>
							<?php $s=($dt['id_nationality'] == $n['id_nationality'])?"selected":""?>
					<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
						<?php echo $n['nationality']?>
					</option>
						<?php endforeach?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>:</td>
			<td>
				<input type="file" name="in_foto" value="Browse">
					<?php
						
					?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="submit" name="Kirim" value="Simpan">
			</td>
		</tr>
	</table>
</form>