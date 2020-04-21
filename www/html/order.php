<!DOCTYPE html>
<html>
    <title>Pawck Order</title>
    <h1 align="center">Purchase</h1>
    <link rel="stylesheet" href="main.css" type="text/css"/> 
    <link rel="stylesheet" href="products.css" type="text/css"/> 

    <body>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../team.html">Team</a></li>
            <li><a href="../about.html">About</a></li>
        </ul>

        <?php
            require_once "dbconnect.php";
            $prodNum=$_GET['prodNum'];    
        
            $stmt = $conn->prepare("SELECT * FROM products WHERE prodNum=:prodNum");
            $stmt->bindParam(':prodNum', $prodNum);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="container">
            <div class="pictures">
                <?php 
                    echo "<img src='pictures/".$prodNum.".jpg'>"; 
                    echo "<div class=description>".$row['description']."</div>"; 
                    echo "<div class=price>".$row['price']."</div>";
                ?>
            </div>

            <?php
                $string = $row['prodDescription'];
                
                echo "<div class=productdescription>";
                echo '<br><font size="5"><strong>Product Description</strong></font>';
                echo "<br>";
                echo nl2br($string);
                echo "</div>";
            ?>
        </div>

        <?php
            $error = "";
            $link = htmlspecialchars($_SERVER["PHP_SELF"]."?prodNum=$prodNum");

            if ($_SERVER["REQUEST_METHOD"] === "POST") 
            {
                if (empty($_POST["firstname"])) 
                   $error = "*";
                else if (empty($_POST["lastname"])) 
                    $error = "*";
                else if (empty($_POST["phonenumber"])) 
                    $error = "*";
                else if (empty($_POST["quantity"])) 
                    $error = "*";
                else if (empty($_POST["address"])) 
                    $error = "*";
                else if (empty($_POST["city"])) 
                    $error = "*";
                else if (empty($_POST["state"])) 
                    $error = "*";
                else if (empty($_POST["zip"])) 
                    $error = "*";
                else if (empty($_POST["ccnumber"])) 
                    $error = "*";
            }
        ?>

        <div class="order">
            <form method = "post" action = <?php echo "sendtodb.php?prodNum=$prodNum"; ?>>
                <font size="5"><strong>Order Form</strong></font></br>
                
                <label>Product:</label> <input type="text" value=<?php echo $row['prodID']?> name="prodID" disabled="disabled"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>First Name:</label> <input type="text" name="firstname"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>Last Name:</label> <input type="text" name="lastname"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>Phone Number:</label> <input type="text" name="phonenumber" placeholder='xxx-xxx-xxxx'></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>Quantity:</label><input type="text" name="quantity" placeholder="1 - 99"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>Address:</label> <input type="text" name="address"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>City:</label> <input type="text" name="city"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>State:</label> <input type="text" name="state"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>ZIP/Postal Code:</label> <input type="text" name="zip"></br>

                <span class = "error">* <?php echo $error;?></span>
                <label>Credit Card #:</label> <input type="text" name="ccnumber" placeholder="xxxx-xxxx-xxxx-xxxx"></br>

                <label>Shipping Method</label>
                <select>
                    <option value="1day">1 Day Expedited</option>
                    <option value="3day">3 Day Ground</option>
                    <option value="5day">5 Day Free Shipping</option>
                </select></br>
                <input type="submit" value="Submit">  
            </form>   

            <script>
                var ajax = new XMLHttpRequest();
                var method = "GET";
                var url = "getCity.php";

                ajax.open(method, url, true);
                ajax.send();
                ajax.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        var data = JSON.parse(this.responseText);
                        console.log(data);

                        var zip = document.getElementById("zip").value;

                        for (var i = 0; i < data.length; ++i)
                        {
                            if (zip == data[i].zip)
                            {
                                document.getElementById("city").value = data[i].city;
                                document.getElementById("state").value = data[i].state; 
                            }
                        }
                    }
                }
            </script>

        </div> 

        <footer>@2019 Shogo Nakamura</footer>
        <script type="text/javascript" src="main.js"></script>
    </body>
</html>