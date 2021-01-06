@extends ('simplework-layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
			<h2>Articles</h2>
            <ul class="style1">
                @foreach ($articles as $index => $article)
                <li class="{{ $index === 0 ? 'first' : ''}}">
                    <h3><a href="/simplework/articles/{{ $article->id }}">{{ $article->title }}</a></h3>
                    <p>{{ $article->excerpt}}</p>
                </li>
                @endforeach
            </ul>
		</div>
    </div>
</div>

@endsection