<div class="form-floating mb-3">
    <input
        class="form-control"
        id="full_name"
        name="full_name"
        type="text"
        value="{{ old('full_name', $customer->full_name) }}"
        placeholder=""
        maxlength="75"
        required
    >
    <label for="full_name">Nombre Completo</label>
    @error('full_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-floating mb-3">
    <input
        class="form-control"
        id="phone_number"
        name="phone_number"
        type="text"
        value="{{ old('phone_number', $customer->phone_number) }}"
        placeholder=""
        maxlength="30"
        required
    >
    <label for="phone_number">Teléfono</label>
    @error('phone_number')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-floating mb-3">
    <input
        class="form-control"
        id="email"
        name="email"
        type="email"
        value="{{ old('email', $customer->email) }}"
        placeholder=""
        maxlength="150"
        required
    >
    <label for="email">Email</label>
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-floating mb-3">
    <input
        class="form-control"
        id="dni_number"
        name="dni_number"
        type="text"
        value="{{ old('dni_number', $customer->dni_number) }}"
        placeholder=""
        maxlength="9"
        required
    >
    <label for="dni_number">DNI</label>
    @error('dni_number')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
@if(request()->routeIs('customers.edit'))
    <div class="mb-2">
        <small class="text-secondary">El cambio de fotos del DNI es opcional</small>
    </div>
@endif
<div class="input-group">
    <input
    class="form-control"
    id="dni_frontpic"
    name="dni_frontpic"
    type="file"
    required
>
    <label class="input-group-text" for="dni_frontpic">DNI Frente</label>
</div>
@error('dni_frontpic')
    <small class="text-danger">{{ $message }}</small>
@enderror
<div class="input-group mt-3">
    <input
    class="form-control"
    id="dni_backpic"
    name="dni_backpic"
    type="file"
    required
>
    <label class="input-group-text" for="dni_backpic">DNI Dorso</label>
</div>
@error('dni_backpic')
    <small class="text-danger">{{ $message }}</small>
@enderror