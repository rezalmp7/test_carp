@extends('layout.layoutData')

@section('content')
<div class="col-12 m-0 p-0 body">
    <button onclick="setDataChart()" class="btn btn-sm btn-success">Refresh Chart</button>
    <div class="col-12 m-0 p-5">
        <h3>BERBASIS KOLOM STATUS</h3>
        <div class="col-6">
            <canvas id="chartStatus"></canvas>
        </div>
    </div>
    <div class="row p-5">
        <h3>BERBASIS KOLOM STAGE</h3>
        <div class="col-2">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Closed</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_closed">3,243</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Open</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_open">15.07</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Re-Open</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_reOpen">578</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Responded</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_responded">11.61</span
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Verified</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_verified">11.6</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Voided</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="id_text_count_voided">11.61</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 m-0 p-5">
        <div class="col-6">
            <canvas id="chartStatusctxEffectifiness"></canvas>
        </div>
    </div>
</div>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a013321b2a4b7c6b58b7', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('notification-send');
    channel.bind('NotificationEvent', function(data) {
        alert(JSON.stringify(data));
    });
</script>
<script>
    const ctxStatus = document.getElementById('chartStatus');

    var chartStatus = new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: [
                'Canceled',
                'Closed',
                'Open'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
    });

    const ctxEffectifiness = document.getElementById('chartStatusctxEffectifiness');

    var chartEffectifiness = new Chart(ctxEffectifiness, {
        type: 'bar',
        data: {
            labels: ['COMMERCIAL', 'CR', 'HR&GA', 'HSE', 'IT', 'KEY ACCOUNT', 'OPERATION', 'PROCUREMENT', 'SALES', 'TRUCKING'],
            datasets: [
                {
                    label: 'Effective',
                    data: [300, 50, 100],
                    borderColor: "rgb(255, 0, 0)",
                    backgroundColor: "rgba(255, 0, 0, 0.5)",
                },
                {
                    label: 'Not Effective',
                    data: [300, 50, 100],
                    borderColor: "rgb(0, 0, 132)",
                    backgroundColor: "rgb(0, 0, 132, 0.3)",
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        },

    });

    setDataChart();

    function setDataChart() {
        fetch("{{ url('/') }}"+"/api/get_chart", {
            method: 'GET',
            headers: {
                'Content-type': 'application/json',
            }
        })
        .then(function(response){ 
            return response.json()})
        .then(function(data) {
            console.log(data);
            document.getElementById("id_text_count_closed").innerHTML = data.count_carp_closed;
            document.getElementById("id_text_count_open").innerHTML = data.count_carp_open;
            document.getElementById("id_text_count_reOpen").innerHTML = data.count_carp_reOpen;
            document.getElementById("id_text_count_responded").innerHTML = data.count_carp_responded;
            document.getElementById("id_text_count_verified").innerHTML = data.count_carp_verified;
            document.getElementById("id_text_count_voided").innerHTML = data.count_carp_voided;
            
            chartStatus.data.datasets[0].data = [data.status_chart.count_canceled, data.status_chart.count_closed, data.status_chart.count_open];
            chartStatus.update();

            chartEffectifiness.data.datasets[0].data = [
                data.effective_chart.effective.commercial, 
                data.effective_chart.effective.cr, 
                data.effective_chart.effective.hrga, 
                data.effective_chart.effective.hse, 
                data.effective_chart.effective.it, 
                data.effective_chart.effective.keyaccount, 
                data.effective_chart.effective.operation, 
                data.effective_chart.effective.procurement, 
                data.effective_chart.effective.sales, 
                data.effective_chart.effective.trucking
            ];
            chartEffectifiness.data.datasets[1].data = [
                data.effective_chart.notEffective.commercial, 
                data.effective_chart.notEffective.cr, 
                data.effective_chart.notEffective.hrga, 
                data.effective_chart.notEffective.hse, 
                data.effective_chart.notEffective.it, 
                data.effective_chart.notEffective.keyaccount, 
                data.effective_chart.notEffective.operation, 
                data.effective_chart.notEffective.procurement, 
                data.effective_chart.notEffective.sales, 
                data.effective_chart.notEffective.trucking
            ];
            chartEffectifiness.update();
        }).catch(error => console.error('Error:', error));
    }
</script>
@endsection