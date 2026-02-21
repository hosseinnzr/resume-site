<?php
include "controler/conection.php";  

$GENERAL_INFO = getGeneralInfo($con);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$GENERAL_INFO['webTitle'] ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

        
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">
                    <?=$GENERAL_INFO['firstName'] ?> <?=$GENERAL_INFO['lastName'] ?>
                </span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" 
                src="panel/<?=$GENERAL_INFO['profilePic']?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Certificate
</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                    <?=$GENERAL_INFO['firstName'] ?>
                        <span class="text-primary" style="color: blue; "><?=$GENERAL_INFO['lastName'] ?></span>
                    </h1>
                    <div class="subheading mb-5">
                    <?=$GENERAL_INFO['address'] ?> · <?=$GENERAL_INFO['tel'] ?> ·
                        <a href="mailto:<?=$GENERAL_INFO['mail'] ?>"><?=$GENERAL_INFO['mail'] ?></a>
                    </div>
                    <p class="lead mb-5"><?=$GENERAL_INFO['about'] ?></p>
                    <div class="social-icons">

                        <?php if($GENERAL_INFO['twitter'] != ''):?>
                        <a class="social-icon" href = '<?=$GENERAL_INFO['twitter']; ?>' >
                            <i class='fab fa-twitter'></i>
                        </a>
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['linkedin'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['linkedin'] ?>" >
                            <i class="fab fa-linkedin-in"></i>
                        </a> 
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['facebook'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['facebook']; ?>" >
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['instagram'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['instagram']; ?>" >
                            <i class="fab fa-instagram"></i>
                        </a>
                        <?php endif; ?>
                        
                        <!-- <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a> -->
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    
                    <?php while ($row = mysqli_fetch_array($select)): ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?=$row['title']?></h3>
                            <div class="subheading mb-3"><?=$row['subTitle']?></div>
                            <p><?=$row['content']?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?=$row['fromDate']?>  <?=$row['toDate']?></span></div>
                    </div>
                    <?php endwhile;?>

                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>

                    <?php while ($row_edu = mysqli_fetch_array($select_edu)):?>
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <h3 class="mb-0"><?=$row_edu['title']?></h3>
                                <div class="subheading mb-3"><?=$row_edu['subTitle']?></div>
                                <div><?=$row_edu['content']?></div>
                                <p><?=$row_edu['gpa']?></p>
                            </div>
                            <div class="flex-shrink-0"><span class="text-primary"> <?=$row_edu['fromDate']?>   <?=$row_edu['toDate']?> </span></div>
                        </div>
                    <?php endwhile;?>
                    
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">

                        <?php while ($row = mysqli_fetch_array($select_tools_skills)): ?>
                            <li class="list-inline-item"><i class="fab <?=$row['logo']?>"></i></li>
                        <?php endwhile;?>

                        <!-- <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                        <li class="list-inline-item"><i class="fab fa-python"></i></li>
                        <li class="list-inline-item"><i class="fab fa-php"></i></li> -->
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">

                        <?php while ($row = mysqli_fetch_array($select_skills)): ?>
                            <li>
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?=$row['title']?>
                            </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p><?=$GENERAL_INFO['interest'];?></p>
                    <!-- <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p> -->
                </div>
            </section>
            <hr class="m-0" />
             <!--Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Certifications</h2>
                    <ul class="fa-ul mb-0">

                        <?php while ($row = mysqli_fetch_array($select_awards)): ?>
                            <li href = "sdcsdv">
                                <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                <a href="<?=$row['link']?>" target="_blank" style="text-decoration:none"> <?=$row['title']?></a> - <?=$row['type']?>
                             </li>
                        <?php endwhile;?>
                        
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
