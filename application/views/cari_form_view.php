<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Jadwal GO Blok M</title>
	</head>

	
	<body>
		<div class="container" style="margin-top: 50px;">
			
			
			<form class="form-horizontal" method="post" action="#jadwal" role="form">
				<div class="form-group">
					<label for="kelas" class="col-sm-2 control-label">Kelas</label>
					<div class="col-sm-4">
						<select class="form-control" id="kelas" name="kelas">
							<?php
								foreach($kelas_ruang as $row){
									echo "<option value='{$row->no}'";
									if(isset($no_kelas_dicari)){if($row->no == $no_kelas_dicari){echo " selected";}}
									echo ">{$row->kelas}</option>";
								}
							?>
							
						</select>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-4">
						<button type="submit" class="btn btn-default form-control" name="submit" value="Cari jadwal"><i class="fa fa-search"></i> Cari Jadwal</button>
					</div>
				</div>
			</form>
			
			
		</div>
	</body>
</html>