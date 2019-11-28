<?php 

$query=mysqli_query($koneksia,"SELECT * from member where level='supplier' order by id");

?>
<style>
.header {border-bottom:solid 3px #EF4135; height:85px; width:90%; margin:auto; margin-bottom:20px;}
.header img {width:50px!important;height:30px!important; float:left; margin-right:10px;}
.header h3{font-family:Times, serif;font-size:30px; line-height:30px; text-align:center; margin-top:20px; font-weight:bold; text-transform:uppercase}
.header p {text-align:center; font-weight:bold; margin:auto;padding:1px!important;}
.header span {padding-top:10px;}
.table {border: solid 1px #eeeeee; width:90%;margin:auto;}
.table th {border-right:1px #eeeeee; background:#EF4135;color:#ffffff;font-size:16px; padding:5px;text-align:center;
text-transform:uppercase}
.table td {border-right: 1px #eeeeee;border-bottom:solid 1px #eeeeee; padding:8px;word-wrap:break-word;
font-family:Arial, Helvetica, sans-serif;font-size:15px;}
p {margin:0px;padding:4px!important; font-size:15px;font-family:Arial, Helvetica, sans-serif;text-transform:capitalize}
.ttd {margin-top:50px; line-height:25px;}
</style>
<div class="header"><span>
<h3>Sistem Informasi Perpustakaan</h3>
</span>
<span><h3>Data Angota</h3></span>
</div>
<table width="" cellpadding="0" cellspacing="0" class="table">
<thead>
<tr>
<th width="10" align="center" valign="middle">NO</th>
<th width="100" align="center" valign="middle">Username</th>
<th width="100" align="center" valign="middle">Password</th>
<th width="80" align="center" valign="middle">Nama</th>
</tr>
</thead>
<tbody>

<?php
$nomor = 1;
while($data = mysqli_fetch_array($query)){
?>
  <tr>
    <td width="38" height="25" valign="middle"><?php echo $nomor; ?></td>
    <td valign="middle"><?php echo $data['username']; ?></td>
    <td valign="middle"><?php echo $data['password']; ?></td>
    <td valign="middle"><?php echo $data['nama']; ?></td>
  </tr>

<?php
$nomor++;
}
?>
</tbody></table>