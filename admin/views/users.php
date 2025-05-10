<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah User
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>username</th>
                                <th>email</th>
                                <th>password</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Controllers/Users.php');
                            $nomor = 1;
                            $row = $users->index();
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['username'] . "</td>
                                <td>" . $list['email'] . "</td>
                                <td>" . hash('sha256',$list['password']) . "</td>
                                
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
                                                            <label>Email</label>
                                                            <input type='text' class='form-control' name='username' value='" . $list['username'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Email</label>
                                                            <input type='email' class='form-control' name='email' value='" . $list['email'] . "' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>password</label>
                                                            <input type='password' class='form-control' name='password' required>
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
                                        'username' => $_POST['username'],
                                        'email' => $_POST['email'],
                                        'password' => $_POST['password'],
                                        
                                    ];
                                    
                                    $users->create($data);
                                    echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=users">';
                                } elseif ($_POST['type'] == 'edit') {
                                    $data = [
                                        'username' => $_POST['username'],
                                    'email' => $_POST['email'],
                                    'password' => $_POST['password'],
                                    
                                    ];

                                    $users->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=users">';
                                } elseif ($_POST['type'] == 'delete') {
                                    $users->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=users">';
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    
                                    <div class="form-group">
                                        <label for="nama">Username</label>
                                        <input class="form-control" name="username" type="text" placeholder="username" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Email</label>
                                        <input class="form-control" name="email" type="email" placeholder="Email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="Password" required />
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