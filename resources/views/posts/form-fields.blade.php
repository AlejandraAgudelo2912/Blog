<div>
    <x-input-label for="title" :value="__('Title')"></x-input-label>
    <x-text-input id="title"
                  name="title"
                  type="text"
                  value="{{old('title',$post->title)}}"
                  class="w-full mt-1"
    />
    <x-input-error :messages="$errors->get('title')"></x-input-error>
</div>
<div>
    <x-input-label for="body" :value="__('Body')" ></x-input-label>
    <x-textarea id="body" name="body" class="w-full mt-1">{{old('body',$post->body)}}</x-textarea>
    <x-input-error :messages="$errors->get('body')"></x-input-error>

</div>
