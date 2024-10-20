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
                    {{ __("You're authorized!") }}
                </div>

                {{--       А так можно разрешать/запрещать не всю страницу, а только отдельные куски страницы для авторизированных/не авторизированных пользователей--}}
{{--                                @can('viewProtectedPart')--}}
{{--                                @can('view-protected-part')--}}
{{--                                <div class="p-6 text-gray-900">--}}
{{--                                    {{ __("You're name Name!") }}--}}
{{--                                </div>--}}
{{--                                @endcan--}}
{{--                                @cannot('view-protected-part')--}}
{{--                                <div class="p-6 text-gray-900">--}}
{{--                                    {{ __("You're name NOT Name!") }}--}}
{{--                                </div>--}}
{{--                                @endcannot--}}

            </div>
        </div>
    </div>
</x-app-layout>
