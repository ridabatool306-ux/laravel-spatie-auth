<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

public function update(ProfileUpdateRequest $request, ImageService $imageService): RedirectResponse
{
    $user = $request->user();

    $data = $request->validated();

    // Image upload/update logic
    if ($request->hasFile('image')) {
        $data['image'] = $imageService->update(
            $request->file('image'),
            $user->image
        );
    }

    // Email verification reset
    if ($user->email !== $data['email']) {
        $user->email_verified_at = null;
    }

    $user->update($data);

    return Redirect::route('dashboard')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
