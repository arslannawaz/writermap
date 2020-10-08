@props(['value'])

<label {{ $attributes->merge(['class' => 'block form-label uppercase text-color-light']) }}>
    {{ $value ?? $slot }}
</label>
