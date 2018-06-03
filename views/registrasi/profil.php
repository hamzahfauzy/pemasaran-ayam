<div class="container konten">
	<div class="col-md-8">
				<h3>User Profil</h3><br />	
				<table width="100%">
					<tr>
						<td width="150">Nama Lengkap</td>
						<td>: </td>
						<td><?php echo $model->nama_user;?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>: </td>
						<td><?php echo $model->email;?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>: </td>
						<td><?php echo $model->username;?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>: </td>
						<td>*****</td>
					</tr>
				</table>
				<br />
				<br />
				<a href="<?php echo URL;?>/registrasi/edit">Apakah anda ingin Edit Profil Anda?</a>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
		
	</div>
	<?php include 'sideBar.php';?>
</div>
