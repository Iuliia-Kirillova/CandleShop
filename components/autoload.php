<?php

    spl_autoload_register(function ($class) {
        $dirs = array('components', 'controllers', 'models');
        foreach ($dirs as $dir) {
            $filepath = "$dir/$class.php";
            if (file_exists($filepath)) {
                require_once($filepath);
                break;
            }
        }
});
