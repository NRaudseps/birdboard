{{ $activity->user->name === auth()->user()->name ? 'You' : $activity->user->name }} created the project
