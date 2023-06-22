<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request, User $user)
    {
        return $user->applications;
    }

    public function show(Request $request, User $user, Application $application)
    {
        return $application;
    }

    public function store(Request $request, User $user)
    {
        $jobPosting = JobPosting::findOrFail($request->input('job_posting_id'));

        $application = new Application();
        $application->fill($request->only('message'));
        $application->user()->associate($user);
        $application->jobPosting()->associate($jobPosting);
        $application->save();
        return $application;
    }

    public function update(Request $request, User $user, Application $application)
    {
        $application->fill($request->only('message'));
        $application->save();
        return $application;
    }

    public function delete(Request $request, User $user, Application $application)
    {
        $application->delete();
    }
}
