<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote Sekarang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <form class="py-5 px-5 border" id="pollForm" action="/poll/vote" method="post">
                    <div class="mb-3">
                        <label for="judulpoll" class="form-label">Judul Poll</label>
                        <input type="text" class="form-control" id="judulpoll" name="judulpoll" value="WFH / WFO">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsipoll" class="form-label">Deskripsi Poll</label>
                        <input type="text" class="form-control" id="deskripsipoll" name="deskripsipoll" value="Lebih baik WFH atau WFO">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilihan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="WFH">
                            <label class="form-check-label" for="gridRadios1">WFH</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="WFO">
                            <label class="form-check-label" for="gridRadios2">WFO</label>
                        </div>
                    </div>
                    <button type="button" id="voteButton" class="btn btn-primary">Vote</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-nyA11ORcg3aBXs9QcMpe60LO5B69pGOTv18Lo8CjZA7qTUjm0zifvFxqdliN9z0E" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#voteButton').click(function(){
                var judulPoll = $('#judulpoll').val();
                var deskripsiPoll = $('#deskripsipoll').val();
                var selectedOption = $("input[name='gridRadios']:checked").val();

                if(judulPoll && deskripsiPoll && selectedOption){
                    // Kirim vote ke server menggunakan AJAX
                    $.ajax({
                        url: "/poll/vote",
                        method: "POST",
                        data: { judulpoll: judulPoll, deskripsipoll: deskripsiPoll, choice: selectedOption },
                        success: function(response){
                            // Handle response dari server (jika diperlukan)
                            console.log(response);
                            alert('Vote berhasil!');
                        },
                        error: function(xhr, status, error){
                            // Handle error (jika diperlukan)
                            console.error(error);
                            alert('Gagal melakukan vote.');
                        }
                    });
                } else {
                    alert('Harap lengkapi semua field sebelum melakukan vote.');
                }
            });
        });
    </script>
</body>
</html>
