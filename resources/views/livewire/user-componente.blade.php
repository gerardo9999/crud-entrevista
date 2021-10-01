<div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">GESTIÓN DE USUARIOS</h4>
            <div class="row">
                <div class="col-9">

                    <form action="" method="get">
                        <div class="input-group mb-3">

                            <input value="" wire:model='txtBuscar' name="txtBuscar" type="text" class="form-control"
                                placeholder="Ingrese la información a buscar">
                            <select name="opcionBuscar" wire:model="opcionBuscar" class="form-control">
                                <option value="nombre">Nombre</option>
                                <option value="name">Name</option>
                            </select>
                            <div class="input-group-append">
                                <button disabled type="submit" id="btnBuscar" class="btn btn-primary"><span
                                        class="ti-search"></span> Buscar</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-3">

                    <div class="input-group mb-3 d-flex justify-content-end">
                        <div class="input-group-append">
                            <!-- Button trigger modal -->
                            <button type="button" wire:click='showAgregar' class="btn btn-primary btn-lg"
                                data-toggle="modal" data-target="#modalForm">
                                Agregar
                            </button>

                            <!-- Modal -->
                            <div wire:ignore.self class="modal fade" id="modalForm" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $titleModal }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input value="{{ old('name') }}" wire:model='name' type="text"
                                                        class="form-control" id="name" name="name"
                                                        aria-describedby="emailHelp" placeholder="Ingrese name">
                                                    @error('name')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input wire:model='email' value="{{ old('email') }}" type="email"
                                                        class="form-control" id="email" name="email"
                                                        aria-describedby="emailHelp" placeholder="Ingrese email">

                                                    @error('email')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input value="{{ old('password') }}" wire:model='password'
                                                        type="password" class="form-control" id="password"
                                                        name="password" aria-describedby="emailHelp"
                                                        placeholder="Ingrese password">
                                                    @error('password')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nombre</label>
                                                    <input value="{{ old('nombre') }}" wire:model='nombre' type="text"
                                                        class="form-control" id="nombre" name="nombre"
                                                        aria-describedby="emailHelp" placeholder="Ingrese nombre">
                                                    @error('nombre')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Apellidos</label>
                                                    <input wire:model='apellidos' value="{{ old('apellidos') }}"
                                                        type="text" class="form-control" id="apellidos"
                                                        name="apellidos" aria-describedby="emailHelp"
                                                        placeholder="Ingrese apellidos">
                                                    @error('apellidos')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Telefono</label>
                                                    <input wire:model='telefono' value="{{ old('telefono') }}"
                                                        type="number" class="form-control" id="telefono"
                                                        name="telefono" aria-describedby="emailHelp"
                                                        placeholder="Ingrese telefono">
                                                    @error('telefono')
                                                        <span class="text-danger">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button> --}}

                                            <button type="button" wire:click='AgregarActualizar'
                                                class="btn btn-primary mt-4 pr-4 pl-4">Guardar</button>
                                            <a href="#" class="btn btn-danger mt-4 pr-4 pl-4">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="single-table">

                <div class="table-responsive">

                    <table class="table table-hover table-bordered progress-table text-center">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>nombre</th>
                                <th>apellidos</th>
                                <th>telefono</th>
                                <th>estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellidos }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                    <td>
                                        @if ($usuario->estado)
                                            <span class="badge badge-success">Activado</span>
                                        @else
                                            <span class="badge badge-danger">Desactivado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" wire:click='eliminar({{ $usuario->id }})'
                                            class="btn btn-danger btn-sm">
                                            <i class="ti-trash">Delete</i>
                                        </button>
                                        <button type="button" wire:click='cargarItem({{ $usuario->id }})'
                                            data-toggle="modal" data-target="#modalForm" class="btn btn-success btn-sm">
                                            <i class="ti-pencil">Update</i>
                                        </button>
                                        @if ($usuario->estado)
                                            <button type="button" wire:click='desActivar({{ $usuario->id }})'
                                                class="btn btn-sm btn-warning btn-sm">
                                                <i class="ti-trash">Inactive</i>
                                            </button>
                                        @else
                                            <button type="button" wire:click='activar({{ $usuario->id }})'
                                                class="btn btn-sm btn-info btn-sm">
                                                <i class="ti-trash">Active</i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>

            </div>
        </div>

        @include('components.flash',["message" => $alerta,"alerta"=>$type])
       
        @if(count($usuarios)===0 || is_null($usuarios))
            @include('components.flash',["message" => "No se encontraron resuldatos","alerta"=>"alert-secondary"])
        @endif
    </div>
</div>
