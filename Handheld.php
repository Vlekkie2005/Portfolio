<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php' ?>
        <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.3.0/model-viewer.min.js"></script>
    </head>
    <body>
        <!-- Nav -->
        <?php include 'includes/nav.php'?>

        <header class="header-project small"><img src="images/projects/header.png" alt="hendheld"><h1>Hendheld</h1></header>

        <!-- project -->
        <section class="container">
            <div class="project-content-box">
                <div class="box">
                    <h3>The idea</h3>
                    <p>I wanted to make a handheld of my own that is repair friendly and easely upgradeable.</p>
                </div>
                <div class="box">
                    <h3>Customizable</h3>
                    <p>Because its 3d printed you can use all types of colors and you can put in whatever components you desire into it like the screen, batteries, joysticks and computer.</p>
                </div>
                <div class="box img">
                    <model-viewer src="images/projects/controller+chell.glb" 
                    camera-controls shadow-intensity="1" camera-orbit="-10deg 76.31deg 1m" field-of-view="23.37deg" auto-rotate interaction-prompt="none"> 
                </model-viewer>
                </div>
                <div class="box">
                    <h3>Cardridged based computer</h3>
                    <p>The plan is to load the computer a sort of cardridge that can slide into the pc. That would make it possible to switch between what sort of computer you want to use like swapping a normal x86 computer for a rasberry pi or a mister fpga (A project that aims to remake the hardware of old game systems).</p>
                </div>
                <div class="box grid">
                    <div class="block"><p>1080p screen</p></div>
                    <div class="Block-l"><p>90Wh battery</p></div>
                    <div class="block"><p>fully hackable</p></div>
                    <div class="Block-l"><p>Cardridged based computer</p></div>
                    <div class="Block-l"><p>16 / 9 aspect ratio</p></div>
                    <div class="block"><p>3d printed</p></div>
                    <div class="Block-l"><p>battery switching</p></div>
                    <div class="block">repairable</div>
                </div>
                <div class="box">
                    <h3>Your own OS</h3>
                    <p>Because u can use your own computer it would allow for your own OS like windows, any kind of linux and possibly a .</p>
                </div>
                <div class="box">
                    <h2 class="text-center">Progress</h2>
                    <div class="progressbar-B">
                        <div class="progressbar-F">
                        </div>
                    </div>
                </div>
                <div class="box img">
                    <img src="images/projects/controllerRender.png">
                </div>
                <div class="box">
                    <h3>Development progress</h3>
                    <ul>
                        <li class="check">Concept</li>
                        <li class="ongoing">Pcb prototype</li>
                        <li class="check">Shell prototype</li>
                        <li class="nocheck">Battery</li>
                        <li class="nocheck">Definitive pcb</li>
                        <li class="nocheck">Definitive shell</li>
                        <li class="nocheck">Cardridged based computer</li>
                        <li class="nocheck">Swappable battery</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- footer -->
        <?php include 'includes/footer.php'?>
    </body>
</html>