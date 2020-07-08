<?php
function get_tree($path)
{
    if (file_exists($path)) {
        echo '<ul>';
        foreach (scandir($path) as $value) {
            if (substr($value, 0, 1) != '.') {
                if (is_dir($path . '/' . $value)) {
                    echo "<li class='list-group-item'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/folder.png' width='25px'><a href=" . 'http://localhost/FirstY/PHP/my_h5ai/' . $path . '/' . $value . "> $value</a></li>";
                    get_tree($path . '/' . $value);
                }
            }
        }
        echo '</ul>';
    }
}

get_tree('.');
