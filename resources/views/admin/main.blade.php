@extends('admin.layout.master')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-4 mt-2">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-center">
                        Pesan Masuk
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h1 class="card-title text-center">{{$chatToday}}</h1>
                        <p class="card-text text-center">Anda memiliki {{$chatToday}} pesan hari ini.</p>
                        <a href="{{route('admin/message')}}" class="btn btn-primary align-self-center">Lihat Pesan</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Pesan Terakhir {{$lastTime}}
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-center">
                        Total Pesan Belum dibaca
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h1 class="card-title text-center">{{ $countMessageUnread }}</h1>
                        <p class="card-text text-center">Anda memiliki {{ $countMessageUnread }} pesan yang belum dibaca.</p>
                        <a href="{{route('admin/message')}}/{{ $lastId }}" class="btn btn-primary align-self-center">Lihat Pesan Terbaru</a>
                    </div>
                </div>
            </div>

            {{--            <div class="col-md-4">--}}
{{--                <div class="card" style="width: 18rem;">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-header">--}}
{{--                            Pesan Masuk--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="card-title">{{$chatToday}}</h1>--}}
{{--                            <p class="card-text">Anda memiliki {{$chatToday}} pesan hari ini.</p>--}}
{{--                            <a href="#" class="btn btn-primary">Lihat Pesan</a>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-muted">--}}
{{--                            {{\Carbon\Carbon::now()->format('d M Y')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card" style="width: 18rem;">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-header">--}}
{{--                            Pesan Masuk--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="card-title">{{$chatToday}}</h1>--}}
{{--                            <p class="card-text">Anda memiliki {{$chatToday}} pesan hari ini.</p>--}}
{{--                            <a href="#" class="btn btn-primary">Lihat Pesan</a>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-muted">--}}
{{--                            {{\Carbon\Carbon::now()->format('d M Y')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="row mt-5 justify-content-center mb-2">
            <div class="col-md-4 mt-2">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-center">
                        Status Bot
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        @if($botStatus->is_run == 1)
                            <p class="card-text">Current Status : <span class="rounded-pill bg-success text-white px-2">Active</span></p>
                            <p class="card-text">Run At : <span id="last-update"></span></p>
                            <p class="card-text">Uptime : <span id="uptime"></span></p>
                        @else
                            <p class="card-text">Current Status : <span class="rounded-pill bg-danger text-white px-2">Inactive</span></p>
                            <p class="card-text">Stop At : <span id="last-update"></span></p>
                            <p class="card-text">Downtime : <span id="uptime"></span></p>
                        @endif
                    </div>
                    @if($botStatus->is_run == 1)
                        <div class="card-footer text-muted text-center">
                            <form action="{{ route('admin/dashboard/stop-bot') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Stop Bot</button>
                            </form>
                        </div>
                        @else
                        <div class="card-footer text-muted text-center">
                            <form action="{{ route('admin/dashboard/start-bot') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Start Bot</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-center">
                        Service Cuaca (ON GOING)
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        @if($botStatus->is_run == 1)
{{--                            <p class="card-text">Current Status : <span class="rounded-pill bg-success text-white px-2">Active</span></p>--}}
{{--                            <p class="card-text">Run At : <span id="last-update"></span></p>--}}
{{--                            <p class="card-text">Uptime : <span id="uptime"></span></p>--}}
                        @else
{{--                            <p class="card-text">Current Status : <span class="rounded-pill bg-danger text-white px-2">Inactive</span></p>--}}
{{--                            <p class="card-text">Stop At : <span id="last-update"></span></p>--}}
{{--                            <p class="card-text">Downtime : <span id="uptime"></span></p>--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="card" style="width: 18rem;">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-header">--}}
{{--                            Pesan Masuk--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="card-title">{{$chatToday}}</h1>--}}
{{--                            <p class="card-text">Anda memiliki {{$chatToday}} pesan hari ini.</p>--}}
{{--                            <a href="#" class="btn btn-primary">Lihat Pesan</a>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer text-muted">--}}
{{--                            {{\Carbon\Carbon::now()->format('d M Y')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

{{--    <div class="card text-center">--}}
{{--        <div class="card-header">--}}
{{--            Pesan Masuk--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <h1 class="card-title">10</h1>--}}
{{--            <p class="card-text">Anda memiliki 10 pesan yang belum dibaca.</p>--}}
{{--            <a href="#" class="btn btn-primary">Lihat Pesan</a>--}}
{{--        </div>--}}
{{--        <div class="card-footer text-muted">--}}
{{--            Terakhir diperbarui 2 menit yang lalu--}}
{{--        </div>--}}
{{--    </div>--}}
    <script>
        // Set the last update time
        @if( $botStatus->is_run == 1)
        let lastUpdate = new Date("{{ $botStatus->run_at}}");
        @else
        let lastUpdate = new Date("{{ $botStatus->stop_at}}");
        @endif
        var options = { timeZone: 'Asia/Jakarta', hour12: false, day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        document.getElementById("last-update").innerHTML = lastUpdate.toLocaleString('id-ID', options);

        // Calculate uptime every second
        setInterval(function() {
            var now = new Date();
            var uptime = new Date(now - lastUpdate);
            var days = Math.floor(uptime / 86400000);
            var hours = Math.floor((uptime % 86400000) / 3600000);
            var minutes = Math.floor((uptime % 3600000) / 60000);
            var seconds = Math.floor((uptime % 60000) / 1000);
            var uptimeString = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
            document.getElementById("uptime").innerHTML = uptimeString;
        }, 1000);

        // Set the completed and remaining tasks
        var tasksCompleted = 10;
        var tasksRemaining = 5;
        // document.getElementById("tasks-completed").innerHTML = tasksCompleted;
        document.getElementById("tasks-remaining").innerHTML = tasksRemaining;
    </script>
@endsection
