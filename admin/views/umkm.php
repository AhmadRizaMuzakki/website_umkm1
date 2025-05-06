<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Umkm
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama</th>
                                <th>modal</th>
                                <th>pemilik</th>
                                <th>alamat</th>
                                <th>website</th>
                                <th>email</th>
                                <th>kabkota</th>
                                <th>rating</th>
                                <th>kategori</th>
                                <th>pembina</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            require_once('Controllers/Umkm.php');
                            require_once('Controllers/Pembina.php');
                            require_once('Controllers/Kabkota.php');
                            require_once('Controllers/Kategori_umkm.php');
                            
                            $nomor = 1;
                            $row = $umkm->index();
                            $pembina = $pembina->index();
                            $umkm_kabkota = $kabkota->index();
                            $kategori_umkm = $kategori->index();
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['nama'] . "</td>
                                <td>" . "RP. " .number_format($list['modal'] ,2,',','.'). "</td>
                                <td>" . $list['pemilik'] . "</td>
                                <td style='width: 100px;'>" . $list['alamat'] . "</td>
                                <td style='width: 100px;'>" . $list['website'] . "</td>
                                <td>" . $list['email'] . "</td>
                                <td>" . $list['kabkota'] . "</td>
                                <td>" . $list['rating'] . "</td>
                                <td>" . $list['kategori'] . "</td>
                                <td>" . $list['pembina'] . "</td>
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
                                                        <label for='nama'>Nama</label>
                                                        <input class='form-control' name='nama' value='" . $list['nama'] . "' type='text' placeholder='Nama' required />
                                                        </div>
                                                    <div class='form-group'>
                                                        <label for='modal'>Modal</label>
                                                        <input class='form-control' name='modal' value='" . $list['modal'] . "' type='number' placeholder='Modal' required />
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='modal'>Pemilik</label>
                                                        <input class='form-control' name='pemilik' value='" . $list['pemilik'] . "' type='text' placeholder='Pemilik' required />
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='alamat'>Alamat</label>
                                                        <textarea class='form-control' name='alamat' value='" . $list['alamat'] . "' placeholder='Alamat' style='height: 10rem;' required></textarea>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='modal'>Email</label>
                                                        <input class='form-control' name='email' value='" . $list['email'] . "' type='email' placeholder='Email' required />
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='modal'>Website</label>
                                                        <input class='form-control' name='website' value='" . $list['website'] . "' type='text' placeholder='Website' required />
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='modal'>Rating</label>
                                                        <input class='form-control' name='rating' value='" . $list['rating'] . "' type='number' placeholder='Rating' required />
                                                    </div>
                                                    <div class='form-group'>
                                                        <label>Kabkota</label>
                                                        <select class='form-control' name='kabkota_id' required>";
                                                        foreach($umkm_kabkota as $kabkota) {
                                                            $selected = ($kabkota['id'] == $list['kabkota_id']) ? 'selected' : '';
                                                            echo "<option value='".$kabkota['id']."' ".$selected.">".$kabkota['nama']."</option>";
                                                        }
                                                        echo "
                                                        </select>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label>Kategori</label>
                                                        <select class='form-control' name='kategori_umkm_id' required>";
                                                        foreach($kategori_umkm as $kategori) {
                                                            $selected = ($kategori['id'] == $list['kategori_umkm_id']) ? 'selected' : '';
                                                            echo "<option value='".$kategori['id']."' ".$selected.">".$kategori['nama']."</option>";
                                                        }
                                                        echo "
                                                        </select>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label>Pembina</label>
                                                        <select class='form-control' name='pembina_id' required>";
                                                        foreach($pembina as $mentor) {
                                                            $selected = ($mentor['id'] == $list['pembina_id']) ? 'selected' : '';
                                                            echo "<option value='".$mentor['id']."' ".$selected.">".$mentor['nama']."</option>";
                                                        }
                                                        echo "
                                                        </select>
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
                                        'modal' => $_POST['modal'],
                                        'pemilik' => $_POST['pemilik'],
                                        'alamat' => $_POST['alamat'],
                                        'website' => $_POST['website'],
                                        'email' => $_POST['email'],
                                        'kabkota_id' => $_POST['kabkota_id'],
                                        'rating' => $_POST['rating'],
                                        'kategori_umkm_id' => $_POST['kategori_umkm_id'], 
                                        'pembina_id' => $_POST['pembina_id']
                                    ];

                                    $umkm->create($data);
                                    // echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=umkm">';
                                } elseif ($_POST['type'] == 'edit') {
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'modal' => $_POST['modal'],
                                        'pemilik' => $_POST['pemilik'],
                                        'alamat' => $_POST['alamat'],
                                        'website' => $_POST['website'],
                                        'email' => $_POST['email'],
                                        'kabkota_id' => $_POST['kabkota_id'],
                                        'rating' => $_POST['rating'],
                                        'kategori_umkm_id' => $_POST['kategori_umkm_id'],
                                        'pembina_id' => $_POST['pembina_id']
                                    ];

                                    $umkm->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=umkm">';
                                } elseif ($_POST['type'] == 'delete') {
                                    $umkm->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=umkm">';
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Umkm</h5>
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
                                        <label for="modal">Modal</label>
                                        <input class="form-control" name="modal" type="number" placeholder="Modal" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="modal">Pemilik</label>
                                        <input class="form-control" name="pemilik" type="text" placeholder="Pemilik" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="Alamat" style="height: 10rem;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="modal">Email</label>
                                        <input class="form-control" name="email" type="email" placeholder="Email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="modal">Website</label>
                                        <input class="form-control" name="website" type="text" placeholder="Website" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="modal">Rating</label>
                                        <input class="form-control" name="rating" type="number" placeholder="Rating" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Kabkota</label>
                                        <select class="form-control" name="kabkota_id" required>
                                            <option value="">Pilih Kabkota</option>
                                            <?php
                                            require_once('Controllers/Kabkota.php');
                                            
                                            $umkm_kabkota = $kabkota->index();
                                            foreach($umkm_kabkota as $kabkota) {
                                                echo "<option value='".$kabkota['id']."'>".$kabkota['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Kategori</label>
                                        <select class="form-control" name="kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php
                                            require_once('Controllers/Kategori_umkm.php');
                                            $kategori_umkm = $kategori->index();
                                            foreach($kategori_umkm as $kategori) {
                                                echo "<option value='".$kategori['id']."'>".$kategori['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Pembina</label>
                                        <select class="form-control" name="pembina_id" required>
                                            <option value="">Pilih Pembina</option>
                                            <?php
                                            require_once('Controllers/Pembina.php');
                                            foreach($pembina as $pembina) {
                                                echo "<option value='".$pembina['id']."'>".$pembina['nama']."</option>";
                                            }
                                            ?>
                                        </select>
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