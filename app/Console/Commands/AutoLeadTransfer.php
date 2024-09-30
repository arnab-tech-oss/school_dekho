<?php

namespace App\Console\Commands;

use App\Models\AllLead;
use App\Models\Lead;
use App\Models\School;
use App\Models\SchoolLead;
use App\Models\SchoolNewApplication;
use Illuminate\Console\Command;

class AutoLeadTransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:leadtransfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "---------------------------------------------------------------------------------------------------------------------------------------------\n";
        $all_school_application_leads = SchoolNewApplication::where('is_transfered', false)->get();

        foreach ($all_school_application_leads as $school_application_lead) {
            $transferable_schools = $this->findSchool($school_application_lead);
            if (!$school_application_lead->phone) {
                $school_application_lead->is_transfered = 7;
                $school_application_lead->save();
                continue;
            }
            $lead = AllLead::create([
                'name' => $school_application_lead->name,
                'phone' => $school_application_lead->phone,
                'admission_for' => $school_application_lead->seeking_class,
                'lead_source' => 'school_application_new',
                'status' => '9',
                'transfer_status' => 1,
            ]);
            $already_transfered_school_ids = Lead::where('student_contact1', $lead->phone)->pluck('school_id')->toArray();
            //Transfer to school
            foreach ($transferable_schools as $school) {
                if (in_array($school->id, $already_transfered_school_ids)) {
                    continue;
                } else {
                $school_lead = new SchoolLead();
                $school_lead->all_lead_id = $lead->id;
                $school_lead->lead_id = $lead->id;
                $school_lead->school_id = $school->id;
                $school_lead->is_open = '1';
                $school_lead->counselor_id = 23;

                $school_lead->save();
                //Transfer to student

                $student_lead = new Lead();
                    $student_lead->school_id = $school->id;
                $student_lead->student_name = $lead->name;
                $student_lead->student_contact1 = $lead->phone;
                $student_lead->admission_for = $lead->admission_for;
                $student_lead->location = $lead->location;
                $student_lead->lead_mode = "manual";
                $student_lead->remarks = $lead->remarks_school;
                $student_lead->academic_year = $lead->academic_year;
                $student_lead->auto_transfer = 1;
                $student_lead->save();
                $school_lead_details = SchoolLead::where('lead_id', $lead->id)->where('school_id', $school->id)->first();
                $school_lead_details->lead_id = $student_lead->id;
                $school_lead_details->update($school_lead_details->toArray());
                echo Date('Y-m-d') . " | Lead " . $lead->id . "-" . $lead->name . " | Transferred To " . $school->name . " - " . $school->id .  "-" . "$school->distance" . "\n";
                }
               
            }
            $school_application_lead->is_transfered = true;
            $school_application_lead->save();
        }
        echo "---------------------------------------------------------------------------------------------------------------------------------------------\n";
        echo "Lead Transfer Successfully\n";
    }

    public function findSchool($school_application_lead)
    {
        $gender = $school_application_lead->gender;
        $school_type = $school_application_lead->school_type;
        $seeking_class = $school_application_lead->seeking_class;
        $school = School::with('school_address')->where('id', $school_application_lead->school_id)->first();

        $latitude = $school->school_address[0]->lattitude;
        $longitude = $school->school_address[0]->longitude;
        // School Search
        $school_board = $school->board;
        $type = [];
        if ($school_type) {

            $type = $school_type == "Co-Ed" ? ['Boys', 'Girls', 'Co-Ed', 'Co-ed'] : [$school_type];
        }
        if ($gender) {

            $type = $gender == 1 ? ['Boys', 'Co-Ed', 'Co-ed'] : ['Girls', 'Co-Ed', 'Co-ed'];
        }
           
        $schools = School::with('school_address')
            ->where('status', '1')
            ->where('is_verify', '1')
            ->where('affiliated', '1')
            ->whereIn('school_type', $type)
            ->where('board', $school_board)
            ->whereHas('school_address', function ($query) use ($latitude, $longitude) {
                $query->whereBetween('lattitude', [$latitude - 0.07, $latitude + 0.07]);
                $query->whereBetween('longitude', [$longitude - 0.07, $longitude + 0.07]);
            })
            ->whereHas('school_elligibilities', function ($query) use ($seeking_class) {
                $query
            ->where([['min_qualification', '<=', $seeking_class],
                ['max_qualification', '>=', $seeking_class],
            ]);
            })->get();

        foreach ($schools as  $school) {
            $dist = $this->getDistance($latitude, $longitude, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
            $school->distance = number_format($dist, 3);
        }

        $collect = collect($schools)->sortBy('distance');
        return $collect;
    }

    function getDistance(
        $latitudeitudeFrom,
        $longitudeitudeFrom,
        $latitudeitudeTo,
        $longitudeitudeTo,
        $earthRadius = 6371000
    ) {
        $latitudeFrom = deg2rad($latitudeitudeFrom);
        $lonFrom = deg2rad($longitudeitudeFrom);
        $latitudeTo = deg2rad($latitudeitudeTo);
        $lonTo = deg2rad($longitudeitudeTo);
        $latitudeDelta = $latitudeTo - $latitudeFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) +
            cos($latitudeFrom) * cos($latitudeTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
}
