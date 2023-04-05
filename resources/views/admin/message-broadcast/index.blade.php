@extends('admin.layout.master')

@section('title', 'Broadcast Message')
@section('content')
    <div class="container">
        <h1 class="text-center my-4">Add Broadcast</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title text-center">Total Pengguna</h2>
                        <hr>
                        <h3 class="card-text text-center">{{ $countUser }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title text-center">Total Pesan Pengguna Hari Ini</h2>
                        <hr>
                        <h3 class="card-text text-center font-weight-bolder">{{ $chatToday }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title text-center">Informasi Bot</h2>
                        <hr>
                        <p class="card-text mb-2">Bot akan mengirimkan pesan broadcast ke semua pengguna.</p>
                        <p class="card-text mb-0">Harap tunggu hingga 10 detik sebelum pesan diterima oleh semua pengguna.</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin/broadcast-message/send') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="broadcastMessage" class="form-label mt-3"><h1>Message</h1></label>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <textarea name="message" class="form-control" id="broadcastMessage" rows="3" placeholder="Enter message"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmAddModal">Add</button>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmAddModal" tabindex="-1" aria-labelledby="confirmAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmAddModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin akan mengirim pesan ini ?</p>
                                    <p>Pesan ini akan dikirimkan kepada <text class="text-white bg-primary font-weight-bold"> Semua Pengguna </text></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h2 class="my-4">Previous Broadcast Messages</h2>
                <ul class="list-group">
                    @foreach($messageBroadcasts as $message)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $message->message }}
                            @if($message->is_send == 0)
                                <span class="badge bg-secondary rounded-pill">Not Sent</span>
                            @else
                                <span class="badge bg-success rounded-pill">Sent</span>
                            @endif
                            <small>Created at: {{ $message->created_at }}</small>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#resendBroadcastModal{{ $message->id }}">Resend</button>
                        </li>

                        <!-- Resend Broadcast Modal -->
                        <div class="modal fade" id="resendBroadcastModal{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Resend Broadcast Message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin/broadcast-message/resend', $message->id) }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Are you sure you want to resend this message?</p>
                                            <p>{{ $message->message }}</p>
                                            <input type="hidden" name="message_id" value="{{ $message->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Resend</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of Resend Broadcast Modal -->
                    @endforeach
                    {{ $messageBroadcasts->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection

{{--<li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--    Broadcast message 1--}}
{{--    <span class="badge bg-primary rounded-pill">Sent</span>--}}
{{--    <small>Created at: 01/01/2022 13:00:00</small>--}}
{{--    <button type="button" class="btn btn-sm btn-primary">Resend</button>--}}
{{--</li>--}}
{{--<li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--    Broadcast message 2--}}
{{--    <span class="badge bg-secondary rounded-pill">Not Sent</span>--}}
{{--    <small>Created at: 02/01/2022 15:00:00</small>--}}
{{--</li>--}}
{{--<li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--    Broadcast message 3--}}
{{--    <span class="badge bg-success rounded-pill">Sent</span>--}}
{{--    <small>Created at: 03/01/2022 11:00:00</small>--}}
{{--</li>--}}
