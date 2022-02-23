<!doctype html>
<html lang="en">
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Laravel CRUD</title>
    </head>
    <body>
        <div class="container">
        <h1>Todos(<span id="timezone"></span>)</h1>
        <hr>

        <h2>Add new task</h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/todos" method="POST">
            @csrf
            <input type="text" class="form-control" name="task" placeholder="Add new task">
            <button class="btn btn-primary" type="submit">Store</button>
        </form>

        <h2>Pending tasks</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <hr>
          <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item">{{ $todo->task }}, date: <span class="date-created">{{$todo->date_created}}</span> UTC , time(local):<span class="localtime"></span></li>
            @endforeach
            </ul>
        <h2>Completed Tasks</h2>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            var timezone = moment.tz.guess();
            document.getElementById("timezone").innerHTML=timezone;

            console.log(timezone);
            let dc= document.getElementsByClassName("date-created");
            let d=document.getElementsByClassName("localtime");
            let dl=[];
            for(i=0;i<dc.length;i++){
                console.log(dc[i].innerText);
                dl[i]=moment.tz(dc[i].innerText,"UTC").tz(timezone).format('h:m a z');
                console.log(dl[i]);
                d[i].innerText=dl[i];
            }

            //let t=moment.tz('2022-02-22 14:44:38',"UTC").tz(timezone).format('h:m a z');
            //console.log(t);
            //$('#timezone').val(timezone);

        </script>
    </body>
</html>
