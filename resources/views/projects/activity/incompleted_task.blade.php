{{ $activity->user->name === auth()->user()->name ? 'You' : $activity->user->name }}
incompleted "{{ $activity->subject->body }}"
