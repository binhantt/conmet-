<article class="message bg-gradient-to-r from-cyan-200 to-blue-100  font-mono">
    <div class="message-header bg-gradient-to-r from-cyan-400 to-blue-300">
        <div>
            <i class="fa-solid fa-comment"></i>
            Bình luận
        </div>
    </div>
    <div class="message-body">
        <form class="flex flex-col" method="POST" action="{{route('post')}}">
            @csrf
            <textarea class="textarea is-primary" name="content" id="content" placeholder="BÌNH LUẬN"></textarea>
            <div class="">
                <button class=" w-30 bg-blue-400 text-white mt-2 rounded-sm p-2" type="submit">Bình luận </button>
            </div>

        </form>
        @foreach($nguoidung as $key_nguoidung => $val_nguoidung)
        @if ($val_nguoidung->reply_user_id == null)
        <article class="media mt-2 bg-white rounded-sm p-2 flex items-center">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content  ">

                <div class="content">
                    <p class="text-xl font-bold">{{ $val_nguoidung->name }}</p>
                    <p class="font-normal"> {{ $val_nguoidung->content }}</p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <a class="level-item">
                        <button class="reply icon is-small"><i class="fas fa-reply"></i></button>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-heart"></i></span>
                        </a>
                    </div>
                </nav>
            </div>
        </article>
        @endif
        @if ($val_nguoidung->reply_user_id > 0)     
        <article class="media ml-5 mt-2 bg-white rounded-sm p-2 flex items-center">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p class="text-xl font-bold">{{$val_nguoidung->name }}</p>
                    <p class="font-normal">{{ $val_nguoidung->content }}</p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-reply"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-heart"></i></span>
                        </a>
                    </div>
                </nav>
            </div>
        </article>
        @endif
        <div class="phanhoi field mt-2 ml-5">
            <div class="control">
                <textarea class="textarea is-small is-primary" placeholder="phản hồi"></textarea>

                <div class="flex justify-end">
                    <button class=" w-30 bg-white text-gray-200 mr-2 mt-2 rounded-sm p-2" type="submit">Hủy </button>
                    <button class=" w-30 bg-blue-400 text-white mt-2 rounded-sm p-2" type="submit">Phản hồi </button>
                </div>
            </div>
            @endforeach
        </div>
</article>