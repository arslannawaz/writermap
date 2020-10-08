<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button rounded-lg bg-dark px-16 py-3 font-semibold text-white']) }}>
    {{ $slot }}
</button>
