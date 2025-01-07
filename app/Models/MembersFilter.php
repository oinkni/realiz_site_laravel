<?php

namespace App\Models;

class MembersFilter
{
    public ?string $profession;
    public ?string $company;
    public string $sort_by;

    public function __construct(?string $profession = null, ?string $company = null, string $sort_by)
    {
        $this->profession = $profession;
        $this->company = $company;
        $this->sort_by = $sort_by;
    }
}
