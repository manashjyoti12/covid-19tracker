<!DOCTYPE html>
<html>

<head>
    <title>
        Covid-19 Tracker
    </title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CDN for bootsrtap end -->

    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://kit.fontawesome.com/2de3e6b641.js" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Open+Sans:wght@300&family=Poppins:wght@500&family=Satisfy&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- Nav bar start-->
    
    <nav class="navbar navbar-expand-sm ">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="index.html"><img src="images/logo1.png" width="80"></a>
    
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Navbar links -->
            <div class=" collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
    
                </ul>
    
                <div class="links">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#update">Updates</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</a>
                        </li>
                </div>
            </div>
        </div>
    </nav>
    
    
    <!-- Nav bar end -->

    <!-- PHP API WORK -->
        <?php

        $data = file_get_contents('https://api.covid19india.org/data.json');
        $coranalive = json_decode($data, true);

        // echo "<pre>";
        // print_r($coranalive);
        // echo "</pre>";

        
        $statecount = count($coranalive['statewise']);

        $i=1;
        $count_active = 0;
        $count_death = 0;
        $count_recover = 0;
        while($i < $statecount){
           $count_active= $coranalive['statewise'][$i]['active'] + $count_active;
           $count_death= $coranalive['statewise'][$i]['deaths'] + $count_death;
           $count_recover= $coranalive['statewise'][$i]['recovered'] + $count_recover;
           $i++;
        }
        
        ?>
        <!-- PHP API WORK -->
    
    

    <!-- First section -->

    <section class="container first ">
        <div class="container row ">
            <div class="col-12 col-md-6 d-flex align-items-center text-left">
                <div>
                <h3>COVID-19 LIVE TRACKER</h3>
                <p class="mt-4">Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.
                    COVID-19 affects different people in different ways. Most infected people will develop mild to moderate illness and recover without hospitalization.
                </p>

                <div class="d-flex mt-4">
                    <button class="btn btn-danger mr-4">How to Protect ></button>
                    <button class="btn btn-outline-light">FIND A DOCTOR ></button>
                </div>

                </div>
            </div>

            <div class="col-12 col-md-6 ">
                <img src="./images/img1.gif" class="img1">
            </div>
        </div>
    </section>

    <!-- SECOND SECTION -->
    <section class="container-fluid second">
        <div class="container text-center second-content shadow">
            <div class="d-flex justify-content-around dd">
                <div class="d-flex">
                    <i class="fa-2x fa-solid fa-globe pr-2"></i> 
                    Recovered<br>
                    <?php 
                        echo $count_recover;
                     ?>
                </div>

                <div class="d-flex">
                    <i class="fa-2x fa-solid fa-virus-covid pr-2"></i> 
                    Active<br>
                    <?php 
                        echo $count_active;
                     ?>
                </div>

                <div class="d-flex ">
                    <i class="fa-2x fa-solid fa-skull pr-2"></i>
                     Death<br>
                     <?php 
                        echo $count_death;
                     ?>
                </div>
            </div>
        </div>
    </section>

        
      <!-- FOURTH -->

    <section class="fourth container-fluid " id="update">
    <div class="fourth-content container p-4">
        <div class="my-5">
            <h1 class="text-center heading">COVID-19 LIVE UPDATES OF INDIA </h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center ">
                <tr>
                    <th>STATES</th>
                    <th>TOTAL CONFIRMED</th>
                    <th>TOTAL RECOVERED</th>
                    <th>TOTAL DEATHS</th>
                    <th>Active</th>
                    <th>Update Time</th>
                </tr>

                <?php 
                    $i=1;
                    while($i < $statecount){

                    
                ?>

                <tr>
                    <td> <?php echo $coranalive['statewise'][$i]['state'] ?></td>
                    <td> <?php echo $coranalive['statewise'][$i]['confirmed'] ?></td>
                    <td> <?php echo $coranalive['statewise'][$i]['recovered'] ?></td>
                    <td> <?php echo $coranalive['statewise'][$i]['deaths'] ?></td>
                    <td> <?php echo $coranalive['statewise'][$i]['active'] ?></td>
                    <td> <?php echo $coranalive['statewise'][$i]['lastupdatedtime'] ?></td>
                </tr>

                <?php
                    $i++;
                    }
                ?>
            </table>
        </div>
    </div>
    </section>

    <!-- THIRD SECTION -->

    <section class="second-2" id="faq">
        <div class="container container1  ">
            <h1 class="pb-4 heading">Ask us anything :)  </h1>
            <iframe class="third shadow" src='https://webchat.botframework.com/embed/covidddd-bot?s=tmwLi2We948.OIFbbFwIAYBRLGOCWwROguTEJrHWqN7MssuWmLBpDf0'
                style='min-width: 300px; width: 100%; min-height: 500px;'></iframe>
        </div>
    </section>

    <!-- FOOTER -->

    <section class="footer" id="contact">
        <div class="container content p-4">
                <div class="d-flex justify-content-around">
                    <div>
                      <h5> USEFUL LINKS </h5>
                       <a href="#">  <h6 class="mt-4"> Home </h6> </a>
                       <a href="#">  <h6> Contact </h6> </a>
                       <a href="#">  <h6> FAQ </h6> </a>
                    </div>

                    <div>
                       <h5> CONTACT US </h5>
                       <a href="#"> <h6 class="mt-4"> Te-4569237891 </h6> </a>
                       <a href="#"> <h6> demo@gmail.com </h6> </a>
                       <a href="#"> <h6> Location </h6> </a>
                       <a href="#"> <h6> abc, XYZ </h6> </a>
                    </div>

                    <div>
                       <h5> KEEP IN TOUCH </h5>
                        <h6 class="mt-4 icon d-flex justify-content-between"> 
                            <i class="icon fa-brands fa-facebook"></i>   
                            <i class="icon fa-solid fa-envelope"></i>
                            <i class="icon fa-brands fa-instagram"></i>
                        </h6>
                    </div>
                </div>
        </div>        
    </section>
</body>
</html>