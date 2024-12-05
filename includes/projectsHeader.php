<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
    $(document).ready(function () {
        const slider = document.getElementById('slider');
        const slides = document.querySelectorAll('.background');
        const sliderCount = slides.length + 1;
        const clone = slides[0].cloneNode(true);
        let count = 1;

        slider.style.width = (sliderCount + 1) * 100 + 'vw';
        slider.appendChild(clone);

        function resetSlider() {
            slider.style.transition = '0s';
            slider.style.transform = 'translateX(0vw)';
            count = 1;
        }

        function animateSlide() {
            console.log(count);

            if (sliderCount === count) {
                setTimeout(resetSlider, 4000);
            }

            setTimeout(() => {
                slider.style.transition = 'transform 4s';
                slider.style.transform = `translateX(-${count * 100}vw)`;
                count++;
                animateSlide();
            }, 10000);
        }

        animateSlide();
    });
</script>


<header>
    <div id="slider" class="slider">
        <?php 
            $query = "SELECT * FROM projects";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                    echo '<div class="background" style="background-image: url(' . $row["projectImage"] . ')"><h1>' . $row["projectName"] . '</h1></div>';
                }
            
            }


            
        ?>
        <!-- <div class="background" style="background-image: url(images/projects/controllerRender.png)"><h1>Hendheld</h1></div>
        <div class="background" style="background-image: url(images/projects/portfolio.png)"><h1>Portfolio website</h1></div> -->
    </div>
</header>