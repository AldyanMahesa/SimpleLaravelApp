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

        let writtenCount = 0;
        function writeMovieItem(MovieIndex) {
            console.log(MovieIndex);
            const Movie = Movies[MovieIndex];
            console.log(Movie);
            
            document.getElementById('mTitle' + MovieIndex).innerHTML = Movie.title;

            fetch('{{ asset('company') }}' + Movie.company_id).then(r => r.json()).then(data => {
                document.getElementById('mProductionCompany' + MovieIndex).innerHTML = data.company_name;
            });

            const rd = new Date(Movie.release_date);
            document.getElementById('mReleaseDate' + MovieIndex).innerHTML = rd.getFullYear();

            const d = Movie.runtime;
            const dmin = d % 60;
            const dhr = (d - dmin) / 60;
            document.getElementById('mDuration' + MovieIndex).innerHTML = dhr + 'hr' + dmin + 'min';

            document.getElementById('mOverview' + MovieIndex).innerHTML = Movie.overview;

            const hp = document.getElementById('mHomepage' + MovieIndex);
            hp.innerHTML = Movie.homepage;
            hp.href = Movie.homepage;

            const f = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',

            });
            document.getElementById('mBudget' + MovieIndex).innerHTML = 'budget :' + f.format(Movie.budget);
            document.getElementById('mRating' + MovieIndex).innerHTML = Movie.vote_average + '(' + Movie.vote_count + ')';
            document.getElementById('mPopularity' + MovieIndex).innerHTML = Movie.popularity;
        }
    </script>

    <div class="d-flex flex-wrap" id="movieList">
        @while ($count < count($data))
            @include('component.movieCard', ['i' => $count++])
            <script>
                writeMovieItem(writtenCount);
                writtenCount = {{$count}};
            </script>
        @endwhile
    </div>

</body>

</html>
