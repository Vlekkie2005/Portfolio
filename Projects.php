<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
</head>

<body>
    <!-- Get database is used in getting projects and the header(keep above include header) -->
    <?php include 'includes/db/connect.php'; ?>

    <!-- Nav -->
    <?php include 'includes/nav.php' ?>

    <!-- header -->
    <?php include 'includes/projectsHeader.php' ?>

    <!-- Projects -->
    <section class="container">
        <h2 class="text-center">Projects</h2>
        <div class="projects">
            <?php
            $query = "SELECT * FROM projects";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<a href="';
                                if (strval($row["projectName"]) == 'Handheld') {
                                    echo 'Handheld.php';
                                } else {
                                    echo 'project.php?project=' . $row["id"];
                                } 
                        echo '">

                        <img src="' . $row["projectImage"] . '" alt="Hendheld">

                        <div class="description">
                            <h4>' . $row["datePosted"] . '</h4>
                            <h3>' . $row["projectName"] . '</h3>
                            <p>' . $row["shortDesc"] . '</p>
                            <div class="icons">';
                                $usedPrograms = $row["usedPrograms"];
                                                
                                $usedPrograms = explode(", ", $usedPrograms);

                                $i = 0;

                                while (count($usedPrograms) > $i) {
                                    echo '<img src="images/programs/' . $usedPrograms[$i] . '.svg" alt="' . $usedPrograms[$i] . '">';
                                    $i++;
                                }
                            echo '</div>
                        </div>
                    </a>';
             
                }
            } else {
                echo '<p>No projects found.</p>';
            }
            ?>


            <!-- <a href="Portfolio.php">

                <img src="images/projects/portfolio.png" alt="Hendheld">

                <div class="description">
                    <h4>datum posted</h4>
                    <h3>portfolio Website</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in venenatis nunc, in luctus
                        augue.
                        Proin sollicitudin massa sit amet dignissim malesuada. Ut egeamet accumsan.
                        Etiam iaculis eu justo id euismod. Nam sed turpis non sem ul
                    </p>
                    <div class="icons">
                        <img src="images/icons/html.png" alt="easyeda">
                        <img src="images/icons/scss.png" alt="Fusion360">
                    </div>
                </div>
            </a>
            <a href="Hendheld.php">

                <img src="images/projects/controllerRender.png" alt="Hendheld">

                <div class="description">
                    <h4>datum posted</h4>
                    <h3>Hendheld</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in venenatis nunc, in luctus
                        augue.
                        Proin sollicitudin massa sit amet dignissim malesuada. Ut egeamet accumsan.
                        Etiam iaculis eu justo id euismod. Nam sed turpis non sem ul
                    </p>
                    <div class="icons">
                        <img src="images/icons/easyeda.svg" alt="easyeda">
                        <img src="images/icons/autodesk-fusion-360-logo-7F72A76397-seeklogo.svg" alt="Fusion360">
                        <img src="images/icons/c.svg" alt="c">
                    </div>
                </div>
            </a> -->
        </div>
    </section>


    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>