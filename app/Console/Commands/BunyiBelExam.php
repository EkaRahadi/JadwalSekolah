<?php

namespace App\Console\Commands;

use App\JadwalExam;
use App\Ringtone;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BunyiBelExam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bunyiBelExam:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Penjadwalan Bel Untuk Taman Kanak-Kanak';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jadwal = JadwalExam::all();
        foreach($jadwal as $jdwl){
            $jam = Carbon::parse($jdwl->jam)->format('H:i');
            if(Carbon::now()->format('H:i') == $jam){
                Log::info("Info : Bel Ujian Berbunyi");
                $ringtone = Ringtone::where('id_ringtone', $jdwl->id_ringtone)->value('ringtone');
                $url_ringtone = "https://res.cloudinary.com/harsoft-development/video/upload/".$ringtone.".mp3";
                event(new \App\Events\BunyikanBel($url_ringtone));
            }else{
                continue;
            }
        }
    }
}
