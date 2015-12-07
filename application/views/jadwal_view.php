<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Jadwal GO Blok M</title>
		<script>
			if ( (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) && (window.innerWidth < 768) ) {
				var url = window.location.href
				window.location.replace(url + "cari")
			}
		</script>
		
		<style>
			#alert-tst a { text-decoration: none; }
		</style>
	</head>

	<body>
	
		
		<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
			
			<div class="table-responsive">
				<table class="table table-bordered table-hover" style="text-align: center;">
					
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