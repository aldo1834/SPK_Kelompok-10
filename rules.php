<?php

$rules = [
    ["conditions" => ["D","E"], "conclusion" => "A", "name" => "R2"],
    ["conditions" => ["F"], "conclusion" => "B", "name" => "R3"],
    ["conditions" => ["G"], "conclusion" => "B", "name" => "R4"],
    ["conditions" => ["H","I"], "conclusion" => "C", "name" => "R5"],
    ["conditions" => ["A","B","C"], "conclusion" => "J", "name" => "R1"]
];

$arti = [
    "A"=>"Skill memadai",
    "B"=>"Pengalaman cukup",
    "C"=>"Attitude baik",
    "D"=>"Menguasai programming",
    "E"=>"Menguasai database",
    "F"=>"Pernah magang",
    "G"=>"Pernah project",
    "H"=>"Disiplin",
    "I"=>"Komunikasi baik",
    "J"=>"Layak diterima kerja"
];