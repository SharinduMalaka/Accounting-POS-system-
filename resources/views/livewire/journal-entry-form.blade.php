<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6"> Journal Entry</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded mb-5 text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6 bg-white p-6 rounded shadow-md">

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Date</label>
                <input type="date" wire:model="entryDate" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <input type="text" wire:model="description" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="e.g. Office Supplies Purchase">
            </div>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Entry Lines</h2>

            @foreach ($lines as $index => $line)
                <div class="grid md:grid-cols-4 gap-3 mb-2 items-center">
                    <select wire:model="lines.{{ $index }}.account_id" class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Select Account --</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>

                    <select wire:model="lines.{{ $index }}.type" class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="debit">Debit</option>
                        <option value="credit">Credit</option>
                    </select>

                    <input type="number" step="0.01" wire:model="lines.{{ $index }}.amount" class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Amount">

                    <button type="button" wire:click="removeLine({{ $index }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                        ❌ Remove
                    </button>
                </div>
            @endforeach

            <button type="button" wire:click="addLine" class="mt-3 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                ➕ Add Line
            </button>
        </div>

        @error('balance')
            <div class="text-red-600 font-medium">{{ $message }}</div>
        @enderror

        <div class="text-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded shadow">
                ✅ Submit Entry
            </button>
        </div>
    </form>
</div>
