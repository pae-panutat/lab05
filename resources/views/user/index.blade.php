@extends('user.master')
@section('title','Welcome Homepage')
@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>  
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Kanit:wght@300&display=swap');
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    
    <div class="container">
        <div class"row">
            <div class="col-md-12">
            <br><br>

                <div align="right"><a href="{{ route('contact.create') }}" class="btn btn-success">เพิ่มข้อมูล</a></div><br>

                {{-- {{ $result }} --}}
                {{--{{ dd(json_decode($result, true)) }} --}}

                @foreach(json_decode($result, true) as $value)
                    {{ $value['meter'] }} /
                    {{ $value['created_at'] }} <br>   
                @endforeach
                  
                </div>
        </div>


        <div class"row">
            <div class="col-md-12">
                <canvas id="chart"  width="500" height="280"></canvas>
            </div>
        </div>
    </div>


<script>
        let newMeter = []
        let newCreated_at = []

        let meter =  JSON.parse(`<?php echo $result; ?>`);
        // console.log(meter);

        for (let i = 0; i < meter.length; i++) {
            meter[i] + "<br>";
            // console.log( meter[i])
            // console.log( meter[i].meter)
            // console.log( meter[i].created_at)
            newMeter.push(meter[i].meter)
            newCreated_at.push(meter[i].created_at)
        }


        let canvas5 = document.getElementById("chart").getContext('2d'),
        gradient = canvas5.createLinearGradient(0, 0, 0, 600);
        
        gradient.addColorStop(0, 'rgba(245, 57, 0, 0.74)');
        gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
        gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');
          
            //Chart.defaults.global.defaultFontFamily = 'Helvetica';
            //Chart.defaults.global.defaultFontSize = 12;
            //Chart.defaults.global.defaultFontColor = '#777'
            //chart.destroy();
        let myChart = new Chart(canvas5, {
               
                responsive: true,
                maintainAspectRatio: false,
                type: 'line',
        
                data: {
                    labels: newCreated_at,
                    datasets: [
                        {
                        label: 'Data Meter', 
                        data: newMeter,
                        fill: true,
                        lineTension: 0.1,
                        borderDash: [0, 0],
                        display: true,
                        backgroundColor: gradient,
                        pointBackgroundColor: '#f53900',
                        pointBorderColor: '#f53900',
                        pointBorderWidth: 2,
                        borderWidth: 2,
                        borderColor: '#f53900',
                        yAxisID: 'left-y-axis',
                        },
                    ]
                },
          
                options: {
                        animation: false,
                        tooltips: {
                            mode: 'index',
                            yAlign: 'bottom',
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                },
                            },
                        backgroundColor: '#000000'
                        },
                    legend: {
                        labels: {
                            fontColor: "#000000",
                            fontSize: 15
                         }
                    },
        
                    // scales: {
                    //         yAxes: [{
                    //             ticks: {
                    //                 beginAtZero: true,  
                    //                 fontColor: "#000000",
                    //                 suggestedMin: 0,
                    //                 suggestedMax: 6
                    //             },
                    //             id: 'left-y-axis',
                    //             type: 'linear',
                    //             position: 'left' 
                    //         }],
                    //         xAxes: [{
                    //         ticks: {
                    //             fontColor: "#000000",
                    //             scaleFontSize: 40,
                    //             type: 'time',
                    //             time: {
                    //             displayFormats: {
                    //                 quarter: 'MMM YYYY'
                    //             }
                    //         }
                    //         },
                    //     }]
                    // }
                }
        });   
</script>
        

@endsection