<x-dashboard>
    <div class="d-flex w-100 justify-content-between align-items-center">
        <h2>My Orders</h2>

    </div>

    <table class="table my-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">
                Details
            </th>

        </tr>
        </thead>
        <tbody>

        @foreach($orders as $dish)
            <tr>



                <th scope="row">{{$dish->id}}</th>
                <td>Name</td>
                <td>Rs.  {{$dish->total}}</td>
                <td>{{$dish->Status}}</td>


                <td>
                    <a href="/orders/details/{{$dish->id}}" class="btn  btn-primary " >
                        View Details
                    </a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</x-dashboard>
