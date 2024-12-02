<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php' ?>
    </head>
    <body>
        <?php include 'includes/nav.php'?>

        <?php
            include 'includes/db/connect.php';

            $id = isset($_GET['project']) ? intval($_GET['project']) : 0;

            $query = "SELECT projectName, projectImage FROM projects WHERE id = $id";

            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_array($result);

            echo '<header class="header-project small">
                <img src="' . $row["projectImage"] . '" alt="hendheld">
                <h1>' . $row["projectName"] . '</h1>
            </header>';
            }

        ?>

        <section class="container text-center">
            <div class="about">
                <?php 

            include 'includes/db/connect.php';

            $id = isset($_GET['project']) ? intval($_GET['project']) : 0;

            $query = "SELECT projectName, shortDesc, description FROM projects WHERE id = $id";

            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_array($result);
                
                echo '<h2>' . $row['projectName'] . '</h2>
                <div class="content">
                    <p>' . $row["shortDesc"] . '<br><br>' . $row["description"] .'</p>     
                </div>';
            };
            ?>
            </div>
        </section>

        <?php include 'includes/footer.php'?>
    </body>
</html>