<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TrialBalance;
use App\Livewire\JournalEntryForm;
use App\Livewire\Dashboard;
use App\Http\Controllers\AccountController;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/trial-balance', TrialBalance::class)->name('trial.balance');
Route::get('/journal-entry', JournalEntryForm::class)->name('journal.entry');
Route::get('/chart-of-accounts', [AccountController::class, 'chartOfAccounts']);


Route::view('/journal-entry', 'journal-entry')->name('journal.entry');

Route::view('/trial-balance', 'trial-balance')->name('trial.balance');
Route::view('/chart-of-accounts', 'chart-of-accounts')->name('chart.of.accounts');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/journal-entry-form', 'journal-entry-form')->name('journal.entry.form');