<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Digital Shiksha Darpan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #4CAF50;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background: #4CAF50;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Digital Shiksha Darpan</h1>
        </div>
        <div class="content">
            <p>Dear <?= ucfirst($user_name) ?>,</p>
            <p> Welcome to the  Digital Shiksha Darpan. Thank you for becoming part of digital shiksha.It is an e-learning platform having many features for digital learning.</p>
            <p>Your login id:-(<?= $email.' OR '.$phone ?>) - </p>
            <p>Your password:-  <?= $password ?></p>
            <p>For learning all features of digital shiksha darpan website/app you may click by below link. After this video you will be able to access all features of this web application/app.</p>
            <p><a href="https://youtu.be/r-fTnaZK9_w?si=bI55Zhb1x8WqCGPL" target="_blank">Click here to watch the video</a></p>
            <hr>
            <p>प्रिय उपभोक्ता,</p>
            <p>डिजिटल शिक्षा दर्पण में आपका स्वागत है। यह डिजिटल लर्निंग के लिए ई-लर्निंग प्लेटफार्म है।</p>
            <p>डिजिटल शिक्षा दर्पण वेबसाइट/एंड्राइड एप्प के सभी फीचर सीखने के लिए आप नीचे दिए गए लिंक से वीडियो देख कर सीख सकते हैं और इनका अधिक से अधिक लाभ उठा सकते हैं।</p>
            <p><a href="https://youtu.be/r-fTnaZK9_w?si=bI55Zhb1x8WqCGPL" target="_blank">नीचे लिंक पर क्लिक करें</a></p>
            <p>डिजिटल शिक्षा का हिस्सा बनने के लिए धन्यवाद।</p>
            <p>Regards,</p>
            <p>Digital Shiksha Team</p>
        </div>
        <div class="footer">
            <p><img style='width: 230px;margin-top: -20px;' src='<?= base_url('logo.png') ?>'></p>
        </div>
    </div>
</body>
</html>
