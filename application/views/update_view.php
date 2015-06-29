<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Jadwal GO Sambas</title>
	</head>

	
	<body>
		<div class="container" style="padding-top: 70px; margin-bottom: 50px;">
		
		<?php
		
		$text = $this->session->flashdata('text');
		
		if(isset($success)){
			if($success == TRUE){
			echo '
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>';
			echo $text;
			echo '</strong></div>';
			}
		
			/*if($success == FALSE){
			echo '
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>Update jadwal gagal.</strong>
				</div>
			';}*/
		}
		?>
		
			<form method="post">
			
				<div class="table-responsive">
					<table class="table" style="text-align:center">
						<?php
							echo "<tr>";
							echo "<th>Kelas/Ruang</th>";
							$tanggal = 1;
							
							foreach($hari_tanggal as $row_ht){
								echo "	
									<th>
									{$row_ht->hari}
									</br>
									<input type='text' maxlength='8' size='6' value='{$row_ht->tanggal}' name='tanggal_{$tanggal}'>
									</th>
								";
								$tanggal++;
							}
							
							echo "<tr>";
							
							
							$no_kelas = 1;
							$no_ruang = 1;
							$ganjil = 1;
							$genap = 2;
							
							foreach($kelas_ruang as $row_kelas){
								echo "
									<tr>
									<th class='p1'>
									<input type='text' maxlength='9' size='6' value='{$row_kelas->kelas}' name='kelas_{$no_kelas}'>
									</th>
								";
								
								foreach($pelajaran[$row_kelas->no] as $row_p){
									echo "
										<td class='p1'>
										<input type='text' maxlength='7' size='6' value='{$row_p->p1}' name='{$ganjil}'>
										</td>
									"; 
									$ganjil+=2;
								}
								
								echo "</tr>";
								
								
								echo "<tr>
								<th>
								<input type='text' maxlength='2' size='6' value='{$row_kelas->ruang}' name='ruang_{$no_ruang}'>
								</th>
								";
								
								foreach($pelajaran[$row_kelas->no] as $row_p){
									echo "
										<td>
										<input type='text' maxlength='7' size='6' value='{$row_p->p2}' name='{$genap}'>
										</td>
									";
									$genap+=2;
								}
								
								echo "</tr>";
								
								$no_kelas++;
								$no_ruang++;
							}
						?>
					</table>
				</div>
				
				
				<!--
				<div class="form-group">				
					<div class="col-sm-offset-3 col-sm-2" style="margin-bottom: 20px;">
						<input type="submit" class="btn btn-default form-control" name="submit" value="Update">
					</div>
					
					<div class="col-sm-2" style="margin-bottom: 20px;">
						<input type="submit" class="btn btn-default form-control" name="create" value="Tambah">
					</div>
					
					<div class="col-sm-2">
						<input type="submit" class="btn btn-default form-control" name="delete" value="Hapus" onclick="return confirm('Hapus kelas?')">
					</div>
				</div>
				-->
				
				<div class="form-group">				
					<div class="col-sm-offset-3 col-sm-2" style="margin-bottom: 20px;">
						<button type="submit" class="btn btn-default form-control" name="submit" value="submit"><i class="fa fa-refresh" style="margin-right: 10px;"></i>Update</button>
					</div>
					
					<div class="col-sm-2" style="margin-bottom: 20px;">
						<button type="submit" class="btn btn-default form-control" name="create" value="Tambah"><i class="fa fa-plus" style="margin-right: 10px;"></i>Tambah</button>
					</div>
					
					<div class="col-sm-2">
						<button type="submit" class="btn btn-default form-control" name="delete" onclick="return confirm('Hapus kelas?')" value="Hapus"><i class="fa fa-trash-o" style="margin-right: 10px;"></i>Hapus</button>
					</div>
				</div>
			
				
				
			</form>
		</div>
	</body>
</html>