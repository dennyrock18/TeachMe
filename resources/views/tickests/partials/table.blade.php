<p>Hay: {{ $users->lastPage() }} Paguinas || Paguina Actual: # {{ $users->currentPage() }}</p>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Tipo de Usuario</th>
        <th>Acciones</th>
    </tr>
    @foreach($users as $user)
        <tr data-id="{{$user->id}}">
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}" >Editar</a> ||
                <a href="" class="btn-delete">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
{!! $users->appends(Request::all())->render() !!}
@if($users->hasMorePages()>0)
    <p>Pag Restantes: {{ $users->lastPage() - $users->currentPage()}}</p>
@else
    <p>No ahi mas paguinas disponibles</p>
@endif