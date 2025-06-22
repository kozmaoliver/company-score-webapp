<?php

namespace App\DTO\Review\Input;

final class ListQuery
{
    public ?string $search = null;

    public ?int $page = 1;

    public ?int $limit = 1;
}
