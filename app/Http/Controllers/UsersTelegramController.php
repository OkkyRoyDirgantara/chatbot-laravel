<?php

namespace App\Http\Controllers;

use App\Models\UsersTelegram;
use Illuminate\Http\Request;

class UsersTelegramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show all users
        $users = UsersTelegram::OrderByDesc('created_at')->simplePaginate(10);
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersTelegram $usersTelegram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersTelegram $usersTelegram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersTelegram $usersTelegram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersTelegram $usersTelegram)
    {
        //
    }
}
