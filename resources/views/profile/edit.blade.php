<x-app-layout>

    <x-slot name="header">
        <div class="profile-header">
            <div>
                <h2>Profile</h2>
                <p>Manage your account settings and security.</p>
            </div>
        </div>
    </x-slot>

    <div class="profile-container">

        <div class="profile-section">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="profile-section">
            @include('profile.partials.update-password-form')
        </div>

        <div class="profile-section danger-section">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

    <style>

        .profile-header {
            display: flex;
            align-items: center;
        }

        .profile-header h2 {
            margin: 0;
            color: #111827;
            font-size: 22px;
            font-weight: 700;
        }

        .profile-header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .profile-container {
            width: min(100% - 60px, 1000px);
            margin: 0 auto;
            padding: 40px 0 60px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .profile-section {
            padding: 28px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .danger-section {
            border-color: #fecaca;
        }

        @media (max-width: 700px) {

            .profile-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .profile-section {
                padding: 20px;
            }

        }

    </style>

</x-app-layout>