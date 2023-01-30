<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form method="POST" action="test.php">

        Anketni odpovedi: <br>
        <input name="idOtazky" type="text"> <br>
        <input name="textOdpovedi" type="text"> <br>
        <input name="pocetHlasu" type="number"> <br>


        <input type="submit" value="Vložit">
    </form>




    <?php
    if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", '428&)BmV&S23qte_8qL-', "pavelhavrane2885"))) {
        die("Nelze se připojit k databázovému serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (
        mysqli_query(
            $con,
            "INSERT INTO anketniodpovedi(idOtazky, textOdpovedi,pocetHlasu) VALUES('" .
            addslashes($_POST["idOtazky"]) . "', '" .
            addslashes($_POST["textOdpovedi"]) . "', '" .
            addslashes($_POST["pocetHlasu"]) .
            "')"
        )
    ) {
        echo "Úspěšně vloženo.";
    } else {
        echo "Nelze provést dotaz. " . mysqli_error($con);
    }
    mysqli_close($con);
    ?>




</body>
</head>