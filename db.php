<?php

define('DBFILE', '/tmp/credkeeper.ini');

function read_value($key)
{
    $vars = read_data_file();
    return $vars[$key];
}

function write_value($key, $val)
{
    $vars = read_data_file();
    $vars[$key] = $val;
    write_data_file($vars);
}

function read_data_file()
{
    if (!file_exists(DBFILE))
        file_put_contents(DBFILE, '');
    return parse_ini_file(DBFILE);
}

function write_data_file($assoc_arr)
{ 
    $content = ""; 
    foreach ($assoc_arr as $key => $elem) { 
        if ($elem == "")
            $content .= $key." = \n"; 
        else
            $content .= $key." = \"".$elem."\"\n"; 
    } 

    file_put_contents(DBFILE, $content);
}
