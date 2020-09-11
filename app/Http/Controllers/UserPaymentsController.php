<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function __construct() {
        $this->data['tab_manu'] = 'payments';
    }

    public function index($id) {
        $this->data['user'] = User::FindOrFail($id);
        return view('users.payments.payments', $this->data);
    }

    public function store(PaymentRequest $request, $user_id) {
        $formData               = $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        Payment::create($formData);

        return redirect()->route('users.payments', ['id' => $user_id])->with(['message' => 'Payment Added Successfully']);
    }

    public function destroy($user_id, $payment_id) {
        Payment::destroy($payment_id);
        return redirect()->route('users.payments', ['id'=>$user_id])->with(['message'=>'Payment Deleted Successfully']);
    }
}