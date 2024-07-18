<?php

namespace App\Jobs;

use App\Models\Exercise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Trans implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(Exercise $exercise)
    {
        $this->exercise=$exercise;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $exe=Exercise::query()->take(100)->get();
        $tra=new GoogleTranslate();
        if ($exe)
        {
           dispatch($tra->setSource('en')->setTarget('ar')->translate($exe));
        }
    }
}
