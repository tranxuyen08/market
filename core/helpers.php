<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
if (!function_exists('view')) {
    function view($name, $data = [])
    {
        extract($data);

        return require "app/views/{$name}.view.php";
    }
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: /{$path}");
    }
}

if (!function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $x) {
            var_dump($x);
        }
        die;
    }
}

if (!function_exists('pagination')) {
    function pagination($total, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $totalPage = ceil($total / $limit);

        return array(
            $totalPage,
            $offset
        );
    }
}