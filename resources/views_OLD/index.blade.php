@extends('layouts.app')

@section('content')

    <div class="col-md-8 blog-top-left-grid">
        <div class="left-blog">
            <div class="blog-left">

                @if (empty($articles))
                    <p>Извините. В этой категории ещё нет статей.</p>
                @endif

                @foreach ($articles as $article)
                    <div class="blog-left-left wow fadeInRight animated animated"
                         data-wow-delay=".5s">
                        <p>&nbsp;&nbsp; {{$article->created_at}} &nbsp;&nbsp;
                            <a href="#">Comments (10)</a>
                        </p>
                        <a href="{{ route('articleShow',['id'=>$article->id]) }}">
{{--                            @if (!empty($article))
                                <img src="uploads/{{ $article->file }}" alt="" align="middle"
                                     width="90%"/>
                            @endif--}}
                        </a>
                    </div>

                    <div class="blog-left-right wow fadeInRight animated animated"
                         data-wow-delay=".5s">
                        <a href="{{ route('articleShow',['id'=>$article->id]) }}">Phasellus ultrices
                            tellus eget ipsum ornare
                            molestie</a>

                        <p>{{ $article->description }}</p>

                    </div>
                    <div class="clearfix"></div>

                @endforeach

            </div>
        </div>
        <nav>
            <ul class="pagination wow fadeInRight animated animated" data-wow-delay=".5s">
                {{ $articles->links() }}
            </ul>
        </nav>
    </div>

@endsection


