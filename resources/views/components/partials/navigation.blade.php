<ul>
    <li><a class="{{request()->routeIs('Home') ? 'text-green-400': 'text-gray-700'}}" href="{{route('Home')}}">Home</a></li>
    <li><a class="{{request()->routeIs('contact')?'text-green-400':'text-gray-700'}}" href="{{route('contact')}}">Contacto</a></li>
    <li><a class="{{request()->routeIs('posts.*')?'text-green-400':'text-gray-700'}}" href="{{route('posts.index')}}">Blog</a></li>
    <li><a class="{{request()->routeIs('about')?'text-green-400':'text-gray-700'}}" href="{{route('about')}}">Nosotros</a></li>
</ul>
