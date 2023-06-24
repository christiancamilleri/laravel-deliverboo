@extends('layouts.admin') 


@section('content')
    <div class="container chart my-5">
        <h2 class="text-center">Guadagno annuale</h2>
        <canvas id="myChart"></canvas>
    </div>


    <div class="container chart my-5">
        <h2 class="text-center">Guadagno mensile</h2>
        <canvas id="myChart2"></canvas>
    </div>
    
    <script>

        var groupedOrders = {!! json_encode($groupedOrders) !!};
        console.log(groupedOrders)

        const years = [];
        const months = [];
        const sumByYear = [];
        const sumByMonth = [];

        for (const year in groupedOrders) {
        years.push('Anno ' + year);

        const yearData = groupedOrders[year];
        let yearSum = 0;

        for (const month in yearData) {
            const monthData = yearData[month];
            let monthSum = 0;

            months.push(year + '/' + month);

            for (const product of monthData) {
            const totalPrice = parseFloat(product.total_price);
            yearSum += totalPrice;
            monthSum += totalPrice;
            }

            sumByMonth.push(parseFloat(monthSum.toFixed(2)));
        }

        sumByYear.push(parseFloat(yearSum.toFixed(2)));
        }


        console.log(years);
        console.log(sumByYear);
        console.log(months);
        console.log(sumByMonth);



        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Guadagno €',
                    data: sumByYear,
                    backgroundColor: '#d14748' 
                }]
            }
        });

        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Guadagno €',
                    data: sumByMonth,
                    backgroundColor: '#d14748' 
                }]
            }
        });
    </script>


@endsection

