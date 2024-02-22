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
        <article class="media bg-white mt-2">
            <figure class="media-left ">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{$val_nguoidung->name}}</strong>
                        <br>
                        {{$val_nguoidung->content}}
                        <br>
                        <small><a>Like</a> · <a class="js-open-comment" data-reply="reply-{{$val_nguoidung->id}}">Reply</a></small>
                    </p>
                </div>
                <div>
                </div>
        </article>
        <div class="comment hidden" id="reply-{{$val_nguoidung->id}}">
            <form class="flex flex-col"  method="POST" action="{{route('post')}}">
                @csrf
                <textarea class="textarea is-primary" name="content" placeholder="BÌNH LUẬN"></textarea>
                <div class="">
                    <button class=" w-30 bg-blue-400 text-white mt-2 rounded-sm p-2" type="submit">Bình luận </button>
                </div>

            </form>
        </div>
        @endforeach

    </div>
</article>
<script src="{{asset('js/comment.js')}}"></script>
<script>
 
    $('.js-open-comment').click(function() {
        $('#' + $(this).data('reply')).toggleClass('hidden');
    })
</script>