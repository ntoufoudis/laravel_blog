@props(['name'])

<li>
    <a
        href="#"
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100"
    >
        {{ ucwords($name) }}
    </a>
</li>
