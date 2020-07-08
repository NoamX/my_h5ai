<?php
if (isset($_SERVER['REDIRECT_URL'])) {
    $server = $_SERVER['REDIRECT_URL'];
    $url = explode('/', $server);
    $noob = '';
    foreach ($url as $value) {
        if ($value) {
            $noob .= '/' . $value;
            if ($value != 'PHP' && $value != 'FirstY') {
                echo "<li class='breadcrumb-item'><a href=$noob class='text-decoration-none'>" . $value . "</a></li>";
            }
        }
    }
}
