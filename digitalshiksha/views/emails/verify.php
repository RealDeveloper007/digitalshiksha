<html>
<div class='main' style='font-family: roboto;max-width: 720px;box-shadow: 0 0 3px 3px #f2f2f2;margin: 0 auto;padding: 30px;border-radius: 3px;'>
<p style='color: #424242;font-size: 20px;margin-bottom: 20px;line-height: 27px;margin-top: 20px;'>Welcome to <?= $brand ?>.</p>
<p style='font-size: 16px;'>Hello,<br> <?= $name; ?></p>
<p style='text-align: center'>
    Please copy the OTP for your account verification.<br>
    <button style='background: #08c;border-color: #08c;color: #ffffff;padding: 10px 16px;font-size: 14.25px;line-height: 1.33;border-radius: 21px;font-weight: bold;cursor: pointer;'><?= $otp ?></button>
</p>
<p style='font-size: 15px;'>Thanks,</p>

<h4 style='color: #08c;font-size: 16px;line-height: 24px;font-weight: 500;'><b><?= $brand ?> Team <br>
<a href='<?= base_url() ?>'>
<img style='width: 230px;margin-top: -20px;' src='<?= base_url('logo.png') ?>'></a></h4>

<p style='color: #424242;font-size: 12px;line-height: 21px;'><b style='color: black;'>DISCLAIMER:</b> E-mails are not secure and cannot be guaranteed to be error free as they can be
intercepted, amended, or contain viruses. Anyone who communicates with us by e-mail is deemed to have accepted these risks.
Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
    </div>
</html>