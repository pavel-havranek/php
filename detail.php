<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Přehled objednávek</title>
</head>

<body>



    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", "428&)BmV&S23qte_8qL-", "pavelhavrane2885"))) {
            die("Nelze se připojit k databázovému serveru!</body></html>");
        }
        mysqli_query($con, "SET NAMES 'utf8'");
        if (!($vysledek = mysqli_query($con, "SELECT idOtazky, textOtazky FROM anketniotazky WHERE idOtazky = '$id'"))) {
            die("Nelze provést dotaz.</body></html>");
        }

        ?>
    <h1>Detail</h1>
    <?php
        while ($radek = mysqli_fetch_array($vysledek)) {
            ?>
    <h2>
        <?php echo $radek["idOtazky"]; ?>
    </h2>
    <p>
        <?php echo $radek["textOtazky"]; ?>
    </p>


    <?php
            if (!($con = mysqli_connect("sql5.webzdarma.cz", "pavelhavrane2885", "428&)BmV&S23qte_8qL-", "pavelhavrane2885"))) {
                die("Nelze se připojit k databázovému serveru!</body></html>");
            }
            mysqli_query($con, "SET NAMES 'utf8'");
            if (!($vysledek = mysqli_query($con, "SELECT idOdpovedi, idOtazky, textOdpovedi, pocetHlasu  FROM anketniodpovedi WHERE idOtazky = '$id'"))) {
                die("Nelze provést dotaz.</body></html>");
            }
            ?>
    <h1>Anketni odpovedi</h1>
    <?php
            while ($radek1 = mysqli_fetch_array($vysledek)) {
                ?>

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
        <dt>pocet hlasu:
            <?php echo $radek1["pocetHlasu"]; ?>
        </dt>
    </dl>

    <?php
            }

            ?>







    <form method="Post" action="znova.php">

        Anketni odpovedi: <br>
        <textarea name="textOdpovedi"></textarea><br>

        <input type="hidden" name="idOtazky" value="<?php echo $radek["idOtazky"]; ?>">
        <input type="submit" value="Vložit">
    </form>
    <form method="Post" action="prehled.php">


        <input type="submit" value="prehled">
    </form>


    <?php
        }

        mysqli_free_result($vysledek);
        mysqli_close($con);
    }
    ?>



    </table>
</body>
</head>