<x-dashboard>
    <div class="d-flex w-100 justify-content-between align-items-center my-3">
        <h2>Manage Dished</h2>
        <a href="/admin/register" class="btn btn-lg btn-dark">
            Add Admin
        </a>
    </div>
    <table class="table table-dark table-striped" id="admintable">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
        <tr>
            <th scope="row">{{$admin->id}}</th>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>
                {{$admin->username}}
            </td>
            <td>
                <button class="btn btn-light adminDelete" onclick="adminDelete({{$admin->id}},this)">
                    Delete
                </button>
            </td>
        </tr>

        @endforeach

        </tbody>
    </table>
</x-dashboard>
