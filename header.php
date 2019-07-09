<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#024899;">
    <a class="navbar-brand back" href="gallery.html"> <img src="../Images/Alphalogo.jpg" class="img-responsive inline"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../html/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../html/about.php">AboutUs</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../html/howtobid.php">HowToBid</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../html/faq.php">FAQs</a>
            </li>
        </ul>
         

       
          <ul class="navbar-nav nav navbar-right">
              <?php if(isset($_SESSION['user'])) { ?>
              <li class="nav-link active"><span style="color:white;">Welcome, <?php echo $_SESSION['user']['username']; ?> | </span></li><br>
              
            <li class="">
                <a class="nav-link active " href="../html/logout.php">Logout<i class="fa fa-user-plus"></i></a>
            </li>
            <?php } else { ?>
            <li clas="mr-2">
                <a class="nav-link active btn" href="../html/form.php">Signup <i class="fa fa-user-plus"></i></a>
            </li>
            <li class="">
                <a class="nav-link active btn" href="../html/login.php">Login
                    <i class="fa fa-user-plus"></i></a>
            </li>
            <?php } ?>

        </ul>
    </div>
</nav>

<br><br>
