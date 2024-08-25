<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='created_projects'>
    <h1>作成したプロジェクト</h1>
        @foreach ($created_projects as $created_project)
            <div class='project'>
                <h2 class='name'>
                    <a href="/projects/{{ $created_project->id }}/record">{{ $created_project->name }}</a>
                </h2>
            </div>
        @endforeach
    </div>
    
    
    <div class='created_projects'>
    <h1>閲覧したプロジェクト</h1>
        @foreach ($watched_projects as $watched_project)
            <div class='project'>
                <h2 class='name'>
                    <a href="/projects/{{ $watched_project->id }}/record">{{ $watched_project->name }}</a>
                </h2>
            </div>
        @endforeach
    </div>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
