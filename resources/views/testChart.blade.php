<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>

    <div id="myfirstchart" style="height: 250px;"></div>

    <?php 
    
        if($data) {
            echo $data;
        }
    
    ?>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    year: '2008',
                    total: 20,
                    total: 15
                },
                {
                    year: '2009',
                    value: 10,
                    total: 15
                },
                {
                    year: '2010',
                    value: 5,
                    total: 15
                },
                {
                    year: '2011',
                    value: 5,
                    total: 15
                },
                {
                    year: '2012',
                    value: 20,
                    total: 15
                }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value', 'total'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value', 'total']
        });
    </script>
</body>

</html>