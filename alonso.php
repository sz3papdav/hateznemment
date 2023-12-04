<?php
    require 'p.inc.php';
    //$be = file_get_contents('versenyzok.csv');
    $pilots = array();
    $f = fopen("versenyzok.csv", "r") or die("Nem találom a fájlt!");
    fgets($f);  //Első sor figyelm kívül hagyása
    while (!feof($f)){
        $row = explode(";", fgets($f));
        //print_r($row);
        array_push($pilots, new Pilot($row[0], $row[1], $row[2], trim($row[3])));
    }
    fclose($f); //Fájl bezárása
    //echo $pilots[0] -> getCode();
    //echo strlen($pilots[0] -> getCode());
    echo '5. feladat: '. count($pilots);
    foreach ($pilots as $key => $value) {
        if ($value -> getCode() == "ALO"){
            echo "<br>6. feladat: " . $value -> getName();
        }        
    }
    echo "<br>7. feladat: ";
    foreach ($pilots as $k => $v) {
        if ($v -> evElsoNapjanSzuletettE()){
            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $v -> getName() ." (" . $v -> getBirthDate() .")";
        }
    }

    echo "<br>8. feladat: ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredCode = $_POST["enteredCode"];
    
        $pilotFound = false;
        foreach ($pilots as $k => $v) {
            if ($v->isCodeValid($enteredCode) && $v->getCode() == $enteredCode) {
                echo "<br>9. feladat: " . $v->toString();
                $pilotFound = true;
                break;
            }
        }
    
        if (!$pilotFound) {
            echo "<br>9. feladat: Nincs ilyen versenyző a megadott kóddal.";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Versenyző kód bekérése</title>
    </head>
    <body>
        <form method="post" action="">
            <label for="enteredCode">Versenyző kód:</label>
            <input type="text" id="enteredCode" name="enteredCode" maxlength="3" required>
            <button type="submit">Keresés</button>
        </form>
    </body>
    </html>

    <!-- echo "<br>9. feladat: ";
    //$pilots[0] -> toS
    foreach($pilots as $k => $v){
        //echo $v -> getCode().'<br>';
        if ($v -> getCode() == "MAG"){
            echo $v -> toString();
        }
    } -->