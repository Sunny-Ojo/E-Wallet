<?php

namespace App\Http\Controllers;

use App\Mail\YourFundingWasSuccessful;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function showFundView()
    {
        return view('users.fund-account');
    }
    public function initializeFunding(Request $request)
    {
        $data =  $request->validate([
            'amount' => 'required|integer|min:100',
            'remarks' => 'required'
        ]);
        $curl = curl_init();

        $email = Auth::user()->email;
        $amount = $request->amount . '00';  //the amount in kobo. This value is actually NGN 300

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount' => $amount,
                'email' => $email,
                'callback_url' => route('verifyFunding'),
                'metadata' => $data
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: " . env('PAYSTACK_PUBLIC_TEST_KEY'), //replace this with your own test key
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response, true);
        // dd($tranx);

        if (!$tranx['status']) {
            // there was an error from the API
            print_r('API returned error: ' . $tranx['message']);
        }

        // comment out this line if you want to redirect the user to the payment page
        print_r($tranx);


        // redirect to page so User can pay
        // uncomment this line to allow the user redirect to the payment page
        return redirect($tranx['data']['authorization_url']);
    }
    public function verifyFunding(Request $request)
    {


        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if (!$reference) {
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: " . env('PAYSTACK_PUBLIC_TEST_KEY'),
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response, true);
        if (!$tranx['status']) {
            // there was an error from the API
            die('API returned error: ' . $tranx['message']);
        }

        if ('success' == $tranx['data']['status']) {
            // dd($tranx);
            Transaction::create([
                'amount' => $tranx['data']['metadata']['amount'],
                'user_id' => Auth::id(),
                'description' => $tranx['data']['metadata']['remarks']
            ]);

            $user = User::findOrFail(Auth::id());
            $user->amount += $tranx['data']['metadata']['amount'];
            $user->save();
            $data  = [
                'amount' => $tranx['data']['metadata']['amount'],
                'description' => $tranx['data']['metadata']['remarks'],
                'balance' => $user->amount
            ];

            Mail::to(Auth::user()->email)->send(new YourFundingWasSuccessful($data));
            return redirect(route('home'))->with('success', 'Your Wallet funding was successful');
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
        }
    }
    public function makeTransfer(Request $request)
    {
        $data =  $request->validate([
            'amount' => 'required|integer|min:100',
            'wallet_id' => 'required',
            'remarks' => 'required'
        ]);
        dd($data);
    }
}
