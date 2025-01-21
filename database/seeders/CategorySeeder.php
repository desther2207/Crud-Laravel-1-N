<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Deportes'=> '#d98880',
            'Alimentación'=>'#c39bd3',
            'Bazar'=>'#aed6f1',
            'Musica'=>'#a3e4d7',
            'Cine'=>'#f9e79f',
        ];

        foreach ($categorias as $nombre => $color) {
            Category::create(compact('nombre', 'color'));
        }
    }
}
