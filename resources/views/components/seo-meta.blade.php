 @if ($title)
     <title>{{ $title }}</title>
     <meta name="title" content="{{ $title }}">
 @endif

 @if ($keyword)
     <meta name="keyword" content="{{ $keyword }}">
 @endif

 @if ($description)
     <meta name="description" content="{{ $description }}">
 @endif

 <meta property="og:url" content="{{ url()->current() }}">

 <link rel="canonical" href="{{ url()->current() }}" />

 <meta property="og:type" content="Pokhara Yoga School">
