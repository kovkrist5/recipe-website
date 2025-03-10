<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Dishes=[
            [
                "name"=>"peanut butter sandwitch",
                "courseId"=>"8",
                "desc"=>"yummy pbj suitable for every meal",
                "img"=>"https://64.media.tumblr.com/a5fff134bd91c4c71929233aeff137b9/6af57a3dfa69b18f-8e/s1280x1920/6a93aa82bda51a30645121bf735484175277027a.pnj",
                "inst"=>"take 2 slices of bread; put peanut butter on one; put a jam of your choice on the other; slap em togeter;enjoy!",
                "prep"=>5,
                "cooktime"=>null,
            ],
            [
                "name"=>"garlic bread",
                "courseId"=>"1",
                "desc"=>"yummy garlic bread great with pasta",
                "img"=>"https://64.media.tumblr.com/a5fff134bd91c4c71929233aeff137b9/6af57a3dfa69b18f-8e/s1280x1920/6a93aa82bda51a30645121bf735484175277027a.pnj",
                "inst"=>"take a baguette and cut into it; slather it with garlic butter; top it with the cheese of your choice; cook it in the oven for 10 minutes",
                "prep"=>5,
                "cooktime"=>10,
            ],
        ];
        foreach($Dishes as $d){
            Dish::create($d);
    }
}
}
