@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-10">
        <h1 class="text-5xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-4 pb-10 leading-8 font-light">
        {{ $post->description }}
        
    </p>
</div>

<div class="w-4/5 m-auto text-left">
    <h3 class="font-bold">Display Comments</h3>
   
    @include('feedback.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
    
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="w-full px-3 my-2 pl-0">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="body" placeholder='Type Your Comment' required></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id }}">
            </div>

            <div class="w-full flex justify-end px-3">
                <input type='submit' class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value='Post Comment'>
            </div>
        </form>

</div>

@endsection 