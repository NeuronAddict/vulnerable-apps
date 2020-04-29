<?php

/**
 * Mode
 * 0 : no cors header
 * 1 : specific cors header (http://localhost:8181) + credentials
 * 2: mirroring cors headers
 * 3: star cors headers
 */



function add_cors_header() {

    $mode = 2;

    switch ($mode) {
        case 1:
            header('Access-Control-Allow-Origin', 'http://localhost:8181');
            header('Access-Control-Allow-Credentials', 'true');
            break;

        case  2:
            $headers = getallheaders();
            if(isset($headers['Origin'])) {
                header('Access-Control-Allow-Origin', $headers['Origin']);
                header('Access-Control-Allow-Credentials', 'true');
            }
            break;
        case 3:
            header('Access-Control-Allow-Origin', '*');
        case 0:
        default:

    }
}
