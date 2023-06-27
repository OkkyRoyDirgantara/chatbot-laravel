<?php

namespace App\Http\Controllers;

use App\Models\ChatAdmin;
use App\Models\ChatUserTelegram;
use App\Models\UsersTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UsersTelegram::join('chat_user_telegram', 'users_telegram.id_user', '=', 'chat_user_telegram.id_user')
            ->select('users_telegram.*', DB::raw('MAX(chat_user_telegram.created_at) as last_message_date'))
            ->groupBy('users_telegram.id_user')
            ->orderBy('last_message_date', 'desc')
            ->simplePaginate(15);
        // count unseen from chat_user_telegram by id users
        foreach ($users as $user) {
            $user->unseen = ChatUserTelegram::where('id_user', $user->id_user)->where('is_seen', 0)->count();
        }


        return view('admin.message', ['users' => $users]);
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
        $chat = new ChatAdmin;
        $chat->id_user = $request->id_user;
        $chat->message = $request->message;
        $chat->id_admin = auth()->user()->id_admin;
        $chat->save();
        return redirect()->route('admin/message/{id}', $request->id_user)->with('success', 'Success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = UsersTelegram::join('chat_user_telegram', 'users_telegram.id_user', '=', 'chat_user_telegram.id_user')
            ->select('users_telegram.*', DB::raw('MAX(chat_user_telegram.created_at) as last_message_date'))
            ->groupBy('users_telegram.id_user')
            ->orderBy('last_message_date', 'desc')
            ->simplePaginate(15);
        $user = new UsersTelegram;
        $chatAdmin = ChatAdmin::where('id_user', $id)->orderBy('created_at')->get();
        $chatUser = $user->getById($id);

        // update is_seen
        ChatUserTelegram::where('id_user', $id)->update(['is_seen' => 1]);

        foreach ($users as $user) {
            $user->unseen = ChatUserTelegram::where('id_user', $user->id_user)->where('is_seen', 0)->count();
        }

        if($chatUser == null) {
            return redirect()->route('admin/message')->with('error', 'User not found !');
        }

        $pesan = $chatAdmin->merge($chatUser->userTelegram)->sortBy('created_at')->where('created_at', '>=', now()->subDays(7));

        return view('admin.id-chat', ['chatUser' => $chatUser, 'users' => $users, 'chatAdmin' => $chatAdmin, 'pesan' => $pesan]);
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
