<?php

namespace App\Http\Controllers;

use App\Models\ChatUserTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chatToday = ChatUserTelegram::all()->where('created_at', '>=', Carbon::today())->count();

        // show latest
        $now = Carbon::now();

        // Pesan Terakhir
        $lastCreatedAt = ChatUserTelegram::latest('created_at')->pluck('created_at')->first();
        $lastTime = $lastCreatedAt ? Carbon::parse($lastCreatedAt)->diffForHumans() : null;

        $botStatus = DB::table('bot_status')->where('id', 1)->first();
        $serviceCuaca = DB::table('bot_status')->where('id', 2)->first();

        $countMessageUnread = ChatUserTelegram::all()->where('is_seen', '=', false)->count();

        $lastId = ChatUserTelegram::latest('created_at')->where('is_seen', '=', false)->pluck('id_user')->first();

        //        show uptime from run_at to now
        // $upTime = $botStatus->run_at ? Carbon::parse($botStatus->run_at)->diffForHumans($now) : null;
        $upTime = $botStatus->run_at ? Carbon::parse($botStatus->run_at)->diff($now)->format('%dd %hh %im %ss') : null;
        $upTimeCuaca = $serviceCuaca->run_at ? Carbon::parse($serviceCuaca->run_at)->diff($now)->format('%dd %hh %im %ss') : null;

        return view('admin.main', [
            'chatToday' => $chatToday,
            'lastTime' => $lastTime,
            'botStatus' => $botStatus,
            'serviceCuaca' => $serviceCuaca,
            'upTimeCuaca' => $upTimeCuaca,
            'upTime' => $upTime,
            'countMessageUnread' => $countMessageUnread,
            'lastId' => $lastId,]);
    }

    /*
     * stop bot
     */

    public function startBot()
    {
        exec('sudo systemctl start nohup');
        sleep(3);
        return redirect()->route('admin/dashboard');
    }

    /*
     * stop bot
     */
    public function stopBot()
    {
        exec('sudo systemctl stop nohup');
        sleep(3);
        return redirect()->route('admin/dashboard');
    }

    /*
     * start service cuaca
     */
    public function startServiceCuaca()
    {
        exec('sudo systemctl start cuaca');
        sleep(3);
        return redirect()->route('admin/dashboard');
    }

    /*
     * stop service cuaca
     */
    public function stopServiceCuaca()
    {
        exec('sudo systemctl stop cuaca');
        sleep(3);
        return redirect()->route('admin/dashboard');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
