@foreach($comments as $comment)
<div class="flex flex-col">
    <div class="border rounded-md p-3 my-3">
        <div class="flex gap-3 items-center">

            <h3 class="font-bold">
                {{ $comment->user->name }}
            </h3>
        </div>

        <p class="text-gray-600 mt-2">
            {{ $comment->body }}
        </p>

    </div>
</div>
@endforeach