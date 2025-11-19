@extends('layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Users</h2>
        <p class="text-gray-600 text-sm leading-relaxed">
            Manage your users and their permissions.
        </p>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Reports</h2>
        <p class="text-gray-600 text-sm leading-relaxed">
            View detailed reports and analytics.
        </p>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Settings</h2>
        <p class="text-gray-600 text-sm leading-relaxed">
            Configure your application settings.
        </p>
    </div>

</div>
@endsection
