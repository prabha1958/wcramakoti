@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-bold text-sm text-theme-d2']) }}>
    {{ $value ?? $slot }}
</label>
