<?php

namespace App\Console;

use App\Jadwal;
use App\JadwalExam;
use App\Jam;
use App\Option;
use App\Ringtone;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\BunyiBel',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $jadwalReguler = Jadwal::get();
        $jadwalExam = JadwalExam::get();
        $opsiReguler = Option::where('nama_option', "Jadwal Reguler");
        $opsiExam = Option::where('nama_option', "Jadwal Ujian");

        if($opsiReguler->value('aktif') == 1){
            foreach($jadwalReguler as $jdwl){
                $jam = Carbon::parse($jdwl->jam)->format('H:i');
                $hari = $jdwl->id_hari;
                $schedule->command('bunyiBel:log')->weeklyOn($hari, $jam);
            }
        }

        if($opsiExam->value('aktif') == 1){
            foreach($jadwalExam as $jdwl){
                $jam = Carbon::parse($jdwl->jam)->format('H:i');
                $hari = $jdwl->id_hari;
                $schedule->command('bunyiBelExam:log')->weeklyOn($hari, $jam);
            }
        }

        // $schedule->command('bunyiBel:log')->everyMinute();
        // $jadwal = Jadwal::all();
        // for ($i=0; $i<$jadwal->count(); $i++) {
        //     $jam = Jam::where('id_jam', $jadwal[$i]->jam)->value('pukul');
        //     $schedule->call(function(){
        //         $ringtone = Ringtone::orderBy('created_at', 'desc')->first()->ringtone;
        //         return view('admin/alarmBel', compact('ringtone'));
        //       })->weeklyOn($jadwal[$i]->hari, $jam);
        // }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
