<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4"><br>
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2><strong><span>Nueva Categoria</span></strong></h2>
                            </div>
                            <div class="col">
                                <a href="/categories" wire:navigate class="btn btn-primary btn-sm float-end">Lista de
                                    categorias</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="saveCategory">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" wire:model="name" class="form-control" id="name" name="name"
                                    placeholder="Ingresar bodega">
                                @error('name')
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
