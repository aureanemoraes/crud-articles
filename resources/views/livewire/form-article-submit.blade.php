
<form wire:submit.prevent="save">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                class="form-control @error('title') is-invalid @enderror" 
                id="title" 
                wire:model="title"
                placeholder="#"
            />
            <label for="title">Title</label>

            @error('title') 
                <div id="invalidTitle" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea 
                class="form-control @error('body') is-invalid @enderror" 
                id="body"
                placeholder="#"
                wire:model="body"
                style="height: 100%"
            ></textarea>
            <label for="body">Body</label>

            @error('body') 
                <div id="invalidBody" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
</form>
