@props(['disabled' => false])

<input 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge([
        'class' => 
            'w-full border border-gray-300 rounded-md shadow-sm ' .
            'focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 ' .
            'transition duration-150 ease-in-out bg-white text-gray-900'
    ]) !!}
/>
