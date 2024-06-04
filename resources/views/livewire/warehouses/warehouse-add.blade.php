
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4"><br>
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2><strong><span>Nueva Bodega</span></strong></h2>
                            </div>
                            <div class="col">
                                <a href="{{ route('categories') }}" class="btn btn-primary btn-sm float-end">Lista de bodegas</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="saveWarehouse">
                            {{-- saveWarehouse is the function that will save our car to database. let's create this --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" wire:model="name" class="form-control" id="name" name="name" placeholder="Ingresar bodega">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <input type="text" wire:model="description" class="form-control" id="description" name="description" placeholder="Ingresar descripción">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

