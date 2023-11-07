<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToCollection
{
    // /**
    // * @param array $row
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */
    // public function model(array $row)
    // {
    //     return new Category([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Category::create([
                'name' => $row[0],
            ]);

            Product::create([
                'name' => $row[1],
                'price' => $row[2],
                'description' => $row[3],
            ]);
        }
    }
}
