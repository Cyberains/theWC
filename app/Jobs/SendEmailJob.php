<?php

namespace App\Jobs;

use App\Mail\NotifyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        try {
            if (!blank($this->details)) {
                Mail::to($this->details['details']['email'])->send(new NotifyMail($this->details['details']));
            }
        } catch (\Throwable $th) {
            \Log::error('Error while sending email to admin');
            \Log::error($th);
        } finally {
            return true;
        }
    }
}
