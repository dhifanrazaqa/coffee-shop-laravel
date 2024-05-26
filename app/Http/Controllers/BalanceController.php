<?php

namespace App\Http\Controllers;

use App\Models\BalanceHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $balanceHistory = BalanceHistory::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('balance', ['user' => $user,'expenditure'=> $balanceHistory]);
    }

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $user->balance += $request->amount;
        $user->save();

        $topUpHistory = new BalanceHistory();
        $topUpHistory->user_id = $user->id;
        $topUpHistory->amount = $request->amount;
        $topUpHistory->type = 'income';
        $topUpHistory->save();

        return redirect()->route('balance.show')->with('success', 'Saldo berhasil ditambahkan.');
    }
}
