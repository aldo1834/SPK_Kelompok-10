<?php
header("Content-Type: application/json");

require 'inference.php';
require 'rules.php';

$data = json_decode(file_get_contents("php://input"), true);

$facts = [];
$penyebab_gagal = "";

// ambil input user
foreach ($data as $key => $value) {
    $facts[$key] = $value;
}

// proses
$hasil = prove("J", $facts, $penyebab_gagal, $rules, $arti);

$response = [];

if ($hasil) {
    $response["status"] = "LAYAK";
    $response["fakta"] = [];

    foreach ($facts as $k => $v) {
        if ($v && in_array($k, ["D","E","F","G","H","I"])) {
            $response["fakta"][] = "$k - ".$arti[$k];
        }
    }

} else {
    $response["status"] = "TIDAK LAYAK";
    $response["penyebab"] = $penyebab_gagal;
}

echo json_encode($response);