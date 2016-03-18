#!/bin/sh
value=`cat globalcount.txt`
#echo "$value"
foldername="repository/"$value
echo "$foldername"

mkdir $foldername
cp wireframe.R folds.txt model.txt output.csv summary.csv response.txt predsFile.txt comment.txt model.RDS $foldername
zipname=$foldername".zip"
zip -r $zipname $foldername
