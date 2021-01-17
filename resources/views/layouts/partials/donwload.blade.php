
@if ($post->attachment)
    <br><br><table style="background-color: #F7F9FA; color: #777; font-family: byekan" class="table table-hover">
        <tbody>
        <tr>
            <td>نوع فایل:</td>
            <td>
                <?php
                $exploded = explode('.', $post->attachment);
                echo end($exploded);
                ?>

            </td>
        </tr>
        <tr>
            <td>حجم فایل:</td>
            <td>{{ number_format(filesize(public_path($post->attachment)) / 1048576, 2)  }} مگابایت</td>
        </tr>
        <tr>
            <td>ایجاد کننده:</td>
            <td>{{ $post->user->fullName }}</td>
        </tr>
        <tr>
            <td>تاریخ انتشار:</td>
            <td>{{ jdate($post->published_at)->format('%d %B %Y') }}</td>
        </tr>
        <tr>
            <td>دسته بندی:</td>
            <td>{{ $post->category->title }}</td>
        </tr>
        <tr>
            <td>تعداد بازدید:</td>
            <td> {{ $post->viewCount }} بازدید</td>
        </tr>

        </tbody>
    </table>
    @auth

        <div class="alert alert-success">
            <h6 style="font-family: iranyekan">لینک دانلود</h6>
            <p>رمز فایل: <span style="font-family: Arial">snappcast.ir</span></p>
            <a class="text-danger" style="font-size: 17px" href="{{ $post->attachment }}"><p>
                    دانلود فایل</p></a>
        </div>
    @endauth

    @guest()
        <div class="alert alert-success">
            <h6>لینک دانلود</h6>
            <p>رمز فایل: <span style="font-family: Arial">snappcast.ir</span></p>
            <a href="{{ route('login')  }}">
                <div class="alert alert-danger">جهت دریافت فایل باید وارد شوید‌. برای ورود یا عضویت اینجا
                    کلیک کنید.
                </div>
            </a>
        </div>

    @endguest

@endif