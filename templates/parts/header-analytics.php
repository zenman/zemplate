<?php 
//Usage: get_template_part('templates/parts/header', 'analytics');
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
$hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
$remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
$exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');

switch ($hostname) {
    case 'localhost': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case (strstr($hostname, '8888') == true): //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'dev1.zenman.com': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'test1.zenman.com': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'stage1.zenman.com': //mimic live environment...
        if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){ ?>
            <script type='text/javascript'>

                // PASTE CLIENTS GA CODE IN HERE ^ SCRIPT IS ALREADY INCLUDED

            </script>
        <?php }else{ ?>
            <!-- No GA code for Zenman! -->
        <?php
        }
        break;
    default: //this is what you get on live server
        if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){ ?>
            <script type='text/javascript'>

                // PASTE CLIENTS GA CODE IN HERE ^ SCRIPT IS ALREADY INCLUDED

            </script>
        <?php }else{ ?>
            <!-- No GA code for Zenman! -->
        <?php
        }
        break;
}
?>