<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::where('name', 'Laptop')->first()->products()->createMany([
            [
                'name'=>'Sản phẩm 1',
                'price'=>1000000,
                'image'=>'no_image.png',
                'desc'=>'Mô tả sản phẩm 1'
            ],
            [
                'name'=>'Sản phẩm 2',
                'price'=>2000000,
                'image'=>'no_image.png',
                'desc'=>'Mô tả sản phẩm 2'
            ],
            [
                'name'=>'Sản phẩm 3',
                'price'=>3000000,
                'image'=>'no_image.png',
                'desc'=>'Mô tả sản phẩm 3'
            ],
        ]);
    }
}
