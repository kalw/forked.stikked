#!/bin/sh

CocoaDialogPath="/Applications/CocoaDialog.app/Contents/MacOS/CocoaDialog"
FS_URL="http://localhost/~rdespres/forked.stikked"
title=$($CocoaDialogPath standard-inputbox --title "Post Snippet to Snipplr" --informative-text "Enter the new snippet's title")
[[ $( (tail -r <<<"$title") | tail -n1)  == "2" ]] && exit_discard
title=$(tail -n1 <<<"$title")
title=`echo $title | tr " " "+"`

tags=$($CocoaDialogPath standard-inputbox --tags "Post Snippet to Snipplr" --informative-text "Enter the new snippet's tags")
[[ $( (tail -r <<<"$tags") | tail -n1)  == "2" ]] && exit_discard
tags=$(tail -n1 <<<"$tags")
tags=`echo $tags | tr " " "+"`

scope=`echo $TM_SCOPE | tr " " "+"`

snip=$($CocoaDialogPath textbox --button1 "ok" --editable  --informative-text "Enter the new snippet's text" |awk '{if (NR!=1) {print}}' | php -r "echo 'code='.urlencode(stream_get_contents(STDIN)).'&expire=0&lang=text&title='.urlencode($title).'&submit=submit&name=$TM_FULLNAME';")
[[ $( (tail -r <<<"$snip") | tail -n1)  == "2" ]] && exit_discard
#echo $snip 
echo $snip | curl -d @- -s $FS_URL/index.php
