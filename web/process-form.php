<?php
function get_form_request($request) {
    if (isset($_POST[$request])) {
        if (!isset($_SESSION[$request]) ||
            $_SESSION[$request] !== $_POST[$request]) {
            $_SESSION[$request] = $_POST[$request];
    }
    return $_POST[$request];
} else if (isset($_SESSION[$request])) {
    return $_SESSION[$request];
}
return "";
}
function get_full_form_request() {
    if (isset($_POST) && count($_POST) > 0) {
        return $_POST;
    } else if (isset($_SESSION)) {
        return $_SESSION;
    }
    return false;
}
?>