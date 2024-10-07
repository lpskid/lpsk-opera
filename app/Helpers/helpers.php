<?php

// app/Helpers/BreadcrumbHelper.php
if (!function_exists('generate_breadcrumb')) {
    function generate_breadcrumb($route)
    {
        switch ($route) {
            case 'dashboard':
                return [
                    ['url' => route('dashboard'), 'label' => 'Dashboard'],
                ];
            default:
                return [
                    ['url' => route('dashboard'), 'label' => 'Dashboard'],
                ];
        }
    }
}
