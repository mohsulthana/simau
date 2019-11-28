<?php
class dbase // class buat memanggil database
{
var $dbHost = "localhost";
var $dbUser = "root";
var $dbPass = "";
var $dbName = "simau";	

public $Conn;

	function __construct()
	{
		$this->Conn = new mysqli($this->dbHost,$this->dbUser,$this->dbPass,$this->dbName);
	}

}

class User extends dbase //class yang berisikan method tentang table user
{
	function cekLogin($nim,$password) //method untuk login
	{
		$query = "SELECT * FROM user WHERE nim='$nim' AND password='$password'";
		$sql = $this->Conn->query($query);

		return $sql;
	}

	function Profil($id) //method untuk profil(data telah lengkap)
	{
		$query = "SELECT * FROM user WHERE id_user='$id'";
		$sql = $this->Conn->query($query);

		return $sql;
	}

	function pickFakultas() //method untuk Memilih Fakultas
	{
		$query = "SELECT * FROM fakultas";
		$sql = $this->Conn->query($query);

		return $sql;
	}

	function pickJurusan() //method untuk Memilih Jurusan
	{
		$query = "SELECT * FROM jurusan join fakultas on jurusan.id_fakultas=fakultas.id_fakultas";
		$sql = $this->Conn->query($query);

		return $sql;
	}

	function lengkapProfil($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l) //method untuk melengkapi profil
	{
		$sql="UPDATE user set fakultas='$b', jurusan='$c', tanggal_lahir='$d', agama='$e', jenis_kelamin='$f', alamat='$g', gol_dar='$h', no_hp='$i', ortu_wali='$j', no_hp_ortu='$k', status='$l' where id_user='$a'";
		$hasil = $this->Conn->query($sql);
		return $hasil;
	}

	function editProfil($a,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q) //method untuk mengedit profil
	{
		$sql="UPDATE user set tanggal_lahir='$d', agama='$e', jenis_kelamin='$f', alamat='$g', gol_dar='$h', no_hp='$i', ortu_wali='$j', no_hp_ortu='$k', status='$l',nim='$m',nama='$n',email='$o',password='$p',foto_profil='$q' where id_user='$a'";
		$hasil = $this->Conn->query($sql);
		return $hasil;
	}

	function editProfil1($a,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p) //method untuk mengedit profil tanpa foto
	{
		$sql="UPDATE user set tanggal_lahir='$d', agama='$e', jenis_kelamin='$f', alamat='$g', gol_dar='$h', no_hp='$i', ortu_wali='$j', no_hp_ortu='$k', status='$l',nim='$m',nama='$n',email='$o',password='$p' where id_user='$a'";
		$hasil = $this->Conn->query($sql);
		return $hasil;
	}

	function editFakuljur($a,$b,$c) //method untuk mengedit fakultas dan jurusan
	{
		$sql="UPDATE user set fakultas='$a', jurusan='$b' where id_user='$c'";
		$hasil = $this->Conn->query($sql);
		return $hasil;
	}

	function daftarAkun($a,$b,$c,$d,$e,$f,$g)//method untuk daftar akun
	{
		$sql ="INSERT INTO user (nim,nama,email,password,foto_profil,role,status) VALUES('$a','$b','$c','$d','$e','$f','$g')";
		$hasil = $this->Conn->query($sql);
		return $hasil;
	}
}

class Kamar extends dbase //class yang berisikan method tentang table kamar
{
	function allKamar()
	{
		$query = "SELECT * FROM kamar where kapasitas < 2";
		$sql = $this->Conn->query($query);

		return $sql;
	}

	function infoKamar($id)
	{
		$query = "SELECT * FROM kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar.id_kamar='$id'";
		$sql = $this->Conn->query($query);

		return $sql;
	}
}	

?>