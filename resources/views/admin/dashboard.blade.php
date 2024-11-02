@extends('layouts.dashboard')

@section('content')
    <div class="flex bg-[#5DB9FF] px-8 rounded-lg border border-gray-300 mb-8">
        <div class="flex-1 flex flex-col justify-between py-6 mr-4 text-white">
            <p>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
            <div>
                <h2 class="text-2xl font-bold">Good Day, Admin!</h2>
                <p class="mt-2">Have a Nice Day!</p>
            </div>
        </div>
        <div class="flex-none">
            <img src="{{ asset('assets/admin-image.png') }}" alt="Admin Image" class="h-48 w-48 object-cover">
        </div>
    </div>

    <div class="container mx-auto mb-8">
        <h3 class="text-xl font-semibold mb-4">Survey Results</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-row-1 md:grid-row-2 gap-4">
                <!-- Line Chart -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <canvas id="lineChart"></canvas>
                </div>

                <!-- Bar Chart -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white p-4 rounded-lg shadow">
                <canvas id="pieChart"></canvas>
            </div>
        </div>


    </div>

    <script>
        // Line Chart
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // Example labels
                datasets: [{
                    label: 'Survey Participation',
                    data: [12, 19, 3, 5, 2, 3, 7], // Example data points
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Positive', 'Neutral', 'Negative'], // Example labels
                datasets: [{
                    label: 'Survey Feedback',
                    data: [55, 25, 20], // Example data points
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Survey Feedback Distribution'
                    }
                }
            }
        });

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // Example labels
                datasets: [{
                    label: 'Number of Responses',
                    data: [12, 19, 3, 5, 2, 3, 7], // Example data points
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
