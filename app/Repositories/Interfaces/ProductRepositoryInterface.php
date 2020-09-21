<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function all();

    public function getById($id);

    public function getBySlug($categorySlug, $productSlug);

    public function getVersions($id);
}