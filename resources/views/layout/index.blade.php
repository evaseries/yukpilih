<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
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
            </form>
            <form class=" d-flex px-5">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#login">
                    masuk
                  </button>
                  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('/login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="username" class="form-control" id="username" name="username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="" class="btn btn-primary">login</button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                     </div>

              </div>
            </form>

            <form class=" d-flex px-5">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#register">
                    register
                  </button>
                  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="username" class="form-control" id="username" name="username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="role">role</label>
                                    <input type="role" class="form-control" id="role" name="role" placeholder="role">
                                </div>
                                <div class="form-group">
                                    <label for="division">division</label>
                                    <input type="division" class="form-control" id="division" name="division" placeholder="division">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="" class="btn btn-primary">login</button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                     </div>

              </div>
            </form>

        </div>
      </nav>

      <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#poll">
                    buat poll
                  </button>
                  <div class="modal fade" id="poll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">poll</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                         <div class="modal-body">
                            <form method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="judul_poll">Judul Poll</label>
                                    <input type="text" class="form-control" id="judul_poll" name="title" placeholder="Enter judul poll">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_poll">Deskripsi Poll</label>
                                    <input type="text" class="form-control" id="deskripsi_poll" name="description" placeholder="Enter deskripsi poll">
                                </div>
                                <div class="form-group">
                                    <label for="deadline">deadline</label>
                                    <input type="date" class="form-control" id="deadline" name="description" placeholder="deadline">
                                </div>
                                <div class="form-group" id="choices-container">
                                    <label for="choices">Choices</label>
                                    <div class="choice-input mb-2">
                                        <input type="text" class="form-control choice" name="choices[]" placeholder="Enter choice">
                                        <button type="button" class="btn btn-danger remove-choice">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-choice">Add Choice</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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


            </div>
            </div>
          </nav>
            </div class="col-6">
            <a href="poll/lihatPoll" class="btn btn-primary">lihat poll</a>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  <script>
    // Function to add a new choice input field
    document.getElementById("add-choice").addEventListener("click", function() {
        var container = document.getElementById("choices-container");
        var div = document.createElement("div");
        div.className = "choice-input mb-2";

        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control choice";
        input.name = "choices[]";
        input.placeholder = "Enter choice";

        var button = document.createElement("button");
        button.type = "button";
        button.className = "btn btn-danger remove-choice";
        button.textContent = "Remove";

        div.appendChild(input);
        div.appendChild(button);
        container.appendChild(div);
    });

    document.getElementById("choices-container").addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-choice")) {
            e.target.parentElement.remove();
        }
    });
</script>


</html>
