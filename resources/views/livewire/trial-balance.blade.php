<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center text-black-700"> Trial Balance</h1>

    @foreach ($groupedAccounts as $type => $accounts)
        <div class="mb-10">
            <h2 class="text-xl font-semibold text-gray-800 capitalize border-b pb-1 mb-2">{{ $type }}</h2>
            <table class="w-full border bg-white rounded shadow-sm overflow-hidden">
                <thead class="bg-blue-50 text-blue-700">
                    <tr class="text-left">
                        <th class="p-3">Account Name</th>
                        <th class="p-3 text-right">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="p-3 text-gray-700">{{ $account->name }}</td>
                            <td class="p-3 text-right text-gray-700">
                                {{ number_format($account->balance, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="font-bold border-t bg-gray-100">
                        <td class="p-3">Total {{ ucfirst($type) }}</td>
                        <td class="p-3 text-right">
                            {{ number_format($accounts->sum('balance'), 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</div>
