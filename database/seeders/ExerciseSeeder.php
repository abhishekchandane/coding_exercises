<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 public function run()
    {
        Exercise::create([
            'title' => 'Make HTTP Client',
            'description' => 'Basic Guzzle client example.',
            'solution' => "<?php\n\nuse GuzzleHttp\Client;\n\n\$client = new Client();\n\$response = \$client->get('https://jsonplaceholder.typicode.com/posts/1');\necho \$response->getBody();",
            'output' => "{
  \"userId\": 1,
  \"id\": 1,
  \"title\": \"sunt aut facere repellat provident occaecati excepturi optio reprehenderit\",
  \"body\": \"quia et suscipit...\"
}"
        ]);
    }
}
