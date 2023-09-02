<x-app-layout>
    <article class="custom-container py-8">
        <h1 class="text-4xl font-bold text-gray-300">
            {{ $post->name }}
        </h1>

        <p class="text-lg text-gray-200 my-4">
            {{ $post->extract }}
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <section class="lg:col-span-2">
                <figure>
                    <img
                        src="{{ Storage::url('posts/' . $post->image->url) }}"
                        alt="{{ $post->name }}"
                        class="w-full h-80 object-cover object-center"
                    />
                </figure>

                <p class="text-base text-gray-200 my-4 text-justify">
                    {{ $post->body }}
                </p>
            </section>

            <aside>
                <h2 class="text-2xl font-bold text-gray-300 mb-4">
                    Más en {{ $post->category->name }}
                </h2>

                <ul>
                    @foreach ($similar as $item)
                        <li class="mb-4">
                            <a
                                href="{{ route('posts.show', $item) }}"
                                class="flex"
                            >
                                <img
                                    src="{{ Storage::url('posts/' . $item->image->url) }}"
                                    alt="{{ $item->name }}"
                                    class="h-20 object-cover object-center"
                                />

                                <span class="ml-2 text-gray-200">
                                    {{ $item->name }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </article>
</x-app-layout>
