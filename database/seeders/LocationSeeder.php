<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $json= File::get("database/data/location.json");
        $data= json_decode($json);
        foreach($data as $loc){
            Student::create($loc);
        }
    }
}
