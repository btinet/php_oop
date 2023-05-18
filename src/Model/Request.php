<?php

namespace App\Model;

enum Request
{
    case GET;
    case POST;

    public function get(string $key): mixed
    {
        return match($this) {
            Request::GET => $_GET[$key] ?? null,
            Request::POST => $_POST[$key] ?? null,
        };
    }

    public function getAll(string $key): array
    {
        return match($this) {
            Request::GET => $_GET,
            Request::POST => $_POST,
        };
    }
}