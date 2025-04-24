// App\Http\Controllers\AccountController.php


<?php
namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;

public function chartOfAccounts()
{
    $accounts = Account::orderBy('code')->get();

    return view('accounts.chart', compact('accounts'));
}
