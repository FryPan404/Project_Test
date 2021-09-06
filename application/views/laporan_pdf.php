<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<title></title>
</head><body>
	<table border="1">
		<tr>
			<th width="5%">No</th>
			<th width="10%">NIM</th>
			<th>NAMA</th>
			<th>KELAS</th>
            <th>JURUSAN</th>
			
		</tr>
		<?php $no = 1;
		foreach ($student as $mhs): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $mhs->reg_number ?></td>
				<td><?php echo $mhs->name ?></td>
				<td><?php echo $mhs->class ?></td>
				<td><?php echo $mhs->major ?></td>
		
			</tr>
		<?php endforeach; ?>
	</table>
</body></html>