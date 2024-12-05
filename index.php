<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php' ?>
    </head>
    <body>
        <?php include 'includes/nav.php'?>

        <!--Header-->
        <!-- <header><img src="images/header.png" alt="hendheld"><h1>Hendheld</h1></header> -->

        <!-- About -->
        <section class="container text-center">
            <div class="about">
                <h2>About</h2>
                <div class="content">
                    <img src="images/placeholder/photo.png" class="photo"></i>
                    <p>Hi, I'm Storm Laan.<br><br> I'm studying to become a software developer. I enjoy programming, 3dmodeling, designing pcb's and thinkering with computers. </p>     
                </div>
            </div>
        </section>

        <!-- skills -->
        <!-- <section class="container">
            <div class="skills">
                <h2 class="text-center">Skills</h2>
                <div class="skill-container">
                    <div class="skill">
                        <h3>programming</h3>
                        <div class="skill-info">
                            <p>html & css</p><p>75%</p>
                        </div>
                        <div class="progressbar-B">
                            <div class="progressbar-F htmlcss"></div>
                        </div>
                        <div class="skill-info">
                            <p>php</p><p>50%</p>
                        </div>
                        <div class="progressbar-B">
                            <div class="progressbar-F php"></div>
                        </div>
                        <div class="skill-info">
                            <p>javascript</p><p>40%</p>
                        </div>
                        <div class="progressbar-B">
                            <div class="progressbar-F javascript"></div>
                        </div>
                    </div>
    
                    <div class="skill">
                        <h3>miscellaneous</h3>
                        <div class="skill-info">
                            <p>3d modeling</p><p>50%</p>
                        </div>
                        <div class="progressbar-B">
                            <div class="progressbar-F modeling"></div>
                        </div>
                        <div class="skill-info">
                            <p>pcbdesign</p><p>25%</p>
                        </div>
                        <div class="progressbar-B">
                            <div class="progressbar-F pcb"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- recent Projects -->
        <section class="container">
            <h2 class="text-center">Recent projects</h2>
            <div class="recent-projects">
                <?php 

                    include 'includes/db/connect.php';

                    $query = "SELECT * FROM projects ORDER BY id DESC LIMIT 5";
    
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo '<div  class="recent-project">
                                <a href="';
                                if (strval($row["projectName"]) == 'Handheld') {
                                    echo 'Handheld.php';
                                } else {
                                    echo 'project.php?project=' . $row["id"];
                                } 
                                echo '">
                                    <div class="recent-project-image" style="background-image: url(' . $row["projectImage"] . ')" alt="Hendheld"></div>
                                    <div class="description">
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
                                </a>
                            </div>';
                        }
                    } else {
                        echo '<p>No projects found.</p>';
                    }
                ?>

                <!-- <div  class="recent-project">
                    <a href="Hendheld.html">
                        <img src="images/projects/controllerRender.png" alt="Hendheld">
                        <div class="description">
                            <h3>Hendheld</h3>
                            <p>lorum ipsum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ullamcorper consequat sapien at malesuada. Sed leo </p>
                            <div class="icons">
                                <img src="images/icons/easyeda.svg" alt="easyeda">
                                <img src="images/icons/c.svg" alt="C">
                                <img src="images/icons/autodesk-fusion-360-logo-7F72A76397-seeklogo.svg" alt="Fusion360">
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div  class="recent-project">
                    <a href="portfolio.html">
                        <img src="images/projects/portfolio.png" alt="Hendheld">
                        <div class="description">
                            <h3>Portfolio</h3>
                            <p>lorum ipsum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ullamcorper consequat sapien at malesuada. Sed leo </p>
                            <div class="icons">
                                <img src="images/icons/scss.png" alt="scss">
                                <img src="images/icons/html.png" alt="C">
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>
        </section>

        <!-- footer -->
        <?php include 'includes/footer.php'?>

    </body>
</html>