<x-app-layout>
    <div class="w-full flex justify-center">
        <div class="flex flex-col justify-center items-center py-16 px-2 lg:px-10 w-full lg:w-1/2">
            @if (session('success'))
                <div class="mt-6 mb-6 w-full p-4 bg-green-500 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex flex-col items-center border-2 border-app_primary rounded-lg w-full p-6">
                <h2 class="font-medium text-2xl">Total Balance</h2>
                <p class="font-bold text-xl lg:text-3xl">Rp{{ number_format($user->balance, 2, ',', '.') }}</p>
                <form action="{{ route('balance.topup') }}" method="POST">
                    @csrf

                    <div class="mt-4 relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="amount" id="amount"
                            class="w-full p-2 pl-8 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                            value="" required>
                    </div>
                    <button type="submit" class="mt-4 bg-app_primary text-white w-full rounded-lg p-2">Top-Up</button>
                </form>
            </div>

            <div class="w-full mt-5 border-2 border-app_primary p-6 rounded-lg">
                <h2 class="font-medium text-2xl mb-4">Balance History</h2>
                <table class="w-full">
                    <thead class="bg-app_grey_high text-center border-2 border-app_primary">
                        <tr>
                            <th class="border-2 border-app_primary">Date</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-center border-2 border-app_primary">
                        @foreach ($expenditure as $history)
                            <tr class="border-2 border-app_primary">
                                <td class="border-2 border-app_primary">{{ \Carbon\Carbon::parse($history->created_at)->isoFormat('DD MMMM YYYY, hh:mm A') }}
                                </td>
                                @if ($history->type == 'income')
                                    <td><p class="text-green-500 text-sm lg:text-xl">+ Rp{{ number_format($history->amount, 2, ',', '.') }}</p></td>
                                @else
                                    <td><p class="text-red-500 text-sm lg:text-xl">- Rp{{ number_format($history->amount, 2, ',', '.') }}</p></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
