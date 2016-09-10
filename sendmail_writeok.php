<html>
<head><title>메일보내는 부분</title></head>
<body>
<?

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */
$html_on = $HTTP_POST_VARS['html_on'];
$send_email = $HTTP_POST_VARS['send_email'];
$subject = $HTTP_POST_VARS['subject'];
//if($html_on!=null){
$message = nl2br($HTTP_POST_VARS['message']);
//}else{
//$message = $HTTP_POST_VARS['message'];
//}
//htmlspecialchars

//받는 사람
$to_email = "abin030187@naver.com";

//메일 헤더
$mailheader="Content-type:text/html;charset=EUC_KR";



/* PHP form validation: the script checks that the Email field contains a valid email address and the Subject field isn't empty. preg_match performs a regular expression match. It's a very powerful PHP function to validate form fields and other strings - see PHP manual for details. */
if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $send_email)) {
  echo "<script>alert('이메일주소를 올바르게 작성해 주세요.');history.back(1);</script>";
//  echo "<h4>이메일주소를 올바르게 작성해 주세요.</h4>";
//  echo "<a href='javascript:history.back(1);'>Back</a>";
} elseif ($subject == "") {
	 echo "<script>alert('제목을 입력해 주세요');history.back(1);</script>";
 // echo "<h4>제목을 입력해 주세요</h4>";
//  echo "<a href='javascript:history.back(1);'>Back</a>";
}

/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
elseif (mail($to_email,$subject,$message,$mailheader,"-f".$send_email)) {
 echo "<script>alert('메일문의가 접수되었습니다.');history.back(1);</script>";
//  echo "<h4>메일문의가 접수되었습니다. 감사합니다.</h4>";
} else {
  echo "<h4>Can't send email to $to_email</h4>";
}
?>
</body>
</html>
