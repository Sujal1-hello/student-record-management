<x-app-layout>

    <div class="dashboard-container">

        <div class="dashboard-intro">
            <h1>Welcome to Student Management System</h1>
            <p>Manage students and courses from one place.</p>
        </div>

        <div class="dashboard-cards">

            <a href="{{ route('students.index') }}" class="stat-card total-card">
                <h3>Total Students</h3>
                <p>{{ $totalStudents }}</p>
            </a>

            <a href="{{ route('students.index', ['gender' => 'Male']) }}" class="stat-card male-card">
                <h3>Male Students</h3>
                <p>{{ $maleStudents }}</p>
            </a>

            <a href="{{ route('students.index', ['gender' => 'Female']) }}" class="stat-card female-card">
                <h3>Female Students</h3>
                <p>{{ $femaleStudents }}</p>
            </a>

            <a href="{{ route('students.index', ['gender' => 'Other']) }}" class="stat-card other-card">
                <h3>Other Students</h3>
                <p>{{ $otherStudents }}</p>
            </a>

            <a href="{{ route('courses.index') }}" class="stat-card course-card">
                <h3>Total Courses</h3>
                <p>{{ $totalCourses }}</p>
            </a>

        </div>

        <div class="quick-actions">

            <h2>Quick Actions</h2>

            <div class="action-buttons">

                <a href="{{ route('students.create') }}" class="action-button add-button">
                    + Add Student
                </a>

                <a href="{{ route('students.index') }}" class="action-button students-button">
                    View Students
                </a>

                <a href="{{ route('courses.index') }}" class="action-button courses-button">
                    View Courses
                </a>

            </div>

        </div>

    </div>

</x-app-layout>