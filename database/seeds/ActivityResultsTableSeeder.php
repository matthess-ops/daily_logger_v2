<?php

use App\ActivityResult;
use App\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ActivityResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients =  client::all();
        foreach ($clients as $client) {
            $activities = $client->activities;
            $mainActivities = [];
            $scaledActivities=[];
            $scoreArray = [];
            foreach ($activities as $activity) {
                if($activity->type == "scaled"){
                    array_push($scaledActivities,$activity->value);
                    array_push($scoreArray,0);
                }elseif($activity->type == "main"){
                    array_push($mainActivities,$activity->value);

                }
            }
            $startDateTime = Carbon::now()->subDays(7);
            for ($i=0; $i < 2; $i++) {
                $startDateTime->addDay();
                $newTimeSlots = [];
                $newMainActivities =[];
                $newScaledActivities=[];
                $newScaledActivitiesScores =[];

                for ($i=0; $i <= 95; $i++) {
                    array_push($newTimeSlots,$i);
                    $randMainActivity = $mainActivities[rand(0,count($mainActivities)-1)];
                    array_push($newMainActivities,$randMainActivity);
                    array_push($newScaledActivities,$scaledActivities);
                    array_push($newScaledActivitiesScores,$scoreArray);
                }

                ActivityResult::create([

                    'user_id'=>'1',
                    // 'time_slots'=>["a","b"],
                    //     'main_activities'=>["a","b"],
                    // 'scaled_activities'=>["a","b"],
                    // 'scaled_activities_scores'=>["a","b"],
                      'time_slots'=>$newTimeSlots,
                        'main_activities'=>$newMainActivities,
                    'scaled_activities'=>$newScaledActivities,
                    'scaled_activities_scores'=>$newScaledActivitiesScores,

                    'date_today'=>$startDateTime->format('Y-m-d'),

                ]);



            }
        }

        // $table->id();
        // $table->timestamps();
        // $table->string('user_id');
        // $table->json('time_slots');
        // $table->json('main_activities');
        // $table->json('scaled_activies');
        // $table->json('scaled_activies_scores');

        // $table->string('date_today');
    }
}
