<?php 
require('../controler/conection.php');
require('../controler/config.php');
include_once 'controllers/main.php';
include_once 'controllers/router.php';

$GENERAL_INFO = getGeneralInfo($con);

?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    
    <!-- one -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#about</h6>
                </div>
                <div class="card-body">
                <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                    <?=$GENERAL_INFO['firstName'] ?>
                        <span class="text-primary" style="color: blue; "><?=$GENERAL_INFO['lastName'] ?></span>
                    </h1>
                    <div class="subheading mb-5">
                    <?=$GENERAL_INFO['address'] ?> - <?=$GENERAL_INFO['tel'] ?> -
                        <a href="<?=$GENERAL_INFO['mail'] ?>"><?=$GENERAL_INFO['mail'] ?></a>
                    </div>
                    <p class="lead mb-5"><?=$GENERAL_INFO['about'] ?></p>
                    <div class="social-icons">

                        <?php if($GENERAL_INFO['twitter'] != ''):?>
                        <a class="social-icon" href = '<?=$GENERAL_INFO['twitter']; ?>' >
                            <i class='fab fa-twitter'>  <?=$GENERAL_INFO['twitter']; ?></i><br/>
                        </a>
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['linkedin'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['linkedin'] ?>" >
                            <i class="fab fa-linkedin-in">  <?=$GENERAL_INFO['linkedin'] ?></i><br/>
                        </a> 
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['facebook'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['facebook']; ?>" >
                            <i class="fab fa-facebook-f">  <?=$GENERAL_INFO['facebook']; ?></i><br/>
                        </a>
                        <?php endif; ?>

                        <?php if($GENERAL_INFO['instagram'] != ""):?>
                        <a class="social-icon" href = "<?=$GENERAL_INFO['instagram']; ?>" >
                            <i class="fab fa-instagram">  <?=$GENERAL_INFO['instagram']; ?></i><br/>
                        </a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </section>
                    
                    
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-5 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#skills</h6>
                </div>
                <div class="card-body">
                    <section class="resume-section" id="skills">
                        <div class="resume-section-content">
                            <div class="subheading mb-3">Programming Languages & Tools</div>
                            <ul class="list-inline dev-icons">
                                <?php while ($row = mysqli_fetch_array($select_tools_skills)): ?>
                                    <li class="list-inline-item"><i class="fab <?=$row['logo']?>"></i></li>
                                <?php endwhile;?>
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

                </div>
            </div>
        </div>
    </div>

    <!-- two -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#experience</h6>
                </div>
                <div class="card-body">
                    <section class="resume-section" id="experience">
                        <div class="resume-section-content">
                            <?php while ($row = mysqli_fetch_array($select)): ?>
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0"><?=$row['title']?></h3>
                                    <div class="subheading mb-3"><?=$row['subTitle']?></div>
                                    <p><?=$row['content']?></p>
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary"><?=$row['fromDate']?> - <?=$row['toDate']?></span></div>
                            </div>
                            <?php endwhile;?>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- three -->
    <div class="row">
        <div class="col-lg-6 mb-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#education</h6>
                </div>
                <div class="card-body">
                    <section class="resume-section" id="education">
                        <div class="resume-section-content">
                            <?php while ($row_edu = mysqli_fetch_array($select_edu)):?>
                                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-0"><?=$row_edu['title']?></h3>
                                        <div class="subheading mb-3"><?=$row_edu['subTitle']?></div>
                                        <div><?=$row_edu['content']?></div>
                                        <p>GPA: <?=$row_edu['gpa']?></p>
                                    </div>
                                    <div class="flex-shrink-0"><span class="text-primary"> <?=$row_edu['fromDate']?> -  <?=$row_edu['fromDate']?> </span></div>
                                </div>
                            <?php endwhile;?>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#interests</h6>
                </div>
                <div class="card-body">
                    <section class="resume-section" id="interests">
                        <div class="resume-section-content">
                            <p><?=$GENERAL_INFO['interest'];?></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- four -->
    <div class="row">

        <div class="col-lg-6 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#IP (last 10 login)</h6>
                </div>
                <div class="card-body">
                    <?php while ($row = mysqli_fetch_array($your_ip)): ?>
                        <a style="text-decoration:none"> <?=$row['ip']?> - <?=$row['date']?> - <?=$row['time']?></a><br/>
                    <?php endwhile;?>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">#certification</h6>
                </div>
                <div class="card-body">
                    <section class="resume-section" id="awards">
                        <div class="resume-section-content">
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
            </div>
        </div>                           
    </div>
</div>

