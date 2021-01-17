@if ($errors->any())
    <div style="font-family: byekan; color: white!important;" class="alert alert-danger">
        <ul style="font-family: byekan;color: white!important;" >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
