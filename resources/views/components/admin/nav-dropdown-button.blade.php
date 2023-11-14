@props(['name'])

<div x-data='{ $name : false }'>
    <li>
        <button
            @click="$name = ! $name"
            type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition
                                                duration-75 rounded-lg group hover:bg-gray-100"
            aria-controls="users"
            data-collapse-toggle="users"
        >
            <x-icons name="users"/>
            <span class="flex-1 ms-3 text-left whitespace-nowrap">{{ ucwords($name) }}</span>
            <x-icons name="down-arrow"/>
        </button>
        <ul x-show="$name" id="users" class="py-2 space-y-2" style="display: none;">
            {{ $slot }}
        </ul>
    </li>
</div>
