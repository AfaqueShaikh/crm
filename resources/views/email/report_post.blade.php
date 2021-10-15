<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title></title>
  <style type="text/css">
    li{
      list-style: none;
      display: inline-block;
      margin: 0;
    }
    a{
      text-decoration:none; 
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
</head>
<body>
 <table border="0" cellpadding="0" cellspacing="0" height="100%" id="bodyTable" width="100%">
 	<tbody>
 		<tr>
 			<td align="center" valign="top">
 			<table border="0" cellspacing="0" id="emailContainer" width="600">
 				<tbody>
 					<tr>
 						<td align="center" valign="top">
 						<table border="0" cellpadding="20" cellspacing="0" id="emailHeader" width="100%">
 							<tbody>
 								<tr>
 									<td align="center" style="padding-bottom: 0;" valign="top"><img alt="logo" src="https://www.wandermonkey.com/images/WanderMonkey.png" /></td>
 								</tr>
 							</tbody>
 						</table>
 						</td>
 					</tr>
 					<tr>
 						<td align="center" valign="top">
 						<table border="0" cellspacing="0" id="emailBody" width="100%">
 							<tbody>
 								<tr>
 									<td align="left" valign="top">
 									<p style="font-family: 'Montserrat', sans-serif; color: #FF0012;border-bottom: 1px solid #58595b;padding: 15px 0;font-size: 22px;letter-spacing: 0.040em;">REPORT POST</p>
                  

                  <p style="font-size: 18px;letter-spacing: 0.040em;font-family: 'Lato', sans-serif;margin-bottom: 0;">Dear Admim,</p>

 									<p style="font-size: 18px;letter-spacing: 0.040em;font-family: 'Lato', sans-serif;margin-bottom: 0;margin-top: 5px;padding-left: 15px;"><a href="{{$html['user_profile_url']}}">{{ $html['name'] }}</a> reported a post <a href="{{ $html['post_url'] }}">open post</a>.</p>

                  <p style="font-size: 18px;letter-spacing: 0.040em;font-family: 'Lato', sans-serif;margin-bottom: 0;margin-top: 5px;padding-left: 15px;color:red;">Reason:- {{ $html['reason'] }}</p>

 									</td>
 								</tr>
 							</tbody>
 						</table>
 						</td>
 					</tr>
 					<tr>
 						<td align="center" valign="top">
 						<table border="0" cellpadding="20" cellspacing="0" id="emailFooter" width="100%">
 							<tbody>
 								<tr>
 									<td align="center" style="padding: 20px 0 10px;" valign="top">
 									<p style="margin: 0;font-family: 'Lato',Arial,Helvetica, sans-serif !important;color: #a9abad;font-size: 12px;font-weight: normal;letter-spacing: 0.040em;">&copy; <?php echo date('Y'); ?> WanderMonkey Ltd.</p>
 									</td>
 								</tr>
 								<tr>
 									<td align="center" style="padding: 0;">
 									<table style="padding: 0 0 10px;">
 										<tbody>
 											<tr>
                        <td style="padding: 1px 2px;"><a href="https://www.facebook.com/wandermonkey" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/facebook.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                        <td style="padding: 1px 2px;"><a href="https://www.youtube.com/channel/UCpqCIcINo5k1sV1InhO_sbw" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/youtube.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                        <td style="padding: 1px 2px;"><a href="https://www.instagram.com/thewandermonkey" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/instagram.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                      </tr>
 										</tbody>
 									</table>
 									</td>
 								</tr>
 							</tbody>
 						</table>
 						</td>
 					</tr>
 				</tbody>
 			</table>
 			</td>
 		</tr>
 	</tbody>
 </table>
 </body>
</html>
 