<article class="message bg-gradient-to-r from-cyan-200 to-blue-100  font-mono   ">
    <div class="message-header bg-gradient-to-r from-cyan-400 to-blue-300">
        <div>
            <i class="fa-solid fa-comment"></i>
            Bình luận
        </div>
    </div>
    <div class="message-body">
        <textarea class="textarea is-primary" placeholder="BÌNH LUẬN"></textarea>
        @foreach ($comment as $key_comment => $val_comment)
        <article class="media mt-2 bg-white rounded-sm p-2 flex items-center">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content  ">

                <div class="content">
                    @foreach($nguoidung as $key_nguoidung =>$val_nguoidung)
                    @php
                     $val_nguoidung_array = json_decode(json_encode($val_nguoidung), true);
                         $name = $val_nguoidung_array['name'];
                    @endphp
                    <p class="text-xl font-bold"> {{ $name }}</p>
                    @endforeach
                    <p class="font-normal"> {{ $val_comment['content'] }}</p>
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
        @endforeach
    </div>
</article>