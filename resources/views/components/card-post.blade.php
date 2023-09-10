@props(['post'])

<article class="mb-8 bg-gray-800 shadow-lg rounded-lg overflow-hidden">
    <img
        src="{{ Storage::url('posts/' . $post->image->url) }}"
        alt="{{ $post->name }}"
        class="w-full h-72 object-cover object-center"
    />

    <div class="px-6 py-4">
        <h2 class="font-bold text-xl mb-2 text-gray-300">
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->name }}
            </a>
        </h2>

        <div class="text-gray-400 text-base">
            {{ $post->extract }}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a
                href="{{ route('posts.tag', $tag) }}"
                class="inline-block bg-gray-400 rounded-full px-3 py-1 text-sm mr-2"
            >
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</article>
