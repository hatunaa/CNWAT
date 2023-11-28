<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'] - 1;

    $file = fopen("./students.txt", "r");
    $j = 0;
    $z = 0;
    clearstatcache();
    $listStudent = [];
    if (filesize("./students.txt")) {
        while (!feof($file)) {
            $listStudent[$j][$z] = fgets($file);
            $z++;
            if ($z % 6 === 0) {
                $j++;
                $z = 0;
            }
        }
    }
    fclose($file);
    // Write to file
    $file = fopen("./students.txt", "w");
    $name = $listStudent[$id][1];

    for ($i = 0; $i < count($listStudent); $i++) {
        if ($i == $id) {
            continue;
        }
        for ($j = 0; $j < 6; $j++) {
            $listStudent[$i][$j] = str_replace("\n", "", $listStudent[$i][$j]);
            if ($i > $id && $j === 0) {
                $abc = (int) $listStudent[$i][$j] - 1;
                fwrite($file,  $abc . "\n");
            } else if ($i === count($listStudent) - 1  && $j === 5) {
                fwrite($file,  $listStudent[$i][$j]);
            } else {
                fwrite($file,  $listStudent[$i][$j] . "\n");
            }
        }
    }
    fclose($file);
    echo 'Xóa thành công học sinh: ' . $name;
    header("Refresh: 2; url=../index.php");
    die();
}
header("location: ../index.php");
