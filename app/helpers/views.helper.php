<?php

class ViewsHelper {
    public static function header($titulo) {
        require_once "./templates/header.phtml";
    }

    public static function footer() {
        require_once "./templates/footer.phtml";
    }
}