<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Kabkota
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Controllers/Kabkota.php');
                            $nomor = 1;
                            $row = $kabkota->index();
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['nama'] . "</td>
                                <td>" . $list['latitude'] . "</td>
                                <td>" . $list['longitude'] . "</td>
                                <td>
                                    <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal" . $list['id'] . "'>
                                        Edit
                                    </button>
                                    <div class='modal fade' id='editModal" . $list['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Edit Kabkota</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form method='post'>
                                                    <div class='modal-body'>
                                                        <input type='hidden' name='id' value='" . $list['id'] . "'>
                                                        <input type='hidden' name='type' value='edit'>
                                                        <div class='form-group'>
                                                            <label>Nama</label>
                                                            <input type='text' class='form-control' name='nama' value='" . $list['nama'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>latitude</label>
                                                            <input type='text' class='form-control' name='latitude' value='" . $list['latitude'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>longitude</label>
                                                            <input type='text' class='form-control' name='longitude' value='" . $list['longitude'] . "' required>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='submit' name='type' value='edit' class='btn btn-primary'>Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form method='post' style='display:inline'>
                                        <input type='hidden' name='id' value='" . $list['id'] . "'>
                                        <input type='hidden' name='type' value='delete'>
                                        <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</button>
                                    </form>
                                </td>
                                </tr>
                                ";
                            }
                            if (isset($_POST['type'])) {
                                if ($_POST['type'] == 'tambah') {
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'latitude' => $_POST['latitude'],
                                        'longitude' => $_POST['longitude']
                                    ];

                                    $kabkota->create($data);
                                    echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                                } elseif ($_POST['type'] == 'edit') {
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'latitude' => $_POST['latitude'],
                                        'longitude' => $_POST['longitude']
                                    ];

                                    $kabkota->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                                } elseif ($_POST['type'] == 'delete') {
                                    $kabkota->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kabkota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="Nama" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Latitude</label>
                                        <input class="form-control" name="latitude" type="text" placeholder="Latitude" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Longitude</label>
                                        <input class="form-control" name="longitude" type="text" placeholder="Longitude" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="type" value="tambah" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>