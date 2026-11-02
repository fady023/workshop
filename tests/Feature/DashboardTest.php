<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_displays_student_records_and_summary_statistics(): void
    {
        $user = User::factory()->create();
        $school = School::create([
            'name' => 'Northside School',
            'location' => 'Northside',
            'min_score' => 70,
        ]);
        Student::create([
            'name' => 'Taylor Student',
            'birth_date' => '2010-01-02',
            'gender' => 'female',
            'last_year_score' => 95,
            'location' => 'Northside',
            'school_id' => $school->id,
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Student dashboard')
            ->assertSee('Total students')
            ->assertSee('School placements')
            ->assertSee('Average score')
            ->assertSee('Taylor Student')
            ->assertSee('Northside')
            ->assertSee('95.0');
    }
}
