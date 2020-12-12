{{ $activity->user->name === auth()->user()->name ? 'You' : $activity->user->name }}
created "{{ $activity->subject->body }}"
