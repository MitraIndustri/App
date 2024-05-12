<?php
require("../mainconfig.php");
require("../vendor/autoload.php");

error_reporting(1);
$pilihan_kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';;
$pilihan_mapel = isset($_POST['mapel']) ? $_POST['mapel'] : '';;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $query_list = mysqli_query($db, "SELECT nilai.id,siswa.nama_siswa,siswa.username,nilai.p,nilai.k FROM nilai, mapel, kelas, poin_kehadiran,siswa WHERE siswa.username=poin_kehadiran.username AND siswa.username=nilai.username AND poin_kehadiran.username=nilai.username AND siswa.kelas_id=kelas.id AND mapel.id=nilai.mapel_id AND siswa.kelas_id = '$pilihan_kelas' AND nilai.mapel_id = '$pilihan_mapel' ORDER BY nilai.id ASC");
    $cek = mysqli_num_rows($query_list);

    if ($cek) {
        for ($i = 1; $i < count($sheetData); $i++) {


            $mapelid = $sheetData[$i]['1'];
            $nis = $sheetData[$i]['2'];
            $p = $sheetData[$i]['4'];
            $k = $sheetData[$i]['5'];
            $tahun_ajar = $sheetData[$i]['6'];
            mysqli_query($db, "UPDATE nilai SET p=$p,k=$k WHERE mapel_id=$pilihan_mapel AND username=$nis");
        }
    } else {
        for ($i = 1; $i < count($sheetData); $i++) {
            $mapelid = $sheetData[$i]['1'];
            $nis = $sheetData[$i]['2'];
            $p = $sheetData[$i]['4'];
            $k = $sheetData[$i]['5'];
            $tahun_ajar = $sheetData[$i]['6'];
            mysqli_query($db, "INSERT INTO nilai  ('id','mapel_id','username','p','k','th_ajar') VALUES('','$pilihan_mapel','$nis','$p','$k','2020/2021')");
        }
    }
    header("Location: " . $cfg_baseurl);
}
