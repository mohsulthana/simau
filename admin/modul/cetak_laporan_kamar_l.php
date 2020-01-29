<?php
date_default_timezone_set('Asia/Jakarta');
$query=mysqli_query($conn,"SELECT * from kamar where jenis_kelamin='Laki-laki' order by id_kamar asc");
?> 

<style>
.header {border-bottom:solid 3px orange; height:85px; width:90%; margin:auto; margin-bottom:20px;}
.header img {width:100px!important;height:50px!important; float:left; margin-right:10px;}
.header h3{font-family:Times, serif;font-size:30px; line-height:30px; text-align:center; margin-top:20px; font-weight:bold; text-transform:uppercase}
.header p {text-align:center; font-weight:bold; margin:auto;padding:1px!important;}
.header span {padding-top:10px;}
.table {border: solid 1px #eeeeee; width:80%; margin:80%;}
.table th {border-right:1px #eeeeee; background:orange;color:#ffffff;font-size:16px; padding:5px;text-align:center;
text-transform:uppercase}
.table td {border-right: 1px orange;border-left: 1px orange;border-bottom:solid 1px orange; padding:4px;word-wrap:break-word;
font-family:Arial, Helvetica, sans-serif;font-size:15px;}
p {margin:0px;padding:4px!important; font-size:15px;font-family:Arial, Helvetica, sans-serif;text-transform:capitalize}
.ttd {margin-top:50px; line-height:25px;}
.table img {width:100px;height:100px;}
</style>
<div class="header"><span><br><br><br>
<h3>Laporan Kamar (Laki-laki)</h3>
</span>
<span>
<h3>SIMAU - Sistem Informasi Management Apartemen UNSRI</h3>
</span>
</div>

<table align="center" cellpadding="1" cellspacing="1" class="table">
<thead>
<tr>
<th align="center" valign="middle">Identitas Kamar</th>	
<th align="center" valign="middle">Blok</th>
<th align="center" valign="middle">Lantai</th>
<th align="center" valign="middle">Nomor</th>
<th align="center" valign="middle">Kapasitas</th>
<th align="center" valign="middle">Yang Menyewa</th>


</tr></thead><tbody>

<?php  
while($data = mysqli_fetch_array($query)){
?>
<tr>
						<td><?php echo $data['blok'];?>.<?php echo $data['lantai'];?>.<?php echo $data['nomor'];?></td>
						<td><?php echo $data['blok'];?></td>
						<td><?php echo $data['lantai'];?></td>
						<td><?php echo $data['nomor'];?></td>
						<td><?php echo $data['kapasitas'];?></td>
						<?php
						$a=$data['id_kamar']; 
						$query1=mysqli_query($conn,"SELECT * FROM kamar_sewa join kamar on kamar.id_kamar=kamar_sewa.id_kamar join user on user.id_user=kamar_sewa.id_user where kamar_sewa.id_kamar='$a' AND kamar.jenis_kelamin='Laki-laki'");
						?>
						<td>
						<?php while($data1 = mysqli_fetch_array($query1)){ ?>
						
							<?php echo $data1['nama'];?><br/>
						<?php } ?>

						</td>
</tr>
<?php }?>
</tbody>
</table>
<h4>Dicetak oleh admin pada tanggal <?php echo "".date("Y-m-d")." ". date("H:i:s").""; ?></h4>