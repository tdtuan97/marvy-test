for ((request=1;request<=100;request++))
do
    for ((x=1;x<=10;x++))
    do
        #Start time
        read up rest </proc/uptime; t1="${up%.*}${up#*.}"

        curl --location --request POST 'http://127.0.0.1:8000/api/v1/user/1/point' \
        --header 'X-Token: fPzcnjy9fKq+5SzH9nvuvveDN9S25SweH2XkeVVINTU=' \
        --header 'Authorization: Bearer 3|l6VIEnpjTh7iaLFjgHIwXkbr4aUcTBrfZVdoJC1f' \
        --header 'Content-Type: application/x-www-form-urlencoded' \
        --data-urlencode 'point=500' \
        --data-urlencode "game_id=$x"

        #End time
        read up rest </proc/uptime; t2="${up%.*}${up#*.}"
        millisec=$(( 10*(t2-t1) ))
        echo " Client: [$request] - With time: [$millisec]";
    done
done

wait
