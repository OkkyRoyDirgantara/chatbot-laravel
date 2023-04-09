@extends('admin.message')
@section('message')

<style>
    /* Warna scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        background-color: #f5f5f5;
    }

    /* Warna thumb (bagian yang bisa di-drag) */
    ::-webkit-scrollbar-thumb {
        background-color: #ccc;
    }

    /* Warna thumb saat di-hover */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #aaa;
    }

    /* Ukuran scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        scrollbar-width: thin;
    }

    /* Tampilan scrollbar saat di-hover */
    ::-webkit-scrollbar-track:hover {
        background-color: #eee;
    }

    /* Tampilan scrollbar saat di-drag */
    ::-webkit-scrollbar-thumb:active {
        background-color: #999;
    }

    .card-header {
        background-color: #075e54;
        color: #fff;
    }

    .list-group-item.active {
        background-color: #075e54;
        border-color: #075e54;
    }

    .messages {
        height: 300px;
        overflow-y: scroll;
    }

    .message-sent {
        margin: 10px 0;
        padding: 10px;
        border-radius: 20px;
        background-color: #dcf8c6;
        float: right;
        clear: both;
        max-width: 70%;
        position: relative;
    }

    .message-sent:after {
        content: "";
        position: absolute;
        right: -10px;
        top: 50%;
        border-style: solid;
        border-width: 10px 0 10px 10px;
        border-color: transparent transparent transparent #dcf8c6;
        transform: translateY(-50%);
    }

    .message-received {
        margin: 10px 0;
        padding: 10px;
        border-radius: 20px;
        background-color: #d4d4d4;
        float: left;
        clear: both;
        max-width: 70%;
        position: relative;
    }

    .message-received:after {
        content: "";
        position: absolute;
        left: -10px;
        top: 50%;
        border-style: solid;
        border-width: 10px 10px 10px 0;
        border-color: transparent #d4d4d4 transparent transparent;
        transform: translateY(-50%);
    }

    .time {
        font-size: 10px;
    }

    .input-group {
        position: sticky;
        bottom: 0;
        background-color: #f1f0f0;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
$pesan = $chatAdmin->merge($chatUser->userTelegram)->sortBy('created_at');
?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$chatUser->first_name}} {{'@'}}{{$chatUser->username}} ({{$chatUser->id_user}})                </div>
                <div class="card-body">
                    <div class="messages" id="message-container">
                        @foreach($pesan as $message)
                            @if($message->id_user == $chatUser->id_user && $message->id_admin != 1234)
                                <div class="message-received">
                                    <p>{{$message->message}}</p>
                                    <span class="time">{{$message->created_at}}</span>
                                </div>
                            @else
                                <div class="message-sent">
                                    <p>{{$message->message}}</p>
                                    <span class="time">{{$message->created_at}}</span>
                                    @if($message->is_send != 0)
                                        <span class="checkmark">&#10003;</span>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <form action="{{route('admin/message/send')}}" method="post">
                        @csrf
                        <div class="input-group mt-3">
                            <input type="hidden" name="id_user" value="{{$chatUser->id_user}}">
                            <input type="text" name="message" class="form-control" placeholder="Ketik pesan..." autocomplete="off">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
    // Scroll ke bawah pada posisi terakhir
    var container = document.getElementById("message-container");
    container.scrollTop = container.scrollHeight;
</script>

@endsection




{{--<div class="col-md-8">--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            Chat dengan User--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">{{$user->id_user}} {{$user->first_name}}</h5>--}}
{{--            @foreach($user->userTelegram as $telegram)--}}
{{--                {{$telegram->message}}--}}
{{--            @endforeach--}}
{{--            <p class="card-text">Pesan terakhir: Halo apa kabar?</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
