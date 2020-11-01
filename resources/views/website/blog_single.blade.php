@extends('website.layout')
@section('content')

<div class="bg-gray-100">
    <article class="mx-auto py-16 p-4 prose prose-sm sm:prose">
        <h1 class="title-font text-3xl font-medium text-gray-900 mb-3">{{ isset($blog->title[$locale]) ? $blog->title[$locale] : '' }}</h1>

        @if(!empty($blog->youtube_url))
        <iframe width="560" height="315" src="{{$blog->youtube_url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @else
        <img src="{{ $blog->image ? $blog->image['file_path'] : '' }}" alt="blog" class="w-full" />
        @endif {{--
        <h5 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1 mt-3">CATEGORY</h5>
        --}}

        <div class="summernote-content">{!! isset($blog->body[$locale]) ? $blog->body[$locale] : '' !!}</div>

        @if(count($blog->images))
        <div class="pictures mt-5 flex flex-wrap w">
            @foreach($blog->images as $img)
            <div class="pic">
                <img src="{{ $img['file_path'] }}" alt="" style="width: 260px; height: 200px; object-fit: cover; margin: 0; border: 2px solid #f7f7f7;" />
            </div>
            @endforeach
        </div>
        @endif
    </article>
</div>




	@include('website.partials.brands')

    @include('website.partials.footer')
@endsection