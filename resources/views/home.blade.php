<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hexa Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
</head>

<body>
    <script>
        const Movies = {{ Illuminate\Support\Js::from($data) }};
    </script>

    <div class="d-flex flex-wrap" id="movieList">
        @while ($count < count($data))
            @include('component.movieCard', ['i' => $count++])
        @endwhile
    </div>

    <script>
        for (let i = 0; i < Movies.length; i++) {
            document.getElementById('mTitle' + i).innerHTML = Movies[i].title;

            fetch('{{ asset('company') }}' + Movies[i].company_id).then(r => r.json()).then(data => {
                document.getElementById('mProductionCompany' + i).innerHTML = data.company_name;
            });

            const rd = new Date(Movies[i].release_date);
            document.getElementById('mReleaseDate' + i).innerHTML = rd.getFullYear();

            const d = Movies[i].runtime;
            const dmin = d % 60;
            const dhr = (d - dmin) / 60;
            document.getElementById('mDuration' + i).innerHTML = dhr + 'hr' + dmin + 'min';

            document.getElementById('mOverview' + i).innerHTML = Movies[i].overview;

            const hp = document.getElementById('mHomepage' + i);
            hp.innerHTML = Movies[i].homepage;
            hp.href = Movies[i].homepage;

            const f = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',

            });
            document.getElementById('mBudget' + i).innerHTML = 'budget :' + f.format(Movies[i].budget);
            document.getElementById('mRating' + i).innerHTML = Movies[i].vote_average + '(' + Movies[i].vote_count + ')';
            document.getElementById('mPopularity' + i).innerHTML = Movies[i].popularity;
        }
    </script>

</body>

</html>
