<?php
class Router{
    private $module_folder_name= 'modules';
    private $main_mudoles_name = 'index.php?modules=main';
    private $path404 = 'index.php?modules=404.php';
    private $modules = 
    [
    
        'main' => 'main.php',
        'setting' => 'setting.php',

        'add_exp' => 'add_exp.php',
        'exps' => 'exps.php',

        'add_edu' => 'add_edu.php',
        'edus' => 'edus.php',

        'add_tools_skills' => 'add_tools_skills.php',
        'tools_skills' => 'tools_skills.php',

        'add_skills' => 'add_skills.php',
        'skills' => 'skills.php',

        'add_awards' => 'add_awards.php',
        'awards' => 'awards.php',

        'profile' => 'profile.php',
        'default' => '404.php'
    ];

    function Router(){}

    function route(){
        $module_value = getParam("modules");
        $folder = $this->module_folder_name;
        $path404 = $this->path404;
        if ($module_value == null){
            $main = $this->main_mudoles_name;
            header("Location: $main");
        }else{
            $myModules = $this->modules;
            if (!isset($myModules[$module_value])){
                includeByCheck($folder.'/'.$myModules['default'], $path404);
            }else{
                includeByCheck($folder.'/'.$myModules[$module_value], $path404);
            }
        }
    }

}
?>