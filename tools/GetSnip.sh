#!/bin/sh

CocoaDialogPath="/Applications/CocoaDialog.app/Contents/MacOS/CocoaDialog"
FS_URL="http://localhost/~rdespres/forked.stikked"

tags=$($CocoaDialogPath standard-inputbox --title "Get Snippet From Snipplr" --informative-text "Enter tags to search for")
[[ $( (tail -r <<<"$tags") | tail -n1)  == "2" ]] && exit_discard
tags=$(tail -n1 <<<"$tags")
tags=`echo $tags | tr " " "+"`


data=`curl -s $FS_URL/index.php/api/search/term/$tags/subject/only/format/txt| sed -e 's/"//g'`

#echo $data
#test=`echo $data|grep 'NoResults.';echo $?`
#echo $test
#exit
if [ "`echo $data|grep 'NoResults.'> /dev/null;echo $?`" == "0" ]
then
	res=$($CocoaDialogPath ok-msgbox --no-cancel --title "Snipplr" --text "No snippets found.")
	exit
fi

ids=`awk '{printf $1" "}' <<<"$data"`
titles=`awk '{printf $2" "}' <<<"$data"`

#echo $titles
#echo $ids

res=$($CocoaDialogPath standard-dropdown --title "Snipplr" --text "Select Snippet" ‑‑exit‑onchange --items $titles)
[[ $( (tail -r <<<"$res") | tail -n1)  == "2" ]] && exit_discard


res=$(tail -n1 <<<"$res")
#echo "$res"
res=$(expr $res + 2)
#echo "$res"

#echo $ids
res=`echo "$ids" |cut -d " " -f $res|sed -e 's/ $//' `
#echo $res

curl -s $FS_URL/index.php/api/raw/format/txt/pid/$res |sed -e 's/^"//' -e 's/".*$//' | pbcopy
$CocoaDialogPath bubble --debug --title "Snip $res" --text "`pbpaste |head -n1|cut -c 1-16` ... copied to clipboard"
