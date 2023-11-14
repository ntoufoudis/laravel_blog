<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <header class="text-3xl font-semibold px-2 py-3 border-b border-gray-200">
        <h1>All Users</h1>
    </header>
    <x-admin.table.table>
        <x-slot name="head">
            <x-admin.table.table-head name="email"/>
            <x-admin.table.table-head name="full name"/>
            <x-admin.table.table-head name="role"/>
            <x-admin.table.table-head/>
            <x-admin.table.table-head/>
        </x-slot>
        @foreach($users as $user)
            <x-admin.table.table-row>
                <x-admin.table.table-data class="font-medium text-gray-900 whitespace-nowrap">
                    {{ $user->email }}
                </x-admin.table.table-data>
                <x-admin.table.table-data>Vasileios Ntoufoudis</x-admin.table.table-data>
                <x-admin.table.table-data>Admin</x-admin.table.table-data>
                <x-admin.table.table-data class="py-2">
                    <x-admin.edit-button>{{ __('Edit') }}</x-admin.edit-button>
                </x-admin.table.table-data>
                <x-admin.table.table-data class="py-2">
                    <x-admin.danger-button>
                        {{ __('Delete') }}
                    </x-admin.danger-button>
                </x-admin.table.table-data>
            </x-admin.table.table-row>
        @endforeach
    </x-admin.table.table>
    <div class="m-2">
        {{ $users->links() }}
    </div>
</div>
