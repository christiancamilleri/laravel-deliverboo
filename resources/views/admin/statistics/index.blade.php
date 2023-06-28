@extends('layouts.admin')


@section('content')

<div class="statistics-index">

    @if (count($groupedOrders))

        <div class="bg-dark rounded rounded-4 container chart mb-5 p-3 cont">
            <div class="text-center">
                <h2>Guadagno mensile</h2>
                <em>(ultimi 6 mesi)</em>

            </div>
            <div class="spinner text-center">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <canvas id="myChart2"></canvas>
        </div>


        <div class="bg-dark rounded rounded-4 container chart mb-5 p-3 cont">
            <h2 class="text-center">Guadagno annuale</h2>
            <div class="spinner text-center">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <canvas id="myChart"></canvas>
        </div>
    
    @else
        <div class="alert alert-secondary" role="alert">
            Il tuo ristorante non ha statistiche da visualizzare
        </div>
    @endif
</div>


    <script>
        let groupedOrders = {!! json_encode($groupedOrders) !!};

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

                months.push({
                    year,
                    month
                });

                for (const product of monthData) {
                    const totalPrice = parseFloat(product.total_price);
                    yearSum += totalPrice;
                    monthSum += totalPrice;
                }

                sumByMonth.push(parseFloat(monthSum.toFixed(2)));
            }

            sumByYear.push(parseFloat(yearSum.toFixed(2)));
        }
        // Ottenere la data odierna
        const today = new Date();
        // Calcolare la data di 12 mesi fa
        const oneYearAgo = new Date();
        oneYearAgo.setFullYear(today.getFullYear() - 1);

        let orderedMonths = months
            .filter(({
                year,
                month
            }) => {
                const dataElemento = new Date(year, month - 1); // Il mese inizia da 0 (gennaio = 0)
                return dataElemento >= oneYearAgo && dataElemento <= today;
            })
            .map(({
                year,
                month
            }) => `${month}/${year}`)
            .sort((a, b) => {
                const [monthA, yearA] = a.split('/');
                const [monthB, yearB] = b.split('/');
                return new Date(yearA, monthA - 1) - new Date(yearB, monthB - 1);
            });

        let ctx1 = document.getElementById('myChart').getContext('2d');
        let chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['', '', '', '', '', ''],
                datasets: [{
                    label: 'Guadagno €',
                    data: [0, 0, 0],
                    backgroundColor: '#d14748'
                }]
            },
            options: {
                    animation: {
                        duration: 5000,
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse x
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse y
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        }
                    }
                }
        });

        let ctx2 = document.getElementById('myChart2').getContext('2d');
        let chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['', '', ''],
                datasets: [{
                    label: 'Guadagno €',
                    data: [0, 0, 0],
                    backgroundColor: '#ffcc4c'
                }]
            },
            options: {
                    animation: {
                        duration: 5000,
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse x
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse y
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        }
                    }
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
            let ctx1 = document.getElementById('myChart').getContext('2d');
            chart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Guadagno €',
                        data: sumByYear,
                        backgroundColor: '#8d1616'
                    }]
                },
                options: {
                    animation: {
                        duration: 5000,
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse x
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse y
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        }
                    }
                }
            });

            let ctx2 = document.getElementById('myChart2').getContext('2d');
            chart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: orderedMonths,
                    datasets: [{
                        label: 'Guadagno €',
                        data: sumByMonth,
                        backgroundColor: '#ffcc4c',
                    }]
                },
                options: {
                    animation: {
                        duration: 5000,
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse x
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        },
                        y: {
                            ticks: {
                                color: '#ffffff' // Cambia il colore del testo delle etichette dell'asse y
                            },
                            grid: {
                                color: '#5b5b5b' // Cambia il colore della griglia sull'asse y
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection


