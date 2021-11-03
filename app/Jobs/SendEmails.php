<?php

namespace App\Jobs;

use App\Mail\ListMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $email;
    protected $title;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $title)
    {
        $this->email = $email;
        $this->title = $title;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new ListMail($this->title);
        Mail::to($this->email)->send($email);
    }
}
