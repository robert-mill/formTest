function charts(data,ChartType) {
    var c = ChartType;
    var jsonData = data;
    google.load("visualization", "1", {packages: ["corechart"], callback: drawVisualization});

    function drawVisualization() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Gender');
        data.addColumn('number', 'Age');
        $.each(jsonData, function (i, jsonData) {
            var gender = jsonData.gender[0];
            var age = jsonData.age;
            data.addRows([[gender, age]]);
        });
        var options = {
            title : "Gender age",
            colorAxis: {colors: ['#54C492', '#cc0000']},
            datalessRegionColor: '#dedede',
            defaultColor: '#dedede'
        };
        var chart;
        if(c=="ColumnChart")
            chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        else if(c=="PieChart")
            chart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        chart.draw(data, options);
    }
}

$(function () {



    const options = [];
    const bootFormClass = new formClass(options);

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors);

    bootFormClass.addOptionLoop(18,120, 'selectage');
    bootFormClass.retrieveFormValues();
    $('input[type="text"]').on('change', function () {
        let tv = $( this ).val();
        let tn = $(this).attr('name');
        bootFormClass.storeValue(tn,tv);
    });
    $('input[type="email"]').on('change', function () {
        let tv = $( this ).val();
        let tn = $(this).attr('name');
        bootFormClass.storeValue(tn,tv);
    });
    $('input[type="phone"]').on('change', function () {
        let tv = $( this ).val();
        let tn = $(this).attr('name');
        bootFormClass.storeValue(tn,tv);
    });
    $('input[type="radio"]').on("change", function(){
        let tv =   $( this ).val();
        let tn = $(this).attr('name');
        bootFormClass.storeValue(tn,tv);
    });
    $('select').on('change', function () {
        let tv = $(this).val();
        let tn = $(this).attr('name');
        bootFormClass.storeValue(tn, tv);
    });

    $('form').submit(function (e) {
        const data = $(this).serialize();
        e.preventDefault();

        bootFormClass.validate();
        bootFormClass.actionForm(data);
        google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors);
    });
    const url='/api/formAction.php?chart=data';
    bootFormClass.ajax_data('GET',url, function(data){
        charts(data,"ColumnChart");
        charts(data,"PieChart");
    });

});



