 <body topmargin=0 leftmargin=0><style>
a { text-decoration:none;color:black;}
@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);
body {font-family:Nanum Barun Gothic,NanumGothic,Malgun Gothic;}
</style>
<title>현대공업고등학교</title>
<table width="900" align="center" cellspacing="0" style="border-collapse:collapse;">
    <tr>
        <td background="1.jpg" height="40" style="border-width:1; border-color:black; border-style:none;" valign="bottom"><font size="3" color="white">현대공업고등학교 통합 시스템</font></td>
    </tr>
    <tr>
        <td style="border-width:1; border-color:black; border-style:none;">
            <font size="2" color="blue">20114  </font><font size="2"><a href="#" onclick="window.open('pass_change_s.php?number=20114','','width=400,height=400,statusbar=no,scrollbars=yes,toolbar=no');">[비밀번호 변경]</a><a href="logout.php"> [로그아웃.]</a></font>
</td>
    </tr>
    
</table>
<p align="center">&nbsp;</p>
<form name="form11" method="post">
<table width="900" align="center" cellspacing="0" style="border-collapse:collapse;">
		
		
			    <tr>
        <td style="border-width:1; border-color:rgb(153,153,153); border-style:solid;" height="60"><p align="center"><button type="button" onclick="func_menu('repair');" style="width:220;height:30;font-family:Nanum Barun Gothic,NanumGothic,Malgun Gothic;"><font size="3">수리의뢰</font></button></p></td>
        <td style="border-width:1; border-color:rgb(153,153,153); border-style:solid;">행정실이나 정보실에 수리 의뢰</td>
    </tr>
				<br />
<b>Warning</b>:  mysql_num_rows(): supplied argument is not a valid MySQL result resource in <b>/home/hosting_users/hsj69/www/sj/student.php</b> on line <b>96</b><br />
	<tr>
        <td style="border-width:1; border-color:rgb(153,153,153); border-style:solid;" height="60"><p align="center"><button type="button" onclick="location.href='./survey/student.php';" style="width:220;height:30;font-family:Nanum Barun Gothic,NanumGothic,Malgun Gothic;"><font size="3">설문조사</font></button></p></td>
        <td style="border-width:1; border-color:rgb(153,153,153); border-style:solid;">
			진행되는 설문이 없습니다.		</td>
    </tr>
	</table>
<br>

</form>
<p align="center"><iframe name="m2" width="0" height="0" frameborder="no"  marginwidth="0" marginheight="0" topmargin="0" scrolling="no"></iframe>
</p>
<script>
function func_menu(s_menu,stu_check){
	if(stu_check == "등록"){alert('강좌등록중입니다.');return;}
	if(stu_check == "시간표"){alert('시간표 작업중입니다.');return;}
	document.form11.target = "m2";
	document.form11.action = "menu_check_s.php?s_menu="+s_menu; 
	document.form11.submit();
}

function func_chat(number){
	var left_p = (screen.width - 500)/2;
	var hhh  = screen.height;
	var num = "20114";
	openwin = window.open("chat_start_stu.php?num=20114","","scrollbars=yes,width=500,height="+hhh+",left="+left_p+"");
}

function func_sul(UID){
	var left_p = (screen.width - 500)/2;
	var hhh  = screen.height;
	var num = "20114";
	openwin = window.open("./survey/select.php?UID="+UID,"","scrollbars=yes,width=500,height="+hhh+",left="+left_p+"");
}
</script>
