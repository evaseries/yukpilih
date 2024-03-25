<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
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
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#poll">
                    Buat Poll
                </button>
                <div class="modal fade" id="poll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Modal content for creating poll -->
                </div>
            </div>
            <div class="col-md-6">
                <a href="poll/lihatPoll" class="btn btn-primary ">Lihat Poll</a>
            </div>
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
