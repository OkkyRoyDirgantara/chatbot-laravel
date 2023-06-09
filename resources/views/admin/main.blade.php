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
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#stopBotModal">Stop Bot</button>
                        </div>
                        @else
                        <div class="card-footer text-muted text-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#startBotModal">Start Bot</button>
                        </div>
                    @endif
                    @if($botStatus->is_run == 1)
                    <div class="modal fade" id="stopBotModal" tabindex="-1" aria-labelledby="stopBotModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="stopBotModalLabel">Konfirmasi Menghentikan Bot</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghentikan bot? Tindakan ini dapat mematikan Bot Telegram.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('admin/dashboard/stop-bot') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Stop Bot</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="modal fade" id="startBotModal" tabindex="-1" aria-labelledby="startBotModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="startBotModalLabel">Konfirmasi Memulai Bot</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin memulai bot? Tindakan ini akan mengaktifkan Bot Telegram.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin/dashboard/start-bot') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Start Bot</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-center">
                        Service Cuaca
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        @if($serviceCuaca->is_run == 1)
                            <p class="card-text">Current Status : <span class="rounded-pill bg-success text-white px-2">Active</span></p>
                            <p class="card-text">Run At : <span id="last-update-cuaca"></span></p>
                            <p class="card-text">Uptime : <span id="uptimeCuaca"></span></p>
                        @else
                            <p class="card-text">Current Status : <span class="rounded-pill bg-danger text-white px-2">Inactive</span></p>
                            <p class="card-text">Stop At : <span id="last-update-cuaca"></span></p>
                            <p class="card-text">Downtime : <span id="uptimeCuaca"></span></p>
                        @endif
                    </div>
                    @if($serviceCuaca->is_run == 1)
                        <div class="card-footer text-muted text-center">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#stopCuacaModal">Stop Service</button>
                        </div>
                    @else
                        <div class="card-footer text-muted text-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#startCuacaModal">Start Service</button>
                        </div>
                    @endif
                    @if($serviceCuaca->is_run == 1)
                        <div class="modal fade" id="stopCuacaModal" tabindex="-1" aria-labelledby="stopCuacaModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="stopCuacaModalLabel">Konfirmasi Menghentikan Service Cuaca</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghentikan service cuaca? Tindakan ini dapat mematikan service cuaca.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin/dashboard/stop-cuaca') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Stop Service Cuaca</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="modal fade" id="startCuacaModal" tabindex="-1" aria-labelledby="startCuacaModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="startCuacaModalLabel">Konfirmasi Mengaktifkan Service Cuaca</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menjalankan service cuaca? Tindakan ini dapat mengaktifkan service cuaca.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin/dashboard/start-cuaca') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Start Service Cuaca</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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

        @if( $serviceCuaca->is_run == 1)
        let lastUpdateCuaca = new Date("{{ $serviceCuaca->run_at}}");
        @else
        let lastUpdateCuaca = new Date("{{ $serviceCuaca->stop_at}}");
        @endif
        var options = { timeZone: 'Asia/Jakarta', hour12: false, day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        document.getElementById("last-update-cuaca").innerHTML = lastUpdateCuaca.toLocaleString('id-ID', options);

        // Calculate uptime every second
        setInterval(function() {
            var now = new Date();
            var uptime = new Date(now - lastUpdate);
            var days = Math.floor(uptime / 86400000);
            var hours = Math.floor((uptime % 86400000) / 3600000);
            var minutes = Math.floor((uptime % 3600000) / 60000);
            var seconds = Math.floor((uptime % 60000) / 1000);
            var uptimeString = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

            var nowCuaca = new Date();
            var uptimeCuaca = new Date(nowCuaca - lastUpdateCuaca);
            var daysCuaca = Math.floor(uptimeCuaca / 86400000);
            var hoursCuaca = Math.floor((uptimeCuaca % 86400000) / 3600000);
            var minutesCuaca = Math.floor((uptimeCuaca % 3600000) / 60000);
            var secondsCuaca = Math.floor((uptimeCuaca % 60000) / 1000);
            var uptimeStringCuaca = daysCuaca + "d " + hoursCuaca + "h " + minutesCuaca + "m " + secondsCuaca + "s";

            document.getElementById("uptimeCuaca").innerHTML = uptimeStringCuaca;
            document.getElementById("uptime").innerHTML = uptimeString;
        }, 1000);
    </script>
@endsection
