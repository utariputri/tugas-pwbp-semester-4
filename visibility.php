<?php 


class produk {
	public $judul,
			$penulis,
			$penerbit;
			

	protected $diskon;

	private $harga;
	
	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;


	}
	public function getHarga() {
		return $this->harga - ($this->harga * $this->diskon / 100);

	}


	public function getLabel() {
		return "$this->penulis, $this->penerbit";

	}
	
	public function getInfoProduk() {
		$str = " {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}

}


class Komik extends produk {
	public $jmlHalaman;

	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {

		parent::__construct( $judul, $penulis, $penerbit, $harga);	

		$this->jmlHalaman = $jmlHalaman;	


	}


	public function getInfoProduk() {
		$str ="Komik : " . parent::getInfoProduk() ." - {$this->jmlHalaman} Halaman.";
		return $str;
	}

}

class Game extends Produk {
	public $waktuMain;

	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {

		parent::__construct( $judul, $penulis, $penerbit, $harga);

		$this->waktuMain = $waktuMain;
	} 

	public function setDiskon( $diskon) {
		$this->diskon = $diskon;
	}
	
	public function getInfoProduk() {
		$str = " Game : " . parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
		return $str;
	}
}

class CetakInfoProduk {
	public function cetak ( produk $produk ) {
		$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
		return $str;
	}
}

$produk1 = new Komik ("Stitch", "Utari Putri", "Rudista Ardiansyah", 400000, 100);
$produk2 = new Game ("Free Fire", "Alif", "Arul Fahlevy", 600000, 5);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();

