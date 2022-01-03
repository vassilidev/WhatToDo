<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user profile
     *
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $markers = $user->markers;

        return view('pages.user.profile', compact('user', 'markers'));
    }
}
