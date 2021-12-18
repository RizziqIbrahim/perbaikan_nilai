<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
        <title>Document</title>

    </head>
    <body style="position: relative;">
        <div class="container mt-5 ml-5 ">
               
                <div id="move" class="image" style="position: absolute; left: 100px; top: 100px;">
                    <img src="../../storage/{{$data->gambar}}" width="300px" height="300px"  alt="">
                    {{$data->nama}}
                </div>
                
               
        </div>

        @if(Session::has("base"))
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Click to see base64 image
                  </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      {{Session::get('base64')}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
        @endif
        

        <div>
            <a class="btn btn-primary ml-5" href="../create64">add Data</a>
        </div>
        <div class="mt-5 text-center">
            <button onclick="moveup()" id="up" class="btn btn-primary up">atas</button>
            <button onclick="moveleft()" id="left" class="btn btn-primary left">kiri</button>
            <button onclick="movedown()" id="down" class="btn btn-primary down">bawah</button>
            <button onclick="moveright()" id="right" class="btn btn-primary right">kanan</button>
        </div>

        <script type="text/javascript">
            function moveleft() {
                const img = document.getElementById('move');
                img.style.left = Number(img.style.left.slice(0, -2)) - 10 + 'px';
            }

            function moveright() {
                const img = document.getElementById('move');
                img.style.left = Number(img.style.left.slice(0, -2)) + 10 + 'px';
            }

            function moveup() {
                const img = document.getElementById('move');
                img.style.top = Number(img.style.top.slice(0, -2)) - 10 + 'px';
            }

            function movedown() {
                const img = document.getElementById('move');
                img.style.top = Number(img.style.top.slice(0, -2)) + 10 + 'px';
            }
        </script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>