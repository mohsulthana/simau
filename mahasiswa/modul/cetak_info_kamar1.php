<?php
date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id_user'];
$query="SELECT * from kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar_sewa.id_user='$id'";
$sql=mysqli_query($conn,$query);
$data=mysqli_fetch_array($sql);
?> 

<style>
.header {border-bottom:solid 3px #EF4135; height:85px; width:100%; margin:auto; margin-bottom:0px;}
.header img {width:50px!important;height:50px!important; float:left; margin-right:10px;}
.header h3{font-family:Times, serif;font-size:30px; line-height:30px; text-align:center; margin-top:0px;padding-bottom: 1px;margin-bottom: 1px; font-weight:bold; text-transform:uppercase}
.header h4{font-family:Times, serif;font-size:30px; line-height:30px; text-align:center; margin-top:0px;padding-bottom: 1px;margin-bottom: 1px; font-weight:bold; text-transform:uppercase; color: red}
.header p {text-align:center; font-weight:bold; margin:auto;padding:1px!important;}
.header span {padding-top:10px;padding-bottom: 10px;margin-top: 10px;margin-bottom: 10px;}
.table {border: solid 1px #eeeeee; width:80%; margin:80%; }
.table th {border-right:1px #eeeeee; background:#EF4135;color:#ffffff;font-size:16px; padding:5px;text-align:center;
text-transform:uppercase}
.table td {border-right: 1px #eeeeee;border-bottom:solid 1px #eeeeee; padding:8px;word-wrap:break-word;
font-family:Arial, Helvetica, sans-serif;font-size:15px;width: 35mm;}
p {margin:0px;padding:4px!important; font-size:15px;font-family:Arial, Helvetica, sans-serif;text-transform:capitalize}
.ttd {margin-top:50px; line-height:25px;}
</style>
<div class="header"><span><br><br><br>	
</span>
<h3>PRINT OUT BUKTI TRANSAKSI</h3>
</div>


<table align="center">
	<tr>
		<td><h3>NAMA</h3></td>
		<td><h3>:</h3></td>
		<td><h3><?php echo $data['nama']?></h3></td>
	</tr>
	<tr>
		<td><h3>NIM</h3></td>
		<td><h3>:</h3></td>
		<td><h3><?php echo $data['nim']?></h3></td>
	</tr>
	<tr>
		<td><h3>NO KAMAR</h3></td>
		<td><h3>:</h3></td>
		<td><h3><?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor']?></h3></td>
	</tr>
	<tr>
		<td><h3>TANGGAL</h3></td>
		<td><h3>:</h3></td>
		<td><h3><?php echo $data['tanggal_sewa']?></h3></td>
	</tr>
</table>
<br/><br/>
<h3>PRINT OUT INI ADALAH BUKTI PEMBAYARAN YANG RESMI BAGI CALON PENGHUNI APARTEMEN UNSRI.</h3>

<table align="right" cellpadding="3" cellspacing="25">
<tr>
<td align="right"><h4 align="right">MENGETAHUI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>	
</tr>
<tr>
<td align="right"></td>	
</tr>
<tr>
<td align="right"></td>	
</tr>
<tr>
<td align="right"><h4 align="right">ADMIN APARTEMEN UNSRI</h4></td>	
</tr>
</table>

<h4 style="color: red">*Silahakan meminta tanda tangan terlebih dahulu kepada admin bpu Indralaya/bukit Unsri.</h4>

