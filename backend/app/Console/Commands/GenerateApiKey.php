<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateApiKey extends Command
{
    protected $signature = 'app:generate-api-key';
    protected $description = 'Generates a new API key and saves it to .env';

    public function handle()
    {
        $key = Str::random(32);
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        if (strpos($envContent, 'API_KEY=') !== false) {
            $envContent = preg_replace('/API_KEY=.*/', 'API_KEY=' . $key, $envContent);
        } else {
            $envContent .= "\nAPI_KEY=" . $key;
        }

        file_put_contents($envPath, $envContent);

        $this->info('API key generated and saved to .env');
        $this->line("🔑 Key: $key");
    }
}
