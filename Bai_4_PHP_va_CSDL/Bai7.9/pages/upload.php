<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]) . "/Bai_4/Bai7.9/";
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
                // $pathDownloadFile = '../uploads/'.$names[$i];
                // echo "<a href='$pathDownloadFile'>Download File: $names[$i]</a><br>";

                $pathDownloadFile = './pages/download.php?path=../Upload/' . $names[$i];
                echo "<a href='$pathDownloadFile'>Download File: $names[$i]</a><br>";


                // echo "<b>Uploaded file $numfiles:</b><br>";
                // echo "Name: $names[$i] <br>";
                // echo "Temporary saved at: $tmp_names[$i] <br>";
                // echo "Size: $sizes[$i] bytes<br><hr>";
                move_uploaded_file($tmp_names[$i], $rootDir . 'Upload/' . $names[$i]);
            }
        }
        // echo "Number of uploaded files: " .$numfiles;

    } else {
        echo "No files selected.";
    }
        ?>
        </div>
    </div>