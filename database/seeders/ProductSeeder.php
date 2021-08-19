<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [    'name' => 'Headphone',
            'price' => '3000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category' => 'Electronics',
            'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnAbSH-ogWeMD4JF5urZIocaU91CxCqVVHaucZE4QbYTlevOcuc6z-Bzf2SoLStZ_zfvw&usqp=CAU'    
        ],
        [
            'name' => 'Mobile',
            'price' => '10000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category' => 'Electronics',
            'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH_zjWjHjBSsU2hPX4RN_L36xHwM6lBibQXQ&usqp=CAU'    
        ],
        [
            'name' => 'Powerbank',
            'price' => '2000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category' => 'Electronics',
            'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjY_lj5f861QZGr5VzaGLoQCp2T3XDiSgcOQ&usqp=CAU'    
        ],
        [
            'name' => 'Earphone',
            'price' => '999',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category' => 'Electronics',
            'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy0OaMutjsxdMYN5SMinqJBU3k7bGWH3UkJw&usqp=CAU'    
        ],
        [
            'name' => 'TV',
            'price' => '20000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category' => 'Electronics',
            'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGvrgVbBzmyh_rnq2IQeS3WXarzVxZjLPYKg&usqp=CAU'    
        ]
        ]);
    }
}
