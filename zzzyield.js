var ZZZYield = {
    init: function(data,deezer,uid){
        this.graph(data);
        this.deezer(deezer,uid);
    },

    deezer: function(deezer,uid){
        var img = document.getElementById('graph_container');
        var dz = deezer.a0;
        if(uid==1) dz = deezer.a1;
        if(iid==2) dz = deezer.a2;
        var src = dz.cover_medium;
        src = src.replace(/\\\//g, "/");
        img.src=src;  

    },

    graph: function(data){
        var dates = ["Start date"];
        var sleep_data = ["0"];
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
        var activity_data = ["0"];
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