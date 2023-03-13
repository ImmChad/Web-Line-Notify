<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $request;
    public function __construct($request)
    {
        $this->request =$request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->SMS_sendNotification($this->$request);
    }
    function SMS_sendNotification($request)
    {

        $client = new Client($account_sid, $auth_token);
        // Teacher number
        $client->messages->create("+84 91 664 91 09", ['from' => $twilio_number, 'body' => $request->message]);
        // Dung number
        // $client->messages->create("+84 339 601 517", ['from' => $twilio_number, 'body' => $request->message]);

        // $validation_request = 

        // dump($validation_request);
    }
}
