<?php

namespace App\Services;

use App\Models\Category;

class CategoryService{

    public function getAll(): array{
        return [
            new Category(1,'Elektronika',4),
            new Category(2,'Knjige',7),
        ];
    }
}