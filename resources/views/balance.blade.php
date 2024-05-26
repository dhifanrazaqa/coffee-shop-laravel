<x-app-layout>
    <div class="container">
        <h1>Saldo Anda</h1>
        <p>Saldo saat ini: Rp {{ number_format($user->balance, 2) }}</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('balance.topup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Jumlah Top-Up</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Top-Up</button>
        </form>
    </div>
    <br>
    <h1>History Keuangan</h1>
    @foreach ($expenditure as $history)
        <div>
            @if ($history->type == 'income')
                <p>{{ $history->created_at }}: Pemasukan Rp {{ $history->amount }}</p>
            @else
                <p>{{ $history->created_at }}: Pengeluaran Rp {{ $history->amount }}</p>
            @endif
        </div>
    @endforeach
</x-app-layout>
