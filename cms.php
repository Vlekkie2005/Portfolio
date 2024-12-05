<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
</head>

<body>

    <?php include 'includes/nav.php' ?>

    <?php
    

    function login()
    { ?>
        <form action="cms.php" method="post">
            <input type="password" name="password" placeholder="Wachtwoord">
            <button type="submit" name="login">Login</button>
        </form>
        <?php

        if (isset($_POST['login'])) {
            $password = $_POST['password'];

            if (password_verify($password, '$2y$10$eLlsV5cppbQALTlhHxMVROTSipUgwjbCPtZmdJ/VC./u4h8qebnNK')) {
                $_SESSION['session_token'] = bin2hex(random_bytes(32));
                $_SESSION['token_expiry'] = time() + 3600;
            } else {
                echo "<p id='error'>verkeerd wachtwoord</p>";
            }
        }
    }
    if (isset($_SESSION['token_expiry'])) {
        if (!isset($_SESSION['session_token']) && time() > $_SESSION['token_expiry']) {
        login();
        exit();
        }
    } else {
        login();
        exit();
    }

    ?>

    <section class="container">
        <ul class="cms edit">
            <li><a href="cms.php">New</a></li>
            <?php
            include 'includes/db/connect.php';

            $query = "SELECT id, projectName FROM projects";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="cms.php?project=' . $row["id"] . '">' . $row["projectName"] . '</a></li>';
                }
            }
            ?>
        </ul>
    </section>

    <?php

    if (isset($_GET['project'])) {
        include 'includes/db/connect.php';

        $id = isset($_GET['project']) ? intval($_GET['project']) : 0;

        $idURL = '?project=' . $id;

        $query = "SELECT projectName, shortDesc, description FROM projects WHERE id = $id";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_array($result);
        }
    }

    ?>

    <section class="container" id="prokectUpload">
        <div class="cms">
            <form action="cmsUpload.php<?php if (isset($id)) {echo $idURL;} ?>" method="POST" enctype="multipart/form-data">
                <label for="project name">Project name</label>
                <input id="projectNameInput" type="text" name="projectName" required
                    value="<?php if (isset($row)) {
                        echo $row["projectName"];
                    } ?>">
                <label for="project name">Short description</label>
                <textarea id="shortDescriptionInput" type="text" name="shortDescription"
                    required><?php if (isset($row)) {
                        echo $row["shortDesc"];
                    } ?></textarea>
                <label for="project name">Description</label>
                <textarea type="text" name="Description"
                    required><?php if (isset($row)) {
                        echo $row['description'];
                    } ?></textarea>
                <?php if (!isset($row)) { ?> 
                <label for="image">image</label>
                <input type="file" name="projectImage" id="imageInput" required>
                <label for="programs">programs</label>
                <select id="programsSelect">
                    <option value="">select program</option>
                    <?php
                    // gets all files(program svg's) 
                    $programs = scandir('images/programs');
                    // gets every file and removes .svg and places it in an option
                    foreach ($programs as $file) {
                        if (str_ends_with($file, '.svg')) {
                            $file = substr_replace($file, '', -4);
                            echo '<option value="' . $file . '">' . $file . '</option>';
                        }
                    }
                    ?>

                </select>
                <?php } ?>
                <input type="hidden" id="usedPrograms" name="usedPrograms" value="">
                <div id="selectedPrograms">
                    <!-- <div id="program">
                            <p>scss</p>
                            <button id="scss" type="button" class="minus" onclick="deleteProgam();"></button>
                            <input type="hidden" name="scss" value="scss"> 
                        </div> -->
                </div>

                <input type="submit" value="Submit" class="submit" name="submit">
            </form>

            <!-- example of the projects that get shown on the home page -->
            <div class="recent-projects">
                <div class="recent-project">
                    <a>
                        <img src="images/placeholder/questionmark.svg" alt="Hendheld" id="image">
                        <div class="description">
                            <h3 id="projectName">type in project name to edit</h3>
                            <p id="shortDescription">type in short description to edit</p>
                            <div class="icons" id="icons">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <script src="js/test.js"></script>

    <?php include 'includes/footer.php' ?>
</body>

</html>
