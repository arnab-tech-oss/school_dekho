<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title></title>
    <link rel="stylesheet" href="https://www.schooldekho.org/email/style.css" />
</head>

<body style="background-color: white; background: white">
    <div class="container">
        <a href="https://schooldekho.org"><img style="width: 100%"
                src="https://schooldekho.org/public/email/top.webp?h=4443ede889d3931ef170e8892449cf04" /></a>
    </div>
    <div class="container">
        <table class="container" align="center" width="600" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left" style="padding-left: 10%; padding-right: 10%">
                    <div>Dear {{ $claim->contact_person}},</div>
                    <p><br></p>
                    <div>Greetings from School Dekho.</div>
                    <p><br></p>
                    <div>We are sending you the User ID and Password, so that you can get access to the Panel that we
                        have generated
                        for you.<br><br>Please check and revert with a statement of acknowledgement that you have
                        received your User
                        ID and Password that we are
                        hereby mailing you:<br><br>Sign-in Link: <a href="https://schooldekho.org/auth"
                            target="_blank">Sign-in<br></a>Your
                        User ID:&nbsp; {{ $claim->official_email }}<br></a>Your Password:
                        123456<br><br>Waiting for
                        your acknowledgement Mail.<br>In case you have any queries, please feel free to contact
                        me.<br><br>Thanks
                        and
                        Regards,<br>School Dekho,<br>Mail: <a href="mailto:info@schooldekho.org"
                            target="_blank">info@schooldekho.org<br></a>Ph: 9007057333/8100416835
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-top: 80px ;" class="container ">
        <img style="width: 100%"
            src="https://schooldekho.org/public/email/mid.webp?h=cbcae391e42a51228c73118da2c0b84b" />
    </div>
    <div class="container">
        <img style="width: 100%"
            src="https://schooldekho.org/public/email/Bottom.webp?h=3fe7a35586f49fa5060ad30903593881" />
    </div>
</body>

</html>