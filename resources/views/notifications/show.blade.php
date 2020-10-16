@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @forelse($notifications as $notification)
        <li>
            @if($notification->type == 'App\Notifications\PeymentNotify')
            We have receive a payment of ${{$notification->data['amount'] /100}} from you.
            @endif
        </li>
        @empty
        <li>You have no unread notifications in this time.</li>
        @endforelse
    </ul>
</div>
@endsection
