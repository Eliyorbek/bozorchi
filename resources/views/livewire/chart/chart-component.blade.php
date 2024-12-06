<div wire:ignore>
    <div class="row">
        <div class="col-lg-6">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="myKuryer"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const cty = document.getElementById('myKuryer');
        const label = @json($chartData['labels']);
        const data = @json($chartData['data']);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    label: 'Haridlar',
                    data: data,
                    borderWidth: 1
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


    </script>

</div>