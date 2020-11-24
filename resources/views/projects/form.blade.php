@csrf

<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Title</label>

    <div class="control">
        <input
            type="text"
            class="input bg-transparent border border-gray-400 rounded p-2 text-xs w-full"
            name="title"
            placeholder="Title"
            value="{{ $project->title }}"
            required>
    </div>
</div>


<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block ">Description</label>

    <div class="control">
                <textarea
                    name="description"
                    rows="10"
                    class="textarea bg-transparent border border-gray-400 rounded p-2 text-xs w-full"
                    placeholder="I should start learning the piano."
                    required>{{ $project->description }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <button
            type="submit"
            class="text-white no-underline shadow-md rounded-lg text-sm py-2 px-5 mr-2"
            style="background-color: #47cdff;">{{ $buttonText }}
        </button>
        <a href="{{ $project->path() }}">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach($errors->all() as $error)
            <li class="text-sm text-red-400">{{ $error }}</li>
        @endforeach
    </div>
@endif
