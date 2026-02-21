<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$PANEL_ROUT_MAIN_ADR;?>profile">
        <div class="sidebar-brand-icon">
            <img src="<?=$USER_PANEL_INFO['profilePic']?>" width="40px" High="40px" style="border-radius: 33px">
        </div>
        <div class="sidebar-brand-text mx-3">hossien <sup style="font-size: 11px; text-transform: lowercase; font-weight: 50">
         admin</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?=checkModuleInSidebar('main')?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- ------ -->
    <hr class="sidebar-divider">
    <!-- ------ -->

    <!-- start public setting -->
    <li class="nav-item <?=checkModuleInSidebar('setting')?>">
        <a class="nav-item <?=checkModuleInSidebar('setting')?>">
            <a class="nav-link" href='<?=$PANEL_ROUT_MAIN_ADR?>setting'>
            <i class="fas fa-fw fa-cog"></i>
                <span>Public Setting</span></a>
        </a>
    </li>
    <!-- end public setting -->

    <!-- <hr class="sidebar-divider"> -->

    <!-- start Experiences -->
    <li class="nav-item <?=checkModuleInSidebar('add_exp')?> <?=checkModuleInSidebar('exps')?>" >
        <a class="nav-link collapsed" href="c#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Experiences</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Edit Experience:</h6>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>add_exp">Add new</a>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>exps">Show all</a>
            </div>
        </div>
    </li>
    <!-- end Experiences -->

    <!-- start educations -->
    <li class="nav-item <?=checkModuleInSidebar('add_edu')?> <?=checkModuleInSidebar('edus')?>" >
        <a class="nav-link collapsed" href="c#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-edit"></i>
            <span>Educations</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Edit educations:</h6>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>add_edu">Add new</a>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>edus">Show all</a>
            </div>
        </div>
    </li>
    <!-- end educations -->

    <!-- start Tools Skills -->
    <li class="nav-item <?=checkModuleInSidebar('add_tools_skills')?> <?=checkModuleInSidebar('tools_skills')?>" >
        <a class="nav-link collapsed" href="c#" data-toggle="collapse" data-target="#collapseToolsSkills"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Tools Skills</span>
        </a>
        <div id="collapseToolsSkills" class="collapse" aria-labelledby="headingSkills" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tools Skills:</h6>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>add_tools_skills">Add New</a>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>tools_skills">Show all</a>
            </div>
        </div>
    </li>
    <!-- end Tools Skills -->

    <!-- start Skills -->
    <li class="nav-item <?=checkModuleInSidebar('add_skills')?> <?=checkModuleInSidebar('skills')?>" >
        <a class="nav-link collapsed" href="c#" data-toggle="collapse" data-target="#collapseSkills"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-edit"></i>
            <span>Skills</span>
        </a>
        <div id="collapseSkills" class="collapse" aria-labelledby="headingSkills" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Skills:</h6>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>add_skills">Add New</a>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>skills">Show all</a>
            </div>
        </div>
    </li>
    <!-- end Skills -->

    <!-- start awards -->
    <li class="nav-item <?=checkModuleInSidebar('add_awards')?> <?=checkModuleInSidebar('awards')?>" >
        <a class="nav-link collapsed" href="c#" data-toggle="collapse" data-target="#collapseAwards"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Awards & Cert...</span>
        </a>
        <div id="collapseAwards" class="collapse" aria-labelledby="headingSkills" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Awards & Certifications:</h6>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>add_awards">Add New</a>
                <a class="collapse-item" href="<?=$PANEL_ROUT_MAIN_ADR;?>awards">Show all</a>
            </div>
        </div>
    </li>
    <!-- end awards -->

    
    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>