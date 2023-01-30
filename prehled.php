<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Přehled objednávek</title>
</head>

<body>

    <?php
    if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", '428&)BmV&S23qte_8qL-', "pavelhavrane2885"))) {
        die("Nelze se připojit k databázovému serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (!($vysledek = mysqli_query($con, "SELECT idOtazky, textOtazky  FROM anketniotazky"))) {
        die("Nelze provést dotaz.</body></html>");
    }
    ?>
    <h1>Anketni otazky</h1>
    <?php
    while ($radek = mysqli_fetch_array($vysledek)) {
        ?>
    <p> index otazky:
        <?php echo $radek["idOtazky"]; ?></a>

    </p>

    <dl>
        <dt>Text otazky:
            <?php echo $radek["textOtazky"]; ?>
        </dt>

    </dl>
    <?php
        if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", "428&)BmV&S23qte_8qL-", "pavelhavrane2885"))) {
            die("Nelze se připojit k databázovému serveru!</body></html>");
        }
        mysqli_query($con, "SET NAMES 'utf8'");


        if (!($vysledek1 = mysqli_query($con, "SELECT idOdpovedi, idOtazky, textOdpovedi, pocetHlasu  FROM anketniodpovedi WHERE idOtazky = $radek[idOtazky]"))) {
            die("Nelze provést dotaz.</body></html>");
        }


        while ($radek1 = mysqli_fetch_array($vysledek1)) { ?>
    <dl>
        <dt>id odpovedi
            <?php echo $radek1["idOdpovedi"]; ?>
        </dt>
        <dt>id otazky:
            <?php echo $radek1["idOtazky"]; ?>
        </dt>
        <dt>Text odpovedi:
            <?php echo $radek1["textOdpovedi"]; ?>
        </dt>
        <dt>
            <p> pocet hlasu:
                <a href="detail.php?id=<?php echo $radek["idOtazky"]; ?>"
                    title="Detail"><?php echo $radek["idOtazky"]; ?></a>

            </p>
            pocet hlasu:
            <?php echo $radek1["pocetHlasu"]; ?>
        </dt>
    </dl>
    <?php

        }

        ?>


    <?php
    }
    mysqli_free_result($vysledek);
    mysqli_close($con);
    ?>


</body>
</head>