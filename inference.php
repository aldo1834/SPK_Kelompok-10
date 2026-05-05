<?php
require 'rules.php';

function prove($goal, &$facts, &$penyebab_gagal, $rules, $arti) {

    if (isset($facts[$goal])) {
        return $facts[$goal];
    }

    $foundRule = false;

    foreach ($rules as $r) {
        if ($r["conclusion"] == $goal) {

            $foundRule = true;
            $allTrue = true;

            foreach ($r["conditions"] as $cond) {
                if (!prove($cond, $facts, $penyebab_gagal, $rules, $arti)) {
                    $allTrue = false;

                    if ($penyebab_gagal == "")
                        $penyebab_gagal = $arti[$cond];

                    break;
                }
            }

            if ($allTrue) {
                $facts[$goal] = true;
                return true;
            }
        }
    }

    return false;
}