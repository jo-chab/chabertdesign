// Ensure this script is loaded after the HTML content
document.addEventListener('DOMContentLoaded', function () {
    // Your Google Analytics API endpoint
    const analyticsEndpoint = 'https://analyticsreporting.googleapis.com/v4/reports:batchGet';

    // Your OAuth client ID and access token (obtained through server-side authentication)
    const clientId = '587356274298-lbtikuhrt801s1glu84qsut81e5b3pap.apps.googleusercontent.com';
    const accessToken = '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';

    // Your Google Analytics View ID
    const viewId = 'YOUR_GA_VIEW_ID';

    // Chart configuration
    const chartConfig = {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Number of Visitors',
                data: [],
            }],
        },
    };

    // Make an API request to fetch data
    axios({
        method: 'post',
        url: analyticsEndpoint,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json',
        },
        data: {
            reportRequests: [
                {
                    viewId: viewId,
                    dateRanges: [{ startDate: '2023-01-01', endDate: '2023-01-31' }],
                    metrics: [{ expression: 'ga:users' }],
                    dimensions: [{ name: 'ga:date' }],
                },
            ],
        },
    })
        .then(response => {
            // Process the response and extract data
            const data = response.data.reports[0].data.rows;

            // Update chart data
            chartConfig.data.labels = data.map(row => row.dimensions[0]);
            chartConfig.data.datasets[0].data = data.map(row => parseInt(row.metrics[0].values[0], 10));

            // Use Chart.js to create or update the chart
            const ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, chartConfig);

            // Update textual information
            const visitorInfoContainer = document.getElementById('visitorInfo');
            visitorInfoContainer.innerHTML = `Total Visitors: ${data.reduce((sum, row) => sum + parseInt(row.metrics[0].values[0], 10), 0)}`;
        })
        .catch(error => {
            console.error('Error fetching Google Analytics data:', error);
        });
});
