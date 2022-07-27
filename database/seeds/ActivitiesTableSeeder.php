<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Activities;
use Illuminate\Support\Carbon;


class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //pick a random string from an array without duplicates
    //$type = scale or main
    //user_id = is the user id
    //$activities = an arary of activities
    public function pickRandomFromArray(array $activities, string $type, string $user_id)
    {
        $numToPick =  rand(1, count($activities));
        for ($i = 0; $i < $numToPick; $i++) {
            $randActivityIndex = rand(0, count($activities) - 1);
            $randActivity = $activities[$randActivityIndex];
            $newActivities = [];
            foreach ($activities as $activity) {
                if ($activity != $randActivity) {
                    array_push($newActivities, $activity);
                }
            }
            $activities = $newActivities;
            Activities::create([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user_id,
                'value' => $randActivity,
                'type' => $type,
            ]);
        }
    }




    // foreach client generate a random number of activities of type main and scaled
    public function run()
    {

        $clients = Client::all();
        foreach ($clients as $client) {
            $scaledActivities = ["Hoe voel je.", "Humeur", "Gestresst", "Gespannen", "Drukte", "Verdrietig"];
            $mainActivities = ["Werken", "Pauze", "Eten", "Afwassen", "Boodschappen doen.", "Strijken", "Programmeren", "Lezen", "Tv kijken", "Douchen", "Overig"];

            $user_id =  $client->user_id;

            $this->pickRandomFromArray($scaledActivities, 'scaled', $user_id);
            $this->pickRandomFromArray($mainActivities, 'main', $user_id);
        }
    }
}
