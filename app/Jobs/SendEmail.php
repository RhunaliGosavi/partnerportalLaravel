<?php

namespace App\Jobs;

use App\Mail\ReferCustomerMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $view;
    protected $sub;
    protected $to_mail;
    public function __construct($view,$sub,$to_mail)
    {

        $this->sub=$sub;
        $this->view=$view;
        $this->to_mail=$to_mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new ReferCustomerMail($this->sub,$this->view);
        Mail::to($this->to_mail)->send($email);
    }
}
