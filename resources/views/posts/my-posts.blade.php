<x-blog-layout meta-title="Blog" meta-description="Descripcion de la pagina del blog">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-5 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            Blog
        </h1>

        @auth
            <div class="flex items-center justify-center">
                <a
                    href="{{ route('posts.create') }}"
                    class="group rounded-full bg-sky-600 p-2 text-sky-100 shadow-lg duration-300 hover:bg-sky-700 active:bg-sky-800"
                >
                    <svg
                        class="h-6 w-6 duration-300 group-hover:rotate-12"
                        data-slot="icon"
                        fill="none"
                        stroke-width="1.5"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15"
                        ></path>
                    </svg>
                </a>
            </div>
        @endauth
        <div
            class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3"
        >
            @foreach($posts as $post)
                <article
                    class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900"
                >

                    <div class="flex-1 space-y-3 p-5">

                        <h2
                            class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200"
                        >
                            <a class="hover:underline" href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p
                            class="hidden text-slate-500 dark:text-slate-400 md:block"
                        >
                            {{ $post->body }}
                        </p>
                        <p
                            class="hidden text-slate-500 dark:text-slate-400 md:block"
                        >
                            {{ $post->publish_at }}
                        </p>
                        <div>
                            <img
                                class="h-6 w-6 rounded-full float-left mr-3"
                                src="https://ui-avatars.com/api?name={{$post->user->name}}+{{$post->user->last_name}}"
                                alt="Jorge Garcia"
                            />
                            <p
                                class="hidden text-slate-500 dark:text-slate-400 md:block"
                            >
                                {{ $post->user->name }}
                            </p>
                        </div>
                    </div>

                </article>
            @endforeach

        </div>

        <div class="mt-3 ">
            {{ $posts->links() }}
        </div>

    </div>
</x-blog-layout>

