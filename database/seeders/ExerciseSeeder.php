<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        $exercises = [

            // 1
            [
                'title' => 'Create a Basic Guzzle Client',
                'description' => 'Write a simple code to create and send a basic GET request.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/posts/1');
echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "userId": 1,
  "id": 1,
  "title": "...",
  "body": "..."
}
EOT,
                'category' => 'guzzle'
            ],

            // 2
            [
                'title' => 'Send a POST Request with JSON Body',
                'description' => 'Use Guzzle to send POST JSON data and show response.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->post('https://jsonplaceholder.typicode.com/posts', [
    'json' => [
        'title' => 'Hello World',
        'body' => 'Learning Guzzle',
        'userId' => 1
    ]
]);
echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "id": 101,
  "title": "Hello World",
  "body": "Learning Guzzle",
  "userId": 1
}
EOT,
                'category' => 'guzzle'
            ],

            // 3
            [
                'title' => 'Send Headers in Request',
                'description' => 'Send a GET request with custom headers and print response headers.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://httpbin.org/headers', [
    'headers' => [
        'Authorization' => 'Bearer ABC123',
        'Accept' => 'application/json'
    ]
]);

echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "headers": {
    "Authorization": "Bearer ABC123",
    "Accept": "application/json",
    ...
  }
}
EOT,
                'category' => 'guzzle'
            ],

            // 4
            [
                'title' => 'Send Query Parameters',
                'description' => 'Attach query parameters to GET request using the `query` option.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/comments', [
    'query' => ['postId' => 1]
]);
echo $response->getBody();
EOT,
                'output' => <<<'EOT'
[ { "postId": 1, "id": 1, "name": "...", "email": "...", "body": "..." }, ... ]
EOT,
                'category' => 'guzzle'
            ],

            // 5
            [
                'title' => 'Parse JSON Response',
                'description' => 'Decode JSON response and loop through items in PHP array.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/posts');
$body = $response->getBody()->getContents();
$data = json_decode($body, true);

foreach (array_slice($data, 0, 3) as $post) {
    echo $post['id'] . ': ' . $post['title'] . PHP_EOL;
}
EOT,
                'output' => <<<'EOT'
1: sunt aut facere repellat provident occaecati excepturi optio reprehenderit
2: qui est esse
3: ea molestias quasi exercitationem repellat qui ipsa sit aut
EOT,
                'category' => 'guzzle'
            ],

            // 6
            [
                'title' => 'POST Form Data (application/x-www-form-urlencoded)',
                'description' => 'Send form data using `form_params` option.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->post('https://httpbin.org/post', [
    'form_params' => [
        'name' => 'Abhishek',
        'role' => 'developer'
    ]
]);

echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "form": {
    "name": "Abhishek",
    "role": "developer"
  },
  ...
}
EOT,
                'category' => 'guzzle'
            ],

            // 7
            [
                'title' => 'File Upload Using Guzzle (multipart)',
                'description' => 'Upload a local file using multipart/form-data.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->post('https://httpbin.org/post', [
    'multipart' => [
        [
            'name'     => 'file',
            'contents' => fopen(storage_path('app/public/sample.jpg'), 'r'),
            'filename' => 'sample.jpg'
        ],
        [
            'name' => 'description',
            'contents' => 'Sample image upload'
        ]
    ]
]);

echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "files": {
    "file": "data:...base64..."
  },
  "form": {
    "description": "Sample image upload"
  }
}
EOT,
                'category' => 'guzzle'
            ],

            // 8
            [
                'title' => 'Download and Save File',
                'description' => 'Download a remote file (image/PDF) and save to storage with streams.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://via.placeholder.com/600', ['stream' => true]);

$savePath = storage_path('app/public/downloaded.png');
$body = $response->getBody();

file_put_contents($savePath, $body->getContents());

echo 'Saved to: ' . $savePath;
EOT,
                'output' => <<<'EOT'
Saved to: /path/to/project/storage/app/public/downloaded.png
EOT,
                'category' => 'guzzle'
            ],

            // 9
            [
                'title' => 'Handle HTTP Errors (4xx/5xx)',
                'description' => 'Use try/catch to handle exceptions and inspect response status.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client();

try {
    $response = $client->get('https://httpbin.org/status/404');
    echo $response->getStatusCode();
} catch (RequestException $e) {
    if ($e->hasResponse()) {
        echo 'Status: ' . $e->getResponse()->getStatusCode();
    } else {
        echo 'Network error: ' . $e->getMessage();
    }
}
EOT,
                'output' => <<<'EOT'
Status: 404
EOT,
                'category' => 'guzzle'
            ],

            // 10
            [
                'title' => 'Set Timeouts & Connection Options',
                'description' => 'Demonstrate connect and request timeout handling.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client(['timeout' => 5, 'connect_timeout' => 2]);

try {
    $response = $client->get('https://httpbin.org/delay/10'); // will timeout
    echo $response->getStatusCode();
} catch (RequestException $e) {
    echo 'Timeout or error: ' . $e->getMessage();
}
EOT,
                'output' => <<<'EOT'
Timeout or error: cURL error 28: Operation timed out
EOT,
                'category' => 'guzzle'
            ],

            // 11
            [
                'title' => 'Retry Failed Requests (Simple)',
                'description' => 'Retry a failing request up to 3 times with simple loop logic.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$attempts = 0;
$max = 3;
$success = false;

while ($attempts < $max && !$success) {
    $attempts++;
    try {
        $response = $client->get('https://httpbin.org/status/500');
        echo $response->getStatusCode();
        $success = true;
    } catch (\Exception $e) {
        echo \"Attempt $attempts failed\\n\";
        sleep(1);
    }
}
EOT,
                'output' => <<<'EOT'
Attempt 1 failed
Attempt 2 failed
Attempt 3 failed
EOT,
                'category' => 'guzzle'
            ],

            // 12
            [
                'title' => 'Concurrent Requests (Pool)',
                'description' => 'Send several requests concurrently using Guzzle Promises and Pool.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;

$client = new Client();
$urls = [
    'https://jsonplaceholder.typicode.com/posts/1',
    'https://jsonplaceholder.typicode.com/posts/2',
    'https://jsonplaceholder.typicode.com/posts/3',
];

$promises = [];
foreach ($urls as $u) {
    $promises[] = $client->getAsync($u);
}

$results = Promise\Utils::settle($promises)->wait();

foreach ($results as $res) {
    if ($res['state'] === 'fulfilled') {
        echo substr($res['value']->getBody()->getContents(), 0, 80) . \"...\\n\";
    } else {
        echo \"Request failed\\n\";
    }
}
EOT,
                'output' => <<<'EOT'
{ "userId": 1, "id": 1, "title": ... }...
{ "userId": 1, "id": 2, "title": ... }...
{ "userId": 1, "id": 3, "title": ... }...
EOT,
                'category' => 'guzzle'
            ],

            // 13
            [
                'title' => 'Consume GitHub API (Public)',
                'description' => 'Fetch a public GitHub profile (no auth) and parse.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.github.com/',
    'headers' => ['User-Agent' => 'Laravel-Guzzle-Exercises']
]);

$response = $client->get('users/octocat');
$data = json_decode($response->getBody(), true);

echo $data['login'] . ' — ' . $data['public_repos'] . ' repos';
EOT,
                'output' => <<<'EOT'
octocat — 8 repos
EOT,
                'category' => 'guzzle'
            ],

            // 14
            [
                'title' => 'OAuth2 Bearer Token Request (Example)',
                'description' => 'Attach Bearer token to requests and demonstrate Authorization header usage.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$token = 'YOUR_ACCESS_TOKEN';

$client = new Client(['headers' => [
    'Authorization' => 'Bearer ' . $token,
    'Accept' => 'application/json'
]]);

$response = $client->get('https://httpbin.org/bearer');
echo $response->getBody();
EOT,
                'output' => <<<'EOT'
{
  "authenticated": true,
  "token": "YOUR_ACCESS_TOKEN"
}
EOT,
                'category' => 'guzzle'
            ],

            // 15
            [
                'title' => 'Paginate Through API Results',
                'description' => 'Handle paginated API responses (loop until no next page).',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$page = 1;

do {
    $response = $client->get('https://jsonplaceholder.typicode.com/posts', [
        'query' => ['_page' => $page, '_limit' => 10]
    ]);
    $data = json_decode($response->getBody(), true);
    foreach ($data as $item) {
        echo $item['id'] . PHP_EOL;
    }
    $page++;
} while (count($data) > 0);
EOT,
                'output' => <<<'EOT'
1
2
3
...
100
EOT,
                'category' => 'guzzle'
            ],

            // 16
            [
                'title' => 'Rate Limiting (Backoff)',
                'description' => 'Detect 429 and implement exponential backoff before retrying.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client();
$attempts = 0;
$max = 5;

while ($attempts < $max) {
    $attempts++;
    try {
        $response = $client->get('https://httpbin.org/status/429');
        echo $response->getStatusCode();
        break;
    } catch (RequestException $e) {
        $status = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;
        if ($status == 429) {
            $wait = pow(2, $attempts);
            sleep($wait);
            continue;
        }
        echo 'Error: ' . $e->getMessage();
        break;
    }
}
EOT,
                'output' => <<<'EOT'
Attempt 1 -> 429 -> wait 2 seconds
Attempt 2 -> 429 -> wait 4 seconds
...
EOT,
                'category' => 'guzzle'
            ],

            // 17
            [
                'title' => 'Log Requests and Responses to DB',
                'description' => 'Save request/response summary into database for audit.',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/posts/1');

DB::table('api_logs')->insert([
    'endpoint' => '/posts/1',
    'status' => $response->getStatusCode(),
    'response' => substr($response->getBody()->getContents(), 0, 200),
    'created_at' => now(),
    'updated_at' => now()
]);

echo 'Logged';
EOT,
                'output' => <<<'EOT'
Logged
EOT,
                'category' => 'guzzle'
            ],

            // 18
            [
                'title' => 'Wrap Guzzle in a Service Class',
                'description' => 'Create a reusable ApiService class that uses Guzzle and call it from controller.',
                'solution' => <<<'EOT'
namespace App\Services;

use GuzzleHttp\Client;

class ApiService {
    protected $client;
    public function __construct() {
        $this->client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
    }
    public function getPost($id) {
        return $this->client->get('posts/' . $id)->getBody()->getContents();
    }
}

// Usage in controller
$service = new \App\Services\ApiService();
echo $service->getPost(1);
EOT,
                'output' => <<<'EOT'
{ "userId":1, "id":1, "title":"...", "body":"..." }
EOT,
                'category' => 'guzzle'
            ],

            // 19
            [
                'title' => 'Create Reusable API Wrapper with Error Handling',
                'description' => 'Design a wrapper that centralizes retries, headers and error handling.',
                'solution' => <<<'EOT'
class ApiClient {
    protected $client;
    public function __construct($base) {
        $this->client = new \GuzzleHttp\Client(['base_uri' => $base]);
    }
    public function request($method, $uri, $options = []) {
        try {
            return $this->client->request($method, $uri, $options)->getBody()->getContents();
        } catch (\Exception $e) {
            // central logging
            return null;
        }
    }
}

// usage
$api = new ApiClient('https://jsonplaceholder.typicode.com/');
echo $api->request('GET', 'posts/1');
EOT,
                'output' => <<<'EOT'
{ "userId":1, "id":1, "title":"...", "body":"..." }
EOT,
                'category' => 'guzzle'
            ],

            // 20
            [
                'title' => 'Advanced: Stream Response Processing',
                'description' => 'Process large response body as a stream (memory efficient).',
                'solution' => <<<'EOT'
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://httpbin.org/stream/20', ['stream' => true]);

$body = $response->getBody();
while (!$body->eof()) {
    $line = $body->read(1024);
    echo $line;
}
EOT,
                'output' => <<<'EOT'
{ "id": 1, "data": ... }
{ "id": 2, "data": ... }
...
EOT,
                'category' => 'guzzle'
            ],

        ];

        foreach ($exercises as $ex) {
            Exercise::create($ex);
        }
    }
}
