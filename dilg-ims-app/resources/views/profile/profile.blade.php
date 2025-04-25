@extends('layouts.admin_layout')

@section('title', 'Profile')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="flex justify-between items-center w-full mb-6">
                    <h3 class="mb-0 text-lg font-semibold">Profile</h3>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name" class="form-label text-sm font-medium">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md w-full p-2.5 @error('name') border-red-500 @enderror"
                            required>
                        @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email" class="form-label text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md w-full p-2.5 @error('email') border-red-500 @enderror"
                            required>
                        @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <label for="password" class="form-label text-sm font-medium">New Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md w-full p-2.5 @error('password') border-red-500 @enderror"
                            autocomplete="new-password">
                        @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Save Button --}}
                    <div class="form-group text-right">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Save Changes
                        </button>
                    </div>

                    @if (session('status') === 'profile-updated')
                        <div class="text-sm text-green-600">
                            {{ __('Profile updated successfully.') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
