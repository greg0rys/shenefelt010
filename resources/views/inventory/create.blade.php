@extends('layouts.app')

@section('title', 'Create Inventory Item')

@section('content')
    <div class="container" style="max-width: 900px;">
        <nav aria-label="breadcrumb">
            <ul>
                <li><a href="{{ route('items.index') }}">Inventory</a></li>
                <li>Create New Item</li>
            </ul>
        </nav>

        <hgroup style="margin-bottom: 2rem;">
            <h1>Add New Asset</h1>
            <p>Enter full details for the new inventory item.</p>
        </hgroup>

        @if ($errors->any())
            <article style="background-color: #fff0f0; border: 1px solid #ffcdd2; color: #c62828; padding: 1rem;">
                <strong>Validation Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </article>
        @endif

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <fieldset>
                <legend><strong>1. Identification</strong></legend>
                <div class="grid">
                    <label>
                        Asset Number <span style="color: red;">*</span>
                        <input type="text" name="asset_number" value="{{ old('asset_number') }}" placeholder="e.g. A-1001" required>
                    </label>
                    <label>
                        Serial Number
                        <input type="text" name="serial_number" value="{{ old('serial_number') }}" placeholder="Manufacturer Serial">
                    </label>
                </div>

                <div class="grid">
                    <label>
                        Model Name <span style="color: red;">*</span>
                        <input type="text" name="model" value="{{ old('model') }}" required>
                    </label>
                    <label>
                        Device Type <span style="color: red;">*</span>
                        <select name="device_type" required>
                            <option value="" disabled selected>Select Type...</option>
                            <option value="Laptop" {{ old('device_type') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                            <option value="Desktop" {{ old('device_type') == 'Desktop' ? 'selected' : '' }}>Desktop</option>
                            <option value="Phone" {{ old('device_type') == 'Phone' ? 'selected' : '' }}>Phone</option>
                            <option value="Tablet" {{ old('device_type') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                            <option value="Monitor" {{ old('device_type') == 'Monitor' ? 'selected' : '' }}>Monitor</option>
                            <option value="Printer" {{ old('device_type') == 'Printer' ? 'selected' : '' }}>Printer</option>
                            <option value="Other" {{ old('device_type') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </label>
                </div>
            </fieldset>

            <hr>

            <fieldset>
                <legend><strong>2. Network & VoIP</strong></legend>
                <div class="grid">
                    <label>
                        MAC Address
                        <input type="text" name="mac_address" value="{{ old('mac_address') }}" placeholder="00:00:00:00:00:00">
                    </label>
                    <label>
                        IP Address
                        <input type="text" name="ip_address" value="{{ old('ip_address') }}" placeholder="192.168.x.x">
                    </label>
                </div>

                <div class="grid">
                    <label>
                        Phone Number
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}">
                    </label>
                    <label>
                        Extension
                        <input type="text" name="extension" value="{{ old('extension') }}">
                    </label>
                </div>
                <div class="grid">
                    <label>
                        SIP Server
                        <input type="text" name="sip_server_address" value="{{ old('sip_server_address') }}">
                    </label>
                    <label>
                        Default PIN
                        <input type="text" name="default_pin" value="{{ old('default_pin') }}">
                    </label>
                </div>
            </fieldset>

            <hr>

            <fieldset>
                <legend><strong>3. Status & Location</strong></legend>
                <div class="grid">
                    <label>
                        Status
                        <select name="status">
                            <option value="in_stock" {{ old('status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                            <option value="deployed" {{ old('status') == 'deployed' ? 'selected' : '' }}>Deployed</option>
                            <option value="repair" {{ old('status') == 'repair' ? 'selected' : '' }}>Out for Repair</option>
                            <option value="retired" {{ old('status') == 'retired' ? 'selected' : '' }}>Retired</option>
                        </select>
                    </label>
                    <label>
                        Ownership
                        <input type="text" name="ownership" value="{{ old('ownership') }}" placeholder="e.g. Purchased / Leased">
                    </label>
                </div>

                <div class="grid">
                    <label>
                        Client
                        <input type="text" name="client" value="{{ old('client') }}">
                    </label>
                    <label>
                        Location
                        <input type="text" name="location" value="{{ old('location') }}">
                    </label>
                </div>

                <label>
                    Deployment Reason
                    <textarea name="deployment_reason" rows="2">{{ old('deployment_reason') }}</textarea>
                </label>
            </fieldset>

            <hr>

            <fieldset>
                <legend><strong>4. Service & Support</strong></legend>
                <div class="grid">
                    <label>
                        Servicer Name
                        <input type="text" name="servicer_name" value="{{ old('servicer_name') }}">
                    </label>
                    <label>
                        Servicer Number
                        <input type="text" name="servicer_number" value="{{ old('servicer_number') }}">
                    </label>
                </div>

                <div class="grid">
                    <label>
                        Order Number
                        <input type="text" name="order_number" value="{{ old('order_number') }}">
                    </label>
                    <label>
                        Latest Ticket ID
                        <input type="text" name="latest_ticket_id" value="{{ old('latest_ticket_id') }}">
                    </label>
                </div>

                <label>
                    <input type="checkbox" name="is_under_contract" value="1" {{ old('is_under_contract') ? 'checked' : '' }}>
                    Is currently under contract?
                </label>
            </fieldset>

            <hr>

            <fieldset>
                <legend><strong>5. Additional Info</strong></legend>
                <label>
                    Description
                    <textarea name="description" rows="3">{{ old('description') }}</textarea>
                </label>
                <label>
                    Internal Notes
                    <textarea name="notes" rows="3">{{ old('notes') }}</textarea>
                </label>
            </fieldset>

            <div class="grid" style="margin-top: 2rem;">
                <button type="submit">Save Asset</button>
                <a href="{{ route('items.index') }}" role="button" class="secondary outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection
