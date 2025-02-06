<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobController extends Controller
{
    public function show(){
        $user=Auth::user()->getAuthIdentifier();

        $jobs=Job::query()->where('user_id', '==' ,$user);
        dd($jobs);

        return view('jobs.myjob', ['jobs' => $jobs]);

    }
}
