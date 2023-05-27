<x-dashboard>
    <div class="d-flex w-100 justify-content-between align-items-center">
        <h2>My Orders</h2>

    </div>

    <table class="table my-3">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Placed at</th>
            <th scope="col">
                Details
            </th>
            <th scope="col">
                Update Status
            </th>


        </tr>
        </thead>
        <tbody>

        @foreach($orders as $dish)
            <tr>



                <th scope="row">{{$dish->id}}</th>

                <td>Rs.  {{$dish->total}}</td>
                <td>{{$dish->Status}}</td>
                <td>{{$dish->placed_at}}</td>

                <td>
                    <a href="/orders/details/{{$dish->id}}" class="btn  btn-primary " >
                       View Details
                    </a>
                </td>

                <td>
                    <a href="/orders/status/{{$dish->id}}" class="btn  btn-dark" >
                        Update Status
                    </a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>




</x-dashboard>
