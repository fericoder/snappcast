<style>
    .modal-backdrop {
        z-index: -1;
    }

</style>

@foreach ($comments->where('approved', '1')->where('parent_id', '0') as $comment)
<!--begin::Modal-->
<div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">پاسخ به نظر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/comment/answer" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="message-text" class="form-control-label iranyekan">متن پاسخ:</label>
                        <textarea class="form-control iranyekan" name="comment" id="comment"></textarea>
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                        <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ثبت</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->
@endforeach


<div id="comments">
    <h5>نظرات کاربران اسنپ کست:</h5>
    <ul>

        @foreach ($comments->where('approved', '1')->where('parent_id', '0') as $comment)
            <li>
                <div class="avatar">
                    <img src="{{ $comment->user->avatar }}" alt="">
                </div>
                <div class="comment_right clearfix">
                    <div class="comment_info">
                        {{ $comment->user->fullName }}<span>|</span><span
                                style="font-family: byekan">{{ jdate($comment->created_at)->ago() }}</span><span>|</span>
                        <a href="#">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m_modal_{{ $comment->id }}" >پاسخ</button>
                        </a>
                    </div>
                    <p>
                        {{ $comment->comment}}
                    </p>
                </div>

                @foreach ($comments->where('approved', '1')->where('parent_id', $comment->id) as $answer)
                    <ul class="replied-to">
                        <li>
                            <div class="avatar">
                                <img src="{{ $answer->user->avatar }}" alt="">
                            </div>
                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    {{ $answer->user->fullName }}<span>|</span><span
                                            style="font-family: byekan">{{ jdate($comment->created_at)->ago() }}</span><span>|</span>

                                </div>
                                <p>
                                    {{ $answer->comment }}
                                </p>
                            </div>

                        </li>
                    </ul>
                @endforeach
            </li>
        @endforeach

    </ul>
</div>

<hr>

<h5>نظر خود را ثبت کنید:</h5><br>
@auth
    @include('layouts.partials.error')
    <form method="post" action="/comment">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="comment" id="comment" rows="6"
                      placeholder="متن نظر را وارد نمایید"></textarea>
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
        </div>
        <div class="form-group">
            <button type="submit" id="submit2" class="btn_1 rounded add_bottom_30"> ثبت نظر</button>
        </div>
    </form>

@endauth

@guest()
    <a href="{{ route('login')  }}">
        <div class="alert alert-danger">جهت ثبت نظر درسایت باید وارد شوید‌. برای ورود یا عضویت اینجا
            کلیک کنید.
        </div>
    </a>
@endguest

