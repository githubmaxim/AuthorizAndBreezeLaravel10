<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ForAdmin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Change role mechanism") }}

                    @foreach($data as $d)

{{--                        Если $data сформирован в ChangeRolesController через Eloquent--}}
{{--                        <div> "id: "{{ $d['id'] }} ", name: "{{ $d['name'] }} ", role: "{{ $d['role'] }}</div>  - если $data сформирован в ChangeRolesController через --}}

{{--                        Если $data сформирован в ChangeRolesController через SQL-запрос--}}
                        <div> <h1>id: <?php echo  $d->id; ?>, name: <?php echo  $d->name; ?>, role: <?php echo  $d->role; ?></h1> </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
