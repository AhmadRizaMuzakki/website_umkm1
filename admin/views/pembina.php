<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Pembina
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama</th>
                                <th>gender</th>
                                <th>tanggal lahir</th>
                                <th>tempat lahir</th>
                                <th>kehlian</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Controllers/Pembina.php');
                            $nomor = 1;
                            $row = $pembina->index();
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['nama'] . "</td>
                                <td>" . $list['gender'] . "</td>
                                <td>" . $list['tgl_lahir'] . "</td>
                                <td>" . $list['tmp_lahir'] . "</td>
                                <td>" . $list['keahlian'] . "</td>
                                <td>
                                    <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal" . $list['id'] . "'>
                                        Edit
                                    </button>
                                    <div class='modal fade' id='editModal" . $list['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Edit Data Pasien</h5>
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
                                                            <label>Gender</label>
                                                            <select class='form-control' name='gender' required>
                                                                <option value='L' " . ($list['gender'] == 'L' ? 'selected' : '') . ">Laki-laki</option>
                                                                <option value='P' " . ($list['gender'] == 'P' ? 'selected' : '') . ">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Tempat Lahir</label>
                                                            <input type='text' class='form-control' name='tmp_lahir' value='" . $list['tmp_lahir'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Tanggal Lahir</label>
                                                            <input type='date' class='form-control' name='tgl_lahir' value='" . $list['tgl_lahir'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Keahlian</label>
                                                            <input type='text' class='form-control' name='keahlian' value='" . $list['keahlian'] . "' required>
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
                                        'gender' => $_POST['gender'],
                                        'tmp_lahir' => $_POST['tmp_lahir'],
                                        'tgl_lahir' => $_POST['tgl_lahir'],
                                        'keahlian' => $_POST['keahlian']
                                    ];

                                    $pembina->create($data);
                                    echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=pembina">';
                                } elseif ($_POST['type'] == 'edit') {
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'gender' => $_POST['gender'],
                                        'tmp_lahir' => $_POST['tmp_lahir'],
                                        'tgl_lahir' => $_POST['tgl_lahir'],
                                        'keahlian' => $_POST['keahlian'],
                                    ];

                                    $pembina->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=pembina">';
                                } elseif ($_POST['type'] == 'delete') {
                                    $pembina->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=pembina">';
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
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
                                        <label>Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="l" type="radio" name="gender" value="L" required />
                                            <label class="form-check-label" for="l">L</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="p" type="radio" name="gender" value="P" required />
                                            <label class="form-check-label" for="p">P</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input class="form-control" name="tmp_lahir" type="text" placeholder="Tempat Lahir" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input class="form-control" name="tgl_lahir" type="date" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Keahlian</label>
                                        <input class="form-control" name="keahlian" type="text" placeholder="Keahlian" required />
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