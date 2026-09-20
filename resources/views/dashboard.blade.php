<x-app-layout>

```
<div class="dashboard-container">

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="dashboard-heading">
            <span class="dashboard-label">OVERVIEW</span>
            <h1>Student Management Dashboard</h1>
            <p>
                Manage students, courses, and academic records from one place.
            </p>
        </div>

        <a href="{{ route('students.create') }}" class="primary-action">
            <span>+</span>
            Add Student
        </a>
    </div>

    <!-- Statistics -->
    <div class="dashboard-cards">

        <!-- Total Students -->
        <a href="{{ route('students.index') }}" class="stat-card total-card">
            <div class="stat-top">
                <div class="stat-icon">👥</div>
                <span class="stat-arrow">→</span>
            </div>

            <div class="stat-content">
                <span>Total Students</span>
                <strong>{{ $totalStudents }}</strong>
            </div>

            <div class="stat-link">
                View all students
            </div>
        </a>

        <!-- Male Students -->
        <a href="{{ route('students.index', ['gender' => 'Male']) }}" class="stat-card male-card">
            <div class="stat-top">
                <div class="stat-icon">👨‍🎓</div>
                <span class="stat-arrow">→</span>
            </div>

            <div class="stat-content">
                <span>Male Students</span>
                <strong>{{ $maleStudents }}</strong>
            </div>

            <div class="stat-link">
                View male students
            </div>
        </a>

        <!-- Female Students -->
        <a href="{{ route('students.index', ['gender' => 'Female']) }}" class="stat-card female-card">
            <div class="stat-top">
                <div class="stat-icon">👩‍🎓</div>
                <span class="stat-arrow">→</span>
            </div>

            <div class="stat-content">
                <span>Female Students</span>
                <strong>{{ $femaleStudents }}</strong>
            </div>

            <div class="stat-link">
                View female students
            </div>
        </a>

        <!-- Other Students -->
        <a href="{{ route('students.index', ['gender' => 'Other']) }}" class="stat-card other-card">
            <div class="stat-top">
                <div class="stat-icon">👤</div>
                <span class="stat-arrow">→</span>
            </div>

            <div class="stat-content">
                <span>Other Students</span>
                <strong>{{ $otherStudents }}</strong>
            </div>

            <div class="stat-link">
                View other students
            </div>
        </a>

        <!-- Total Courses -->
        <a href="{{ route('courses.index') }}" class="stat-card course-card">
            <div class="stat-top">
                <div class="stat-icon">📚</div>
                <span class="stat-arrow">→</span>
            </div>

            <div class="stat-content">
                <span>Total Courses</span>
                <strong>{{ $totalCourses }}</strong>
            </div>

            <div class="stat-link">
                View all courses
            </div>
        </a>

    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">

        <div class="section-heading">
            <div>
                <span class="section-label">SHORTCUTS</span>
                <h2>Quick Actions</h2>
                <p>
                    Quickly access the most commonly used features.
                </p>
            </div>
        </div>

        <div class="action-buttons">

            <a href="{{ route('students.create') }}" class="action-button add-button">
                <div class="action-icon">+</div>
                <div class="action-text">
                    <strong>Add Student</strong>
                    <span>Create a new student record</span>
                </div>
                <span class="action-arrow">→</span>
            </a>

            <a href="{{ route('students.index') }}" class="action-button students-button">
                <div class="action-icon">👥</div>
                <div class="action-text">
                    <strong>View Students</strong>
                    <span>Manage student records</span>
                </div>
                <span class="action-arrow">→</span>
            </a>

            <a href="{{ route('courses.index') }}" class="action-button courses-button">
                <div class="action-icon">📚</div>
                <div class="action-text">
                    <strong>View Courses</strong>
                    <span>Manage available courses</span>
                </div>
                <span class="action-arrow">→</span>
            </a>

        </div>
    </div>

    <!-- Footer -->
    <div class="dashboard-footer">
        <span>Student Management System</span>
        <span>Dashboard</span>
    </div>

</div>

<style>

    /* ================================
       DASHBOARD
    ================================= */

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px;
        color: #111827;
    }

    /* ================================
       HEADER
    ================================= */

    .dashboard-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 30px;
        margin-bottom: 35px;
    }

    .dashboard-label,
    .section-label {
        display: block;
        margin-bottom: 8px;
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .dashboard-heading h1 {
        margin: 0;
        color: #111827;
        font-size: 32px;
        line-height: 1.2;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .dashboard-heading p {
        margin: 10px 0 0;
        color: #6b7280;
        font-size: 15px;
    }

    .primary-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 9px;
        background: #2563eb;
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.18);
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .primary-action span {
        font-size: 20px;
        line-height: 1;
    }

    .primary-action:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(37, 99, 235, 0.22);
    }

    /* ================================
       STATISTICS
    ================================= */

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 18px;
        margin-bottom: 40px;
    }

    .stat-card {
        position: relative;
        min-height: 185px;
        padding: 20px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: #ffffff;
        color: inherit;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        transition: all 0.25s ease;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: #2563eb;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        border-color: #dbeafe;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .male-card::before {
        background: #3b82f6;
    }

    .female-card::before {
        background: #8b5cf6;
    }

    .other-card::before {
        background: #64748b;
    }

    .course-card::before {
        background: #0ea5e9;
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border-radius: 11px;
        background: #eff6ff;
        font-size: 22px;
    }

    .male-card .stat-icon {
        background: #eff6ff;
    }

    .female-card .stat-icon {
        background: #f5f3ff;
    }

    .other-card .stat-icon {
        background: #f1f5f9;
    }

    .course-card .stat-icon {
        background: #f0f9ff;
    }

    .stat-arrow {
        color: #9ca3af;
        font-size: 20px;
        transition: transform 0.2s ease;
    }

    .stat-card:hover .stat-arrow {
        transform: translateX(4px);
        color: #2563eb;
    }

    .stat-content {
        display: flex;
        flex-direction: column;
        margin-top: 22px;
    }

    .stat-content span {
        color: #6b7280;
        font-size: 13px;
        font-weight: 500;
    }

    .stat-content strong {
        margin-top: 5px;
        color: #111827;
        font-size: 30px;
        line-height: 1;
        font-weight: 700;
    }

    .stat-link {
        position: absolute;
        bottom: 18px;
        left: 20px;
        color: #6b7280;
        font-size: 12px;
    }

    /* ================================
       QUICK ACTIONS
    ================================= */

    .quick-actions {
        padding: 28px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    }

    .section-heading {
        margin-bottom: 22px;
    }

    .section-heading h2 {
        margin: 0;
        color: #111827;
        font-size: 21px;
        font-weight: 700;
    }

    .section-heading p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    .action-button {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 16px;
        border: 1px solid #e5e7eb;
        border-radius: 11px;
        background: #ffffff;
        color: inherit;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .action-button:hover {
        transform: translateY(-2px);
        border-color: #bfdbfe;
        background: #f8fbff;
        box-shadow: 0 7px 20px rgba(15, 23, 42, 0.06);
    }

    .action-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 42px;
        height: 42px;
        border-radius: 9px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 22px;
        font-weight: 500;
    }

    .action-text {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .action-text strong {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
    }

    .action-text span {
        margin-top: 3px;
        color: #6b7280;
        font-size: 12px;
    }

    .action-arrow {
        margin-left: auto;
        color: #9ca3af;
        font-size: 18px;
        transition: transform 0.2s ease;
    }

    .action-button:hover .action-arrow {
        transform: translateX(3px);
        color: #2563eb;
    }

    /* ================================
       FOOTER
    ================================= */

    .dashboard-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 28px;
        padding: 0 3px;
        color: #9ca3af;
        font-size: 12px;
    }

    /* ================================
       TABLET
    ================================= */

    @media (max-width: 1100px) {

        .dashboard-cards {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    /* ================================
       MOBILE
    ================================= */

    @media (max-width: 768px) {

        .dashboard-container {
            padding: 25px 16px;
        }

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
            margin-bottom: 25px;
        }

        .dashboard-heading h1 {
            font-size: 26px;
        }

        .dashboard-heading p {
            font-size: 14px;
            line-height: 1.5;
        }

        .primary-action {
            width: 100%;
            justify-content: center;
        }

        .dashboard-cards {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }

        .stat-card {
            min-height: 165px;
        }

        .quick-actions {
            padding: 20px;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

        .dashboard-footer {
            flex-direction: column;
            gap: 5px;
            text-align: center;
        }

    }

    @media (min-width: 769px) and (max-width: 1100px) {

        .dashboard-container {
            padding: 30px;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

    }

</style>
```

</x-app-layout>
