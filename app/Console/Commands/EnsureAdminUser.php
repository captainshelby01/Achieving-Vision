<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class EnsureAdminUser extends Command
{
    protected $signature = 'app:ensure-admin';
    protected $description = 'Ensure admin users exist with valid credentials';

    public function handle(): int
    {
        $users = [
            [
                'email' => 'oghale@achievewithoghale.com',
                'name' => 'Oghale',
                'password' => 'password123',
            ],
            [
                'email' => 'admin@achievewithoghale.com',
                'name' => 'Admin Oghale',
                'password' => 'password123',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => strtolower(trim($userData['email']))],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );
            $this->info("Admin user ensured: {$user->email} (ID: {$user->id})");
        }

        return self::SUCCESS;
    }
}