<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Makanan</title>
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Makanan</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table border="1px" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col" class="text-center">Nama Makanan</th>
                                <th scope="col" class="text-center">Harga Makanan</th>
                                <th scope="col" class="text-center">Stok Makanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($makanans as $makanan)
                                <tr>
                                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $makanan->nama_makanan }}</td>
                                    <td class="text-center">Rp. {{ $makanan->harga_makanan }}</td>
                                    <td class="text-center">{{ $makanan->qty_makanan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</body>

</html>
