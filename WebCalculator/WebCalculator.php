<html>
<head>
<title>Web Calculator</title>
<h1>Web Calculator</h1>
</head>
<body>
    <form action="WebCalculator.php" method="GET">
        <label for="n1">Enter First Number : </label>
        <input type="number" name="n1">
        <br>
        <label for="n2">Enter Second Number :</label>
        <input type="number" name="n2">
        <br><br>Choose the Operator:<br><br>
        <label for="add">Add </label>
        <input type="radio" name="Operator" value="add">
        <br>
        <label for="sub">Subtract </label>
        <input type="radio" name="Operator" value="sub">
        <br>
        <label for="mul">Multiply </label>
        <input type="radio" name="Operator" value="mul">
        <br>
        <label for="div">Divide </label>
        <input type="radio" name="Operator" value="div">
        <br>
        <label for="mod">Remainder </label>
        <input type="radio" name="Operator" value="mod">
        <br><br>
        <input type="submit" value="Calculate">

    </form>
    <?php
        $n1=$_GET["n1"];
        $n2=$_GET["n2"];
        $op=$_GET["Operator"];

        if(isset($n1)&&isset($n2)&&isset($op))
        {
            switch($op)
            {
                case add:
                {
                    echo $n1+$n2;
                    break;
                }
                case sub:
                {
                    echo $n1-$n2;
                    break;
                }
                case mul:
                {
                    echo $n1*$n2;
                    break;
                }
                case div:
                {
                    if($n1>0 && $n2>0)
                    {
                        echo $n1/$n2;
                    }else if($n1==0 && $n2>0)
                    {
                        echo $n1/$n2;
                    }else if($n2==0 && $n1>0)
                    {
                        echo $n2/$n1;
                    }else
                    {
                        echo "Invalid";
                    }
                    
                    break;
                }
                case mod:
                {
                    echo $n1%$n2;
                    break;
                }
            }
        
        }else
        {

        }
        
    ?>
</body>
</html>