<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Account;
use App\Models\JournalEntry;
use App\Models\JournalEntryLine;
use Illuminate\Support\Facades\DB;

class JournalEntryForm extends Component
{
    public $entryDate, $description;
    public $lines = [];

    public function mount()
    {
        $this->addLine();
    }

    public function addLine()
    {
        $this->lines[] = ['account_id' => '', 'type' => 'debit', 'amount' => ''];
    }

    public function removeLine($index)
    {
        unset($this->lines[$index]);
        $this->lines = array_values($this->lines); // reset array keys
    }

    public function submit()
    {
        $debits = collect($this->lines)->where('type', 'debit')->sum('amount');
        $credits = collect($this->lines)->where('type', 'credit')->sum('amount');

        if ($debits != $credits) {
            $this->addError('balance', 'Total debit and credit must be equal.');
            return;
        }

        DB::transaction(function () {
            $entry = JournalEntry::create([
                'entry_date' => $this->entryDate,
                'description' => $this->description,
            ]);

            foreach ($this->lines as $line) {
                $entry->lines()->create([
                    'account_id' => $line['account_id'],
                    'type' => $line['type'],
                    'amount' => $line['amount'],
                ]);
            }
        });

        session()->flash('success', 'Journal entry recorded successfully!');
        $this->reset(['entryDate', 'description', 'lines']);
        $this->addLine();
    }

    public function render()
    {
    $accounts = Account::all(); // fetch all accounts

    return view('livewire.journal-entry-form', [
        'accounts' => $accounts
    ]);
    }
}


