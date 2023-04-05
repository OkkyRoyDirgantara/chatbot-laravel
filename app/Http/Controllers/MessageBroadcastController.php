<?php

namespace App\Http\Controllers;

use App\Models\ChatUserTelegram;
use App\Models\MessageBroadcast;
use App\Models\UsersTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MessageBroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messageBroadcasts = MessageBroadcast::orderByDesc('created_at')->simplePaginate(10);

        $chatToday = ChatUserTelegram::all()->where('created_at', '>=', Carbon::today())->count();

        $countUser = UsersTelegram::all()->count();
        return view('admin.message-broadcast.index', ['messageBroadcasts' => $messageBroadcasts, 'countUser' => $countUser, 'chatToday' => $chatToday]);
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
        // validasi input
        $request->validate([
            'message' => 'required',
        ]);
        MessageBroadcast::create($request->all());
        return redirect()->route('admin/broadcast-message')->with('success', 'Broadcast message has been sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageBroadcast $messageBroadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageBroadcast $messageBroadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageBroadcast $messageBroadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageBroadcast $messageBroadcast)
    {
        //
    }

    public function resend(Request $request)
    {
        $message = MessageBroadcast::findOrFail($request->input('message_id'));

        // Lakukan logika bisnis yang tepat untuk mengirim ulang pesan

        $message->is_send = 0;
        $message->save();

        return redirect()->back()->with('success', 'Broadcast message has been resent.');
    }
}
