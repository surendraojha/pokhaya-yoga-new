<div class="page-banner"
     style="background: url('{{ $image}}') center/cover no-repeat;">

    <div class="overlay">
        <div class="container text-center">
            <h1>{{ $title }}</h1>

            <ul class="breadcrumb justify-content-center">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li>{{ $title }}</li>
            </ul>
        </div>
    </div>
</div>
