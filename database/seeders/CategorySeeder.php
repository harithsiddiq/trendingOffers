<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'all', 'label' => 'الكل', 'icon' => 'grid'],
            ['name' => 'مطعم', 'label' => 'مطاعم', 'icon' => 'utensils'],
            ['name' => 'مقهى', 'label' => 'مقاهي', 'icon' => 'coffee'],
            ['name' => 'صالون', 'label' => 'صالونات', 'icon' => 'scissors'],
            ['name' => 'متجر', 'label' => 'متاجر', 'icon' => 'shopping-bag'],
            ['name' => 'نادي رياضي', 'label' => 'رياضة', 'icon' => 'dumbbell'],
            ['name' => 'مكتبة', 'label' => 'مكتبات', 'icon' => 'book'],
            ['name' => 'عيادة', 'label' => 'عيادات', 'icon' => 'stethoscope'],
            ['name' => 'ورشة', 'label' => 'ورش', 'icon' => 'wrench'],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
