<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        العنوان
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="title" name="title" value="{{ $project->title ?? '' }}" type="text">
        @error('title')
        <div class="text-red-600">
            {{$message}}
        </div>
        @enderror
</div>
<div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
        الوصف
    </label>
    <textarea
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="description" name="description">{{ $project->description ?? '' }}</textarea>
                @error('description')
        <div class="text-red-600">
            {{$message}}
        </div>
        @enderror
</div>
