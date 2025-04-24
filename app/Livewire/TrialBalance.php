<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Account;

class TrialBalance extends Component
{
    public function render()
    {
        // Group accounts by type
        $groupedAccounts = Account::all()->groupBy('type');

        return view('livewire.trial-balance', [
            'groupedAccounts' => $groupedAccounts,
        ])->layout('components.layouts.app');
    }
}

