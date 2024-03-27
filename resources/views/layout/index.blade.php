<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yuk Pilih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <button type="button id='btnLogout" onclick="logout()" class="btn btn-light">logout</button>
                </form>

                <div class="d-block" id="btnAuth">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#login">
                        masuk
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <button type="button" class="btn btn-primary mt-5 mb-4" data-bs-toggle="modal" data-bs-target="#poll">
                    buat poll
                </button>
                <h3>Hallo, <span id="authUsername"></span></h3>
                <div class="modal fade" id="poll" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="/api/poll" id="formCreatePoll">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">poll</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="judul_poll">Judul Poll</label>
                                        <input type="text" class="form-control" id="judul_poll" name="title"
                                            placeholder="Enter judul poll">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_poll">Deskripsi Poll</label>
                                        <input type="text" class="form-control" id="deskripsi_poll"
                                            name="description" placeholder="Enter deskripsi poll">
                                    </div>
                                    <div class="form-group">
                                        <label for="deadline">deadline</label>
                                        <input type="date" class="form-control" id="deadline" name="deadline"
                                            placeholder="deadline">
                                    </div>
                                    <div class="form-group" id="choices-container">
                                        <label for="choices">Choices</label>
                                        <div class="choice-input mb-2">
                                            <input type="text" class="form-control choice" name="choices[]"
                                                placeholder="Enter choice">
                                            <button type="button"
                                                class="btn btn-danger remove-choice">Remove</button>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="add-choice">Add
                                            Choice</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-4">
        <div class="row gap-3" id="listPoll">

        </div>
    </div>



    <!-- Modal for confirmation -->
    <div class="modal fade" id="confirmDeletePoll" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this poll?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!--- Modal Login --->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ url('api/auth/login') }}" id="formLogin">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="pesan"></div>
                        <div class="form-group mb-3">
                            <label for="username">username</label>
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">login</button>
                    </div>
            </form>
        </div>
    </div>
    {{-- modal lihat hasil --}}
    <!-- Modal -->
    <div class="modal fade" id="lihathasil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Poll</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_poll">Judul Poll</label>
                        <input type="text" class="form-control" id="judul_poll" name="title"
                            placeholder="Masukkan Judul Poll">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_poll">Deskripsi Poll</label>
                        <input type="text" class="form-control" id="deskripsi_poll" name="description"
                            placeholder="Masukkan Deskripsi Poll">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deadline">Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>
                    <div class="form-group">
                        <label for="hasil_poll">Hasil Poll</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Vote 1</div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Vote 2</div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Vote 3</div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Vote 4</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>

        var pollID = '';

        getUserInfo();

        getPoll();

        $('#formLogin').submit(function(e) {
            e.preventDefault();
            let formElement = $(this);
            const url = $(this).attr('action');
            let data = $(this).serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    localStorage.setItem('token', response.access_token);
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    if (error.responseJSON.error === 'Unauthenticated') {
                        formElement.find('.pesan').html(
                            `<div class="alert alert-danger">Username atau Password Salah</div>`)
                    }

                }
            });
        });

        function getToken() {
            return localStorage.getItem('token');
        }

        function getUserInfo() {
            $.ajax({
                url: '/api/auth/me',
                type: 'POST',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + getToken());
                },
                success: function(response) {
                    var userInfo = response;
                    console.log(userInfo);
                    $('#btnAuth').addClass('d-none');
                    $('#authUsername').html(userInfo.username);
                    return response;
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    if (error.responseJSON.error === 'Unauthenticated') {
                        formElement.find('.pesan').html(
                            `<div class="alert alert-danger">Username atau Password Salah</div>`)
                    }

                }
            });
        }

        function getPoll() {
            $.ajax({
                url: '/api/poll',
                type: 'GET',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + getToken());
                },
                success: function(response) {
                    console.log(response);
                    response.forEach((element, key) => {

                        let choices = element.choices.map((choice) => {
                            return `<div>
                                <label for="p_${choice.id}">
                                    <input type="radio" id="p_${choice.id}" name="p_${element.id}" value="${choice.id}">
                                    <span>${choice.choice}</span>
                                </label>
                                </div>`
                        });

                        $('#listPoll').append(`<div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>${element.title}</h3>
                        <p>${element.description}</p>
                        <div>
                        ${choices.join('')}
                        </div>
                    </div>
                    <!-- Add delete button and modal for confirmation -->
                      <div class="card-footer">
                        <button type="button" class="btn btn-danger btndelete" id="btndelete" data-poll-id="${element.id}" data-bs-toggle="modal" data-bs-target="#confirmDeletePoll"><i class="bi bi-trash"></i></button>
                        <button type="submit" class="btn btn-success">Vote</button>
                        <div class="col-md-auto float-end"
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihathasil">Lihat Hasil Poll</button>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
            {{-- modal lihat hasil --}}
            <!-- Modal -->
            <div class="modal fade" id="lihathasil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Poll</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="judul_poll">Judul Poll</label>
                      <input type="text" class="form-control" id="judul_poll" name="title" placeholder="Masukkan Judul Poll">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_poll">Deskripsi Poll</label>
                      <input type="text" class="form-control" id="deskripsi_poll" name="description" placeholder="Masukkan Deskripsi Poll">
                    </div>
                    <div class="form-group mb-4">
                      <label for="deadline">Deadline</label>
                      <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>
                    <div class="form-group">
                      <label for="hasil_poll">Hasil Poll</label>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Vote 1</div>
                      </div>
                      <div class="progress mt-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Vote 2</div>
                      </div>
                      <div class="progress mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Vote 3</div>
                      </div>
                      <div class="progress mt-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Vote 4</div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>`);
                    });
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    if (error.responseJSON.error === 'Unauthenticated') {
                        formElement.find('.pesan').html(
                            `<div class="alert alert-danger">Username atau Password Salah</div>`)
                    }

                }
            });
        }

        $('#formCreatePoll').submit(function(e) {
            e.preventDefault();
            let formElement = $(this);
            const url = $(this).attr('action');
            let data = $(this).serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + getToken());
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    if (error.responseJSON.error === 'Unauthenticated') {
                        formElement.find('.pesan').html(
                            `<div class="alert alert-danger">Username atau Password Salah</div>`)
                    }

                }
            });
        });
        $('#choices-container').on('click', '.remove-choice', function() {
            $(this).closest('.choice-input').remove();
        });

        $('#add-choice').on('click', function() {
            var html =
                '<div class="choice-input mb-2"><input type="text" class="form-control choice" name="choices[]" placeholder="Enter choice"><button type="button" class="btn btn-danger remove-choice">Remove</button></div>';
            $('#choices-container').append(html);
        });

        function logout() {
            localStorage.removeItem('token');
            window.location.reload();
        }

    $(document).on('click', '.btndelete', function(event){
        pollID = $(this).attr('data-poll-id');
        console.log(pollID);
    });

        // Function to delete the poll
    function deletePoll(pollId) {
        $.ajax({
            url: '/api/poll/' + pollID,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + getToken());
            },
            success: function(response) {
                // Reload the page or update the poll list
                window.location.reload();
            },
            error: function(error) {
                console.log(error.responseJSON.error);
                // Handle error
            }
        });
    }

    $(document).ready(function() {
        // Ketika tombol Delete di modal diklik
        $('#confirmDelete').click(function() {
            var pollId = $('#confirmDeletePoll').data('poll-id');
            // Panggil fungsi deletePoll dengan ID yang sesuai
            deletePoll(pollId);
            // Tutup modal setelah penghapusan berhasil
            $('#confirmDeletePoll').modal('hide');
        });

        // Ketika tombol delete di luar modal diklik
        $('.delete-btn').click(function() {
            // Mendapatkan ID item yang akan dihapus
            var pollId = $(this).data('poll-id');
            // Menyimpan ID item dalam modal
            $('#confirmDeletePoll').data('poll-id', pollId);
        });
    });
    </script>
</body>


</html>
