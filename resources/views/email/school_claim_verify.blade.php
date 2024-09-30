<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title></title>
    <link rel="stylesheet" href="https://www.schooldekho.org/email/style.css" />
  </head>
  <body style="background-color: white; background: white">
    <div class="container">
      <a href="https://schooldekho.org"
        ><img
          style="width: 100%"
          src="https://schooldekho.org/public/email/top.webp?h=4443ede889d3931ef170e8892449cf04"
      /></a>
    </div>
    <div class="container">
      <table
        class="container"
        align="center"
        width="600"
        cellpadding="0"
        cellspacing="0"
      >
        <tr>
          <td align="left" style="padding-left: 10%; padding-right: 10%">
            <p class="abcd"><strong>Dear {{ $claim->contact_person }},</strong></p>
            <p class="abcd">
              Thank you for registering with School Dekho. We are thrilled to
              have you on board!
            </p>
            <p class="abcd">
              To complete your registration and start using our services, please
              verify your email address by clicking on the link below:
            </p>
            <a
              class="btn btn-primary pt-2 pb-2 mt-2 mb-2"
              href="{{ route('claim.verify.mobile',$claim->email_verification_code) }}"
              style="text-align: justify"
              >Verify Now</a
            >
            {{-- <p class="abcd">
              Alternatively, you can also verify your email address by entering
              the following OTP code:
            </p>
            <div class="rounded btn-primary pt-2 pb-2 mt-2 mb-2 h5">
              [OTP Code]
            </div> --}}
            <p class="abcd">
              This verification step is needed to ensure that we have the
              correct email address on file for you and to provide you with a
              secure and seamless experience.
            </p>
            <p class="abcd">
              We kindly request you to verify your email address at your
              earliest convenience to fully enjoy the benefits of School Dekho.
            </p>
            <p class="abcd">
              If you have quarries or need assistance, please feel free to reach
              out to us at
              <a href="mailto:support@schooldekho.org"
                >support@schooldekho.org</a
              >
              or <a href="mailto:info@schooldekho.org">info@schooldekho.org</a>.
            </p>
            <p class="abcd">Thank you for choosing School Dekho!</p>
            <p class="abcd">
              <strong>The School Dekho Team</strong>
            </p>
          </td>
        </tr>
      </table>
    </div>
    <div class="container">
      <img
        style="width: 100%"
        src="https://schooldekho.org/public/email/mid.webp?h=cbcae391e42a51228c73118da2c0b84b"
      />
    </div>
    <div class="container">
      <img
        style="width: 100%"
        src="https://schooldekho.org/public/email/Bottom.webp?h=3fe7a35586f49fa5060ad30903593881"
      />
    </div>
  </body>
</html>
