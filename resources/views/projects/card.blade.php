<div class="bg-white rounded-lg p-5 shadow" style="height: 200px">
    <div
        class="text-xl font-normal py-4 -ml-5 border-l-4 pl-4 mb-3"
        style="border-color: #8ae2fe"
    >
        <a href="{{ $project->path() }}">{{ $project->title }}</a>
    </div>

    <div class="text-gray-400">{{ Str::limit($project->description, 100) }}</div>
</div>
