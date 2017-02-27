<html>
    <head>
        
    </head>
<body>

        <script>
        function daysInMonth(month,year) {
            return new Date(year, month, 0).getDate();
        }
        function pad(x){
            if(x< 10){
                x= "0"+x;
                
            }
            return x;
        }
        function ajout_jour_date_string(str,add){
            var date;
            var y = Number(str.substring(0,4));
            var m = Number(str.substring(5,7));
            var d = Number(str.substring(8,10)) + add;
            var h = Number(str.substring(11,13));
            var min = Number(str.substring(14,16));
            var s = Number(str.substring(17,19));
            
            if( d > daysInMonth(m,y)){
                m= m + Math.floor(d/daysInMonth(m,y));
                d = d - daysInMonth(m-1,y);
                if(m > 12){
                    m= m + Math.floor(m/12)
                    y=y+1;
                }
            }
            date = y+"/"+pad(m)+"/"+pad(d)+"T"+pad(h)+":"+pad(min)+":"+pad(s)
            return date;
        }
        alert("02/26/2017T12:00:02" < "02/26/2017T12:01:00");
        </script>
                        
</body>
                        
</html>