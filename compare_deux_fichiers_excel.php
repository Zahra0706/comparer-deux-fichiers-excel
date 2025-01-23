<!DOCTYPE html>
<html>
<head>
    <title>Comparaison de fichiers Excel</title>
    <link rel="stylesheet" type="text/css" href="style.css">        
</head>
<body>    

    <h1>Comparaison de fichiers Excel</h1>

    <form method="post" enctype="multipart/form-data">
        <label for="file1"><i class="fas fa-file-excel"></i> Fichier 1:</label>
        <input type="file" name="file1" id="file1" accept=".xlsx"><br>
        <label for="file2"><i class="fas fa-file-excel"></i> Fichier 2:</label>
        <input type="file" name="file2" id="file2" accept=".xlsx"><br>

        <input type="submit" name="submit" value="Comparer">
    </form>
  

    <?php
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;

    if (isset($_POST['submit'])) {
        if ($_FILES['file1']['error'] == UPLOAD_ERR_OK && $_FILES['file2']['error'] == UPLOAD_ERR_OK) {
            $excel1 = IOFactory::load($_FILES['file1']['tmp_name']);
            $excel2 = IOFactory::load($_FILES['file2']['tmp_name']);

            $worksheet1 = $excel1->getActiveSheet();
            $worksheet2 = $excel2->getActiveSheet();

            $highestRow1 = $worksheet1->getHighestRow();
            $highestColumn1 = $worksheet1->getHighestColumn();
            $highestColumnIndex1 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn1);

            $highestRow2 = $worksheet2->getHighestRow();
            $highestColumn2 = $worksheet2->getHighestColumn();
            $highestColumnIndex2 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn2);

            $diff = array();

            for ($row = 1; $row <= $highestRow1 && $row <= $highestRow2; $row++) {
                for ($col = 0; $col < $highestColumnIndex1 && $col < $highestColumnIndex2; $col++) {
                    $cell1 = $worksheet1->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1) . $row);
                    $cell2 = $worksheet2->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1) . $row);

                    $value1 = $cell1->getValue();
                    $value2 = $cell2->getValue();

                    if ($value1 != $value2) {
                        $diff[] = "Difference dans la cellule " . $cell1->getColumn() . $cell1->getRow() . ": '$value1' vs '$value2'";
                    }
                }
            }

            if (!empty($diff)) {
                echo "<h2>Les différences sont les suivantes:</h2>\n";
                foreach ($diff as $difference) {
                    echo $difference . "<br>";
                }
            } else {
                echo "<h2>Aucune différence trouvée.</h2>\n";
            }
        } else {
            echo "<h2>Erreur lors du téléchargement des fichiers.</h2>\n";
        }
    }
    ?>
    
</body>
</html>
