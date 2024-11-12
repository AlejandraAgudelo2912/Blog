<div>
    <x-input-label for="title" :value="__('Title')"></x-input-label>
    <x-text-input id="title"
                  name="title"
                  type="text"
                  value="{{old('title',$post->title)}}"
                  class="block w-full mt-1"
    />
    <x-input-error :messages="$errors->get('title')" class="mt-2"></x-input-error>
</div>
<div>
    <x-input-label for="body" :value="__('Body')" class="mt-2"></x-input-label>
    <x-textarea id="body" name="body" class="block w-full mt-1">{{old('body',$post->body)}}</x-textarea>
    <x-input-error :messages="$errors->get('body')"></x-input-error>
</div>
<div>
    <x-input-label for="publish_at" :value="__('Publish at')" class="mt-2"></x-input-label>
    <input type="date" id="publish_at" name="publish_at" class="block w-full mt-1" value="{{old('publish_at',$post->publish_at)}}"></input>
    <x-input-error :messages="$errors->get('publish_at')"></x-input-error>
</div>

<div class="mt-4">
    <x-input-label for="category_id" :value="__('Category')"></x-input-label>
    <select id="category_id" name="category_id" class="block w-full mt-1">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2"></x-input-error>
</div>

<div class="mt-4">
    <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ __('Create New Category') }}
    </a>
</div>
