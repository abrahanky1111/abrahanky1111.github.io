@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-4">
                <div class="card-header my-4">{{ __('Tablero de Usuarios') }}</div>
                <form action="{{route('user.update',$user->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">

                <div class="card-body my-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        </div>
                        
                    @endif
                    <input type="file" name="image" class="d-none" id="input_file">
                    @if(Auth::user()->image)
                      <img onclick="open_file()" class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                      @else
                      <td>{{ $user->status }}</td>        
                   @endif
    <div class="col-md-6">
<h5 class="mb-2"><strong>{{$user->name}}</strong></h5>
<p class="text-muted">Diseñador Wep <span class="badge bg-primary">PRO</span></p>
</div>

<div class="col-md-6">
  <label for="exampleFormControlTextarea2">Hablame un poco de ti</label>
  <textarea name="descripcion"class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3">{{ $user->descripcion }}</textarea>
</div>

                   
                
                  @method('PUT')
                  @csrf
                    <div class="col-md-6">
                      <label for="inputnamel4" class="form-label">Nombre</label>
                      <input type="text" name="name" class="form-control" id="inputname" s>

                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Correo electronico</label>
                      <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $user->email }}">
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Direccion</label>
                      <input type="text" name="address" class="form-control" id="inputAddress" value="{{$user->address}}" placeholder="Caracas,Av sucre">
                    </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Cual es tu especialidad</label>
                      <input type="text" name="specialty" class="form-control" id="inputAddress2" value="{{$user->specialty}}" placeholder="HTML,CSS,JAVA,PHP...etc">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Programas que manejas</label>
                      <input type="text" name="programs" class="form-control" id="inputCity" value="{{$user->programs}}">
                    </div>
                    <div class="col-md-4">
                      <label for="inputState" class="form-label">Nivel de experiencia</label>
                      <select id="inputState" name="experience" class="form-select" value="{{$user->experience}}">
                        <option selected>Junior</option>
                        <option>Semi senior</option>
                        <option>Senior</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">F.E.N</label>
                      <input type="date" name="date" class="form-control" id="inputZip" value="{{$user->date}}">
                    </div>
                   
                    <div class="col-12 my-4">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
            </div>
        </div>   
    </div>
</div>
@endsection
