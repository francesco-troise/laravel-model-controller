@php
    $firstMovie = $movies->first();

    $theaders = str_replace('_', ' ', array_diff(array_keys($firstMovie->getAttributes()), ['id']));

    $theaders = array_map(function ($th) {
        return ucfirst($th);
    }, $theaders);

@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>

<body>
    <header></header>
    <main>
        <div class="container">
            <table>
                <thead>
                    <tr>

                        @foreach ($theaders as $th)
                            <th>{{ $th }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            @php

                                $data_movie = array_diff_key($movie->getAttributes(), ['id' => '']);
                            @endphp
                            @foreach ($data_movie as $data)
                                <td>{{ $data }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </main>
    <footer></footer>

</body>

</html>
