<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", "428&)BmV&S23qte_8qL-", "pavelhavrane2885"))) {
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
        <?php echo $radek["idOtazky"]; ?>
    </p>
    <dl>
        <dt>Text otazky:
            <?php echo $radek["textOtazky"]; ?>
        </dt>
        <dd>
            <?php // echo $radek["textOtazky"]; ?>
        </dd>
    </dl>

    <?php
    }
    mysqli_free_result($vysledek);
    mysqli_close($con);
    ?>


    <?php
    if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", "428&)BmV&S23qte_8qL-", "pavelhavrane2885"))) {
        die("Nelze se připojit k databázovému serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (
        mysqli_query(
            $con,
            "INSERT INTO anketniotazky(textOtazky) VALUES('" .
            addslashes($_POST["textOtazky"]) .
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

</html>