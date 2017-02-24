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
                alert(x);
            }
            return x;
        }
        function ajout_jour_date_string(str,add){
            var date;
            alert(str.substring(0,4)+" "+str.substring(5,1)+" "+str.substring(8,1)+" "+str.substring(11,1)+" "+str.substring(14,1)+" ")+str.substring(17,1);
            var y = Number(str.substring(0,4));
            var m = Number(str.substring(5,2));
            var d = Number(str.substring(8,2)) + add;
            var h = Number(str.substring(11,2));
            var min = Number(str.substring(14,2));
            var s = Number(str.substring(17,2));
            
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
        alert(ajout_jour_date_string("2017/02/24T10:42:00",2));
        </script>
                        
</body>
                        
</html>