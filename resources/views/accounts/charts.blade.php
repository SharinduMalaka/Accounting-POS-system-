<div class="p-6 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center text-black-800">Chart of Accounts</h1>

    <table class="w-full border bg-white rounded shadow-sm overflow-hidden">
        <thead class="bg-blue-50 text-blue-700 text-left">
            <tr>
                <th class="p-3">Code</th>
                <th class="p-3">Account Name</th>
                <th class="p-3">Type</th>
                <th class="p-3 text-right">Debit</th>
                <th class="p-3 text-right">Credit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-3 text-gray-600">{{ $account->code }}</td>
                    <td class="p-3 text-gray-800">
                        @if($account->is_group)
                            <strong>{{ $account->name }}</strong>
                        @else
                            {{ $account->name }}
                        @endif
                    </td>
                    <td class="p-3 text-gray-700 capitalize">{{ $account->type }}</td>
                    <td class="p-3 text-right text-green-600">
                        {{ $account->debit > 0 ? number_format($account->debit, 2) : '' }}
                    </td>
                    <td class="p-3 text-right text-red-600">
                        {{ $account->credit > 0 ? number_format($account->credit, 2) : '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
