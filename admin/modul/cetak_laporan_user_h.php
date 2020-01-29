<?php
date_default_timezone_set('Asia/Jakarta');
$query=mysqli_query($conn,"SELECT * from user where status='Berhenti' order by id_user desc");
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
<h3>Laporan User(Berhenti Menyewa)</h3>
</span>
<span>
<h3>SIMAU - Sistem Informasi Management Apartemen UNSRI</h3>
</span>
</div>

<table align="center" cellpadding="1" cellspacing="1" class="table">
<thead>
<tr>
<th align="center" valign="middle">Foto</th>
<th align="center" valign="middle">NIM</th>
<th align="center" valign="middle">Nama</th>
<th align="center" valign="middle">Email</th>
<th align="center" valign="middle">Fakultas</th>
<th align="center" valign="middle">Jurusan</th>
<th align="center" valign="middle">Jenis Kelamin</th>
<th align="center" valign="middle">Agama</th>
<th align="center" valign="middle">Alamat</th>
<th align="center" valign="middle">Golongan Darah</th>
<th align="center" valign="middle">Nomor HP</th>
<th align="center" valign="middle">Orang Tua / Wali</th>
<th align="center" valign="middle">Tanggal Lahir</th>
</tr></thead><tbody>

<?php  
while($data = mysqli_fetch_array($query)){
?>
<tr>
						<td><img src="../<?php echo $data['foto_profil'];?>"></td>
						<td><?php echo $data['nim'];?></td>
						<td><?php echo $data['nama'];?></td>
						<td><?php echo $data['email'];?></td>
						<td><?php echo $data['fakultas'];?></td>
						<td><?php echo $data['jurusan'];?></td>
						<td><?php echo $data['jenis_kelamin'];?></td>
						<td><?php echo $data['agama'];?></td>
						<td><?php echo $data['alamat'];?></td>
						<td><?php echo $data['gol_dar'];?></td>
						<td><?php echo $data['no_hp'];?></td>
						<td><?php echo $data['ortu_wali'];?></td>
						<td><?php echo $data['tanggal_lahir'];?></td>
						
                        
</tr>
<?php }?>
</tbody>
</table>
<h4>Dicetak oleh admin pada tanggal <?php echo "".date("Y-m-d")." ". date("H:i:s").""; ?></h4>