<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteOldPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete posts that are older than 24 hours.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Log::info('Posts werden gelöscht...');
        Post::where('created_at', '<', now()->subDay())->delete();
        $this->info('Posts erfolgreich gelöscht!');

        Log::info('Posts wurden gelöscht.');
        return Command::SUCCESS;
    }
}
