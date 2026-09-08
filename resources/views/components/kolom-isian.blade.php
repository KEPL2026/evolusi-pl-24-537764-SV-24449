@props([
    'nama',
    'label',
    'tipe' => 'text',
    'nilai' => null,
    'autocomplete' => null,
])

<div>
    <label for="{{ $nama }}" class="block text-sm text-neutral-900">{{ $label }}</label>

    <input
        id="{{ $nama }}"
        name="{{ $nama }}"
        type="{{ $tipe }}"
        value="{{ old($nama, $nilai) }}"
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        required
        {{ $attributes->class([
            'mt-2 w-full border px-3 py-2 text-sm focus:outline-none',
            'border-neutral-300 focus:border-neutral-900' => ! $errors->has($nama),
            'border-red-500' => $errors->has($nama),
        ]) }}>

    @error($nama)
        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
