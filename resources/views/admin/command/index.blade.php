@extends('admin.layout.master')

@section('title', 'Command List')
@section('content')
    <div class="container">
        <h1>Daftar Command</h1>
        <ul class="list-group">
            @foreach($commands as $cmd)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{$cmd->command}}</h5>
                            <p>{!! nl2br(e($cmd->description))!!}</p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal{{$cmd->id}}">Edit</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Modal Edit Command 1 -->
    @foreach($commands as $cmd)
        <div class="modal fade" id="editModal{{$cmd->id}}" tabindex="-1" aria-labelledby="editModal1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Command {{$cmd->command}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin/command/update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="editCommand{{$cmd->id}}" class="form-label">Command</label>
                                <input type="text" class="form-control" id="editCommand{{$cmd->id}}" value="{{$cmd->command}}" readonly disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editDescription{{$cmd->id}}" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="editDescription{{$cmd->id}}" name="description" rows="3">{{$cmd->description}}</textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$cmd->id}}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
