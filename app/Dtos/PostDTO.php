<?php

namespace App\Dtos;

class PostDTO
{
    public function __construct(
        public int $user_id,
        public string $title,
        public string $text,
        public array $categories
    )
    {
    }
}
