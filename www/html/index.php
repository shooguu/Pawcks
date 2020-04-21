<!DOCTYPE html>
<html>
    <title>Pawcks</title>
    <h1 align="center">Pawcks</h1>
    <link rel="stylesheet" href="main.css" type="text/css"/> 

    <?php
        require_once "dbconnect.php";

        $stmt = $conn->query("SELECT * FROM products");
    ?>

    <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="team.html">Team</a></li>
            <li><a href="about.html">About</a></li>
        </ul>

        <div class="container">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "<div class=pictureshover>";
                echo "<a href='order.php?prodNum={$row['prodNum']}'><img src='pictures/".$row['prodNum'].".jpg'></a>";
                echo "<div class=description>".$row['description']."</div>";
                echo "<div class=price>".$row['price']."</div>";
                echo "</div>";

            }
            ?>
        </div>

        <footer>@2019 Shogo Nakamura</footer>
        <script type="text/javascript" src="main.js"></script>
    </body>

	<?php
		$conn = null;
		$stmt = null;
	?>
</html>
