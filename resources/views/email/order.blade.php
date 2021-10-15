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
    p{
      letter-spacing: 0.040em;
      font-family: 'Lato', sans-serif;
      font-weight: 400;
      font-size: 18px;
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
                  <td align="center" class="logo" style="padding-bottom: 0;" valign="top">  <img alt="logo" style="width:100px;" src="{{ url('public/images/logo.png')}}" />
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
                  <td align="left" colspan="2" valign="top"><!-- <p style="color: #f8233b;font-size: 30px;margin: 0 0 30px;font-weight: 300;font-family: 'Lato', sans-serif;letter-spacing: 0.040em;">We are eternally grateful!</p> -->
                  <p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;margin-bottom: 0;">Thanks a lot!</p>

                  <p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;margin-bottom: 0;">Hi {{ $html['name'] }} !</p>

                  <p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;margin-bottom: 0;">We got your order {{ $html['order_number'] }}.</p>

                  <p style="font-size: 16px;line-height: 28px;letter-spacing: 0.040em;font-family: 'Lato', Arial, sans-serif;margin-bottom: 0;">You will receive confirmation e mail once it&#39;s processed.</p>
                  </td>
                </tr>
                <!-- <tr>
                  <td style="text-align: left;padding: 0px 1px;">[vouchercodes]</td>
                </tr>
                <tr>
                  <td style="text-align: left;padding: 0px 1px;">[elit_voucher_codes]</td>
                </tr>
                <tr>
                  <td style="text-align: left;padding: 0px 1px;">[glovo_voucher_codes]</td>
                </tr>
                <tr> -->
                  <td style="text-align: left;padding: 0px 1px;">&nbsp;</td>
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
                  <p style="margin: 0;font-family: 'Lato',Arial,Helvetica, sans-serif !important;color: #a9abad;font-size: 12px;font-weight: normal;letter-spacing: 0.040em;">&copy; <?php echo date('Y'); ?> AutoDukan Spares.</p>
                  </td>
                </tr>
                <tr>
                  <td align="center" style="padding: 0;">
                  <table style="padding: 0 0 10px;">
                    <tbody>
                      <!-- <tr>
                        <td style="padding: 1px 2px;"><a href="https://www.facebook.com/ElitElectronics" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/facebook.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                        <td style="padding: 1px 2px;"><a href="https://www.youtube.com/c/EeGeElitElectronics" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/youtube.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                        <td style="padding: 1px 2px;"><a href="https://www.instagram.com/elit_electronics/" style="display:block;" target="_blank"><img alt="" src="https://www.bizuma.com/assets/images/instagram.png" style="    border: 0;display: block;height: 25px;outline: none;text-decoration: none;width: 25px;" /> </a></td>
                      </tr> -->
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
 