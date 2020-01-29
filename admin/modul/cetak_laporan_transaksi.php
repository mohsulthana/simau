<?php
date_default_timezone_set('Asia/Jakarta');
$query=mysqli_query($conn,"SELECT * from bukti_bayar join user on bukti_bayar.id_user=user.id_user join kamar on bukti_bayar.id_kamar=kamar.id_kamar order by bukti_bayar.tanggal_upload desc");
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
<h3>Laporan Bukti Transaksi</h3>
</span>
<span>
<h3>SIMAU - Sistem Informasi Management Apartemen UNSRI</h3>
</span>
</div>

<table align="center" cellpadding="1" cellspacing="1" class="table">
<thead>
<tr>
<th align="center" valign="middle">Nama Penyewa</th>	
<th align="center" valign="middle">Tanggal Menyewa</th>
<th align="center" valign="middle">Alamat Kamar</th>

</tr></thead><tbody>

<?php  
while($data = mysqli_fetch_array($query)){
?>
<tr>
						<td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['tanggal_upload'];?></td>
                        <td><?php echo $data['blok'];?>.<?php echo $data['lantai'];?>.<?php echo $data['nomor'];?></td>
                        
</tr>
<?php }?>
</tbody>
</table>
<h4>Dicetak oleh admin pada tanggal <?php echo "".date("Y-m-d")." ". date("H:i:s").""; ?></h4>