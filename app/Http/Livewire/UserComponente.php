<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserComponente extends Component
{

    public $txtBuscar;
    public $opcionBuscar = 'nombre';

    public $idUser;
    public $name;
    public $email;
    public $password;
    
    public $nombre;
    public $apellidos;
    public $telefono;


    public $isEdit = false;
    public $titleModal = "";
    public $success = false;

    public $alerta = null;
    public $type = null;

    public function render()
    {
        $txtBuscar = '%' . $this->txtBuscar . '%';
        $opcionBuscar = $this->opcionBuscar;

         $this->alerta = null;
         $this->type = null;

        return view('livewire.user-componente', [
            'usuarios' =>  User::
            where('users.'.$opcionBuscar,'LIKE','%'.$txtBuscar.'%')
            ->paginate(10)
        ]);
    }

    public function agregarUsuario()
    {

        $this->validate([
            "name"=>"required",
            "email"=>"required",
            "nombre"=>"required",
            "password"=>"required",
            "telefono"=>"required",
        ]);

        $objecto = new User();
        $objecto->name = $this->name;
        $objecto->email = $this->email;
        $objecto->password = Hash::make($this->password);
        $objecto->nombre = $this->nombre;
        $objecto->apellidos = $this->apellidos;
        $objecto->telefono = $this->telefono;
        $objecto->estado = 1;
        $objecto->save();

        $this->alerta = "Guardado correctamente";
        $this->type = "alert-info";
    }

    public function actualizarUsuario()
    {
        
        $this->validate([
            "name"=>"required",
            "email"=>"required",
            "nombre"=>"required",
            "password"=>"required",
            "telefono"=>"required",
        ]);
        
        $objecto = User::findOrFail($this->idUser);
        $objecto->name = $this->name;
        $objecto->email = $this->email;
        $objecto->password = Hash::make($this->password);
        $objecto->nombre = $this->nombre;
        $objecto->apellidos = $this->apellidos;
        $objecto->telefono = $this->telefono;
        $objecto->estado = 1;
        $objecto->update();

        $this->alerta = "Actualizado correctamente";
        $this->type = "alert-success";

    }


    public function eliminarUsuario($idUser)
    {
        $objecto = User::findOrFail($idUser);
        $objecto->delete();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "name"=>"required",
            "email"=>"required",
            "nombre"=>"required",
            "password"=>"required",
            "telefono"=>"required",
        ]);
    }

    public function cargarItem($id)
    {
        $this->titleModal = "Actualizar User";
        $usuario = User::findOrFail($id);
        $this->idUser =   $usuario->id;
        $this->name =   $usuario->name;
        $this->nombre =   $usuario->nombre;
        $this->apellidos =   $usuario->apellidos;
        $this->telefono =   $usuario->telefono;
        $this->email =   $usuario->email;
        $this->isEdit = true;
    }
    public function showAgregar()
    {
        $this->isEdit = false;
        $this->titleModal = "Agregar User";
        $this->resetUsuario();
    }
    public function resetUsuario()
    {
        $this->idUser = null;
        $this->idUser =   null;
        $this->name =   null;
        $this->password =   null;
        $this->nombre =   null;
        $this->apellidos =   null;
        $this->telefono =   null;
        $this->email =   null;
    }

    public function AgregarActualizar()
    {
        if ($this->isEdit) {
            $this->actualizarUsuario();
            $this->resetUsuario();
        } else {
            $this->agregarUsuario();
            $this->resetUsuario();
        }
        $this->dispatchBrowserEvent('CloseModal');
    }
    public function activar($id){
        $objecto = User::findOrFail($id);
        $objecto->estado = 1;
        $objecto->update();

        $this->alerta = "Activado Correctamente";
        $this->type = "alert-primary";
    }
    public function desActivar($id){
        $objecto = User::findOrFail($id);
        $objecto->estado = 0;
        $objecto->update();

        $this->alerta = "Desactivo Correctamente";
        $this->type = "alert-warning";

    }
}
