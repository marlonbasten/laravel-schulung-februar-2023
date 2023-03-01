<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $text,
        public int $user_id,
        public array $categories,
    ) {}
}
