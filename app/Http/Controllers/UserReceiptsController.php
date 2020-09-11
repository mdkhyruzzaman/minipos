<?php

namespace App\Http\Controllers;

use App\User;
use App\Receipt;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptsController extends Controller
{
    public function __construct() {
        $this->data['tab_manu'] = 'receipts' ;
    }

    public function index($id) {
        $this->data['user'] = User::FindOrFail($id);
        return view('users.receipts.receipts', $this->data);
    }

    public function store(ReceiptRequest $request, $user_id) {
        $formData               = $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        Receipt::create($formData);

        return redirect()->route('users.receipts', [ 'id' => $user_id ])->with([ 'message' => 'Receipt Added Successfully' ]);
    }

    public function destroy($user_id, $receipt_id) {
        Receipt::destroy($receipt_id);
        return redirect()->route('users.receipts', [ 'id' => $user_id ])->with([ 'message' => 'Receipt Deleted Successfully' ]);
    }
}
