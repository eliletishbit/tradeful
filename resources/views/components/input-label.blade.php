@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>

