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
 									<td align="left" style="padding-left: 0;" valign="top" style="padding-left: 0;">
                    <img alt="logo" src="{{ url('/assets/images/logo.png')}}" />
                  </td>
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
 									<p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', sans-serif;color: #58595b;margin-top: 0;">Congratulations <span style="text-transform: capitalize;"><b>{{ $html['name'] }}</b></span> you are now forum trained.</p>
                  <p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;color: #58595b;" xss="removed">
                    Email: <b>{{ $html['email'] }}</b>
                  </p>
 									<p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;color: #58595b;">You’re almost ready to go. To make sure we have a safe community and avoid spammers, please click the link below to view certificate.</p>
                  
                  <p style="margin: 0;"><a href="{{ $html['certificate'] }}" style="background-color:#c91517;border:1px solid #c91517;border-radius:4px;color:#ffffff;display:inline-block;font-family:Lato,sans-serif;text-align:center;text-decoration:none;font-size: 16px;padding: 6px 8px;line-height: 20px;"> View Certificate</a></p>

                  
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
 									<td align="left" style="padding: 20px 0 10px;" valign="top">
 									<p style="margin: 0;font-family: 'Lato',Arial,Helvetica, sans-serif !important;color: #58595b;font-size: 16px;font-weight: bold;letter-spacing: 0.040em;">&copy; <?php echo date('Y'); ?> DELLA LEADERS CLUB.</p>
 									</td>
 								</tr>
 								{{-- <tr>
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
 								</tr> --}}
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
 