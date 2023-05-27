<x-dashboard>
<h2>
    Manage Business
</h2>
    <form action="/business/manage" class="w-75" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Restaurant Main Image</label>
            <input type="file"    class="form-control" name="mainimage"  >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Restaurant Header Image</label>
            <input type="file"    class="form-control" name="header"  >
        </div>

        <div class="mb-3">

            <input type="submit" value="Update" class="btn btn-dark"   >
        </div>
    </form>

</x-dashboard>
