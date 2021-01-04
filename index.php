<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Host</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="hello" class="container-fluid">
        <!-- Welcoming -->
        <section >
            <a class="btn text-light fs-4 p-4 " href="#">Phanios' UrlShortener</a>
        </section>
        <section class="text-light text-center text-uppercase">
            <h1> Url too long? Use our shortener</h1>
            <h6>Thanks for using our site!</h2>
        </section>
        <!-- FORM -->
        <section >
            <form action="script.php" method="post">
        <div class="row my-5">
        <div class="col-8">
            <input  class="form-control w-50 float-end  text-center " name="url" type="text" placeholder="Copy the url you would like to shorten">
            </div>
            <div class="col-4">
            <input class=" form-control w-25 btn-warning " type="submit" value="Shorten">
            </div>
        </div>
        </form>
<!-- ////////////////////PHP////////////////////////////////////////// -->
        <?php if(isset($_GET['error']) && isset($_GET['message'])){ ?>
            <div class="mx-auto text-center text-danger fs-2 ">
            <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
     <?php } else if (isset($_GET['short'])) { ?>
        <div class="mx-auto text-center text-light fs-4 ">
            URL RACCOURCIE : 
            http://localhost/?q=<?php  echo htmlspecialchars($_GET['short']); ?>
            </div>
     <?php } ?>

        </section>
    </header>
    <footer class="container bg-light text-center ">
        <div class="m-3">
            <h2>Thank you for trusting us</h2>
            <p>Visit our other projects <a href="phanios.fr">here</a></p>
            </div>
    </footer>
</body>
</html>