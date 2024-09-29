@extends('dashboard.app-dashboard')

@section('content')
    <section style="background-color: #CDC4F9;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <!-- Bagian Kiri: Daftar Pengguna -->
                                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                                    <div class="p-3">
                                        <h5>Daftar Pengguna yang Mengirim Pesan</h5>
                                        <ul class="list-unstyled mb-0">
                                            @if ($users->isEmpty())
                                                <p>Tidak ada pengguna yang mengirim pesan.</p>
                                            @else
                                                @foreach ($users as $user)
                                                    <li class="p-2 border-bottom">
                                                        <a href="{{ route('adminchat.show', $user->id) }}"
                                                            class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                                    alt="avatar" class="d-flex align-self-center me-3"
                                                                    width="60">
                                                                <div class="pt-1">
                                                                    <p class="fw-bold mb-0">{{ $user->name }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <!-- Bagian Kanan: Chat Box -->
                                <div class="col-md-6 col-lg-7 col-xl-8">
                                    <div class="pt-3 pe-3" style="position: relative; height: 400px; overflow-y: auto;">
                                        @if (isset($messages) && !$messages->isEmpty())
                                            @foreach ($messages as $message)
                                                <div
                                                    class="{{ $message->sender === 'user' ? 'd-flex flex-row justify-content-start' : 'd-flex flex-row justify-content-end' }}">
                                                    @if ($message->sender === 'user')
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                            alt="avatar" style="width: 45px; height: 100%;">
                                                        <div>
                                                            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">
                                                                {{ $message->message }}</p>
                                                            <p class="small ms-3 mb-3 rounded-3 text-muted float-end">
                                                                {{ $message->created_at->format('h:i A | M d') }}</p>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                                {{ $message->message }}</p>
                                                            <p class="small me-3 mb-3 rounded-3 text-muted">
                                                                {{ $message->created_at->format('h:i A | M d') }}</p>
                                                        </div>
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                            alt="avatar" style="width: 45px; height: 100%;">
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Pilih pengguna untuk melihat pesan.</p>
                                        @endif

                                        <!-- Debugging: Tampilkan isi messages -->
                                        <pre>{{ print_r($messages->toArray()) }}</pre>
                                    </div>

                                    <!-- Form untuk membalas pesan -->
                                    @if (isset($user))
                                        <form action="{{ route('livechat.send') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div
                                                class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                    alt="avatar" style="width: 40px; height: 100%;">
                                                <input type="text" class="form-control form-control-lg" name="message"
                                                    placeholder="Type message" required>
                                                <button type="submit" class="btn btn-primary ms-3">Balas</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
