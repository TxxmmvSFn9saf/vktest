<?php
function tree ($directory,$sub)
{
    $files = scandir ( $directory );
    foreach ( $files as $file ) {
        if ( $file == '.' || $file == '..' )
            continue;
        if ( is_dir ( "$directory/$file" ) ) {
            echo $sub.$file . "<br />";
            tree ( "$directory/$file" ,$sub.'-');
        } else
                echo $sub.$file . "<br />";
    }
}
tree ( __DIR__ ,null);
