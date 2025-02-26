<?php

namespace Database\Seeders;

use App\Models\alg_dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlgDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alg=[
            ["dishid"=> 1,"alg"=>1],
            ["dishid"=> 1,"alg"=>5],
            ["dishid"=> 2, "alg"=>1],
            ["dishid"=> 2, "alg"=>7],
        ];
        foreach ($alg as $a) {
            alg_dish::create($a);
        }
    }
}
