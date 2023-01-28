<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                @foreach ($days as $day)
                    <th scope="col">{{ $day->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($hours as $hour)
                <tr>
                    <th scope="row">{{ $hour->jam }}</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
