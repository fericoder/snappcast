@if ($errors->any())
<div style="direction: rtl; text-align: right; font-family: iranyekan; " class="alert alert-danger">
    <ul  >
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
