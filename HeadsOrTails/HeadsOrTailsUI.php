<html>
    <header>
        <title>Heads Or Tails</title>
        <h1>Heads Or Tails</h1>
    </header>
    <body>
        <form action="HeadsOrTailsUI.php" method="GET">
            <input type="submit" value="Toss Coin Now" name="submit">
        </form>
        <?php
        include "HeadsOrTails.php";
        
        if(isset($_GET["submit"]))
        {
            if($toss==1)
            {
                echo "Heads";
            }else
            {
                echo "Tails";
            }
        }
        ?>
    </body>
</html>