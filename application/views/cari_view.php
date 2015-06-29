<!DOCTYPE html>
<html lang="en">
	<body>
		<div class="container" style="margin-top: 50px;">
			
			<div class="table-responsive">
				<table id="go" class="table table-bordered" style="text-align: center;">
					
					<tr>
						<th>Kelas/Ruang</th>
						<?php
							foreach($hari_dicari as $row){echo "
								<th>{$row->hari}</br>{$row->tanggal}</th>
							";}
						?>
					</tr>
					
					<?php
						foreach($kelas_dicari as $row_kelas){echo "
							<tr>
							<th rowspan='2'>{$row_kelas->kelas}</br>{$row_kelas->ruang}</th>
							";
							
							foreach($search_auto as $row_p){echo "
								<td class='p1'>{$row_p->p1}</td>
							";}
							echo "</tr>";
							
							echo "<tr>";
							foreach($search_auto as $row_p){echo "
								<td>{$row_p->p2}</td>
							";}
							echo "</tr>";
							
							break;
						}
					?>
					
				</table>
			</div>
			
			
		</div>
	</body>
</html>