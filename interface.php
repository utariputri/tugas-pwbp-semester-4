<?php 


interface InfoProduk {
	public function getInfoProduk();
}

abstract class produk {
	protected $judul,
			$penulis,
			$penerbit,
			$harga,
		    $diskon = 0;
	
	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
}

	public function setjudul( $judul ){
		 $this->judul = $judul;
	}
	public function getjudul() {
		return $this->judul;
	}

	public function setpenulis( $penulis ){
		 $this->penulis = $penulis;
	}
	public function getpenulis() {
		return $this->penulis;
	}

	public function setpenerbit( $penerbit ){
		 $this->penerbit = $penerbit;
	}
	public function getpenerbit() {
		return $this->penerbit;
	}

	public function setdiskon( $diskon) {
		$this->diskon = $diskon;
	}
	public function getdiskon (){
		return $this->diskon;
	}

	public function setharga ( $harga){
		$this->harga = $harga;
	}
	public function getharga() {
		return $this->harga - ($this->harga * $this->diskon / 100);

	}

	public function getLabel() {
		return "$this->penulis, $this->penerbit";

	}
	abstract public function getInfo();

}


class Komik extends produk implements InfoProduk {
	public $jmlHalaman;

	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {

		parent::__construct( $judul, $penulis, $penerbit, $harga);	

		$this->jmlHalaman = $jmlHalaman;	
	}

	 public function getInfo() {
		$str = " {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}

	public function getInfoProduk() {
		$str ="Komik : " . $this->getInfo() ." - {$this->jmlHalaman} Halaman.";
		return $str;
	}

}

class Game extends Produk implements InfoProduk {
	public $waktuMain;

	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {

		parent::__construct( $judul, $penulis, $penerbit, $harga);

		$this->waktuMain = $waktuMain;
	} 

	 public function getInfo() {
		$str = " {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}
	
	public function getInfoProduk() {
		$str = " Game : " . $this->getInfo() ." ~ {$this->waktuMain} Jam.";
		return $str;
	}
}

class CetakInfoProduk {
	public $daftarProduk = array();


	public function tambahProduk( produk $produk) {
		$this->daftarProduk[] = $produk;
	}


	public function cetak () {
		$str = "DAFTAR PRODUK: <br> ";

		foreach ($this->daftarProduk as $p) {
			$str .= "- {$p->getInfoProduk()} <br>";
		}

		return $str;
	}
}

$produk1 = new Komik ("Stitch", "Utari Putri", "Rudista Ardiansyah", 400000, 100);
$produk2 = new Game ("Free Fire", "Alif", "Arul Fahlevy", 600000, 5);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );
echo $cetakProduk->cetak();
