<aside class="col-lg-3">


    <div class="widget">
        <div class="widget-title">
            <h4>آخرین ارسال ها</h4>
        </div>
        <ul class="comments-list">
            @foreach ($recentPosts as $recentPost)
                <li>
                    <div class="alignleft">
                        <a href="{{ route('posts.show',[$recentPost->id,$recentPost->slug]) }}"><img src="{{ $recentPost->images['120,80'] }}" alt="{{ $recentPost->title }}"></a>
                    </div>
                    <small>{{ jdate($recentPost->published_at)->ago() }}</small>
<<<<<<< HEAD
                    <h3><a href="{{ route('posts.show',[$recentPost->id,$recentPost->slug]) }}" title="">{{ \Illuminate\Support\Str::limit($recentPost->title, 50) }}</a></h3>
=======
                    <h3><a href="/posts/{{ $recentPost->slug }}" title="">{{ \Illuminate\Support\Str::limit($recentPost->title, 50) }}</a></h3>
>>>>>>> 24233b1bbc51ce687b261097bb38f1a252381419
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /widget -->
    <div style="width: 330px" class="widget">
        <div class="widget-title">
            <h4>دسته بندی ها</h4>
        </div>
        <ul class="cats">
            @foreach ($categories->where('parent_id', '>', "0") as $category)
                <li><a href="/category/{{ $category->id }}"> -  {{  $category->parent_id === 0 ? "اصلی" : $category->parent->title }} > {{ $category->title }} </a></li>
            @endforeach
        </ul>
    </div>
    <!-- /widget -->
    <div style="display: none" class="widget">
        <div class="widget-title">
            <h4>تگ ها</h4>
        </div>
        <div class="tags">
            <a href="#">چابک</a>
        </div>
    </div>
    <!-- /widget -->
</aside>
<!-- /aside -->