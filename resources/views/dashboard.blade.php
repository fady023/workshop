<x-app-layout>
    <x-slot name="header">
        <div class="page-heading-copy">
            <p class="eyebrow">OVERVIEW</p>
            <h1>{{ __('Student dashboard') }}</h1>
            <p>A clear view of your student community, all in one place.</p>
        </div>
        <span class="date-chip">{{ now()->format('l, F j') }}</span>
    </x-slot>

    @php
        $studentCount = $students->count();
        $assignedCount = $students->whereNotNull('school_id')->count();
        $unassignedCount = $studentCount - $assignedCount;
        $averageScore = $students->avg('last_year_score');
    @endphp

    <div class="dashboard-content">
        <section class="welcome-banner">
            <div class="welcome-banner-copy">
                <span class="banner-kicker">YOUR STUDENT COMMUNITY</span>
                <h2>Small steps make<br> <span>big futures.</span></h2>
                <p>Keep track of student progress and placements from a single, simple workspace.</p>
            </div>
            <div class="banner-art" aria-hidden="true">
                <span class="art-orbit orbit-one"></span>
                <span class="art-orbit orbit-two"></span>
                <span class="art-sparkle sparkle-one">✦</span>
                <span class="art-sparkle sparkle-two">✧</span>
                <div class="art-card">
                    <span class="art-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19.5V6.8c0-.7.6-1.3 1.3-1.3H20v14H5.3c-.7 0-1.3.6-1.3 1.3Zm0 0c0-.7.6-1.3 1.3-1.3H20M8 9h8M8 12h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="art-card-lines"><i></i><i></i><i></i></span>
                    <span class="art-card-check">✓</span>
                </div>
            </div>
            <span class="banner-decoration decoration-one"></span>
            <span class="banner-decoration decoration-two"></span>
        </section>

        <section class="stats-grid" aria-label="Student statistics">
            <article class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-icon stat-icon-teal">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M16 20v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 4 18.5V20m11-15.7a3.5 3.5 0 0 1 0 6.8M20 20v-1.5a3.5 3.5 0 0 0-2.5-3.35M10 12a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="stat-label">Total students</span>
                </div>
                <strong class="stat-value">{{ number_format($studentCount) }}</strong>
                <span class="stat-footnote">In your student community</span>
            </article>

            <article class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-icon stat-icon-lilac">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Zm-8 9 8 4.5 8-4.5M4 16.5l8 4.5 8-4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="stat-label">School placements</span>
                </div>
                <strong class="stat-value">{{ number_format($assignedCount) }}</strong>
                <span class="stat-footnote">{{ number_format($unassignedCount) }} students awaiting placement</span>
            </article>

            <article class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-icon stat-icon-peach">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.5 14.6 9l6 .9-4.3 4.2 1 5.9-5.3-2.8-5.3 2.8 1-5.9-4.3-4.2 6-.9L12 3.5Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="stat-label">Average score</span>
                </div>
                <strong class="stat-value">{{ $averageScore === null ? '—' : number_format((float) $averageScore, 1) }}</strong>
                <span class="stat-footnote">Across all recorded results</span>
            </article>
        </section>

        <section class="student-panel">
            <div class="panel-heading">
                <div>
                    <p class="eyebrow">YOUR RECORDS</p>
                    <h2>Students <span class="record-count">{{ number_format($studentCount) }}</span></h2>
                    <p class="panel-description">A quick look at every student in your community.</p>
                </div>
                <span class="panel-status"><i></i> Up to date</span>
            </div>

            @if ($students->isNotEmpty())
                <div class="table-scroll">
                    <table class="student-table">
                        <thead>
                            <tr>
                                <th scope="col">Student</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Last score</th>
                                <th scope="col">Location</th>
                                <th scope="col">School</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <div class="student-identity">
                                            <span class="student-avatar">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($student->name ?? '?', 0, 1)) }}</span>
                                            <span class="student-name">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="muted-cell">{{ $student->birth_date ?: '—' }}</td>
                                    <td><span class="gender-pill">{{ $student->gender ?: 'Not set' }}</span></td>
                                    <td><span class="score-value">{{ $student->last_year_score === null ? '—' : number_format((float) $student->last_year_score, 1) }}</span></td>
                                    <td class="muted-cell">{{ $student->location ?: '—' }}</td>
                                    <td>
                                        @if ($student->school_id)
                                            <span class="school-badge">School {{ $student->school_id }}</span>
                                        @else
                                            <span class="placement-pending">Not assigned</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <span class="empty-state-icon">✦</span>
                    <h3>No students yet</h3>
                    <p>When student records are added, they’ll appear here.</p>
                </div>
            @endif
        </section>

        <footer class="dashboard-footer">
            <span>Made for brighter possibilities.</span>
            <span>Campus <i>·</i> {{ now()->year }}</span>
        </footer>
    </div>
</x-app-layout>
