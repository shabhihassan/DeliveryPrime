<x-dashboard>
    <h2>Latest Orders</h2>
    <table class="table my-3 table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Placed at</th>
            <th scope="col">
                Details
            </th>



        </tr>
        </thead>
        <tbody>

        @if(count($orders) > 0)
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


                </tr>

            @endforeach

        @endif

        </tbody>
    </table>
</x-dashboard>
