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
    <x-input-label for="publish_at" :value="__('publish_at')" class="mt-2"></x-input-label>
    <input type="date" id="publish_at" name="publish_at" class="block w-full mt-1" value="{{old('publish_at',$post->publish_at)}}"></input>
    <x-input-error :messages="$errors->get('publish_at')"></x-input-error>
</div>
