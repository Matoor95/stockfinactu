@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $count_commande }}</h3>

                    <p>Commandes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('orders.index') }}" class="small-box-footer">voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $count_client }}</h3>

                    <p>Client</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('client.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $count_categorie }}</h3>

                    <p>Catégories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="d-flex  ">
        <div id="piechart" class="col-lg-4 col-3"></div>
        <div id="bar" class="col-lg-4 col-3"></div>
        <div id="chart_div" class="col-lg-4 col-6"></div>



    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Catégories', 'Produits'],
                @foreach ($categorie as $category) // On parcourt les catégories
                    ["{{ $category->libelle }}",
                    {{ $category->produits->count() }}], // Proportion des produits de la catégorie
                @endforeach
            ]);

            var options = {
                title: 'Proportion des produits par catégorie'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = google.visualization.arrayToDataTable([
                ['Commandes', 'Produits',],
                @foreach ($commandes as $commande) // On parcourt les catégories
                    ["{{ $commande->adresse_de_livraison }}",
                    {{ $commande->produits->count() }}], // Proportion des produits de la catégorie
                @endforeach
            ]);

            var options = {
                title: 'L\adresse des commandes',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Total produits',
                    minValue: 0
                },
                vAxis: {
                    title: 'Adresse'
                },
                // bars: 'virticle'
            };

            var chart = new google.visualization.BarChart(document.getElementById('bar'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Commandes', 'Produits','Utilisateurs'],
                @foreach ($commandes as $commande) // On parcourt les catégories
                    ["{{ $commande->adresse_de_livraison }}",
                    {{ $commande->produits->count() }},{{ $commande->user->count() }}], // Proportion des produits de la catégorie
                @endforeach
            ]);


          var options = {
            title: 'Lengths of dinosaurs, in meters',
            subtitle: 'Produits, Ventes pour chaque catégorie',
            bars: 'vertical' // Direction "verticale" pour les bars
          };

          var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
      </script>

@endpush
