<div style="display: flex; padding:20px;">
    <div class="form-content form-items">
        <form wire:submit.prevent="save" style="width:300px; padding: 1rem 1rem; background-color: #4a5568; border: 5px white; border-radius: 5px;">
            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" id="lat" name="lat"  placeholder="Latitude" wire:model="lat">
                @error('lat') <span class="text-danger" style="min-width: 300px;">{{ $message }}</span> @enderror
            </div>
            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" wire:model="lng">
                @error('lng') <span class="text-danger" style="min-width: 300px;">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block confirm-button px-5 mt-3 mb-3">Submit</button>
        </form>
    </div>
    <div style="margin-left: 20px;">
        <h3>Add Marker</h3>
        <p>The marker will be added to the map for one minute</p>
    </div>
</div>

