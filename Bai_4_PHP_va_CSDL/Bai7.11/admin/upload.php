<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]) . "/Bai_4/Bai7.7/admin/";
if (isset($_POST["submitUpload"])) {
    if (isset($_FILES['fileToUpload'])) {
        $files = $_FILES['fileToUpload'];

        $names = $files['name'];
        $types = $files['type'];
        $tmp_names = $files['tmp_name'];
        $errors = $files['error'];
        $sizes = $files['size'];

        //Số file được upload
        $numitems = count($names);
        $numfiles = 0;
    }

?>

    <div class="upload-container">
        Danh sách file đã Upload:
        <div>
        <?php
        for ($i = 0; $i < $numitems; $i++) {
            if ($errors[$i] == 0) {
                $numfiles++;

                $pathDownloadFile = './download.php?path=../Upload/' . $names[$i];
                echo "<a href='$pathDownloadFile'>Download File: $names[$i]</a><br>";

                move_uploaded_file($tmp_names[$i], $rootDir . 'Upload/' . $names[$i]);
            }
        }

    } else {
        echo "No files selected.";
    }
        ?>
        </div>
    </div>