<x-app-layout>

    <div class="dashboard-container">

        <!-- ================= HEADER ================= -->
        <div class="dashboard-header">

            <div class="dashboard-heading">
                <div class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    ADMINISTRATION
                </div>

                <h1>Student Management Dashboard</h1>

                <p>
                    Monitor students, courses and academic records from one central workspace.
                </p>
            </div>

            <a href="{{ route('students.create') }}" class="primary-action">
                <span class="plus-icon">+</span>
                <span>Add Student</span>
            </a>

        </div>


        <!-- ================= STATISTICS ================= -->
        <div class="dashboard-cards">

            <!-- Total Students -->
            <a href="{{ route('students.index') }}" class="stat-card">

                <div class="stat-card-header">
                    <div class="stat-icon blue">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M16 21V19C16 16.79 14.21 15 12 15H6C3.79 15 2 16.79 2 19V21" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" />
                            <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path d="M22 21V19C21.99 17.13 20.7 15.5 19 15.1" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                            <path d="M16 3.13C17.69 3.56 18.88 5.08 18.88 6.82C18.88 8.56 17.69 10.08 16 10.51"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="card-arrow">↗</span>
                </div>

                <div class="stat-info">
                    <span>Total Students</span>
                    <strong>{{ $totalStudents }}</strong>
                </div>

                <div class="stat-footer">
                    <span>All registered students</span>
                </div>

            </a>


            <!-- Male Students -->
            <a href="{{ route('students.index', ['gender' => 'Male']) }}" class="stat-card">

                <div class="stat-card-header">
                    <div class="stat-icon indigo">
                        <svg viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path d="M5 21C5 17.13 8.13 14 12 14C15.87 14 19 17.13 19 21" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="card-arrow">↗</span>
                </div>

                <div class="stat-info">
                    <span>Male Students</span>
                    <strong>{{ $maleStudents }}</strong>
                </div>

                <div class="stat-footer">
                    <span>View male students</span>
                </div>

            </a>


            <!-- Female Students -->
            <a href="{{ route('students.index', ['gender' => 'Female']) }}" class="stat-card">

                <div class="stat-card-header">
                    <div class="stat-icon purple">
                        <svg viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path d="M12 11V21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M8 17H16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="card-arrow">↗</span>
                </div>

                <div class="stat-info">
                    <span>Female Students</span>
                    <strong>{{ $femaleStudents }}</strong>
                </div>

                <div class="stat-footer">
                    <span>View female students</span>
                </div>

            </a>


            <!-- Other Students -->
            <a href="{{ route('students.index', ['gender' => 'Other']) }}" class="stat-card">

                <div class="stat-card-header">
                    <div class="stat-icon slate">
                        <svg viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path d="M4 21C4 16.58 7.58 13 12 13C16.42 13 20 16.58 20 21" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="card-arrow">↗</span>
                </div>

                <div class="stat-info">
                    <span>Other Students</span>
                    <strong>{{ $otherStudents }}</strong>
                </div>

                <div class="stat-footer">
                    <span>View other students</span>
                </div>

            </a>


            <!-- Courses -->
            <a href="{{ route('courses.index') }}" class="stat-card">

                <div class="stat-card-header">
                    <div class="stat-icon cyan">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M3 5.5L12 2L21 5.5L12 9L3 5.5Z" stroke="currentColor" stroke-width="1.8"
                                stroke-linejoin="round" />

                            <path d="M6 7V12.5C6 14.43 8.69 16 12 16C15.31 16 18 14.43 18 12.5V7" stroke="currentColor"
                                stroke-width="1.8" />

                            <path d="M21 6V14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </div>

                    <span class="card-arrow">↗</span>
                </div>

                <div class="stat-info">
                    <span>Total Courses</span>
                    <strong>{{ $totalCourses }}</strong>
                </div>

                <div class="stat-footer">
                    <span>Available courses</span>
                </div>

            </a>

        </div>


        <!-- ================= QUICK ACTIONS ================= -->
        <div class="content-grid">

            <div class="quick-panel">

                <div class="panel-header">
                    <div>
                        <span class="panel-label">QUICK ACCESS</span>
                        <h2>Common Actions</h2>
                        <p>Access frequently used student management features.</p>
                    </div>
                </div>


                <div class="action-list">

                    <a href="{{ route('students.create') }}" class="action-item">

                        <div class="action-icon blue">
                            <span>+</span>
                        </div>

                        <div class="action-content">
                            <strong>Add New Student</strong>
                            <span>Create a new student record</span>
                        </div>

                        <span class="action-arrow">→</span>

                    </a>


                    <a href="{{ route('students.index') }}" class="action-item">

                        <div class="action-icon indigo">
                            <svg viewBox="0 0 24 24" fill="none">
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="1.8" />
                                <path d="M2 21C2 17.69 5.13 15 9 15C12.87 15 16 17.69 16 21" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" />
                                <path d="M17 11C18.66 11 20 9.66 20 8C20 6.34 18.66 5 17 5" stroke="currentColor"
                                    stroke-width="1.8" />
                            </svg>
                        </div>

                        <div class="action-content">
                            <strong>Manage Students</strong>
                            <span>View and manage student records</span>
                        </div>

                        <span class="action-arrow">→</span>

                    </a>


                    <a href="{{ route('courses.index') }}" class="action-item">

                        <div class="action-icon cyan">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M3 5.5L12 2L21 5.5L12 9L3 5.5Z" stroke="currentColor" stroke-width="1.8"
                                    stroke-linejoin="round" />
                                <path d="M6 7V13" stroke="currentColor" stroke-width="1.8" />
                                <path d="M6 13C6 15 8.69 16.5 12 16.5C15.31 16.5 18 15 18 13V7" stroke="currentColor"
                                    stroke-width="1.8" />
                            </svg>
                        </div>

                        <div class="action-content">
                            <strong>Manage Courses</strong>
                            <span>View available courses</span>
                        </div>

                        <span class="action-arrow">→</span>

                    </a>

                </div>

            </div>


            <!-- ================= SYSTEM OVERVIEW ================= -->
            <div class="overview-panel">

                <div class="panel-label">SYSTEM OVERVIEW</div>

                <h2>Student Records</h2>

                <p>
                    Keep student information organised and easily accessible
                    through the management system.
                </p>

                <div class="overview-divider"></div>

                <div class="overview-row">
                    <span>Total Students</span>
                    <strong>{{ $totalStudents }}</strong>
                </div>

                <div class="overview-row">
                    <span>Male Students</span>
                    <strong>{{ $maleStudents }}</strong>
                </div>

                <div class="overview-row">
                    <span>Female Students</span>
                    <strong>{{ $femaleStudents }}</strong>
                </div>

                <div class="overview-row">
                    <span>Other Students</span>
                    <strong>{{ $otherStudents }}</strong>
                </div>

                <div class="overview-divider"></div>

                <a href="{{ route('students.index') }}" class="overview-link">
                    View all student records
                    <span>→</span>
                </a>

            </div>

        </div>


        <!-- ================= FOOTER ================= -->
        <div class="dashboard-footer">

            <span>
                Student Management System
            </span>

            <span>
                Dashboard
            </span>

        </div>

    </div>

    <style>
        /* ========================================================= BASE ========================================================= */
        .dashboard-container {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 42px 44px;
            color: #0f172a;
            box-sizing: border-box;
        }

        /* ========================================================= HEADER ========================================================= */
        .dashboard-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 34px;
        }

        .dashboard-heading {
            max-width: 750px;
        }

        .eyebrow,
        .panel-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.6px;
        }

        .eyebrow {
            margin-bottom: 10px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #2563eb;
            box-shadow: 0 0 0 4px #dbeafe;
        }

        .dashboard-heading h1 {
            margin: 0;
            color: #0f172a;
            font-size: 34px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -0.8px;
        }

        .dashboard-heading p {
            margin: 10px 0 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ========================================================= PRIMARY BUTTON ========================================================= */
        .primary-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 44px;
            padding: 0 18px;
            border: 1px solid #1d4ed8;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.16);
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .primary-action:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.22);
        }

        .plus-icon {
            font-size: 19px;
            line-height: 1;
        }

        /* ========================================================= STATISTICS ========================================================= */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            position: relative;
            min-height: 178px;
            padding: 19px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            background: #ffffff;
            color: inherit;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(15, 23, 42, 0.025);
            transition: 0.22s ease;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #2563eb;
            opacity: 0;
            transition: 0.22s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: #cbd5e1;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .stat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-icon,
        .action-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
        }

        .stat-icon svg {
            width: 21px;
            height: 21px;
        }

        .stat-icon.blue,
        .action-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-icon.indigo,
        .action-icon.indigo {
            background: #eef2ff;
            color: #4f46e5;
        }

        .stat-icon.purple,
        .action-icon.purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .stat-icon.slate,
        .action-icon.slate {
            background: #f1f5f9;
            color: #475569;
        }

        .stat-icon.cyan,
        .action-icon.cyan {
            background: #ecfeff;
            color: #0891b2;
        }

        .card-arrow {
            color: #94a3b8;
            font-size: 18px;
            transition: 0.2s ease;
        }

        .stat-card:hover .card-arrow {
            color: #2563eb;
            transform: translate(2px, -2px);
        }

        .stat-info {
            display: flex;
            flex-direction: column;
            margin-top: 24px;
        }

        .stat-info span {
            color: #64748b;
            font-size: 12px;
            font-weight: 550;
        }

        .stat-info strong {
            margin-top: 5px;
            color: #0f172a;
            font-size: 30px;
            line-height: 1;
            font-weight: 750;
            letter-spacing: -0.8px;
        }

        .stat-footer {
            position: absolute;
            left: 19px;
            bottom: 16px;
            color: #94a3b8;
            font-size: 11px;
        }

        /* ========================================================= MAIN CONTENT ========================================================= */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(300px, 0.8fr);
            gap: 20px;
        }

        /* ========================================================= QUICK PANEL ========================================================= */
        .quick-panel,
        .overview-panel {
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            background: #ffffff;
            box-shadow: 0 2px 5px rgba(15, 23, 42, 0.025);
        }

        .quick-panel {
            padding: 27px;
        }

        .panel-header {
            margin-bottom: 21px;
        }

        .panel-header h2,
        .overview-panel h2 {
            margin: 5px 0 0;
            color: #0f172a;
            font-size: 19px;
            font-weight: 700;
            letter-spacing: -0.2px;
        }

        .panel-header p,
        .overview-panel>p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        /* ========================================================= ACTIONS ========================================================= */
        .action-list {
            display: grid;
            gap: 10px;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #ffffff;
            color: inherit;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .action-item:hover {
            border-color: #bfdbfe;
            background: #f8fbff;
            transform: translateX(2px);
        }

        .action-icon {
            width: 39px;
            height: 39px;
            border-radius: 9px;
        }

        .action-icon svg {
            width: 19px;
            height: 19px;
        }

        .action-icon span {
            font-size: 21px;
        }

        .action-content {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .action-content strong {
            color: #1e293b;
            font-size: 13px;
            font-weight: 650;
        }

        .action-content span {
            margin-top: 2px;
            color: #94a3b8;
            font-size: 11px;
        }

        .action-arrow {
            margin-left: auto;
            color: #94a3b8;
            font-size: 18px;
            transition: 0.2s ease;
        }

        .action-item:hover .action-arrow {
            color: #2563eb;
            transform: translateX(3px);
        }

        /* ========================================================= OVERVIEW ========================================================= */
        .overview-panel {
            padding: 27px;
        }

        .overview-panel h2 {
            margin-top: 7px;
        }

        .overview-panel>p {
            margin-top: 8px;
            max-width: 380px;
            line-height: 1.6;
        }

        .overview-divider {
            height: 1px;
            margin: 20px 0;
            background: #eef2f7;
        }

        .overview-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
        }

        .overview-row span {
            color: #64748b;
            font-size: 12px;
        }

        .overview-row strong {
            color: #0f172a;
            font-size: 13px;
            font-weight: 700;
        }

        .overview-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #2563eb;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .overview-link span {
            font-size: 17px;
            transition: 0.2s ease;
        }

        .overview-link:hover span {
            transform: translateX(3px);
        }

        /* ========================================================= FOOTER ========================================================= */
        .dashboard-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 0 3px;
            color: #94a3b8;
            font-size: 11px;
        }

        /* ========================================================= TABLET ========================================================= */
        @media (max-width: 1150px) {
            .dashboard-cards {
                grid-template-columns: repeat(3, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ========================================================= MOBILE ========================================================= */
        @media (max-width: 700px) {
            .dashboard-container {
                padding: 25px 16px;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: stretch;
                margin-bottom: 25px;
            }

            .dashboard-heading h1 {
                font-size: 27px;
            }

            .dashboard-heading p {
                font-size: 13px;
            }

            .primary-action {
                width: 100%;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
                gap: 11px;
                margin-bottom: 20px;
            }

            .stat-card {
                min-height: 160px;
            }

            .quick-panel,
            .overview-panel {
                padding: 20px;
            }

            .content-grid {
                gap: 14px;
            }

            .dashboard-footer {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }
        }

        /* ========================================================= SMALL MOBILE ========================================================= */
        @media (max-width: 400px) {
            .dashboard-container {
                padding: 20px 12px;
            }

            .dashboard-heading h1 {
                font-size: 24px;
            }

            .stat-info strong {
                font-size: 27px;
            }
        }
    </style>

</x-app-layout>