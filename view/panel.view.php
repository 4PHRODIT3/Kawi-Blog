<?php
    
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $footer_files[] =  BASE_URL."/node_modules/chart.js/dist/chart.min.js";
    $meta_data['title'] = 'Kawi: Admin Panel';
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";

    
    
    $visitors_counts = countFromDateArray($viewers, "date");
  
    $chart2_titles = [compressText($recent_articles[0]['title'], 10),compressText($recent_articles[1]['title'], 10),compressText($recent_articles[2]['title'], 10)];
    $chart2_values = trimArrayValueWithKey($recent_articles, "total_viewers");
    
?>

<div class="row">
        <div class="col-12">
            <div class="my-3 min-vh-100 mb-3  pt-4 px-0 px-lg-5">
                <div class="row">
                    <div class="col-12 col-xl-6  mb-3 mb-xl-0">
                        <div class="card p-4 p-xl-5 rounded shadow-lg">
                            <h4>Daily Visitors</h4>
                            <div class="my-3 my-xl-0 chart-container mb-xl-0" >
                                <canvas id="10days-visitors-chart" class="w-100 h-100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6  mb-3 mb-xl-5">
                        <div class="card p-4 p-xl-5 rounded shadow-lg">

                            <h4>Recent Articles Engagement</h4>
                            <div class="my-3 my-xl-0 chart-container  pb-5 pb-xl-0">
                                <canvas id="engagement-chart" class="w-100 h-100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card p-4 p-xl-3 rounded shadow-lg">
                            <div class="card-body">
                                <div class="row justify-content-around align-items-center counters">
                                    <a href="/article/manipulate" class="col-12 col-xl-4 mb-3 mb-xl-0">
                                        <div class="text-center mt-3 counter-img-container">
                                            <img src="<?= BASE_URL ?>/assets/img/undraw_blog_post_re_fy5x.svg" class="w-75 h-100" alt="Kawi Content Creator Illustration" />

                                        </div>

                                        <div class="text-center mt-5">
                                            <h1 class="text-danger"><?= $total_articles['total'] ?></h1>
                                            <h4 class="my-4">Articles</h4>
                                            
                                        </div>
                                    </a>
                                    <a href="/user" class="col-12 col-xl-4 mb-3 mb-xl-0">
                                        <div class="text-center mt-3 counter-img-container">
                                            <img src="<?= BASE_URL ?>/assets/img/undraw_team_spirit_re_yl1v.svg" class="w-75 h-100" alt="Kawi Content Creator Illustration" />

                                        </div>

                                        <div class="text-center mt-5">
                                            <h1 class="text-danger"><?= $total_users['total'] ?></h1>
                                            <h4 class="my-4">Coworkers</h4>
                                        </div>

                                        
                                    </a>
                                    <a href="/subscribers" class="col-12 col-xl-4 mb-3 mb-xl-0">
                                        <div class="text-center mt-3 counter-img-container">
                                            <img src="<?= BASE_URL ?>/assets/img/undraw_subscriber_re_om92.svg" class="w-75 h-100" alt="Kawi Content Creator Illustration" />

                                        </div>

                                        <div class="text-center mt-5">
                                            <h1 class="text-danger"><?= $total_subscribers['total'] ?></h1>
                                            <h4 class="my-4">Subscribers</h4>
                                        </div>
                                        
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 my-3 my-xl-0">
                        <div class="card p-3  rounded shadow-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="text-center">
                                        <img src="<?= BASE_URL ?>/assets/img/undraw_typewriter_re_u9i2.svg" class="w-75 h-75" alt="Kawi Content Creator Illustration" />

                                    </div>
                                    <h6 class="my-4">Create Your Desire Ideas into Impressive Contents Now!</h6>
                                    <a href="/article" class="btn btn-danger d-flex align-items-center justify-content-center"><img class="icon mr-2 mb-2" src="<?= BASE_URL ?>/assets/icons/icons8-create-50.png" alt="Create Content Icon" /> Create Contents</a>
                                </div>
                                
                            </div>
                            
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
        maintainAspectRatio:true,
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 16,
                        family: "'Noto Sans Myanmar','Roboto',sans-serif",
                    }
                }
            }
        }
    }
});

const splitLabels = <?= json_encode($chart2_titles) ?>;


const ctx2 = document.getElementById('engagement-chart').getContext('2d');
const engagementChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels:<?= json_encode($chart2_titles) ?>,
        datasets: [{
            label: '# Last 3 Articles Viewers',
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
        maintainAspectRatio:true,
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 16,
                        family: "'Noto Sans Myanmar','Roboto',sans-serif",
                    }
                }
            }
        }
    }
});
</script>
 