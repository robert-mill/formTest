var currentSelection ='age';
function charts(data,ChartType) {
    var c = ChartType;
    var jsonData = data;
    google.load("visualization", "1", {packages: ["corechart"], callback: drawVisualization});

    function drawVisualization() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Gender');
        data.addColumn('number', currentSelection);
        $.each(jsonData, function (i, jsonData) {
            var gender = jsonData.gender[0];

            if(currentSelection === 'age'){
                var age = jsonData.age;
                data.addRows([[gender, age]]);
            }else{
                var height = jsonData.height;
                data.addRows([[gender, height]]);
            }


        });
        var options = {
            title : "Gender "+ currentSelection,
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
    };
};

$(function () {

    const options = [];
    const bootFormClass = new formClass(options);

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors);

    bootFormClass.addOptionLoop(18,120, 'selectage');
    bootFormClass.addOptionLoop(50, 220, 'selectheight');

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
        if(tn==='selectOption'){
            let url='/api/formAction.php?chart='+tv;
            currentSelection = tv;
            bootFormClass.ajax_data('GET',url, function(data){

                charts(data,"ColumnChart");
                charts(data,"PieChart");
            });
            google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors(tv));
        }
    });
    $(".chart-select").on("click", function () {
        $(".chart-select").toggleClass('active');
        $(".charts").toggleClass('active');
    });
    $(".chart-select-content").on("click", function () {
        $(".chart-select-content").toggleClass('active');
        let tv = $(this).attr('id');
        let url='/api/formAction.php?chart='+tv;
        currentSelection = tv;
        bootFormClass.ajax_data('GET',url, function(data){

            charts(data,"ColumnChart");
            charts(data,"PieChart");
        });
        google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors(tv));


    });

    $('form').submit(function (e) {
        const data = $(this).serialize();
        e.preventDefault();
        bootFormClass.validate();
        var res = bootFormClass.actionForm(data, currentSelection);

        // if(res){
        //     google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors(currentSelection));
        // }
        //google.charts.setOnLoadCallback(bootFormClass.drawAxisTickColors('age'));
    });
    const url='/api/formAction.php?chart=age';
    bootFormClass.ajax_data('GET',url, function(data){
        charts(data,"ColumnChart");
        charts(data,"PieChart");
    });

});



