<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class=" bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-blend-soft-light bg-no-repeat bg-cover bg-center bg-fixed min-h-screen  bg-gray-100">

        <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            
            <div>number of users or admins in the app : {{ $statistics["users"] }}</div>
            <div>number of folders group by status :{{ $statistics["folders"] }}</div>
            <div>number of comments grouped by their status :{{ $statistics["comments"] }}</div>
            <div>number of appointments :{{ $statistics["appointments"] }}</div>
        </div>
        <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            @forelse($comments as $comment)
            <div>This is how to get the folder data</div>
            <div>{{ $comment->comment }}</div>
            <div>{{ $comment->folder->id }}</div>
            @empty
            <div> Il n'y a pas des urgents commentaires pour le moment.</div>
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            @forelse($appointments as $appointment)
            <div>This is how to get the folder data</div>
            <div>{{ $appointment->date }}</div>
            <div>{{ $appointment->folder->id }}</div>
            @empty
            <div> Il n'y a pas des rendez-vous.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
