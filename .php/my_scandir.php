<?php
if (isset($_SERVER['REDIRECT_URL'])) {
    function folderSize($dir)
    {
        $size = 0;

        foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
            $size += is_file($each) ? filesize($each) : folderSize($each);
        }

        return $size;
    }


    function my_scandir($path)
    {
        $folder = [];
        $file = [];
        if (file_exists($path) && is_dir($path)) {
            $scan = scandir($path);
            foreach ($scan as $value) {
                if (substr($value, 0, 1) != '.') {
                    if (is_dir($path . '/' . $value)) {
                        array_push($folder, $path . '/' . $value);
                    } elseif (is_file($path . '/' . $value)) {
                        array_push($file, $path . '/' . $value);
                    }
                }
            }
            foreach ($folder as $value) {
                echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/folder.png' width='25px'> <a href=" . basename($value) . " class='text-decoration-none'> " . basename($value) . "</a></div><div class='col-4' align='right'> " . round(folderSize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
            }
            foreach ($file as $value) {
                if (strstr($value, '.') == '.html') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4 list-name'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/html.png' width='25px'> <a href=" . basename($value) . "> " . basename($value) . "</a></div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } elseif (strstr($value, '.') == '.css') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/css.png' width='23px'> <a href=" . basename($value) . "> " . basename($value) . "</a></div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } elseif (strstr($value, '.') == '.js') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/js.png' width='25px'> <a href=" . basename($value) . "> " . basename($value) . "</a></div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } elseif (strstr($value, '.') == '.php') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/php.png' width='25px'> <a href=" . basename($value) . "> " . basename($value) . "</a></div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } elseif (strstr(mime_content_type($value), '/', true) == 'image') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/image.png' width='25px'> " . basename($value) . "</div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } elseif (strstr(mime_content_type($value), '/', true) == 'video') {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/video.png' width='25px'> " . basename($value) . "</div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                } else {
                    echo "<li class='list-group-item list-order'><div class='row'><div class='col-4'><img src='http://localhost/FirstY/PHP/my_h5ai/.assets/file.png' width='25px'> " . basename($value) . "</div><div class='col-4' align='right'>" . round(filesize($value) / 1000) . " Ko</div><div class='col-4' align='right'>" . date('Y/m/d H:i', filemtime($value)) . "</div></div></li>";
                }
            }
        }
    }
}
my_scandir($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REDIRECT_URL']);
