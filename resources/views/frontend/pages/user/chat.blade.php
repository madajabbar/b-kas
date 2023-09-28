<div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="row">
        <div class="col">
            <div class="card mb-3 mb-lg-0">
                <div class="card-header">
                    <h3>Chat</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($chat_rooms as $chat)
                            <li>
                                <a href="">
                                    <i class="linearicons-store"></i>
                                    Toko {{$chat->user->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
