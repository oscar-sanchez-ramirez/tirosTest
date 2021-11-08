<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function email(Request $request)
    {
        $emails = [
            'vreyes@gruponach.com',
            'aflores@gruponach.com',
            'vmelchor@gruponach.com',
            'osanchez@gruponach.com',
            'rdiaz@gruponach.com',
            'ffonseca@gruponach.com',
            'mgonzalez@gruponach.com',
            'zgarcia@gruponach.com',
            'sgarcia@gruponach.com',
        ];

        $job = (new SendEmails($emails, 'Email enviado por Queues y Jobs'))->delay(8);
        $this->dispatch($job);

        return back();
    }
}
