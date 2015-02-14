for line in $(cat $1); do
    SUM=0
    for n in $(echo $line | grep -o .); do
        SUM=$(($SUM+$n))
    done
    echo $SUM
done
