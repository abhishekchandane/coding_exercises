<?php
// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $guzzle = Category::create(['name' => 'Guzzle']);
        $php = Category::create(['name' => 'PHP']);
        $laravel = Category::create(['name' => 'Laravel']);

        Exercise::create([
            'title' => 'Make HTTP Request',
            'description' => 'Basic Guzzle client usage',
            'solution' => '...',
            'output' => '...',
            'category_id' => $guzzle->id,
        ]);
    }
}
