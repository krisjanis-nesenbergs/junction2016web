var ZZZYield = {
    init: function(data){
        this.graph(data);
    },

    graph: function(data){
        var dates = [];
        var sleep_data = [];
        var datet = "";
        var scoret = "";
        for(i=0;i<data.sleep.sleep.length;i++){
            datet = data.sleep.sleep[i].summary_date;
            ind = dates.indexOf(datet);
            scoret = data.sleep.sleep[i].score_efficiency;
            if(ind == -1) {
                dates.push(datet);
                sleep_data.push(scoret);
            } else {
                sleep_data[ind] = (sleep_data[ind]+scoret);
            }
        }
        var activity_data = [];
        for(i=0;i<data.activity.activity.length;i++){
            datet = data.activity.activity[i].summary_date;
            ind = dates.indexOf(datet);
            if(ind>-1){
                activity_data[ind] = data.activity.activity[i].score_stay_active;
            }
        }

        var ctx = document.getElementById('graph_container').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dates,
            datasets: [{
              label: 'readiness',
              data: sleep_data,
              backgroundColor: "rgba(153,255,51,0.4)"
            }, {
              label: 'activity',
              data: activity_data,
              backgroundColor: "rgba(255,153,0,0.4)"
            }]
          }
        });

    }

}