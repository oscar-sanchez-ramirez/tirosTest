<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function emails(){
        SendEmails::dispatch('osanchez@gruponach.com', 'Email enviado por Queues y Jobs');
        return back();
    }
}
