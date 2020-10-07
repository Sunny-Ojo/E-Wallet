<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function transfer()
    {
        return view('users.transfer');
    }
    public function makeTransfer(Request $request)
    {

        $data =  $request->validate([
            'amount' => 'required|integer|min:100',
            'wallet_id' => 'required',
            'remarks' => 'required'
        ]);

        if ($request->amount > Auth::user()->amount) {
            return redirect()->back()->with('error', 'Your wallet Balance is too low for the transaction you want to make. Wallet Balance is ' . number_format(Auth::user()->amount));
        }
        if ($request->wallet_id == Auth::user()->wallet_id) {
            return redirect()->back()->with('error', 'Sorry, you can not transfer to the same wallet');
        }
        $findRecipient = User::where('wallet_id', $request->wallet_id)->first();
        if ($findRecipient) {
            //adding the amount he wants to transfer to the users wallet balance
            $findRecipient->amount += $request->amount;
            $findRecipient->save();
            //subtracting the amount he transferred from his account
            $findSender =  User::findOrFail(Auth::id());
            $findSender->amount -= $request->amount;
            $findSender->save();
            Transaction::create([
                'user_id' => Auth::id(),
                'amount' => $request->amount,
                'description' => $request->remarks
            ]);
            return redirect(route('home'))->with('success', 'You have transferred ' . number_format($request->amount) . ' to ' . $findRecipient->name . '. Available Balance is ' .  number_format(Auth::user()->amount));
        } else {

            return redirect()->back()->with('error', 'No User was found with this wallet id ' . $request->wallet_id . ' you entered.');
        }
    }
}
