@props(['name'])
<li>
    <a {{ $attributes(['class' => 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group']) }}>
        <x-icons name="{{ $name }}"/>
        <span class="ms-3">{{ ucwords($name) }}</span>
    </a>
</li>
