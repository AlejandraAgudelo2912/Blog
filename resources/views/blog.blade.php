<x-layout meta-title="Blog" meta-description="Descripcion de la pagina del blog">
    <h1>Blog</h1>
    @foreach($posts as $posts)
        <h2><a href="/blog/{{$posts->id}}">{{$posts->title}}</a></h2>
    @endforeach
</x-layout>
