<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AddQuestion;
use Session;
use DB;
use Auth;
use App\Console\Commands\DailyChallenge;
use Carbon;

class DailyChallenge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:challenge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily question - to boost your points. One question per day';

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

        $questions = AddQuestion::all();
        $rand = rand(0, $questions->count()-1);
        $question = $questions->get($rand);
        $mytime = Carbon::now();
        $currentDate = $mytime->toDateString();

        DB::table('daily_challenge')->insert([
            'questionId' => $question->id,
            'chal_date'=> $currentDate,
        ]);
        $this->info('Daily job was successfully!');

    }
}
