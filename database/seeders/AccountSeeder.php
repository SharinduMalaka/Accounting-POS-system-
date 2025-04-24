<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data if needed
        Account::truncate();

        // Seed accounts (example)
        Account::create([
            'name' => 'Cash',
            'code' => '1000',
            'type' => 'asset',
            'is_group' => false,
            'parent_id' => null
        ]);

        Account::create([
            'name' => 'Accounts Receivable',
            'code' => '1100',
            'type' => 'asset',
            'is_group' => false,
            'parent_id' => null
        ]);

        // Add more accounts as needed...
    }
}
