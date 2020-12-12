{{ $activity->user->name === auth()->user()->name ? 'You' : $activity->user->name }}
completed "{{ $activity->subject->body }}"
