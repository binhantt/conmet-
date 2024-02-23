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
                        <small><a>Like</a> · <a class="js-open-comment" data-reply="reply-{{$val_nguoidung->id}}">Reply</a>. <a class="deleteButton" data-delete="delete-{{$val_nguoidung->id}}">Thu hồi</a> </small>
                    </p>
                </div>
                <div>
                </div>
        </article>

        <div class="comment hidden" id="reply-{{$val_nguoidung->id}}">
            <form class="flex flex-col" method="POST" action="{{route('post')}}">
                @csrf
                <textarea class="textarea is-primary" name="content" placeholder="BÌNH LUẬN"></textarea>
                <div class="">
                    <button class=" w-30 bg-blue-400 text-white mt-2 rounded-sm p-2" type="submit">Bình luận </button>
                </div>

            </form>
            <div>
                @foreach($reply as $key_reply => $val_reply)
                @if($val_nguoidung->id == $val_reply->reply_user_id)
                <div class="ml-2">
                    <article class="media bg-white mt-2">
                        <figure class="media-left ">
                            <p class="image is-64x64">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>{{$val_reply->name}}</strong>
                                    <br>
                                    {{$val_reply->content}}
                                    <br>
                                    <small><a>Like</a> · <a class="js-open-comment-reply" data-coment-reply="comtent-reply-{{$val_reply->id}}">Reply</a> . <a class="deleteButton" id="a-delete" class="a-delete">Thu hồi</a></small>
                                </p>
                            </div>
                            <div>
                            </div>
                    </article>
                    <div class="comment hidden" id="comtent-reply-{{$val_reply->id}}">
                        <form class="flex flex-col" method="POST" action="{{route('post')}}">
                            @csrf
                            <textarea class="textarea is-primary" name="content" placeholder="BÌNH LUẬN"></textarea>
                            <div class="">
                                <button class=" w-30 bg-blue-400 text-white mt-2 rounded-sm p-2" type="submit">Bình luận </button>
                            </div>

                        </form>
                    </div>

                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</article>
<script src="{{asset('js/comment.js')}}"></script>
<script>
    $('.js-open-comment').click(function() {
        $('#' + $(this).data('reply')).toggleClass('hidden');
    })
    $('.js-open-comment-reply').click(function() {
        $('#' + $(this).data('coment-reply')).toggleClass('hidden');
    });
    $(document).ready(function() {
        
        $(".deleteButton").click(function() {
            var deleteId = $(this).data("delete");

            Swal.fire({
                title: "bạn có muốn thu hôi không ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu AJAX để xóa dữ liệu từ máy chủ
                    $.ajax({
                        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
                        url: "comment/" + deleteId,
                        method: "DELETE",

                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "dã thu hồi",
                                icon: "success"
                            });
                            location.reload();
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error!",
                                text: "không thể thu hồi",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    });
</script>