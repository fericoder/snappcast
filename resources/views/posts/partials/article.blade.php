<div class="bloglist singlepost">
    <h1>{{ $post->title }}</h1>
    <div class="postmeta">
        <ul>
            <li><a href="{{ route('index.posts.category', $post->category->id) }}"><i
                            class="icon_folder-alt"></i> {{ $post->category->title }}</a></li>
            <li style="font-family: byekan"><i
                        class="icon_clock_alt"></i> {{ jdate($post->published_at)->format('%d %B %Y') }}
            </li>
            <li><a href="#"><i class="icon_pencil-edit"></i> {{ $post->user->fullName }}</a></li>
            <li><a style="font-family: byekan!important;" href="#"> <i style="float: right;"
                                                                       class="icon_comment_alt"></i>
                    &nbsp;{{ $post->commnetCount  }} نظر </a></li>
        </ul>
    </div>
    <!-- /post meta -->
    <div class="post-content">
        <div class="dropcaps">
            <p>
                @if(strlen($post->images['755,504']) > 10)
                    <img style="width: 100%; text-align: center"
                         src="{{ $post->images['755,504'] }}" alt="{{ $post->title }}">
                @endif

                {!! $post->body !!}
            </p>
        </div>


        @include('layouts.partials.donwload')
    </div>
    <!-- /post -->
</div>
<!-- /single-post -->
