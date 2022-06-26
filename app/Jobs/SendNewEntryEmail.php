<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SurveyNewEntry;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\User;
class SendNewEntryEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $survey;
    public function __construct($survey)
    {
        $this->survey = $survey;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $recepients = User::permission('entries_view')->get()->pluck('email');
        return Mail::to($recepients)->send(new SurveyNewEntry($this->survey));

    }
}
