<!DOCTYPE html>

    <?php
        require_once "dbconnect.php";

        $prodNum=$_GET['prodNum']; 
        $FName =    $_POST['firstname'];
        $LName =    $_POST['lastname'];
        $Phone =    $_POST['phonenumber'];
        $Quantity = $_POST['quantity'];
        $Address =  $_POST['address'];
        $City =     $_POST['city'];
        $State =    $_POST['state'];
        $Zipcode =  $_POST['zip'];
        $CCnum =    $_POST['ccnumber'];

        if (empty($Fname) && empty($LName) && empty($Phone) && empty($Quantity) && empty($Address) && empty($City) && empty($State) && empty($Zipcode) && empty($CCNum))
        {
            header("Location: order.php?prodNum=$prodNum");
            die();
        }

        $sql = "INSERT INTO forminfo (fname, lname, phonenum, quantity, address, city, state, zipcode) VALUES ('$FName', '$LName', '$Phone', '$Quantity', '$Address', '$City', '$State', '$Zipcode')";
    ?>

    <title>Pawcks Confirmation</title>
    <?php echo "<h1 align=center>Thank you for ordering with us".$FName."!</h1>" ?>
    <link rel="stylesheet" href="main.css" type="text/css"/> 
    <link rel="stylesheet" href="products.css" type="text/css"/> 

    <body>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../team.html">Team</a></li>
            <li><a href="../about.html">About</a></li>
        </ul>

        <div class="container">
            <div class="pictures">
                <?php
                    
                    if ($conn->query($sql))
                    {
                        $stmt = $conn->prepare("SELECT * FROM products WHERE prodNum=:prodNum");
                        $stmt->bindParam(':prodNum', $prodNum);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        echo "<img src='pictures/".$prodNum.".jpg'>"; 
                        echo "<strong>Name: </strong>".$row['description']."</br>";
                        echo "<strong>Price: </strong>".$row['price']."</br>";
                        echo "<strong>Product Description: </strong></br>".nl2br($row['prodDescription']);
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                ?>
            </div>
        </div>
    </body>
</html>