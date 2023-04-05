@extends('admin.layout.master')

@section('title', 'Test')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Daftar Pengguna
                    </a>

                    @foreach($users as $user)
                        <a href="{{route('admin/message')}}/{{$user->id_user}}" class="list-group-item list-group-item-action">
                            {{ $user->first_name }} {{ $user->last_name }} ({{$user->username}})
                            @if($user->unseen > 0)
                                <span class="badge bg-danger float-end">{{ $user->unseen }} pesan belum dibaca</span>
                            @endif
                        </a>
                    @endforeach
                    {{ $users->links() }}
                </div>

            </div>
            @yield('message')
        </div>
    </div>
@endsection
{{--                            <img src="https://via.placeholder.com/50" class="rounded-circle me-2" alt="user image">--}}
