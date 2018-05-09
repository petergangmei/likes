<?php

namespace App\Http\Controllers;
namespace App\User;

use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;
use User;

class nofifycontroller extends Controller
{

	public function index(){
		auth()->user->notify(new InvoicePaid());

    return view('notify');

	}

}
