<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function index(Request $request, User $user)
    {
        $user->jobPostings->each(function (JobPosting $jobPosting) { $jobPosting->applications->each(function (Application $application) { $application->user; }); });
        return $user->jobPostings;
    }

    public function show(Request $request, User $user, Application $application)
    {
        return $application;
    }
}
