<div>
    <h1>Maps</h1>
    <div id="map" wire:ignore style="height: 500px; width: 100%;"></div>
    <div>
        <livewire:map-form />
    </div>
</div>

@push('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" defer></script>
    <script src="js/map.js"></script>
@endpush

