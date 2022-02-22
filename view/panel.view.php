<?php

    $auth = Authentication::check();
    
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $footer_files[] =  BASE_URL."/node_modules/chart.js/dist/chart.min.js";
    $meta_data['document_title'] = 'Kawi: Admin Panel';
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";

    
    
    $visitors_counts = countFromDateArray($viewers, "date");
    $chart2_titles = [$recent_articles[0]['title'],$recent_articles[1]['title'],$recent_articles[2]['title']];
    $chart2_values = [$recent_articles[0]['total_viewers'],$recent_articles[1]['total_viewers'],$recent_articles[2]['total_viewers']];
    
?>

<div class="row">
        <div class="col-12">
            <div class="card my-3 min-vh-100 mb-3 shadow-lg pt-4 px-3 p-lg-5 rounded">
                <div class="row">
                    <div class="col-12 col-xl-6 col-xl-5">
                        <h4>Daily Visitors</h4>
                        <div class="my-3 my-xl-0 chart-container" >
                            <canvas id="10days-visitors-chart" class="w-100 h-100"></canvas>
                        </div>
                        
                    </div>
                    <div class="col-12 col-xl-6 col-xl-5 mt-4 mt-xl-0">
                        <h4>Recent Articles Engagement</h4>
                        <div class="my-3 my-xl-0 chart-container">
                            <canvas id="engagement-chart" class="w-100 h-100"></canvas>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require "./view/template/footer.view.php";


?>
<script>
const ctx = document.getElementById('10days-visitors-chart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_keys($visitors_counts)) ?>,
        datasets: [{
            label: '# Visitors',
            data: <?= json_encode(array_values($visitors_counts)) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio:true
    }
});

const ctx2 = document.getElementById('engagement-chart').getContext('2d');
const engagementChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels:['Web3','Web2','Web1.0'],
        datasets: [{
            label: '# of Engagement',
            data: <?= json_encode($chart2_values) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio:true
    }
});
</script>
 