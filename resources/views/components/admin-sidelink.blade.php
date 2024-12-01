<a 
    href="{{ $href }}" 
    class="flex items-center p-2 text-base font-medium rounded-lg group
        {{ $active ? 'text-gray-900 bg-gray-100 dark:text-white dark:hover:bg-gray-700' : 'text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700' }}"
>
    <img 
        src="{{ $icon }}" 
        alt="{{ $alt }}" 
        class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
    />
    <span class="ml-3">{{ $slot }}</span>
</a>
