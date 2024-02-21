<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
class DeleteInactiveUsers extends Command
{

    protected $signature = 'delete:inactive-users';

    protected $description = 'Delete users who haven\'t logged in for more than 5 hours';

    public function handle()
    {
        $threshold = Carbon::now()->subMonth(3);
        User::where('last_login_at', '<=', $threshold)
        ->whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['المدير']);
        })
        ->delete();
        $this->info('Inactive users deleted successfully.');
    }
}
