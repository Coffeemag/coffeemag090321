<div id="">
    <div class="tile">
        <h3 class="tile-title">Option Values</h3>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Value</th>
                        <th>Price</th>
                        <th>Attribute Id</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach(value in values)
                    <?php var_dump (values) ?>
                            <tr>
                                <td style="width: 25%" class="text-center">{{value.id ?? ''}}</td>
                                <td style="width: 25%" class="text-center">{{value.price ?? ''}}</td>
                                <td style="width: 25%" class="text-center">{{value.value ?? ''}}</td>
                                <td style="width: 25%" class="text-center"><button class="border-green-400">Delete</button><button class="border-green-400">Edit</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
