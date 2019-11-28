<?PHP ob_start(); 
	session_start();// buka library laporan
//koneksi
$host="localhost";
$user="root";
$pass="";
$db="simau";

$conn=mysqli_connect($host,$user,$pass,$db);

if($conn){
//echo "Berhasil koneksi"; 
}else{
echo"koneksi gagal"; }
include(dirname(__FILE__).'../cetak_info_bayar1.php');// memanggil file laporan
$content = ob_get_clean();

// conversion HTML => PDF
require_once(dirname(__FILE__).'../html2pdf/html2pdf/html2pdf.class.php');
try
{
$html2pdf = new HTML2PDF('P','A4', 'fr', false, 'ISO-8859-15');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$html2pdf->Output('Info Pembayaran.pdf');//output laporan saat di download
}
catch(HTML2PDF_exception $e) { echo $e; }?>
