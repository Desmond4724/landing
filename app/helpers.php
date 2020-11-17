<?php


if (!function_exists('response_out')) {
    function response_out($data, $links, $errors)
    {
        return response([
            "data" => $data->getCollection()
        ]);

    }
}
