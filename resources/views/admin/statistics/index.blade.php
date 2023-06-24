@extends('layouts.admin') 


@section('content')

    <div class="container chart my-5">
        <h2 class="text-center">Guadagno annuale</h2>
        <div class="spinner text-center py-2">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>              
        </div>
        <canvas id="myChart"></canvas>
    </div>


    <div class="container chart my-5">
        <h2 class="text-center">Guadagno mensile</h2>
        <div class="spinner text-center py-5">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>              
        </div>
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


        var ctx1 = document.getElementById('myChart').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['','','','','',''],
                datasets: [{
                    label: 'Guadagno €',
                    data: [0,0,0],
                    backgroundColor: '#d14748' 
                }]
            }
        });
        
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['','',''],
                datasets: [{
                    label: 'Guadagno €',
                    data: [0,0,0],
                    backgroundColor: '#d14748' 
                }]
            }
        });
        
        setTimeout(() => {
            let spinners = document.querySelectorAll('.spinner')
            for (let i = 0; i < spinners.length; i++) {
                spinners[i].innerHTML = ''
            }
            
            destroyCharts();
            loadCharts();
        }, 3500);

        function destroyCharts() {
            if (chart1) {
                chart1.destroy(); 
            }
            if (chart2) {
                chart2.destroy(); 
            }
        };

        function loadCharts() {
        var ctx1 = document.getElementById('myChart').getContext('2d');
        chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Guadagno €',
                    data: sumByYear,
                    backgroundColor: '#d14748' 
                }]
            },
            options: {
                animation: {
                    duration: 4999, 
                }
            }
        });
        
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Guadagno €',
                    data: sumByMonth,
                    backgroundColor: '#d14748' 
                }]
            },       
            options: {
                animation: {
                    duration: 5000, 
                }
            }
        });
        }
        </script>
@endsection

