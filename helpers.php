<?php

if ( ! function_exists('robots')) {
    /**
     * Get the Robots instance.
     *
     * @return \Arcanedev\Robots\Contracts\Robots
     */
    function robots() {
        return app('arcanedev.robots');
    }
}
