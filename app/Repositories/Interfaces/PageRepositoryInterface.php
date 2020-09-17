<?php

namespace App\Repositories\Interfaces;

interface PageRepositoryInterface
{
    public function getSectionWithItems($pageName); // get page sections and section items
}