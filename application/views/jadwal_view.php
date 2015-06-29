<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Jadwal GO Blok M</title>
		<script>
			$(document).ready(function(){
				if ( (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) && ($(window).width() < 768) ) {
					window.location.replace("http://jadwalgo.com/cari/")
				}
				
			});
		</script>
		
		<style>
			#alert-tst a { text-decoration: none; }
		</style>
	</head>

	<body>
	
		
		<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
			
			<div id="alert-tst" class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Booking TST dapat dilakukan di <a href="http://tst.jadwalgo.com/" target="blank">tst.jadwalgo.com</a>
			</div>
			
			<div class="table-responsive">
				<table class="table table-bordered" style="text-align: center;">
					
					<thead>
					<tr>
						<th>Kelas/Ruang</th>
						<?php
							foreach($hari_tanggal as $row){echo "
								<th>{$row->hari}</br>{$row->tanggal}</th>
							";}
						?>
					</tr>
					</thead>
					
					<?php
						foreach($kelas_ruang as $row_kelas){echo "
							<tr>
							<th rowspan='2'>{$row_kelas->kelas}</br>{$row_kelas->ruang}</th>
							";
							
							foreach($pelajaran[$row_kelas->no] as $row_p){echo "
								<td class='p1'>{$row_p->p1}</td>
							";}
							echo "</tr>";
							
							echo "<tr>";
							foreach($pelajaran[$row_kelas->no] as $row_p){echo "
								<td>{$row_p->p2}</td>
							";}
							echo "</tr>";
						}
					?>
					
				</table>
			</div>
			
		</div>
		
		
	</body>
</html>