<x-app-layout>

    <div class="dashboard-container">

        <!-- Dashboard Introduction -->
        <div class="dashboard-intro">
            <div>
                <span class="dashboard-label">Dashboard</span>

                <h1>
                    Welcome to Student Management System
                </h1>

                <p>
                    Manage students, courses, and academic records from one place.
                </p>
            </div>
        </div>


        <!-- Statistics Cards -->
        <div class="dashboard-cards">

            <!-- Total Students -->
            <a href="{{ route('students.index') }}"
               class="stat-card total-card">

                <div class="stat-icon">
                    👥
                </div>

                <div class="stat-content">
                    <h3>Total Students</h3>
                    <p>{{ $totalStudents }}</p>
                </div>

                <span class="card-arrow">→</span>

            </a>


            <!-- Male Students -->
            <a href="{{ route('students.index', ['gender' => 'Male']) }}"
               class="stat-card male-card">

                <div class="stat-icon">
                    👨‍🎓
                </div>

                <div class="stat-content">
                    <h3>Male Students</h3>
                    <p>{{ $maleStudents }}</p>
                </div>

                <span class="card-arrow">→</span>

            </a>


            <!-- Female Students -->
            <a href="{{ route('students.index', ['gender' => 'Female']) }}"
               class="stat-card female-card">

                <div class="stat-icon">
                    👩‍🎓
                </div>

                <div class="stat-content">
                    <h3>Female Students</h3>
                    <p>{{ $femaleStudents }}</p>
                </div>

                <span class="card-arrow">→</span>

            </a>


            <!-- Other Students -->
            <a href="{{ route('students.index', ['gender' => 'Other']) }}"
               class="stat-card other-card">

                <div class="stat-icon">
                    👤
                </div>

                <div class="stat-content">
                    <h3>Other Students</h3>
                    <p>{{ $otherStudents }}</p>
                </div>

                <span class="card-arrow">→</span>

            </a>


            <!-- Total Courses -->
            <a href="{{ route('courses.index') }}"
               class="stat-card course-card">

                <div class="stat-icon">
                    📚
                </div>

                <div class="stat-content">
                    <h3>Total Courses</h3>
                    <p>{{ $totalCourses }}</p>
                </div>

                <span class="card-arrow">→</span>

            </a>

        </div>


        <!-- Quick Actions -->
        <div class="quick-actions">

            <div class="quick-actions-header">
                <div>
                    <span class="section-label">Shortcuts</span>

                    <h2>Quick Actions</h2>

                    <p>
                        Quickly access the most commonly used features.
                    </p>
                </div>
            </div>


            <div class="action-buttons">

                <a href="{{ route('students.create') }}"
                   class="action-button add-button">

                    <span class="action-icon">+</span>

                    <span>
                        Add Student
                    </span>

                </a>


                <a href="{{ route('students.index') }}"
                   class="action-button students-button">

                    <span class="action-icon">👥</span>

                    <span>
                        View Students
                    </span>

                </a>


                <a href="{{ route('courses.index') }}"
                   class="action-button courses-button">

                    <span class="action-icon">📚</span>

                    <span>
                        View Courses
                    </span>

                </a>

            </div>

        </div>


        <!-- Dashboard Footer -->
        <div class="dashboard-footer">
            Student Management System · Dashboard
        </div>

    </div>

</x-app-layout>