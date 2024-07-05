<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="card-title">Search</h2>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Search name/department/designation">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" id="user-list">
                    @foreach ($users as $user)
                        <div class="col-md-6 user-card" data-name="{{ $user->name }}"
                            data-department="{{ $user->department->name }}"
                            data-designation="{{ $user->designation->name }}">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $user->name }}</h4>
                                    <h5 class="card-text">{{ $user->designation->name }}</h5>
                                    <h6 class="card-text">{{ $user->department->name }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            var $allCards = $('.user-card').clone();


            function filterAndSortCards(searchTerm = '') {
                var $cards = $allCards;

                if (searchTerm === '') {
                    $('#user-list').empty().append($cards);
                    return;
                }


                var filteredCards = $cards.filter(function() {
                    var name = $(this).data('name').toLowerCase();
                    var department = $(this).data('department').toLowerCase();
                    var designation = $(this).data('designation').toLowerCase();

                    return name.includes(searchTerm) || department.includes(searchTerm) || designation
                        .includes(searchTerm);
                });


                var sortedCards = filteredCards.sort(function(a, b) {
                    var aName = $(a).data('name').toLowerCase();
                    var bName = $(b).data('name').toLowerCase();
                    var aDepartment = $(a).data('department').toLowerCase();
                    var bDepartment = $(b).data('department').toLowerCase();
                    var aDesignation = $(a).data('designation').toLowerCase();
                    var bDesignation = $(b).data('designation').toLowerCase();

                    var aStartsWith = [aName, aDepartment, aDesignation].some(val => val.startsWith(
                        searchTerm));
                    var bStartsWith = [bName, bDepartment, bDesignation].some(val => val.startsWith(
                        searchTerm));


                    if (aStartsWith && !bStartsWith) {
                        return -1;
                    } else if (!aStartsWith && bStartsWith) {
                        return 1;
                    } else {

                        var aCombined = [aName, aDepartment, aDesignation].join(' ').toLowerCase();
                        var bCombined = [bName, bDepartment, bDesignation].join(' ').toLowerCase();

                        return aCombined.localeCompare(bCombined);
                    }
                });


                $('#user-list').empty().append(sortedCards);
            }


            filterAndSortCards('');


            $('#search').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                filterAndSortCards(searchTerm);
            });


            $('#search').trigger('input');
        });
    </script>
</body>

</html>
