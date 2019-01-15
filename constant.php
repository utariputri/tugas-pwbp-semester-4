<?php 

// define('NAMA', 'Utari Putri');
// echo NAMA;

// echo "<br>";

// const UMUR = 16;
// echo UMUR;

// class Coba {
// 	const NAMA = 'Utari';
// }


// echo Coba::NAMA;

// echo __LINE__;

// function coba() {
// 	return __FUNCTION__;
// }
// echo coba();

class Coba {
	public $kelas = __CLASS__;
}

$obj = new Coba;
echo $obj->kelas;












 ?>
