<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show()
    {
        $students = Student::all();
        return view("dashboard", compact("students"));
    }



    public function assignStudents()
    {

        $students = Student::all();

        foreach ($students as $std) {

            $std_score = $std->last_year_score;
            $std_location = $std->location;

            $school_id = null;

            $matching_school = School::where("min_score", "<=", $std_score)->where("location", $std_location)->first();
            $school_id = $matching_school->id;

            if (!$school_id) {
                $nearest_location = Location::where("location_from", $std_location)->orderBy("distance")->first("location_to");

                if($nearest_location){
                    $nearest_school = School::where("min_score","<=",$std_score)->where("location",$nearest_location->location_to)->get();
                
                $school_id = $nearest_school->id;
                    }
            }

            $std->school_id = $school_id; $std->save();
        }


    }
}
