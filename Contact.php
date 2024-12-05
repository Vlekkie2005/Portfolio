<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="scss/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Tilt+Neon&display=swap" rel="stylesheet">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=0" />
        <title>portfolio</title>
        <meta name="description" content="Portfolio van storm Laan"/>
    </head>
    <body>
        <!-- Nav -->
        <?php include 'includes/nav.php'?>

        <!--Header-->
        <!-- <header class="small"></header> -->

        <!-- Contact -->
        <section class="container">
            <div class="contact">
                <form class="contact-form" action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="b934ecb6-b7fb-41f8-933b-b428f2a155b2" />
                    <input type="hidden" name="subject" value="New Contact Form Submission from portfolio" />
                    <input type="hidden" name="from_name" value="Portfolio" />
                    <input type="hidden" name="redirect" value="https://stormlaan.nl">
                    <h2>Contact form</h2>
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="text" required>
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="text" required>
                    <label for="message">Message:</label>
                    <textarea name="message" rows="4" class="text" required></textarea>
                    <input type="submit" class="submit" value="Submit">
                </form>

                <div class="contact-info">
                    <h2>Contact info</h2>
                    
                    <p>E: <a href="mailto:Stormlaan@icloud.com">Stormlaan@icloud.com</a></p>
                    <p>T: <a href="tel:">+316000000</a></p>
                    <p>L: <a href="">Nieuwe niedorp, Langereis 40</a></p>
                    

                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?hl=en&amp;q=langereis%20Nieuwe%20Niedorp+(Langereis%2040%20)&amp;t=&amp;z=9&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include 'includes/footer.php'?>
    </body>
</html>