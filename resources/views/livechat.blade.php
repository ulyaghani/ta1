<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Chat - Wood Mood</title>

    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Chat Button -->
    <div id="chat-button" onclick="toggleChat()">
        Chat dengan Kami
    </div>

    <!-- Chat Box -->
    <div id="chat-box" style="display: none;">
        <div class="chat-header">
            <span>Live Chat</span>
            <button onclick="toggleChat()" class="close-chat">&times;</button>
        </div>
        <div class="chat-body">
            <div class="card" id="chat4">
                <div class="card-body" style="position: relative; height: 400px; overflow-y: auto;">
                    @if (Auth::check())
                        <!-- Jika user login, tampilkan pesan -->
                        @if (!empty($messages))
                            <div class="chatbox">
                                <ul>
                                    @foreach ($messages as $message)
                                        <div class="chat-message received">
                                            <p class="small p-2 mb-1 rounded-3">{{ $message->message }}</p>
                                        </div>
                                        <div
                                            class="{{ $message->sender == 'user' ? 'user-message' : 'admin-message' }}">
                                            <p>{{ $message->sender == 'user' ? 'You' : $message->AdminChat->name }}:
                                                {{ $message->message }}</p>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p>Tidak ada pesan.</p>
                        @endif
                    @else
                        <!-- Jika user belum login, tampilkan pesan -->
                        <div class="chatbox">
                            <p>Silakan login untuk mulai chat.</p>
                        </div>
                    @endif
                </div>

                <!-- Bagian untuk menulis dan mengirim pesan -->
                <div class="card-footer bg-white p-3">
                    @if (Auth::check())
                        <form action="{{ route('livechat.send') }}" method="POST" class="flex items-center">
                            @csrf
                            <div class="relative flex-grow">
                                <input type="text"
                                    class="w-full pr-10 pl-3 py-2 rounded-full border border-gray-300 focus:outline-none focus:border-blue-500 transition-colors"
                                    name="message" placeholder="Type your message..." required>
                                <button type="submit"
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-500 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <p>Login untuk mengirim pesan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function toggleChat() {
            var chatBox = document.getElementById('chat-box');
            if (chatBox.style.display === 'none' || chatBox.style.display === '') {
                chatBox.style.display = 'block';
            } else {
                chatBox.style.display = 'none';
            }
        }
    </script>
</body>

</html>
