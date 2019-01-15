<?php 


class produk {
	public $judul,
			$penulis,
			$penerbit,
			$harga,
			$jmlHalaman,
			$waktuMain,
			$tipe;

	
	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe ){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
		$this->jmlHalaman = $jmlHalaman;
		$this->waktuMain = $waktuMain;
		$this->tipe = $tipe;
	
	}

	
	public function getLabel() {
		return "$this->penulis, $this->penerbit";

	}
	
	public function getInfoLengkap() {

		$str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
		if( $this->tipe == "Komik") {
			$str .= " - {$this->jmlHalaman} Halaman.";
		}  else if( $this->tipe == "Game") {
			$str .= " ~ {$this->waktuMain} Jam.";
		}

		return $str;
	}


}

class CetakInfoProduk {
	public function cetak ( produk $produk ) {
		$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
		return $str;
	}
}

$produk1 = new produk("Stitch", "Utari Putri", "Rudista Ardiansyah", 400000, 100, 0, "Komik");
$produk2 = new produk("Free Fire", "Alif", "Arul Fahlevy", 600000, 0, 5, "Game");

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();

// echo "Komik ; ". $produk1->getLabel();
// echo "<br>";
// echo "Game ; ". $produk2->getLabel();
// echo "<br>";

// $infoproduk1 = new cetakInfoProduk();
// echo $infoproduk1->cetak($produk1);



