@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Add feedback
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-2/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 pl-4">
                    {{ $error }}
                </li>
            @endforeach
            
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/feedback"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <select
            name="category" id="category"
            class="bg-transparent blockd w-full h-20 text-xl outline-none">
            <option value="">Select Category</option>
            <option value="Bug Report">Bug Report</option>
            <option value="Feature Request">Feature Request</option>
            <option value="Improvement">Improvement</option>
        </select>    

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit feedback
        </button>
    </form>
</div>

@endsection