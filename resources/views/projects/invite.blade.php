<div class="bg-white rounded-lg p-5 shadow mt-3">
    <div
        class="text-xl font-normal py-4 -ml-5 border-l-4 pl-4 mb-3"
        style="border-color: #8ae2fe"
    >
        Invite a User
    </div>

    <form action="{{ $project->path() . '/invitations' }}" method="post">
        @csrf

        <div class="mb-3">
            <input
                type="email"
                name="email"
                class="border border-gray-300 rounded w-full py-2 px-3"
                placeholder="Email Address"
            >
        </div>

        <button
            type="submit"
            class="text-xs text-white no-underline shadow-md rounded-lg text-sm py-2 px-5"
            style="background-color: #47cdff;"
        >
            Invite
        </button>
    </form>

    @include('errors', ['bag' => 'invitations'])
</div>
</div>
