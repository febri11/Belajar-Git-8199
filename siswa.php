<?php


// comment on file siswa
// ---------------------


require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/age.php');

$umur=' ';
$today='';
$siswa = new Siswa();
$hitungumur = new Age($umur);
$data = $siswa->readAllSiswa();


?>
<table border="1px">
			<tr>
				<th>Id Siswa</th>
				<th>Full Name</th>
				<th>Date of Brith</th>
				<th>Email</th>
				<th>Negara</th>
				<th>Usia</th>
				<th>Detail</th>
			</tr>
			<?php 
			$n = 1;
			foreach($data as $a) :
			
			?>
				<tr>
					
					<td><?php echo $a['id_siswa']; ?></td>
					<td><?php echo $a['full_name']; ?></td>
					<td><?php echo $a['date_ob']?></td>
					<td><?php echo $a['email']; ?></td>
					<td><?php echo $a['nationality']; ?></td>
					<td>
						<a href="dsiswa.php?a=<?php echo $a['id_siswa']?>"> Detail </a>
					</td>
					<td>
						<a href="usiswa.php?a=<?php echo $a['id_siswa']?>">Edit</a>
					</td>
					<td>
						<a href="desiswa.php?a=<?php echo $a['id_siswa']?>">Delete</a>
					</td>
				</tr>
			<?php 
			$n++;
			endforeach
			
			?>
</table>