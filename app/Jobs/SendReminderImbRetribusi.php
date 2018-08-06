<?php

namespace sigimbbkt\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use sigimbbkt\ImbRetribusi;

class SendReminderImbRetribusi implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @param ImbRetribusi $imbRetribusi
   */
    public function __construct(ImbRetribusi $imbRetribusi)
    {
      $this->$imbRetribusi = $imbRetribusi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
