<x-layout meta-title="Blog" meta-description="Descripcion de la pagina del blog">
    <h1>Blog</h1>
    @foreach($posts as $posts)
        <h2>{{$posts['tittle']}}</h2>
    @endforeach
</x-layout>
